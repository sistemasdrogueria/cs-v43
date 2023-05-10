<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NovedadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NovedadesTable Test Case
 */
class NovedadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NovedadesTable
     */
    public $Novedades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.novedades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::exists('Novedades') ? [] : ['className' => NovedadesTable::class];
        $this->Novedades = TableRegistry::get('Novedades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Novedades);

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
