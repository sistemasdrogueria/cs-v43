<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Beneficio Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $categoria_id
 * @property int $cantidad_maxima
 * @property int $puntos
 * @property string $imagen
 * @property string $imagen2
 * @property string $imagen3
 * @property \Cake\I18n\FrozenTime $fecha_desde
 * @property \Cake\I18n\FrozenTime $fecha_hasta
 * @property \Cake\I18n\FrozenTime $creado
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Canje[] $canjes
 */
class Beneficio extends Entity
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
        '*' => true
        
    ];
}
