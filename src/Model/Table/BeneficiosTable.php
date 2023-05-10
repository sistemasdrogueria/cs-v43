<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Beneficios Model
 *
 * @property \App\Model\Table\CategoriasTable|\Cake\ORM\Association\BelongsTo $Categorias
 * @property \App\Model\Table\CanjesTable|\Cake\ORM\Association\HasMany $Canjes
 *
 * @method \App\Model\Entity\Beneficio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Beneficio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Beneficio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Beneficio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Beneficio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Beneficio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Beneficio findOrCreate($search, callable $callback = null, $options = [])
 */
class BeneficiosTable extends Table
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

        $this->setTable('beneficios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id'
        ]);
        $this->hasMany('Canjes', [
            'foreignKey' => 'beneficio_id'
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
            ->allowEmpty('descripcion');

        $validator
            ->integer('cantidad_maxima')
            ->allowEmpty('cantidad_maxima');

        $validator
            ->integer('puntos')
            ->allowEmpty('puntos');

        $validator
            ->allowEmpty('imagen');

        $validator
            ->allowEmpty('imagen2');

        $validator
            ->allowEmpty('imagen3');

        $validator
            ->dateTime('fecha_desde')
            ->allowEmpty('fecha_desde');

        $validator
            ->dateTime('fecha_hasta')
            ->allowEmpty('fecha_hasta');

        $validator
            ->dateTime('creado')
            ->allowEmpty('creado');

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
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
