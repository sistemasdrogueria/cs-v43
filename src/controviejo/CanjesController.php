<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Canjes Controller
 *
 * @property \App\Model\Table\CanjesTable $Canjes
 *
 * @method \App\Model\Entity\Canje[] paginate($object = null, array $settings = [])
 */
class CanjesController extends AppController
{

	public function isAuthorized()
    {
           if (in_array($this->request->getParam('action'), ['index','add','view','index_admin','add_admin','delete_admin','index_search_admin','confirm','sendmail','view_admin'])) {
       
          
						$tiene= $this->tienepermiso('canjes',$this->request->getParam('action'), $this->request->getSession()->read('Auth.User.role'));
						if (!$tiene)
							$this->Flash->error(__('No tiene permisos para ingresar'),['key' => 'changepass']);
						return $tiene;			
					}
				
		return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$this->viewBuilder()->setLayout('store');
        $this->paginate = [
            'contain' => ['Beneficios', 'Clientes']
        ];
        $canjes = $this->paginate($this->Canjes->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id')]));

        $this->set(compact('canjes'));
        $this->set('_serialize', ['canjes']);
    }

	
	public function index_admin()
    {
		$this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Beneficios', 'Clientes'],
			'order'=>(['Canjes.id' => 'DESC'])
        ];
		
		 if ($this->request->is('post')) {
			$termsearch ="";
			if ($this->request->getData()['termino']!= null)
			{
				$terminocompleto = explode(" ", $this->request->getData()['termino']);
				
				if (count($terminocompleto)>1)
				{
						foreach ($terminocompleto as $terminosimple): 
							$termsearch = $termsearch.'%'.$terminosimple.'%';
						endforeach; 
				}
				else
					if (is_numeric($terminocompleto[0]))
						$termsearch=$terminocompleto[0];
					else
						$termsearch = '%'.$terminocompleto[0].'%';
				
			}	
				
			
				$result = $this->Canjes->find('all')
					->join([
						'table' => 'beneficios',
						'alias' => 'b',
						'type' => 'LEFT',
						 'conditions' => ['b.id = Canjes.beneficio_id']		
					]
					)->where(['b.nombre LIKE'=>$termsearch]);
					
			}
	
			else
				$result=$this->Canjes;
			
			$canjes = $this->paginate($result);
			
     
		

        $this->set(compact('canjes'));
        $this->set('_serialize', ['canjes']);
		
		$this->set('titulo','Lista de canjes');
    }
    /**
     * View method
     *
     * @param string|null $id Canje id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

	public function view_admin($id = null)
    {
        $canje = $this->Canjes->get($id, [
            'contain' => ['Beneficios', 'Clientes']
        ]);
		$this->set('titulo','Vista de Canje');
        $this->set('canje', $canje);
       
		
		
		$this->viewBuilder()->setLayout('admin');

		//$cliente_id=$this->request->getSession()->read('Auth.User.cliente_id');

		
        //$this->set(compact('canje', 'beneficio', 'cliente_id'));
        $this->set('_serialize', ['canje']);
    }

    public function view($id = null)
    {/*
        $canje = $this->Canjes->get($id, [
            'contain' => ['Beneficios', 'Clientes']
        ]);

        $this->set('canje', $canje);
        $this->set('_serialize', ['canje']);
		*/
		
		$this->viewBuilder()->setLayout('store');

		$cliente_id=$this->request->getSession()->read('Auth.User.cliente_id');
		
		$this->loadModel('Beneficios');
		$beneficio = $this->Beneficios->get($id, [
            'contain' => []
        ]);
		$this->loadModel('Puntos');
		$punto = $this->Puntos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id')])->first([]);
		
