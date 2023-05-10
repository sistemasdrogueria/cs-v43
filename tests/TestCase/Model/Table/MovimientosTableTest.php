<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovimientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovimientosTable Test Case
 */
class MovimientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovimientosTable
     */
    public $Movimientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movimientos',
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
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('Movimientos') ? [] : ['className' => MovimientosTable::class];
        $this->Movimientos = TableRegistry::get('Movimientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Movimientos);

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
