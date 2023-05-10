<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Localidads Controller
 *
 * @property \App\Model\Table\LocalidadsTable $Localidads
 *
 * @method \App\Model\Entity\Localidad[] paginate($object = null, array $settings = [])
 */
class LocalidadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provincias']
        ];
        $localidads = $this->paginate($this->Localidads);

        $this->set(compact('localidads'));
        $this->set('_serialize', ['localidads']);
    }

    /**
     * View method
     *
     * @param string|null $id Localidad id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $localidad = $this->Localidads->get($id, [
            'contain' => ['Provincias', 'Clientes', 'Sucursals']
        ]);

        $this->set('localidad', $localidad);
        $this->set('_serialize', ['localidad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $localidad = $this->Localidads->newEntity();
        if ($this->request->is('post')) {
            $localidad = $this->Localidads->patchEntity($localidad, $this->request->getData());
            if ($this->Localidads->save($localidad)) {
                $this->Flash->success(__('The localidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The localidad could not be saved. Please, try again.'));
        }
        $provincias = $this->Localidads->Provincias->find('list', ['limit' => 200]);
        $this->set(compact('localidad', 'provincias'));
        $this->set('_serialize', ['localidad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Localidad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $localidad = $this->Localidads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $localidad = $this->Localidads->patchEntity($localidad, $this->request->getData());
            if ($this->Localidads->save($localidad)) {
                $this->Flash->success(__('The localidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The localidad could not be saved. Please, try again.'));
        }
        $provincias = $this->Localidads->Provincias->find('list', ['limit' => 200]);
        $this->set(compact('localidad', 'provincias'));
        $this->set('_serialize', ['localidad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Localidad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $localidad = $this->Localidads->get($id);
        if ($this->Localidads->delete($localidad)) {
            $this->Flash->success(__('The localidad has been deleted.'));
        } else {
            $this->Flash->error(__('The localidad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
