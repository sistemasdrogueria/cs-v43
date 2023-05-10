<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CanjesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CanjesTable Test Case
 */
class CanjesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CanjesTable
     */
    public $Canjes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.canjes',
        'app.beneficios',
        'app.categorias',
        'app.clientes',
        'app.provincias',
        'app.ciudad',
        'app.localidads',
        'app.sucursals',
        'app.representantes',
        'app.grupos',
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
        $config = TableRegistry::exists('Canjes') ? [] : ['className' => CanjesTable::class];
        $this->Canjes = TableRegistry::get('Canjes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Canjes);

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
