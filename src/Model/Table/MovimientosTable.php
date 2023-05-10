<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movimientos Model
 *
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 *
 * @method \App\Model\Entity\Movimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class MovimientosTable extends Table
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

        $this->setTable('movimientos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->allowEmpty('concepto');

        $validator
            ->integer('tipo')
            ->allowEmpty('tipo');

        $validator
            ->integer('cantidad')
            ->allowEmpty('cantidad');

        $validator
            ->dateTime('fecha')
            ->allowEmpty('fecha');

        $validator
            ->dateTime('fecha_vencimiento')
            ->allowEmpty('fecha_vencimiento');

        $validator
            ->integer('cantidad_disponible')
            ->allowEmpty('cantidad_disponible');

        $validator
            ->dateTime('creado')
            ->allowEmpty('creado');

        $validator
            ->dateTime('modificado')
            ->allowEmpty('modificado');

        $validator
            ->integer('eliminado')
            ->allowEmpty('eliminado');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));

        return $rules;
    }
}
