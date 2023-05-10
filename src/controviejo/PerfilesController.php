<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Perfiles Controller
 *
 * @property \App\Model\Table\PerfilesTable $Perfiles
 *
 * @method \App\Model\Entity\Perfile[] paginate($object = null, array $settings = [])
 */
class PerfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $perfiles = $this->paginate($this->Perfiles);

        $this->set(compact('perfiles'));
        $this->set('_serialize', ['perfiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Perfile id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perfile = $this->Perfiles->get($id, [
            'contain' => ['Permisos', 'Users']
        ]);

        $this->set('perfile', $perfile);
        $this->set('_serialize', ['perfile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perfile = $this->Perfiles->newEntity();
        if ($this->request->is('post')) {
            $perfile = $this->Perfiles->patchEntity($perfile, $this->request->getData());
            if ($this->Perfiles->save($perfile)) {
                $this->Flash->success(__('The perfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfile could not be saved. Please, try again.'));
        }
        $permisos = $this->Perfiles->Permisos->find('list', ['limit' => 200]);
        $this->set(compact('perfile', 'permisos'));
        $this->set('_serialize', ['perfile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Perfile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perfile = $this->Perfiles->get($id, [
            'contain' => ['Permisos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perfile = $this->Perfiles->patchEntity($perfile, $this->request->getData());
            if ($this->Perfiles->save($perfile)) {
                $this->Flash->success(__('The perfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfile could not be saved. Please, try again.'));
        }
        $permisos = $this->Perfiles->Permisos->find('list', ['limit' => 200]);
        $this->set(compact('perfile', 'permisos'));
        $this->set('_serialize', ['perfile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Perfile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perfile = $this->Perfiles->get($id);
        if ($this->Perfiles->delete($perfile)) {
            $this->Flash->success(__('The perfile has been deleted.'));
        } else {
            $this->Flash->error(__('The perfile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
