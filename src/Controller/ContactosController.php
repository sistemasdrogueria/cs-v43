<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Mailer;
use Cake\Http\Client;


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
		if (in_array($this->request->action, ['enviarMail', 'sendContacto', 'add'])) {
			return true;
		} else {

			$this->Flash->error(__('No tiene permisos para ingresar'), ['key' => 'changepass']);
			return false;
		}


		return parent::isAuthorized($user);
	}
	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);

		$this->Authentication->addUnauthenticatedActions(['enviarMail']);
	}

	public function initialize(): void
	{
		parent::initialize();
		//  $this->loadComponent('Captcha.Captcha');
	}



	public function enviarMail()
	{
		//dd($this->request->getData());
		if ($this->request->is('post')) {

			$http = new Client();

			$respuesta = $http->post('https://www.google.com/recaptcha/api/siteverify', [
				'secret' => '6LezUNglAAAAAMY4oPA_myCPe8NzblIeg7LWJ2Qh',
				'response' => $this->request->getData('g-recaptcha-response')
			])->getJson();


			if (($respuesta['success'] == true) && ($respuesta['score'] > 0.7)) {
				$contacto = $this->Contactos->newEmptyEntity();


				$contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
				if ($contacto->getErrors()) {
					$this->Flash->error(__('Mensaje fallido, intente nuevamente'), ['key' => 'changepass']);;
				} else {
					$this->Flash->success(__('Mensaje enviado.'), ['key' => 'changepass']);
					$this->request->getSession()->write('contacto', $contacto);
					$this->sendContacto($contacto['detalle'], $contacto['email'], $contacto['nombre'], $contacto['telefono'], 5);
				}

				$this->set(compact('contacto'));
				$this->set('_serialize', ['contacto']);
			} else {
				$this->Flash->error(__('La Verificación de captcha ha fallado, Intentenuevamente.'), ['key' => 'changepass']);
			}

			return $this->redirect(['controller' => 'pages', 'action' => 'display']);
		}
	}
	// Enviar email   
	function sendContacto($cont_cuerpo, $cont_email, $cont_name, $cont_phone, $quien)
	{
		$para = 'mdedios@drogueriasur.com.ar';
		//$email = new Email();
	//	$email->setTransport('gmail');
		// Use a constructed object.
		//$transport = new DebugTransport();
		//$email->transport($transport);
		try {
		/*

					$email
						//->setReplyTo($cont_email)
						->setEmailFormat('html')
						->setTo($para)
						->setFrom(['sistemas@drogueriasur.com.ar' => 'Drogueria Sur S.A.'])
						->setSubject($cont_name)
						->setViewVars(['nombre' => $cont_name, 'correo' => $cont_email, 'telefono' => $cont_phone])
						->viewBuilder()
						->setTemplate('default');
					//->send($cont_cuerpo);

					$email->deliver();
		*/
			$mailer = new Mailer();
			$mailer->setTransport('gmail');
			$mailer
				->setEmailFormat('html')
				->setTo($para)
				->setFrom('sistemas@drogueriasur.com.ar')
				->setSubject($cont_name)
				->viewBuilder()
				->setTemplate('default');
				
					$mailer->setViewVars(['nombre' => $cont_name, 'correo' => $cont_email, 'telefono' => $cont_phone]);
			$mailer->deliver();

			/*
							$res = $email->setFrom([$cont_email => 'comunidadsur.com.ar'])
								->setReplyTo([$cont_email => $cont_name])
								->setEmailFormat('html')
								->setTo([$para => $para])
								->setSubject('Consulta realizada de comunidadsur.com.ar')
								->setViewVars(['nombre' => $cont_name, 'correo' => $cont_email, 'telefono' => $cont_phone])
								->send($cont_cuerpo)
								->viewBuilder()
								->setTemplate('default');*/
		} catch (Exception $e) {

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
		$contacto = $this->Contactos->newEmptyEntity();
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
