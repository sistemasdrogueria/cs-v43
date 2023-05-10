<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Novedade Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $descripcion_completa
 * @property string $tipo
 * @property string $img_file
 * @property \Cake\I18n\FrozenDate $fecha
 * @property bool $interno
 * @property bool $activo
 * @property \Cake\I18n\FrozenTime $creado
 * @property int $importante
 */
class Novedade extends Entity
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
