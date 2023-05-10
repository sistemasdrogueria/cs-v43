<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App;

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Cake\Http\Middleware\EncryptedCookieMiddleware;
use Authentication\Middleware\AuthenticationMiddleware;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use Authentication\Identifier\IdentifierInterface;
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceInterface;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Middleware\AuthorizationMiddleware;
use Authorization\Policy\OrmResolver;
use Cake\I18n\Time;
use Cake\I18n\FrozenDate;


/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {



        parent::bootstrap();
        $this->addPlugin('Authentication');
        $this->addPlugin('AssetMix');
        //$this->addPlugin('cakephp-social-auth-master');
        //complemento de autorizacion
        //$this->addPlugin('Authorization');

        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }

        // Load more plugins here
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */




    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {



        $middlewareQueue->add(new ErrorHandlerMiddleware(Configure::read('Error')))
            // Other middleware that CakePHP provides.
               ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
                 ]))

            ->add(new RoutingMiddleware($this))
            ->add(new BodyParserMiddleware())
           
            ->add(new EncryptedCookieMiddleware(['CookieAuth'],Configure::read('Security.cookieKey')))

            ->add(new AuthenticationMiddleware($this));
        return $middlewareQueue;
    }

    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $path = $request->getPath();
        $service = new AuthenticationService();
        $service->setConfig([
            'unauthenticatedRedirect' => Router::url([
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
            'queryParam' => 'redirect',
        ]);
        $fields = [
            IdentifierInterface::CREDENTIAL_USERNAME => 'username',
            IdentifierInterface::CREDENTIAL_PASSWORD => 'password'
        ];
              $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'userModel' => 'Users',
            'loginUrl' => Router::url([
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
        ]);
        $service->loadAuthenticator('Authentication.Session');
        // Load
            $service->loadAuthenticator('Authentication.Cookie', [
            'fields' => $fields,
             'cookie' => [
                'name' => 'CookieAuth',
                'expires' => (new Time())->addDays(30),
            ],
            
        ]);
    $service->loadIdentifier('Authentication.Password', compact('fields'));
        
        /*
        $service->loadIdentifier('Authentication.Password', [
            compact('fields'), 'resolver' => [
                'className' => 'Authentication.Orm',
                'userModel' => 'Users',
            ],
            'fields' => [
                'username' => ['username'],
                'password' => 'password',
            ]
        ]);*/
  
        // If the user is on the login page, check for a cookie as well.
        // Load identifiers
        return $service;
    }

    /**
     * Bootrapping for CLI application.
     *
     * That is when running commands.
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        try {
            $this->addPlugin('Bake');
        } catch (MissingPluginException $e) {
            // Do not halt if the plugin is missing
        }

        $this->addPlugin('Migrations');

        // Load more plugins here
    }
}
