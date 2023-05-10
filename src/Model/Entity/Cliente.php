<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property int $codigo
 * @property string $razon_social
 * @property string $cuit
 * @property string $nombre
 * @property string $codigo_postal
 * @property string $domicilio
 * @property int $provincia_id
 * @property int $localidad_id
 * @property string $telefono
 * @property bool $tienesucursal
 * @property int $representante_id
 * @property string $email
 * @property string $email_alternativo
 * @property int $clave_pedidos
 * @property int $codigo_pedidos
 * @property bool $ofertaxmail
 * @property bool $respuestaxmail
 * @property string $clacli
 * @property string $gln
 * @property int $grupo_id
 * @property int $habilitado
 * @property int $eliminado
 * @property int $actualizo_correo
 *
 * @property \App\Model\Entity\Provincia $provincia
 * @property \App\Model\Entity\Localidad $localidad
 * @property \App\Model\Entity\Representante $representante
 * @property \App\Model\Entity\Grupo $grupo
 * @property \App\Model\Entity\Canje[] $canjes
 * @property \App\Model\Entity\Historiale[] $historiales
 * @property \App\Model\Entity\Punto[] $puntos
 * @property \App\Model\Entity\Sucursal[] $sucursals
 * @property \App\Model\Entity\User[] $users
 */
class Cliente extends Entity
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
      
    ];
}
