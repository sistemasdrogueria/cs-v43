<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermisosPerfiles Model
 *
 * @property \App\Model\Table\PerfilesTable|\Cake\ORM\Association\BelongsTo $Perfiles
 * @property \App\Model\Table\PermisosTable|\Cake\ORM\Association\BelongsTo $Permisos
 *
 * @method \App\Model\Entity\PermisosPerfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermisosPerfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermisosPerfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermisosPerfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermisosPerfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermisosPerfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermisosPerfile findOrCreate($search, callable $callback = null, $options = [])
 */
class PermisosPerfilesTable extends Table
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

        $this->setTable('permisos_perfiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Perfiles', [
            'foreignKey' => 'perfiles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Permisos', [
            'foreignKey' => 'permisos_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['perfiles_id'], 'Perfiles'));
        $rules->add($rules->existsIn(['permisos_id'], 'Permisos'));

        return $rules;
    }
}
