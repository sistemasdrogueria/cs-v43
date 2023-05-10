<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equivalencias Model
 *
 * @method \App\Model\Entity\Equivalencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equivalencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equivalencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equivalencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equivalencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equivalencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equivalencia findOrCreate($search, callable $callback = null, $options = [])
 */
class EquivalenciasTable extends Table
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

        $this->setTable('equivalencias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('identificacion');

        $validator
            ->allowEmpty('volumen');

        $validator
            ->integer('conversion')
            ->allowEmpty('conversion');

        $validator
            ->dateTime('creado')
            ->allowEmpty('creado');

        return $validator;
    }
}
