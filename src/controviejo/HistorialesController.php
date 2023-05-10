<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Historiales Controller
 *
 * @property \App\Model\Table\HistorialesTable $Historiales
 *
 * @method \App\Model\Entity\Historiale[] paginate($object = null, array $settings = [])
 */
class HistorialesController extends AppController
{

	public function isAuthorized()
    {
           if (in_array($this->request->action, ['index','view','edit_admin','index_admin','add_admin','delete_admin','index_search_admin'])) {
       
          
						$tiene= $this->tienepermiso('historiales',$this->request->action, $this->request->session()->read('Auth.User.role'));
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
		$this->viewBuilder()->layout('store');
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $historiales = $this->paginate($this->Historiales->find()->where(['cliente_id'=>$this->request->session()->read('Auth.User.cliente_id')]));
		

        $this->set(compact('historiales'));
        $this->set('_serialize', ['historiales']);
    }

	 public function index_admin()
    {
		$this->viewBuilder()->layout('admin');
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        
		
		if ($this->request->is('post')) {
			$termsearch =0;
			if ($this->request->data['termino']!= null)
			{
				$termsearch = $this->request->data['termino'];
			}	
			$result = $this->Historiales->find()->where(['cliente_id'=>$termsearch]);
			/*if (is_numeric($termsearch))
				$result->where(['c.codigo ='=>$termsearch]);	
			else
				$result->where(['c.razon_social LIKE'=>$termsearch]);*/
			}
			else
				$result = $this->Historiales->find()->where(['cliente_id'=>0]);
			
			
			$historiales = $this->paginate($result);
		
		
		
		
		$this->loadModel('Clientes');
		$Clientes = $this->Clientes->find('all')->Select(['id','codigo','nombre'])
		->order(['id' => 'DESC']);
		
		foreach ($Clientes as $opcion) {
	
			$clientes[$opcion['id']] = $opcion['codigo'].' - '.$opcion['nombre'];    
		}		
        $this->set(compact('clientes'));
		$this->set('titulo','Historiales de Puntos');

        $this->set(compact('historiales'));
        $this->set('_serialize', ['historiales']);
    }
	
    /**
     * View method
     *
     * @param string|null $id Historiale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historiale = $this->Historiales->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('historiale', $historiale);
        $this->set('_serialize', ['historiale']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historiale = $this->Historiales->newEntity();
        if ($this->request->is('post')) {
            $historiale = $this->Historiales->patchEntity($historiale, $this->request->getData());
            if ($this->Historiales->save($historiale)) {
                $this->Flash->success(__('The historiale has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The historiale could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $clientes = $this->Historiales->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('historiale', 'clientes'));
        $this->set('_serialize', ['historiale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Historiale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historiale = $this->Historiales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historiale = $this->Historiales->patchEntity($historiale, $this->request->getData());
            if ($this->Historiales->save($historiale)) {
                $this->Flash->success(__('The historiale has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The historiale could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $clientes = $this->Historiales->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('historiale', 'clientes'));
        $this->set('_serialize', ['historiale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Historiale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete_admin($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historiale = $this->Historiales->get($id);
        if ($this->Historiales->delete($historiale)) {
            $this->Flash->success(__('The historiale has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The historiale could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index_admin']);
    }
}
