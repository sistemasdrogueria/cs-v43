<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Localidads Model
 *
 * @property \App\Model\Table\ProvinciasTable|\Cake\ORM\Association\BelongsTo $Provincias
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\HasMany $Clientes
 * @property \App\Model\Table\SucursalsTable|\Cake\ORM\Association\HasMany $Sucursals
 *
 * @method \App\Model\Entity\Localidad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Localidad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Localidad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Localidad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Localidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Localidad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Localidad findOrCreate($search, callable $callback = null, $options = [])
 */
class LocalidadsTable extends Table
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

        $this->setTable('localidads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Provincias', [
            'foreignKey' => 'provincia_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'localidad_id'
        ]);
        $this->hasMany('Sucursals', [
            'foreignKey' => 'localidad_id'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('codigo', 'create')
            ->notEmpty('codigo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['provincia_id'], 'Provincias'));

        return $rules;
    }
}
