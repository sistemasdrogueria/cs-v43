<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Canjes Model
 *
 * @property \App\Model\Table\BeneficiosTable|\Cake\ORM\Association\BelongsTo $Beneficios
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 *
 * @method \App\Model\Entity\Canje get($primaryKey, $options = [])
 * @method \App\Model\Entity\Canje newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Canje[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Canje|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Canje patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Canje[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Canje findOrCreate($search, callable $callback = null, $options = [])
 */
class CanjesTable extends Table
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

        $this->setTable('canjes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Beneficios', [
            'foreignKey' => 'beneficio_id'
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id'
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
            ->integer('cantidad_puntos')
            ->allowEmpty('cantidad_puntos');

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
        $rules->add($rules->existsIn(['beneficio_id'], 'Beneficios'));
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));

        return $rules;
    }
}
