<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LogsAccesos Controller
 *
 * @property \App\Model\Table\LogsAccesosTable $LogsAccesos
 *
 * @method \App\Model\Entity\LogsAcceso[] paginate($object = null, array $settings = [])
 */
class LogsAccesosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $logsAccesos = $this->paginate($this->LogsAccesos);

        $this->set(compact('logsAccesos'));
        $this->set('_serialize', ['logsAccesos']);
    }

    /**
     * View method
     *
     * @param string|null $id Logs Acceso id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logsAcceso = $this->LogsAccesos->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('logsAcceso', $logsAcceso);
        $this->set('_serialize', ['logsAcceso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logsAcceso = $this->LogsAccesos->newEmptyEntity();
        if ($this->request->is('post')) {
            $logsAcceso = $this->LogsAccesos->patchEntity($logsAcceso, $this->request->getData());
            if ($this->LogsAccesos->save($logsAcceso)) {
                $this->Flash->success(__('The logs acceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logs acceso could not be saved. Please, try again.'));
        }
        $usuarios = $this->LogsAccesos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('logsAcceso', 'usuarios'));
        $this->set('_serialize', ['logsAcceso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Logs Acceso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logsAcceso = $this->LogsAccesos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logsAcceso = $this->LogsAccesos->patchEntity($logsAcceso, $this->request->getData());
            if ($this->LogsAccesos->save($logsAcceso)) {
                $this->Flash->success(__('The logs acceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logs acceso could not be saved. Please, try again.'));
        }
        $usuarios = $this->LogsAccesos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('logsAcceso', 'usuarios'));
        $this->set('_serialize', ['logsAcceso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Logs Acceso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logsAcceso = $this->LogsAccesos->get($id);
        if ($this->LogsAccesos->delete($logsAcceso)) {
            $this->Flash->success(__('The logs acceso has been deleted.'));
        } else {
            $this->Flash->error(__('The logs acceso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