        $this->set(compact('canje', 'beneficio', 'cliente_id','punto'));
        $this->set('_serialize', ['canje']);
    }

	public function sendmail($id = null){
		$canje = $this->Canjes->get($id, [
            'contain' => []
		]); 
		$this->loadModel('Beneficios');
		$beneficio = $this->Beneficios->get($canje->beneficio_id);
		 


		$this->sendConfirmacionCanje($beneficio,$canje,$canje->cliente_id); 
		return $this->redirect(['action' => 'index_admin']);
	}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */


	

	public function confirm()
	{
		$this->loadComponent('RequestHandler', [
			'enableBeforeRedirect' => false
		]);

		$this->viewBuilder()->setLayout('store');
        $canje = $this->Canjes->newEntity();
        if ($this->request->is('post')) {
			$canje = $this->Canjes->patchEntity($canje, $this->request->getData());
			$puntos_disponibles = $this->request->getSession()->read('Auth.User.puntos');
			$puntos_canje=$canje->cantidad_puntos;
			
			if ($this->request->getSession()->read('Auth.User.habilitado')==0)
			{
				$this->Flash->error(__('La cuenta se encuentra momentáneamente suspendida - Por favor comuníquese con el sector cobranzas - (0291) 45830 51/52/53'),['key' => 'changepass']);
				return $this->redirect($this->referer());
			}
            $this->loadModel('Beneficios');
			$beneficio = $this->Beneficios->find()->where(['id' => $canje->beneficio_id])->first([]);
			if (($puntos_canje <= $puntos_disponibles) && ($beneficio->cantidad_disponible>0))
			{
				//punto en template
				$this->request->getSession()->write('Auth.User.puntos',$puntos_disponibles-$puntos_canje);
				//punto en tabla puntos
				$this->loadModel('Puntos');
				$punto = $this->Puntos->find()->where(['cliente_id' => $this->request->getSession()->read('Auth.User.cliente_id')])->first([]);
				$punto->cantidad_disponible=$punto->cantidad_disponible-$puntos_canje;
				$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
				if ($this->Puntos->save($punto)) 
					{
						$beneficio->cantidad_disponible=$beneficio->cantidad_disponible-1;
						if ($this->Beneficios->save($beneficio)) 
						{
							if ($this->Canjes->save($canje)) {
								$this->Flash->success(__('Se realizo el canje correctamente.'),['key' => 'changepass']);
								$this->recorrermovimientos($puntos_canje);
								$this->sendConfirmacionCanje($beneficio,$canje,$this->request->getSession()->read('Auth.User.cliente_id'));   
								return $this->redirect(['action' => 'index']);						
							}
							else
							{
								$this->Flash->error(__('Ocurrio un inconveniente en el canje, intente de nuevo.'),['key' => 'changepass']);
								$punto->cantidad_disponible=$punto->cantidad_disponible+$puntos_canje;
								$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
								$X=  $this->Puntos->save($punto);
								$beneficio->cantidad_disponible=$beneficio->cantidad_disponible+1;
								$X = $this->Beneficios->save($beneficio);
								return $this->redirect($this->referer());								
							}
						}
						else
						{
							$this->Flash->error(__('Ocurrio un inconveniente en el canje, intente de nuevo.'),['key' => 'changepass']);
							$punto->cantidad_disponible=$punto->cantidad_disponible+$puntos_canje;
							$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
							$x= $this->Puntos->save($punto);
						}
					}
					else 
					{
						$this->Flash->error(__('Ocurrio un inconveniente en el canje, intente de nuevo.'),['key' => 'changepass']);
						$punto->cantidad_disponible=$punto->cantidad_disponible+$puntos_canje;
						$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
						return $this->redirect($this->referer());
					}
			}
			else
			{
				$this->Flash->error(__('No tiene puntos suficientes para el canje'),['key' => 'changepass']);
				return $this->redirect($this->referer());
			}
			
        }
		
	}
	
	function recorrermovimientos($cantidad=null)
	{
		$this->loadModel('Movimientos');
		$movimientos = $this->Movimientos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id'),
														 'tipo' =>'1', 'cantidad_disponible>0'//, //'fecha_vencimiento'>'now()'
														 ])->order(['fecha_vencimiento' => 'ASC']);	
		 $puntosarestar = (int)$cantidad;
		 foreach ($movimientos as $movimiento):
		 $disponible =$movimiento->cantidad_disponible;
		 if ($puntosarestar > 0)
		 {
		 if ($puntosarestar-$disponible>0)
			
			{
				$puntosarestar = $puntosarestar-$disponible;
				$movimiento->cantidad_disponible =0;
				$x= $this->Movimientos->save($movimiento);
			}
			else
			{
				$movimiento->cantidad_disponible =$disponible - $puntosarestar;
				$puntosarestar = 0;
				$x= $this->Movimientos->save($movimiento);
				return $this->redirect($this->referer());
			}
		 }
		endforeach;
		return $this->redirect($this->referer());	
	}
	 	 
    public function add($beneficio_id=null)
    {
		$this->viewBuilder()->setLayout('store');
        $canje = $this->Canjes->newEntity();
        if ($this->request->is('post')) {
            $canje = $this->Canjes->patchEntity($canje, $this->request->getData());
            if ($this->Canjes->save($canje)) {
                $this->Flash->success(__('The canje has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canje could not be saved. Please, try again.'),['key' => 'changepass']);
        }
		$cliente_id=$this->request->getSession()->read('Auth.User.cliente_id');
		
		$this->loadModel('Beneficios');
		$beneficio = $this->Beneficios->get($beneficio_id, [
            'contain' => []
        ]);
		$this->loadModel('Puntos');
		$punto = $this->Puntos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id')])->first([]);

        $this->set(compact('canje', 'beneficio', 'cliente_id','punto'));
        $this->set('_serialize', ['canje']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Canje id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $canje = $this->Canjes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $canje = $this->Canjes->patchEntity($canje, $this->request->getData());
            if ($this->Canjes->save($canje)) {
                $this->Flash->success(__('The canje has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canje could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $beneficios = $this->Canjes->Beneficios->find('list', ['limit' => 200]);
        $clientes = $this->Canjes->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('canje', 'beneficios', 'clientes'));
        $this->set('_serialize', ['canje']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Canje id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $canje = $this->Canjes->get($id);
        if ($this->Canjes->delete($canje)) {
            $this->Flash->success(__('The canje has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The canje could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index']);
    }
	
	 // Enviar email   
     
	function sendConfirmacionCanje($beneficio,$canje,$cliente_id) {
			  
		$this->loadModel('Clientes');
		
		$cliente = $this->Clientes->get($cliente_id, [
           'contain' => ['Provincias','Localidads']  ]);			  
		  
				$para = $cliente['email'];
				//$para = 'mdedios@drogueriasur.com.ar'; 
				$para2 = 'comunidadsur@drogueriasur.com.ar';
				$parabcc1 = 'mdedios@drogueriasur.com.ar';
				$parabcc2 = 'jmcarlavan@drogueriasur.com.ar';
				$parabcc3 = 'coubinia@drogueriasur.com.ar';
				$email = new Email();
				$email->setTransport('gmail');
				try 
					{
						$res = $email->setFrom(['comunidadsur@drogueriasur.com.ar'=> 'comunidadsur.com.ar'])
							->setReplyTo(['comunidadsur@drogueriasur.com.ar'])
							->setTemplate('canje', 'default')
							->setEmailFormat('html')
							->setTo([$para,$para2])
							->addBcc([$parabcc1,$parabcc2,$parabcc3])
							->setSubject('Resumen de tu canje - '.$beneficio['nombre'])
							->setViewVars(['cliente' => $cliente,'beneficio'=>$beneficio,'canje'=>$canje ])
							->send();

					} 
					catch (Exception $e) {

						echo 'Exception : ',  $e->getMessage(), "\n";
						
					}
            }  
}
