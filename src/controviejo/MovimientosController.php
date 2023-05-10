<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Movimientos Controller
 *
 * @property \App\Model\Table\MovimientosTable $Movimientos
 *
 * @method \App\Model\Entity\Movimiento[] paginate($object = null, array $settings = [])
 */
class MovimientosController extends AppController
{

	public function isAuthorized()
    {
           if (in_array($this->request->getParam('action'), ['index','view','edit_admin','index_admin','add_admin','delete_admin','index_search_admin','consumo'])) {
       
          
						$tiene= $this->tienepermiso('movimientos',$this->request->getParam('action'), $this->request->getSession()->read('Auth.User.role'));
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
            'contain' => ['Clientes'],
            'maxLimit' => 1000,
            'limit' => 1000,
            'order' => array('Movimientos.fecha' => 'ASC')
        ];
        $movimientos = $this->paginate($this->Movimientos->find("all")->where(['cliente_id'=> $this->request->getSession()->read('Auth.User.cliente_id')])->order(['Movimientos.fecha' => 'DESC']));

        $this->set(compact('movimientos'));
        $this->set('_serialize', ['movimientos']);
    }


    public function consumo()
    {
		$this->viewBuilder()->setLayout('store');
        $this->paginate = [
            'contain' => ['Clientes'],
            'maxLimit' => 1000,
            'limit' => 1000,
            'order' => array('Movimientos.fecha' => 'ASC')
        ];
        $movimientos = $this->paginate($this->Movimientos->find("all")->where(['cliente_id'=> $this->request->getSession()->read('Auth.User.cliente_id'),'tipo'=>1])->order(['Movimientos.fecha' => 'DESC']));

        $this->set(compact('movimientos'));
        $this->set('_serialize', ['movimientos']);
    }    /**
     * View method
     *
     * @param string|null $id Movimiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movimiento = $this->Movimientos->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('movimiento', $movimiento);
        $this->set('_serialize', ['movimiento']);
    }

	
	public function index_admin()
    {
		$this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Clientes'], 'limit'=>100,
        ];
        
		
		if ($this->request->is(['post'])) {
			$termsearch =0;
			if ($this->request->getData()['termino']!= null)
			{
				$termsearch = $this->request->getData()['termino'];
			}	
			$result = $this->Movimientos->find()->where(['cliente_id'=>$termsearch]);
			/*if (is_numeric($termsearch))
				$result->where(['c.codigo ='=>$termsearch]);	
			else
				$result->where(['c.razon_social LIKE'=>$termsearch]);*/
                $this->request->getSession()->write('cliente_movimiento',$termsearch);
			}
			else
            {
                if (!empty($this->request->getSession()->read('cliente_movimiento')))
                    $termsearch =$this->request->getSession()->read('cliente_movimiento');
                else
                    $termsearch =0;
				$result = $this->Movimientos->find()->where(['cliente_id'=>$termsearch]);
            }
			
			$movimientos = $this->paginate($result);
		
		
		
		
		$this->loadModel('Clientes');
		$Clientes = $this->Clientes->find('all')->Select(['id','codigo','nombre'])->where(['comunidadsur'=>1])
		->order(['id' => 'DESC']);
		
		foreach ($Clientes as $opcion) {
	
			$clientes[$opcion['id']] = $opcion['codigo'].' - '.$opcion['nombre'];    
		}		
        $this->set(compact('clientes'));
		$this->set('titulo','Movimientos de Puntos');

        $this->set(compact('movimientos'));
        $this->set('_serialize', ['movimientos']);
    }
	
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movimiento = $this->Movimientos->newEntity();
        if ($this->request->is('post')) {
            $movimiento = $this->Movimientos->patchEntity($movimiento, $this->request->getData());
            if ($this->Movimientos->save($movimiento)) {
                $this->Flash->success(__('The movimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movimiento could not be saved. Please, try again.'));
        }
        $clientes = $this->Movimientos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('movimiento', 'clientes'));
        $this->set('_serialize', ['movimiento']);
    }

	
	 public function delete_admin($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movimiento = $this->Movimientos->get($id);
        if ($this->Movimientos->delete($movimiento)) {
            $this->Flash->success(__('The movimiento has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The movimiento could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index_admin']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Movimiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movimiento = $this->Movimientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movimiento = $this->Movimientos->patchEntity($movimiento, $this->request->getData());
            if ($this->Movimientos->save($movimiento)) {
                $this->Flash->success(__('The movimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movimiento could not be saved. Please, try again.'));
        }
        $clientes = $this->Movimientos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('movimiento', 'clientes'));
        $this->set('_serialize', ['movimiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Movimiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movimiento = $this->Movimientos->get($id);
        if ($this->Movimientos->delete($movimiento)) {
            $this->Flash->success(__('The movimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The movimiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
