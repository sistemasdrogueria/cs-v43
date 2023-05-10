<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistorialesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistorialesTable Test Case
 */
class HistorialesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistorialesTable
     */
    public $Historiales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.historiales',
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
        $config = TableRegistry::exists('Historiales') ? [] : ['className' => HistorialesTable::class];
        $this->Historiales = TableRegistry::get('Historiales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Historiales);

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
