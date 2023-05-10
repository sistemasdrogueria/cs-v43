<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Historiale Entity
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $cantidad
 * @property \Cake\I18n\FrozenTime $fecha_vencimiento
 * @property int $cantidad_canjeado
 * @property int $eliminado
 * @property \Cake\I18n\FrozenTime $creado
 * @property \Cake\I18n\FrozenTime $modificado
 *
 * @property \App\Model\Entity\Cliente $cliente
 */
class Historiale extends Entity
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
