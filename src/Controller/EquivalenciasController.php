<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Equivalencias Controller
 *
 * @property \App\Model\Table\EquivalenciasTable $Equivalencias
 *
 * @method \App\Model\Entity\Equivalencia[] paginate($object = null, array $settings = [])
 */
class EquivalenciasController extends AppController
{

	public function isAuthorized()
    {
           if (in_array($this->request->getParam('action'), ['editAdmin','addAdmin','deleteAdmin','indexAdmin'])) {
       
          
						$tiene= $this->tienepermiso('equivalencias',$this->request->getParam('action'), $this->request->getSession()->read('Auth.role'));
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
    public function indexAdmin()
    {
		$this->set('titulo','Listado de Equivalencias');
		$this->viewBuilder()->setLayout('admin');
		$this->paginate = [				
						'limit' => 50
		
			];

        $equivalencias = $this->paginate($this->Equivalencias);

        $this->set(compact('equivalencias'));
        $this->set('_serialize', ['equivalencias']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addAdmin()
    {
        $equivalencia = $this->Equivalencias->newEmptyEntity();
        if ($this->request->is('post')) {
            $equivalencia = $this->Equivalencias->patchEntity($equivalencia, $this->request->getData());
            if ($this->Equivalencias->save($equivalencia)) {
                $this->Flash->success(__('The equivalencia has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The equivalencia could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $this->set(compact('equivalencia'));
        $this->set('_serialize', ['equivalencia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equivalencia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editAdmin($id = null)
    {
		$this->set('titulo','Editar Equivalencia');
		$this->viewBuilder()->setLayout('admin');
        $equivalencia = $this->Equivalencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equivalencia = $this->Equivalencias->patchEntity($equivalencia, $this->request->getData());
            if ($this->Equivalencias->save($equivalencia)) {
                $this->Flash->success(__('The equivalencia has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The equivalencia could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $this->set(compact('equivalencia'));
        $this->set('_serialize', ['equivalencia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equivalencia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteAdmin($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equivalencia = $this->Equivalencias->get($id);
        if ($this->Equivalencias->delete($equivalencia)) {
            $this->Flash->success(__('The equivalencia has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The equivalencia could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index_admin']);
    }
}
