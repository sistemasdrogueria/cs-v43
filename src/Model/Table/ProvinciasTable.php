<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provincias Model
 *
 * @property \App\Model\Table\CiudadTable|\Cake\ORM\Association\HasMany $Ciudad
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\HasMany $Clientes
 * @property \App\Model\Table\LocalidadsTable|\Cake\ORM\Association\HasMany $Localidads
 * @property \App\Model\Table\SucursalsTable|\Cake\ORM\Association\HasMany $Sucursals
 *
 * @method \App\Model\Entity\Provincia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Provincia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Provincia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Provincia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provincia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Provincia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Provincia findOrCreate($search, callable $callback = null, $options = [])
 */
class ProvinciasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config):void
    {
        parent::initialize($config);

        $this->setTable('provincias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Ciudad', [
            'foreignKey' => 'provincia_id'
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'provincia_id'
        ]);
        $this->hasMany('Localidads', [
            'foreignKey' => 'provincia_id'
        ]);
        $this->hasMany('Sucursals', [
            'foreignKey' => 'provincia_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->requirePresence('codigo', 'create')
            ->notEmpty('codigo');

        return $validator;
    }
}
