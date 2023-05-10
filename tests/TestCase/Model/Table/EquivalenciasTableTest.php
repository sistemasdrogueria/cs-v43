<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquivalenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquivalenciasTable Test Case
 */
class EquivalenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquivalenciasTable
     */
    public $Equivalencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.equivalencias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('Equivalencias') ? [] : ['className' => EquivalenciasTable::class];
        $this->Equivalencias = TableRegistry::get('Equivalencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Equivalencias);

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
}
