<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermisosPerfiles Controller
 *
 * @property \App\Model\Table\PermisosPerfilesTable $PermisosPerfiles
 *
 * @method \App\Model\Entity\PermisosPerfile[] paginate($object = null, array $settings = [])
 */
class PermisosPerfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Perfiles', 'Permisos']
        ];
        $permisosPerfiles = $this->paginate($this->PermisosPerfiles);

        $this->set(compact('permisosPerfiles'));
        $this->set('_serialize', ['permisosPerfiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Permisos Perfile id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permisosPerfile = $this->PermisosPerfiles->get($id, [
            'contain' => ['Perfiles', 'Permisos']
        ]);

        $this->set('permisosPerfile', $permisosPerfile);
        $this->set('_serialize', ['permisosPerfile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permisosPerfile = $this->PermisosPerfiles->newEntity();
        if ($this->request->is('post')) {
            $permisosPerfile = $this->PermisosPerfiles->patchEntity($permisosPerfile, $this->request->getData());
            if ($this->PermisosPerfiles->save($permisosPerfile)) {
                $this->Flash->success(__('The permisos perfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permisos perfile could not be saved. Please, try again.'));
        }
        $perfiles = $this->PermisosPerfiles->Perfiles->find('list', ['limit' => 200]);
        $permisos = $this->PermisosPerfiles->Permisos->find('list', ['limit' => 200]);
        $this->set(compact('permisosPerfile', 'perfiles', 'permisos'));
        $this->set('_serialize', ['permisosPerfile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permisos Perfile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permisosPerfile = $this->PermisosPerfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permisosPerfile = $this->PermisosPerfiles->patchEntity($permisosPerfile, $this->request->getData());
            if ($this->PermisosPerfiles->save($permisosPerfile)) {
                $this->Flash->success(__('The permisos perfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permisos perfile could not be saved. Please, try again.'));
        }
        $perfiles = $this->PermisosPerfiles->Perfiles->find('list', ['limit' => 200]);
        $permisos = $this->PermisosPerfiles->Permisos->find('list', ['limit' => 200]);
        $this->set(compact('permisosPerfile', 'perfiles', 'permisos'));
        $this->set('_serialize', ['permisosPerfile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permisos Perfile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permisosPerfile = $this->PermisosPerfiles->get($id);
        if ($this->PermisosPerfiles->delete($permisosPerfile)) {
            $this->Flash->success(__('The permisos perfile has been deleted.'));
        } else {
            $this->Flash->error(__('The permisos perfile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
