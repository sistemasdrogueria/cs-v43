<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[] paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{


	public function isAuthorized()
    {
           if (in_array($this->request->getParam('action'), ['index','view','edit_admin','index_admin','delete_admin','index_search_admin'])) {
       
          
						$tiene= $this->tienepermiso('users',$this->request->getParam('action'), $this->request->getSession()->read('Auth.User.role'));
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
        $this->paginate = [
            'contain' => ['Provincias', 'Localidads' ]
        ];
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
        $this->set('_serialize', ['clientes']);
    }

	public function index_admin()
    {
       $this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Puntos'],
			'limit' => 200,           
		    
			'order' => ['Clientes.id' => 'DESC']
			
        ];
		
        
        $this->set('_serialize', ['clientes']);
		$this->set('titulo','Lista de Clientes');
		if ($this->request->is('post')) {
		 
			$termsearch ="";
			if ($this->request->getData['termino']!= null)
			{
				$terminocompleto = explode(" ", $this->request->getData['termino']);
				
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
				
			if (is_numeric($termsearch))
				$result = $this->Clientes->find('all')->where(['codigo ='=>$termsearch,'comunidadsur'=>1]);	
			else
				$result = $this->Clientes->find('all')->where(['razon_social LIKE'=>$termsearch,'comunidadsur'=>1]);
				$result = $this->Clientes->find('all')->where(['razon_social LIKE'=>$termsearch,'comunidadsur'=>1]);
			
				
				
				
			$this->set('clientes', $this->paginate($result));
			$this->set('_serialize', ['clientes']);
	}
		else
		{  $clientes = $this->paginate($this->Clientes->find('all')->where(['comunidadsur'=>1]));

			$this->set(compact('clientes'));
			$this->set('_serialize', ['clientes']);
			
		}
    }
    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Provincias', 'Localidads', 'Representantes', 'Grupos', 'Canjes', 'Historiales', 'Puntos', 'Sucursals', 'Users']
        ]);

        $this->set('cliente', $cliente);
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $provincias = $this->Clientes->Provincias->find('list', ['limit' => 200]);
        $localidads = $this->Clientes->Localidads->find('list', ['limit' => 200]);
        $representantes = $this->Clientes->Representantes->find('list', ['limit' => 200]);
        $grupos = $this->Clientes->Grupos->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'provincias', 'localidads', 'representantes', 'grupos'));
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $provincias = $this->Clientes->Provincias->find('list', ['limit' => 200]);
        $localidads = $this->Clientes->Localidads->find('list', ['limit' => 200]);
        $representantes = $this->Clientes->Representantes->find('list', ['limit' => 200]);
        $grupos = $this->Clientes->Grupos->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'provincias', 'localidads', 'representantes', 'grupos'));
        $this->set('_serialize', ['cliente']);
    }

	
	public function edit_admin($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $provincias = $this->Clientes->Provincias->find('list', ['limit' => 200]);
        $localidads = $this->Clientes->Localidads->find('list', ['limit' => 200]);
        $representantes = $this->Clientes->Representantes->find('list', ['limit' => 200]);
        $grupos = $this->Clientes->Grupos->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'provincias', 'localidads', 'representantes', 'grupos'));
        $this->set('_serialize', ['cliente']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
