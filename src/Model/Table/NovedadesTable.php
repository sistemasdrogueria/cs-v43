<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Novedades Model
 *
 * @method \App\Model\Entity\Novedade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Novedade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Novedade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Novedade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Novedade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Novedade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Novedade findOrCreate($search, callable $callback = null, $options = [])
 */
class NovedadesTable extends Table
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

        $this->setTable('novedades');
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
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->requirePresence('descripcion_completa', 'create')
            ->notEmpty('descripcion_completa');

        return $validator;
    }
}
