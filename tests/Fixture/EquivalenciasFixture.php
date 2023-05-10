<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EquivalenciasFixture
 *
 */
class EquivalenciasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'identificacion' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => 'I5', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'volumen' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => 'V5', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'conversion' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => '300', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'creado' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'identificacion' => 'Lor',
            'volumen' => 'Lor',
            'conversion' => 1,
            'creado' => '2017-08-14 14:36:56'
        ],
    ];
}
