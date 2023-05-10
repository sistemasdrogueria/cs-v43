<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogsAccesosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogsAccesosTable Test Case
 */
class LogsAccesosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LogsAccesosTable
     */
    public $LogsAccesos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.logs_accesos',
        'app.usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('LogsAccesos') ? [] : ['className' => LogsAccesosTable::class];
        $this->LogsAccesos = TableRegistry::get('LogsAccesos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LogsAccesos);

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
