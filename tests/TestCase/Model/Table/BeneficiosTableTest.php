<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BeneficiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BeneficiosTable Test Case
 */
class BeneficiosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BeneficiosTable
     */
    public $Beneficios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.beneficios',
        'app.categorias',
        'app.canjes',
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
        $config = TableRegistry::exists('Beneficios') ? [] : ['className' => BeneficiosTable::class];
        $this->Beneficios = TableRegistry::get('Beneficios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Beneficios);

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
