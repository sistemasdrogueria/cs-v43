<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Beneficios Controller
 *
 * @property \App\Model\Table\BeneficiosTable $Beneficios
 *
 * @method \App\Model\Entity\Beneficio[] paginate($object = null, array $settings = [])
 */
class BeneficiosController extends AppController
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
		if (in_array($this->request->getParam('action'), ['editAdmin', 'deleteAdmin','index','addAdmin','indexAdmin','search'])) {
       
			$tiene= $this->tienepermiso('beneficios',$this->request->getParam('action'),$this->request->getSession()->read('Auth.role'));
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
        $this->paginate = [
            'contain' => ['Categorias'],
            'order'=>(['Beneficios.orden' => 'ASC'])
        ];
		$fecha = Time::now();
		 if ($this->request->is('post')) {
			$termsearch ="";
			if ($this->request->getData('termino')!= null)
			{
				$terminocompleto = explode(" ", $this->request->getData('termino'));
				
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
				
			
				$result = $this->Beneficios->find('all')
				
                    ->where(['Beneficios.nombre LIKE'=>$termsearch,'Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
                   // ->order(['Beneficios.orden' => 'ASC']);
			}
	
			else
				$result=$this->Beneficios->find('all')->where(['Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
                //->order(['Beneficios.orden' => 'ASC']);
                
			$beneficios = $this->paginate($result);

		
        //$beneficios = $this->paginate($this->Beneficios);
		
		
		$categorias = $this->Beneficios->Categorias->find();
        //$this->set(compact('beneficio', 'categorias'));
		
        $this->set(compact('beneficios','categorias'));
        $this->set('_serialize', ['beneficios']);
    }


	public function search($categoria_id=null)
    {
		$this->viewBuilder()->setLayout('store');
        $this->paginate = [
            'contain' => ['Categorias'],
            'order'=>(['Beneficios.orden' => 'ASC'])
        ];
		$fecha = Time::now();
		if ($this->request->is('post')) {
			$termsearch ="";
			if ($this->request->getData('termino')!= null)
			{
				$terminocompleto = explode(" ", $this->request->getData('termino'));
				
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
				
			
				$result = $this->Beneficios->find('all')
					->where(['Beneficios.nombre LIKE'=>$termsearch,'Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
					
					
			}
	
			else
			{
				if ($categoria_id!=null)
				{					
					if ($categoria_id==2)
					{
						$puntos =$this->request->getSession()->read('User.puntos');
						$result = $this->Beneficios->find('all')->where(['Beneficios.puntos <= '=>$puntos,'Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
					}
					if ($categoria_id>2)
						$result = $this->Beneficios->find('all')->where(['Beneficios.categoria_id'=>$categoria_id,'Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
					if ($categoria_id==1)
						$result=$this->Beneficios->find('all')->where(['Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
				}	
				else
					
					$result=$this->Beneficios->find('all')->where(['Beneficios.fecha_hasta >=' => $fecha->i18nFormat('yyyy-MM-dd') ]);
			}
			$beneficios = $this->paginate($result);
			

		
        //$beneficios = $this->paginate($this->Beneficios);
		
		
		$categorias = $this->Beneficios->Categorias->find();
        //$this->set(compact('beneficio', 'categorias'));
		
        $this->set(compact('beneficios','categorias'));
        $this->set('_serialize', ['beneficios']);
    }


	
	public function indexAdmin()
    {
		$this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Categorias'],	'limit' => 200,    
        ];
		
		    if ($this->request->is('post')) {
			$termsearch ="";
			if ($this->request->getData('termino')!= null)
			{
				$terminocompleto = explode(" ", $this->request->getData('termino'));
				
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
				
			
				$result = $this->Beneficios->find('all')
				
					->where(['Beneficios.nombre LIKE'=>$termsearch])
					->order(['Beneficios.id' => 'DESC']);
			}
	
			else
				$result=$this->Beneficios->find('all')->order(['Beneficios.id' => 'DESC']);
			
			$beneficios = $this->paginate($result);

        $this->set(compact('beneficios'));
        $this->set('_serialize', ['beneficios']);
		$this->set('titulo','Lista de Beneficios');
    }
    /**
     * View method
     *
     * @param string|null $id Beneficio id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->viewBuilder()->setLayout('store');
        $beneficio = $this->Beneficios->get($id, [
            'contain' => ['Categorias', 'Canjes']
        ]);

        $this->set('beneficio', $beneficio);
        $this->set('_serialize', ['beneficio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
		$this->viewBuilder()->setLayout('admin');
        $beneficio = $this->Beneficios->newEmptyEntity();
        if ($this->request->is('post')) {
            $beneficio = $this->Beneficios->patchEntity($beneficio, $this->request->getData());
            if ($this->Beneficios->save($beneficio)) {
                $this->Flash->success(__('The beneficio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficio could not be saved. Please, try again.'));
        }
        $categorias = $this->Beneficios->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('beneficio', 'categorias'));
        $this->set('_serialize', ['beneficio']);
    }*/
	
	public function addAdmin()
    {
		$this->viewBuilder()->setLayout('admin');
        $beneficio = $this->Beneficios->newEmptyEntity();
        if ($this->request->is('post')) {
            $beneficio = $this->Beneficios->patchEntity($beneficio, $this->request->getData());
			$fechadesde = Time::createFromFormat('d/m/Y',$this->request->getData('fecha_desde'),'America/Argentina/Buenos_Aires');
			$fechadesde->i18nFormat('yyyy-MM-dd');
			$fechahasta = Time::createFromFormat('d/m/Y',$this->request->getData('fecha_hasta'),'America/Argentina/Buenos_Aires');
			$fechahasta->i18nFormat('yyyy-MM-dd');
			$beneficio['cantidad_disponible']  = $beneficio['cantidad_maxima'];
			$beneficio['fecha_desde'] = $fechadesde;
			$beneficio['fecha_hasta'] = $fechahasta;
			$uploadData = '';
			if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'img/beneficios/';
                $uploadFile = $uploadPath.$fileName;
				$beneficio['imagen']= $fileName;
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
						$this->redirect($this->referer());
                    }
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'),['key' => 'changepass']);
					$this->redirect($this->referer());
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'),['key' => 'changepass']);
				$this->redirect($this->referer());
            }
            if ($this->Beneficios->save($beneficio)) {
                $this->Flash->success(__('The beneficio has been saved.',['key' => 'changepass']));

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The beneficio could not be saved. Please, try again.',['key' => 'changepass']));
        }
     
		 $categorias = $this->Beneficios->Categorias->find('list',['keyField' => 'id','valueField'=>'nombre']);
        $this->set(compact('beneficio', 'categorias'));
        $this->set('_serialize', ['beneficio']);
		$this->set('titulo','Nuevo Beneficio');
    }
    /**
     * Edit method
     *
     * @param string|null $id Beneficio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editAdmin($id = null)
    {
		/*$this->viewBuilder()->setLayout('admin');
        $beneficio = $this->Beneficios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beneficio = $this->Beneficios->patchEntity($beneficio, $this->request->getData());
            if ($this->Beneficios->save($beneficio)) {
                $this->Flash->success(__('The beneficio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficio could not be saved. Please, try again.'));
        }
        $categorias = $this->Beneficios->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('beneficio', 'categorias'));
        $this->set('_serialize', ['beneficio']);
		*/
		
		$this->viewBuilder()->setLayout('admin');
         $beneficio = $this->Beneficios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beneficio = $this->Beneficios->patchEntity($beneficio, $this->request->getData());
			$fechadesde = Time::createFromFormat('d/m/Y',$this->request->getData('fecha_desde'),'America/Argentina/Buenos_Aires');
			$fechadesde->i18nFormat('yyyy-MM-dd');
			$fechahasta = Time::createFromFormat('d/m/Y',$this->request->getData('fecha_hasta'),'America/Argentina/Buenos_Aires');
			$fechahasta->i18nFormat('yyyy-MM-dd');
			
			$beneficio['fecha_desde'] = $fechadesde;
			$beneficio['fecha_hasta'] = $fechahasta;
			$uploadData = '';
			if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'img/beneficios/';
                $uploadFile = $uploadPath.$fileName;
				$beneficio['imagen']= $fileName;
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
            }
            if ($this->Beneficios->save($beneficio)) {
                $this->Flash->success(__('The beneficio has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index_admin']);
            }
            $this->Flash->error(__('The beneficio could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $categorias = $this->Beneficios->Categorias->find('list',['keyField' => 'id','valueField'=>'nombre']);
        $this->set(compact('beneficio', 'categorias'));
        $this->set('_serialize', ['beneficio']);
		$this->set('titulo','Nuevo Beneficio');
    }

    /**
     * Delete method
     *
     * @param string|null $id Beneficio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteAdmin($id = null)
    {
		$this->viewBuilder()->setLayout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $beneficio = $this->Beneficios->get($id);
        if ($this->Beneficios->delete($beneficio)) {
            $this->Flash->success(__('The beneficio has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The beneficio could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index_admin']);
    }
}
