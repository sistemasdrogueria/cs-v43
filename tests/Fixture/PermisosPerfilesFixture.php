<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermisosPerfilesFixture
 *
 */
class PermisosPerfilesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'perfiles_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'permisos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_IDrolesperfiles_rol' => ['type' => 'index', 'columns' => ['permisos_id'], 'length' => []],
            'FK_IDrolesperfiles_per' => ['type' => 'index', 'columns' => ['perfiles_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_IDpermisosperfiles_perf' => ['type' => 'foreign', 'columns' => ['perfiles_id'], 'references' => ['perfiles', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_IDpermisosperfiles_perm' => ['type' => 'foreign', 'columns' => ['permisos_id'], 'references' => ['permisos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
            'perfiles_id' => 1,
            'permisos_id' => 1
        ],
    ];
}
