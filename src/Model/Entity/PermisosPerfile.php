<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermisosPerfile Entity
 *
 * @property int $id
 * @property int $perfiles_id
 * @property int $permisos_id
 *
 * @property \App\Model\Entity\Perfile $perfile
 * @property \App\Model\Entity\Permiso $permiso
 */
class PermisosPerfile extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
