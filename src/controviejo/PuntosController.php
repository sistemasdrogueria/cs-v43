<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Puntos Controller
 *
 * @property \App\Model\Table\PuntosTable $Puntos
 *
 * @method \App\Model\Entity\Punto[] paginate($object = null, array $settings = [])
 */
class PuntosController extends AppController
{
	
	public function isAuthorized()
    {
           if (in_array($this->request->getParam('action'), ['index','view','edit_admin','add_admin','delete_admin','index_admin'])) {
       
          
						$tiene= $this->tienepermiso('puntos',$this->request->getParam('action'), $this->request->getSession()->read('Auth.User.role'));
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
            'contain' => ['Clientes'],'limit' => 2
        ];
        $punto = $this->Puntos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id')])->first([]);

		$this->loadModel('Movimientos');
		$movimientos = $this->Movimientos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id'),
														 'tipo' =>'1', 'cantidad_disponible>0', 
														 'fecha_vencimiento BETWEEN NOW() AND DATE_SUB(NOW(), INTERVAL -4 MONTH)'
														 ])->order(['fecha_vencimiento' => 'ASC']);	
		
		$this->loadModel('Equivalencias');
		$result = $this->Equivalencias->find('all')
				
				->join([
						'table' => 'clientes',
						'alias' => 'c',
						'type' => 'LEFT',
						'conditions' => ['Equivalencias.identificacion= c.identificacion','Equivalencias.volumen = c.categoria']		
					])
				->where(['c.id'=>$this->request->getSession()->read('Auth.User.cliente_id')])
				->first([]);
		$this->set('cliente',$result);
		$this->set('movimientos',$movimientos);
		
        $this->set(compact('punto'));
        $this->set('_serialize', ['punto']);
    }

	public function index_admin()
    {
		$this->set('titulo','Listado de puntos');
		$this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Clientes'],
            'limit'=>100,

        ];
        
			if ($this->request->is('post')) {
			$termsearch ="";
			if ($this->request->data['termino']!= null)
			{
				$terminocompleto = explode(" ", $this->request->data['termino']);
				
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

			
				$result = $this->Puntos->find('all')
				->join([
						'table' => 'clientes',
						'alias' => 'c',
						'type' => 'LEFT',
						 'conditions' => ['c.id = Puntos.cliente_id']		
					]);
			if (is_numeric($termsearch))
				$result->where(['c.codigo ='=>$termsearch,'c.comunidadsur'=>1]);	
			else
				$result->where(['c.razon_social LIKE'=>$termsearch,'c.comunidadsur'=>1]);
			}
			else
				$result=$this->Puntos->find('all')->where(['Clientes.comunidadsur'=>1]);
			
			$puntos = $this->paginate($result);
		
		//$puntos = $this->paginate($this->Puntos);

		
		
		
        $this->set(compact('puntos'));
        $this->set('_serialize', ['puntos']);
    }
    /**
     * View method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $punto = $this->Puntos->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('punto', $punto);
        $this->set('_serialize', ['punto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     *//*
    public function add()
    {
        $punto = $this->Puntos->newEntity();
        if ($this->request->is('post')) {
            $punto = $this->Puntos->patchEntity($punto, $this->request->getData());
            if ($this->Puntos->save($punto)) {
                $this->Flash->success(__('The punto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The punto could not be saved. Please, try again.'));
        }
        $clientes = $this->Puntos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('punto', 'clientes'));
        $this->set('_serialize', ['punto']);
    } */

    /**
     * Edit method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit_admin($id = null)
    {
		$this->set('titulo','Modificar puntos');
		$this->viewBuilder()->setLayout('admin');
        $punto = $this->Puntos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $punto = $this->Puntos->patchEntity($punto, $this->request->getData());
            if ($this->Puntos->save($punto)) {
                $this->Flash->success(__('The punto has been saved.'));

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The punto could not be saved. Please, try again.'));
        }
        $cliente = $this->Puntos->Clientes->find()->where(['id'=>$punto->cliente_id])->first();
        $this->set(compact('punto', 'cliente'));
        $this->set('_serialize', ['punto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $punto = $this->Puntos->get($id);
        if ($this->Puntos->delete($punto)) {
            $this->Flash->success(__('The punto has been deleted.'));
        } else {
            $this->Flash->error(__('The punto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
