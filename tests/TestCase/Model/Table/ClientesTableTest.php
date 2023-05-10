<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientesTable Test Case
 */
class ClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientesTable
     */
    public $Clientes;

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
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('Clientes') ? [] : ['className' => ClientesTable::class];
        $this->Clientes = TableRegistry::get('Clientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Clientes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
