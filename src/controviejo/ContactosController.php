<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;


/**
 * Contactos Controller
 *
 * @property \App\Model\Table\ContactosTable $Contactos
 *
 * @method \App\Model\Entity\Contacto[] paginate($object = null, array $settings = [])
 */
class ContactosController extends AppController
{

	public function isAuthorized()
    {
		 if (in_array($this->request->action, ['enviar_mail','sendContacto','add'])) {
           return true;			
          
			}
			else
			{
				
			$this->Flash->error(__('No tiene permisos para ingresar'),['key' => 'changepass']);
				return false;
				
	
			}	
					
				
		return parent::isAuthorized($user);
		



    }

	public function initialize(){
        parent::initialize();
   
        $this->loadComponent('Captcha.Captcha');
       

    }
	
	

	public function enviar_mail()
    {
				// Sample SMTP configuration.
		/*Email::configTransport('gmail', [
	
			
	 'host' => 'smtp.gmail.com',
    'port' => 587,
	'username' => 'comunidadsurds@gmail.com',
	'password' => 'Autor8075',
    'className' => 'Smtp',
    'tls' => true
		]);*/
		
        $contacto = $this->Contactos->newEntity();
        if ($this->request->is('post')) {
            //$contacto = $this->Contactos->patchEntity($contacto, $this->request->getData);
        
			//$this->Contactos->setCaptcha('securitycode', $this->Captcha->getCode('securitycode'));
			$this->Contactos->setCaptcha('captcha_input_field_name', $this->Captcha->getCode('captcha_input_field_name'));
			$contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
			if ($contacto->getErrors()) {
				$this->Flash->error(__('Validation failed.'),['key' => 'changepass']);;
			}	else	{
				$this->Flash->success(__('Validation success.'),['key' => 'changepass']);

				$this->request->getSession()->write('contacto',$contacto);
			$this->sendContacto($contacto['detalle'],$contacto['email'],$contacto['nombre'],$contacto['telefono'],5);   
			
		
			}
			return $this->redirect(['controller'=>'pages','action' => 'display']);
			
			/*if ($this->Contactos->save($contacto)) {
                                                  
				
				$this->Flash->success('The contacto has been saved.');
                
            } else {
                $this->Flash->error('The contacto could not be saved. Please, try again.');
				//return $this->redirect(['controller' => 'contactos','action' => 'add']);
            }*/
        }
        $this->set(compact('contacto'));
        $this->set('_serialize', ['contacto']);
    }
	
	       // Enviar email   
     function sendContacto($cont_cuerpo,$cont_email,$cont_name,$cont_phone,$quien) {
			   
				$para = 'mdedios@drogueriasur.com.ar'; 
						
				

				$email = new Email();
				$email->setTransport('gmail');

			// Use a constructed object.
				//$transport = new DebugTransport();
				//$email->transport($transport);
				
					try 
					{
						$res = $email->setFrom([$cont_email => 'comunidadsur.com.ar'])
							->setReplyTo([$cont_email => $cont_name])
							->setTemplate('default', 'default')
							->setEmailFormat('html')
							->setTo([$para => $para])
							->setSubject('Consulta realizada de comunidadsur.com.ar')
							->setViewVars(['nombre' => $cont_name,'correo'=>$cont_email,'telefono'=>$cont_phone ])
							->send($cont_cuerpo);

					} 
					catch (Exception $e) {

						echo 'Exception : ',  $e->getMessage(), "\n";
						
					}
            }  

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contacto = $this->Contactos->newEntity();
        if ($this->request->is('post')) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('The contacto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contacto could not be saved. Please, try again.'));
        }
        $this->set(compact('contacto'));
        $this->set('_serialize', ['contacto']);
    }



}
