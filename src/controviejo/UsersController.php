<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{


	public function isAuthorized()
    {
           if (in_array($this->request->getParam('action'), ['index_admin','view','change_password','edit_admin','add_admin','delete_admin','index_search_admin'])) {
       
          
						$tiene= $this->tienepermiso('users',$this->request->getParam('action'), $this->request->getSession()->read('Auth.User.role'));
						if (!$tiene)
							$this->Flash->error(__('No tiene permisos para ingresar'),['key' => 'changepass']);
						return $tiene;			
					}
					else
					{
						if (in_array($this->request->getParam('action'),['logincs'])){
							return true;
						}
					}
		return parent::isAuthorized($user);
    }

  public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['login', 'index','logout']);
    }


	public function logincs($id=null,$pass=null)
	{
		
			//Session::destroy();
			$this->request->getSession()->destroy();
			
			$user2 = $this->Users->find('all')->where(['id'=>$id])->first();
		
			$this->request->getData()['username']=$user2['username'];
			$this->request->getData()['password']=$pass;
			
			$user = $this->Auth->identify();
			if ($pass===$user2['password']) {
				$this->Auth->setUser($user2);
				$this->loadModel('LogsAccesos');
				$logsAcceso = $this->LogsAccesos->newEntity();
				
				$logsAcceso['fecha'] = date('Y-m-d H:i:s');
				//debug(date('Y-m-d H:i:s'));
				$logsAcceso['users_id'] = $this->request->getSession()->read('Auth.User.id');
				$logsAcceso['ip'] = $this->request->clientIp(); 
				if ($this->LogsAccesos->save($logsAcceso))
				{
				}
				$this->loadModel('Clientes');
				//
				$cliente= $this->Clientes->find('all')->where(['id' => $user2['cliente_id']])->first([]);
				$this->request->getSession()->write('Auth.User.razon',$cliente['razon_social']);
				$this->request->getSession()->write('Auth.User.codigo',$cliente['codigo']);
				$this->request->getSession()->write('Auth.User.habilitado',$cliente['habilitado']);
				$this->request->getSession()->write('Auth.User.coef',$cliente['coeficiente']);
				$this->request->getSession()->write('Auth.User.condicion',$cliente['condicion_descuento']);
				$this->request->getSession()->write('Auth.User.actualizo_correo',$cliente['actualizo_correo']);
				
				$this->loadModel('Puntos');
				$punto=$this->Puntos->find()->where(['cliente_id'=>$user2['cliente_id']])->first([]);
				if ($punto != null)
					$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
				else
					$this->request->getSession()->write('Auth.User.puntos',0);
				$this->Flash->warning('Bienvenido a Comunidad Sur.',['key' => 'changepass']);
				$this->request->getSession()->write('notificacion',$user['notificacion']);
				if ($user['role'] === 'admin') {
					
					return $this->redirect(['controller' => 'canjes','action' => 'index_admin']);
				} 
				else if ($user['role'] === 'client'){
					
					return $this->redirect(['controller' => 'beneficios','action' => 'index']);
				}
								
			}
			
			
			
			
			else
			{
				$ip = $this->request->clientIp();
				$this->request->getSession()->write('local','SI '.$ip );
				if (strpos($ip, '200.117.237.178') === 0 || strpos($ip, '200.0.233.233') === 0 ||  strpos($ip, '168.85.96.')===0 ) {
				
				
				$this->request->getData()['username']= 's'.$this->request->getData()['username'];
				
				///$user = $this->Auth->identify();
				$this->request->getSession()->write('id',$id);
				
				$this->request->getSession()->write('pass',$pass);
				$this->request->getSession()->write('pass2',$user2['password']);
				if ($pass===$user2['password']){
				$this->Auth->setUser($user2);
				$this->loadModel('LogsAccesos');
				$logsAcceso = $this->LogsAccesos->newEntity();
				
				$logsAcceso['fecha'] = date('Y-m-d H:i:s');
				//debug(date('Y-m-d H:i:s'));
				$logsAcceso['usuario_id'] = $this->request->getSession()->read('Auth.User.id');
				$logsAcceso['ip'] = $this->request->clientIp(); 
				if ($this->LogsAccesos->save($logsAcceso))
				{
				}
				$this->loadModel('Clientes');
				//$cliente= $this->Clientes->get($this->request->getSession()->read('Auth.User.cliente_id'));
				//$cliente= $this->Clientes->find('all')->where('id'=>$user['cliente_id'])->first();
				$cliente= $this->Clientes->find('all')->where(['id' => $user2['cliente_id']])->first([]);
				$this->request->getSession()->write('Auth.User.razon',$cliente['razon_social']);
				$this->request->getSession()->write('Auth.User.codigo',$cliente['codigo']);
				$this->request->getSession()->write('Auth.User.habilitado',$cliente['habilitado']);
				$this->request->getSession()->write('Auth.User.coef',$cliente['coeficiente']);
				$this->request->getSession()->write('Auth.User.condicion',$cliente['condicion_descuento']);
				$this->request->getSession()->write('Auth.User.actualizo_correo',$cliente['actualizo_correo']);
				
				$this->loadModel('Puntos');
				$punto=$this->Puntos->find()->where(['cliente_id'=>$user2['cliente_id']])->first([]);
				$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
				$this->Flash->warning('Bienvenido a Comunidad Sur.',['key' => 'changepass']);
				$this->request->getSession()->write('notificacion',$user['notificacion']);
				if ($user['role'] === 'admin') {
					
					return $this->redirect(['controller' => 'canjes','action' => 'index_admin']);
				} 
				else if ($user['role'] === 'client'){
					
					return $this->redirect(['controller' => 'beneficios','action' => 'index']);
				}
				
				}
				else
				{
					$this->Flash->error(__('Usuario o Password incorrecto, pruebe nuevamente',['key' => 'changepass']));
					 return $this->redirect($this->referer());
				}
				}
				else
				{
					$this->Flash->error(__('Usuario o Password incorrecto, pruebe nuevamente',['key' => 'changepass']));
					 return $this->redirect($this->referer());
				}
			
			}	
			
			
		
	}
	public function login()
	{
		if ($this->request->is('post')) {
			//Session::destroy();
			//$this->request->getSession()->destroy();
			
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$this->loadModel('LogsAccesos');
				$logsAcceso = $this->LogsAccesos->newEntity();
				
				$logsAcceso['fecha'] = date('Y-m-d H:i:s');
				//debug(date('Y-m-d H:i:s'));
				$logsAcceso['users_id'] = $this->request->getSession()->read('Auth.User.id');
				$logsAcceso['ip'] = $this->request->clientIp(); 
				if ($this->LogsAccesos->save($logsAcceso))
				{
				}
				$this->loadModel('Clientes');
				$cliente= $this->Clientes->get($this->request->getSession()->read('Auth.User.cliente_id'));
				$this->request->getSession()->write('Auth.User.razon',$cliente['razon_social']);
				$this->request->getSession()->write('Auth.User.codigo',$cliente['codigo']);
				$this->request->getSession()->write('Auth.User.habilitado',$cliente['habilitado']);
				$this->request->getSession()->write('Auth.User.coef',$cliente['coeficiente']);
				$this->request->getSession()->write('Auth.User.condicion',$cliente['condicion_descuento']);
				$this->request->getSession()->write('Auth.User.actualizo_correo',$cliente['actualizo_correo']);
				
				$this->loadModel('Puntos');
				$punto=$this->Puntos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id')])->first([]);
				if ($punto != null)
					$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
				else
					$this->request->getSession()->write('Auth.User.puntos',0);
				$this->Flash->warning('Bienvenido a Comunidad Sur.',['key' => 'changepass']);
				$this->request->getSession()->write('notificacion',$user['notificacion']);
				if ($user['role'] === 'admin') {
					
					return $this->redirect(['controller' => 'canjes','action' => 'index_admin']);
				} 
				else if ($user['role'] === 'client'){
					
					return $this->redirect(['controller' => 'beneficios','action' => 'index']);
				}
								
			}
			
			
			
			
			else
			{
				$ip = $this->request->clientIp();
				$this->request->getSession()->write('local','SI '.$ip );
				if (strpos($ip, '200.117.237.178') === 0 || strpos($ip, '200.0.233.233') === 0 ||  strpos($ip, '168.85.96.')===0 ) {
				
				
				$this->request->getData()['username']= 's'.$this->request->getData()['username'];
				
				$user = $this->Auth->identify();
				if ($user) {
				$this->Auth->setUser($user);
				$this->loadModel('LogsAccesos');
				$logsAcceso = $this->LogsAccesos->newEntity();
				
				$logsAcceso['fecha'] = date('Y-m-d H:i:s');
				//debug(date('Y-m-d H:i:s'));
				$logsAcceso['usuario_id'] = $this->request->getSession()->read('Auth.User.id');
				$logsAcceso['ip'] = $this->request->clientIp(); 
				if ($this->LogsAccesos->save($logsAcceso))
				{
				}
				$this->loadModel('Clientes');
				$cliente= $this->Clientes->get($this->request->getSession()->read('Auth.User.cliente_id'));
				$this->request->getSession()->write('Auth.User.razon',$cliente['razon_social']);
				$this->request->getSession()->write('Auth.User.codigo',$cliente['codigo']);
				$this->request->getSession()->write('Auth.User.habilitado',$cliente['habilitado']);
				$this->request->getSession()->write('Auth.User.coef',$cliente['coeficiente']);
				$this->request->getSession()->write('Auth.User.condicion',$cliente['condicion_descuento']);
				$this->request->getSession()->write('Auth.User.actualizo_correo',$cliente['actualizo_correo']);
				
				$this->loadModel('Puntos');
				$punto=$this->Puntos->find()->where(['cliente_id'=>$this->request->getSession()->read('Auth.User.cliente_id')])->first([]);
				if ($punto!=null)
					$this->request->getSession()->write('Auth.User.puntos',$punto->cantidad_disponible);
				else
					$this->request->getSession()->write('Auth.User.puntos',0);
				$this->Flash->warning('Bienvenido a Comunidad Sur.',['key' => 'changepass']);
				$this->request->getSession()->write('notificacion',$user['notificacion']);
				if ($user['role'] === 'admin') {
					
					return $this->redirect(['controller' => 'canjes','action' => 'index_admin']);
				} 
				else if ($user['role'] === 'client'){
					
					return $this->redirect(['controller' => 'beneficios','action' => 'index']);
				}
				}
				else
				{
					$this->Flash->error(__('Usuario o Password incorrecto, pruebe nuevamente',['key' => 'changepass']));
					 return $this->redirect($this->referer());
				}
				}
				else
				{
					$this->Flash->error(__('Usuario o Password incorrecto, pruebe nuevamente',['key' => 'changepass']));
					 return $this->redirect($this->referer());
				}
			
			}	
			
			
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Perfiles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
	
  public function index_admin()
    {
		$this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
		$this->set('titulo','Lista de Usuarios');
    }

	public function edit_admin($id = null)
    {
		$this->viewBuilder()->setLayout('admin');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			//$this->getData()['User']['password'],$this->getData()['User']['confirm_password'])
			
			$user = $this->Users->patchEntity($user, $this->request->getData());
            
			if ($this->Users->save($user)) {
                $this->Flash->success('El usuario se guardo.',['key' => 'changepass']);
                return $this->redirect(['action' => 'index_admin']);
            } else {
                $this->Flash->error('El usuario no se guardo. Por favor pruebe nuevamente.',['key' => 'changepass']);
            }
        }
		$this->loadModel('Clientes');
		$Clientes = $this->Clientes->find('all')->Select(['id','codigo','nombre']);
		foreach ($Clientes as $opcion) {
	
			$clientes[$opcion['id']] = $opcion['codigo'].' - '.$opcion['nombre'];    
		}	
		$this->loadModel('Perfiles');
		$this->set('perfiles',$this->Perfiles->find('list',['keyField' => 'id','valueField'=>'nombre']));
        $this->set(compact('user','clientes'));
        $this->set('_serialize', ['user']);
		$this->set('titulo','Editar Usuario');
    }

	public function index_search_admin()
    {
		$this->viewBuilder()->setLayout('admin');
		
		
			if ($this->request->is('post')) {
			$this->paginate = [
				'contain' => ['Clientes']
			];
			$termsearch ="";
			if ($this->request->getData()['termino']!= null)
			{
				$terminocompleto = explode(" ", $this->request->getData()['termino']);
				
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
				$result = $this->Users->find('all')->where(['username ='=>$termsearch]);	
				
			else
			{
				$result = $this->Users->find('all')
				->hydrate(false)
					->join([
						'table' => 'clientes',
						'alias' => 'c',
						'type' => 'LEFT',
						 'conditions' => [
						'c.id = Users.cliente_id'
						]		
					]
					)
					->where(['c.razon_social LIKE'=>$termsearch]);
					
			}
				
			$this->set('users', $this->paginate($result));
			$this->set('_serialize', ['users']);
		}
		
		
		$this->set('titulo','Lista de Usuarios - Busqueda');
    }
	
	 public function add_admin()
    {
		$this->viewBuilder()->setLayout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario creo con exito.',['key' => 'changepass']);
                return $this->redirect(['action' => 'index_admin']);
            } else {
                $this->Flash->error('El usuario no se guardo. Por favor pruebe nuevamente.',['key' => 'changepass']);
            }
        }
		
		$this->loadModel('Clientes');
		
			$Clientes = $this->Clientes->find('all')->Select(['id','codigo','nombre'])
		->order(['id' => 'DESC']);
		foreach ($Clientes as $opcion) {
	
			$clientes[$opcion['id']] = $opcion['codigo'].' - '.$opcion['nombre'];    
		}		
		$this->loadModel('Perfiles');
		$this->set('perfiles',$this->Perfiles->find('list',['keyField' => 'id','valueField'=>'nombre']));
		
        $this->set(compact('user','clientes'));
        $this->set('_serialize', ['user']);
		$this->set('titulo','Nuevo Usuario');
    }
	
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Clientes', 'Perfiles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'),['key' => 'changepass']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $clientes = $this->Users->Clientes->find('list', ['limit' => 200]);
        $perfiles = $this->Users->Perfiles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'clientes', 'perfiles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'),['key' => 'changepass']);
        }
        $clientes = $this->Users->Clientes->find('list', ['limit' => 200]);
        $perfiles = $this->Users->Perfiles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'clientes', 'perfiles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete_admin($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'),['key' => 'changepass']);
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'),['key' => 'changepass']);
        }

        return $this->redirect(['action' => 'index_admin']);
    }
	
	public function change_password()
    {
		$this->viewBuilder()->setLayout('store');
		$this->loadModel('Clientes');
		$cliente = $this->Clientes->get($this->request->getSession()->read('Auth.User.cliente_id'), [
            'contain' => ['Provincias','Localidads']
        ]);
        /*$user = $this->Users->get($this->request->getSession()->read('Auth.User.id'), [
            'contain' => ['clientes']
        ]);*/
		$this->set(compact('cliente'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            //Se verifican 2 cosas: 
            //  1º Si la clave actual proporcionada coincide con la del usuario registrado 	
            //  2º Si la clave nueva coincide con la confirmación				
            if (empty($this->request->getData['current_password']) &&
                empty($this->request->getData()['password']) && 	
                empty($this->request->getData()['confirm_new_password'])) 
            {
                 $this->Flash->error('Ingrese los campos correctamente',['key' => 'changepass']);  //,['key' => 'changepass']
            }
            else
            {
            //paso 1    
				//$user = $this->Users->patchEntity($user, $this->request->getData());
				$user = $this->Auth->identify();
				if ($user) 
                {
                    // paso 2
                    if  ($this->request->getData()['current_password'] == $this->request->getData()['confirm_new_password']) 
                    {
						    $user2 = $this->Users->get($this->request->getSession()->read('Auth.User.id'));
						    $user2 = $this->Users->patchEntity($user2, $this->request->getData());
							$user2['password']=$this->request->getData()['current_password'];
 						    if ($this->Users->save($user2)) {
								$this->Flash->success('El usuario se guardo.',['key' => 'changepass']);
								return $this->redirect(['controller' => 'beneficios','action' => 'index']);
							} else {
								$this->Flash->error('El usuario no se guardo. Por favor pruebe nuevamente.',['key' => 'changepass']);//,['key' => 'changepass']
							}
                    }
                    
                     else
                     {
                          $this->Flash->error('Las contraseñas no son iguales, vuelva a escribirlas',['key' => 'changepass']);
                          //$this->Session->setFlash(__('<div class="success canhide">El usuario fue guardado correctamente.</div>', true));
                     }
                }
                else
                {
                    $this->Flash->error('La contraseña actual no es correcta, vuelva a intentar',['key' => 'changepass']);    
                }
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
		//$this->set('titulo','Editar Usuario');
    }
}
