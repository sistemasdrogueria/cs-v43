<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permisos Model
 *
 * @property \App\Model\Table\PerfilesTable|\Cake\ORM\Association\BelongsToMany $Perfiles
 *
 * @method \App\Model\Entity\Permiso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permiso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permiso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permiso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permiso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permiso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permiso findOrCreate($search, callable $callback = null, $options = [])
 */
class PermisosTable extends Table
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

        $this->setTable('permisos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Perfiles', [
            'foreignKey' => 'permiso_id',
            'targetForeignKey' => 'perfile_id',
            'joinTable' => 'permisos_perfiles'
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
            ->allowEmpty('clase');

        $validator
            ->allowEmpty('nombre');

        return $validator;
    }
}
