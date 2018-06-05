<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdMrReport Model
 *
 * @property \App\Model\Table\ProdMrsTable|\Cake\ORM\Association\BelongsTo $ProdMrs
 *
 * @method \App\Model\Entity\ProdMrReport get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdMrReport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdMrReport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdMrReport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdMrReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdMrReport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdMrReport findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProdMrReportTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('prod_mr_report');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('prod_mr_id')
            ->allowEmpty('prod_mr_id');

        $validator
            ->maxLength('date', 255)
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->integer('del_qty')
            ->allowEmpty('del_qty');

        $validator
            ->maxLength('ack_status', 255)
            ->allowEmpty('ack_status');

        $validator
            ->maxLength('del_status', 255)
            ->allowEmpty('del_status');

        $validator
            ->maxLength('received_by', 255)
            ->allowEmpty('received_by');

        return $validator;
    }
}
