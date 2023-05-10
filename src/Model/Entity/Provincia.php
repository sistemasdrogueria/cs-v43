<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provincia Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $codigo
 *
 * @property \App\Model\Entity\Ciudad[] $ciudad
 * @property \App\Model\Entity\Cliente[] $clientes
 * @property \App\Model\Entity\Localidad[] $localidads
 * @property \App\Model\Entity\Sucursal[] $sucursals
 */
class Provincia extends Entity
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
