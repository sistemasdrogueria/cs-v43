<?php

// In src/Controller/AppController.php
namespace App\Controller;

use Cake\Controller\Controller;
use Authentication\AuthenticationService;
class AppController extends Controller
{

    
public function initialize(): void
{
    parent::initialize();
      // $this->loadComponent('Csrf');
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('Authentication.Authentication');
    
}
}