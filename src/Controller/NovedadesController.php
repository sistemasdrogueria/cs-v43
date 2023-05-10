<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Novedades Controller
 *
 * @property \App\Model\Table\NovedadesTable $Novedades
 *
 * @method \App\Model\Entity\Novedade[] paginate($object = null, array $settings = [])
 */
class NovedadesController extends AppController
{



	public function initialize(): void{
        parent::initialize();
        
        // Include the FlashComponent
        $this->loadComponent('Flash');
        // Load Files model
        $this->loadModel('Files');

    }
	
	
	public function isAuthorized()
    {
		if (in_array($this->request->getParam('action'), ['editAdmin', 'deleteAdmin','index','addAdmin','indexAdmin','noticia','terminosCondiciones'])) {
       
			$tiene= $this->tienepermiso('novedades',$this->request->getParam('action'),$this->request->getSession()->read('Auth.role'));
			if (!$tiene)
					$this->Flash->error(__('No tiene permisos para ingresar'),['key' => 'changepass']);
			return $tiene;			
            }		
		else 
			{			    		
				return false;		
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
	
		$this->loadModel('Users');
		$id = $this->request->getSession()->read('Auth.id');
		$user = $this->Users->get($id, [
            'contain' => ['Clientes']
        ]);
		$user['notificacion'] = 0;
		$this->Users->save($user);
		
		$this->request->getSession()->write('notificacion',0);
        $this->set('novedades', $this->paginate(
		$this->Novedades->find()
		->where(['activo' =>'1'])
		->andWhere(['interno' =>'1'])
		->order(['id' => 'DESC'])
		));
		$novedades2 = $this->Novedades->find()
		->where(['activo' =>'1'])
		->andWhere(['interno' =>'0'])
		->order(['id' => 'DESC']);
		$this->set('novedades2', $novedades2);
        $this->set('_serialize', ['novedades']);
		$this->set('titulo','Listado de Noticias');
    }

	public function index_admin()
    {
		$this->viewBuilder()->setLayout('admin');
        $this->set('novedades', $this->paginate($this->Novedades->find()->order(['id' => 'DESC'])));
        $this->set('_serialize', ['novedades']);
		$this->set('titulo','Listado de Noticias');
	}
    /**
     * View method
     *
     * @param string|null $id Novedade id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $novedade = $this->Novedades->get($id, [
            'contain' => []
        ]);

        $this->set('novedade', $novedade);
        $this->set('_serialize', ['novedade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     *//*
    public function add_admin()
    {
		$this->viewBuilder()->setLayout('admin');
        $novedade = $this->Novedades->newEmptyEntity();
        if ($this->request->is('post')) {
            $novedade = $this->Novedades->patchEntity($novedade, $this->request->getData());
            if ($this->Novedades->save($novedade)) {
                $this->Flash->success(__('The novedade has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The novedade could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $this->set(compact('novedade'));
        $this->set('_serialize', ['novedade']);
		$this->set('titulo','Agregar Nueva Novedad');
    }*/

	public function terminosCondiciones()	{
		$this->viewBuilder()->setLayout('store');
		$this->loadModel('Equivalencias');
		$equivalencias = $this->Equivalencias->find('all');
		$this->set('equivalencias', $equivalencias);		
	}
		
	public function noticia($id = null)
    {
		$this->viewBuilder()->setLayout('store');
        $novedade = $this->Novedades->get($id, [
            'contain' => []
        ]);
        $this->set('novedade', $novedade);
        $this->set('_serialize', ['novedade']);
    
		
			$novedades2 = $this->Novedades->find()
		->where(['activo' =>'1'])
		->andWhere(['interno' =>'0'])
		->order(['id' => 'DESC']);
		$this->set('novedades2', $novedades2);
	}
	
	 public function addAdmin()
    {	
		$this->viewBuilder()->setLayout('admin');
        $novedade = $this->Novedades->newEmptyEntity();
        if ($this->request->is('post')) {
            $novedade = $this->Novedades->patchEntity($novedade, $this->request->getData());
			$fecha = Time::createFromFormat('d/m/Y',$this->request->getData('fecha'),'America/Argentina/Buenos_Aires');
			$fecha->i18nFormat('yyyy-MM-dd');
			$novedade['fecha'] = $fecha;
			
			$uploadData = '';
			if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'img/novedades/';
                $uploadFile = $uploadPath.$fileName;
				$novedade['img_file']= $fileName;
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                    $uploadData = $this->Files->newEmptyEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($uploadData)) {
                        //$this->Flash->success(__('File has been uploaded and inserted successfully.'),['key' => 'changepass']);
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'),['key' => 'changepass']);
						
                    }
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'),['key' => 'changepass']);
					
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'),['key' => 'changepass']);
				
            }
            if ($this->Novedades->save($novedade)) {
                $this->Flash->success(__('The novedade has been saved.',['key' => 'changepass']));

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The novedade could not be saved. Please, try again.',['key' => 'changepass']));
        }
        //$categorias = $this->Novedades->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('novedade'));
        $this->set('_serialize', ['novedade']);
		$this->set('titulo','Nuevo Beneficio');
    }
    /**
     * Edit method
     *
     * @param string|null $id Novedade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editAdmin($id = null)
    {
		$this->viewBuilder()->setLayout('admin');
        $novedade = $this->Novedades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $novedade = $this->Novedades->patchEntity($novedade, $this->request->getData());
            $fecha = Time::createFromFormat('d/m/Y',$this->request->getData('fecha'),'America/Argentina/Buenos_Aires');
			$fecha->i18nFormat('yyyy-MM-dd');
			$novedade['fecha'] = $fecha;
			
			$uploadData = '';
			if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'img/novedades/';
                $uploadFile = $uploadPath.$fileName;
				$novedade['img_file']= $fileName;
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                    $uploadData = $this->Files->newEmptyEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($uploadData)) {
                        //$this->Flash->success(__('File has been uploaded and inserted successfully.'),['key' => 'changepass']);
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'),['key' => 'changepass']);
						
                    }
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'),['key' => 'changepass']);
					
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'),['key' => 'changepass']);
				
            }
			
			
			
			
			if ($this->Novedades->save($novedade)) {
                $this->Flash->success(__('The novedade has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The novedade could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $this->set(compact('novedade'));
        $this->set('_serialize', ['novedade']);
		$this->set('titulo','Editar Novedad');
    }

    /**
     * Delete method
     *
     * @param string|null $id Novedade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteAdmin($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $novedade = $this->Novedades->get($id);
        if ($this->Novedades->delete($novedade)) {
            $this->Flash->success(__('The novedade has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The novedade could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index_admin']);
    }
}
