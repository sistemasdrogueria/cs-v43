<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movimiento Entity
 *
 * @property int $id
 * @property int $cliente_id
 * @property string $concepto
 * @property int $tipo
 * @property int $cantidad
 * @property \Cake\I18n\FrozenTime $fecha
 * @property \Cake\I18n\FrozenTime $fecha_vencimiento
 * @property int $cantidad_disponible
 * @property \Cake\I18n\FrozenTime $creado
 * @property \Cake\I18n\FrozenTime $modificado
 * @property int $eliminado
 *
 * @property \App\Model\Entity\Cliente $cliente
 */
class Movimiento extends Entity
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
