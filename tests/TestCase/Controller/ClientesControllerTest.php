<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ClientesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ClientesController Test Case
 */
class ClientesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clientes',
        'app.provincias',
        'app.ciudad',
        'app.localidads',
        'app.sucursals',
        'app.representantes',
        'app.grupos',
        'app.canjes',
        'app.beneficios',
        'app.categorias',
        'app.historiales',
        'app.puntos',
        'app.users',
        'app.perfiles',
        'app.permisos',
        'app.permisos_perfiles'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
