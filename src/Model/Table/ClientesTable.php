<?php
namespace App\Model\Table;

use App\Model\Entity\Cliente;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @property \App\Model\Table\ProvinciasTable|\Cake\ORM\Association\BelongsTo $Provincias
 * @property \App\Model\Table\LocalidadsTable|\Cake\ORM\Association\BelongsTo $Localidads
 * @property \App\Model\Table\RepresentantesTable|\Cake\ORM\Association\BelongsTo $Representantes
 * @property \App\Model\Table\GruposTable|\Cake\ORM\Association\BelongsTo $Grupos
 * @property \App\Model\Table\CanjesTable|\Cake\ORM\Association\HasMany $Canjes
 * @property \App\Model\Table\HistorialesTable|\Cake\ORM\Association\HasMany $Historiales
 * @property \App\Model\Table\PuntosTable|\Cake\ORM\Association\HasMany $Puntos
 * @property \App\Model\Table\SucursalsTable|\Cake\ORM\Association\HasMany $Sucursals
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Provincias', [
            'foreignKey' => 'provincia_id'
        ]);
        $this->belongsTo('Localidads', [
            'foreignKey' => 'localidad_id'
        ]);
        $this->belongsTo('Representantes', [
            'foreignKey' => 'representante_id'
        ]);
        $this->belongsTo('Grupos', [
            'foreignKey' => 'grupo_id'
        ]);
        $this->hasMany('Canjes', [
            'foreignKey' => 'cliente_id'
        ]);
        $this->hasMany('Historiales', [
            'foreignKey' => 'cliente_id'
        ]);
        $this->hasMany('Puntos', [
            'foreignKey' => 'cliente_id'
        ]);
    
        $this->hasMany('Users', [
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
            ->integer('codigo')
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
		$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['provincia_id'], 'Provincias'));
        $rules->add($rules->existsIn(['localidad_id'], 'Localidads'));
       

        return $rules;
    }
}
