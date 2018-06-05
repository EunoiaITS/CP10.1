<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdMitReport Model
 *
 * @property \App\Model\Table\ProdMitsTable|\Cake\ORM\Association\BelongsTo $ProdMits
 *
 * @method \App\Model\Entity\ProdMitReport get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdMitReport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdMitReport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdMitReport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdMitReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdMitReport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdMitReport findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProdMitReportTable extends Table
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

        $this->table('prod_mit_report');
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
            ->integer('prod_mit_id')
            ->allowEmpty('prod_mit_id');

        $validator
            ->scalar('date')
            ->maxLength('date', 255)
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('ack_status')
            ->maxLength('ack_status', 255)
            ->allowEmpty('ack_status');

        $validator
            ->scalar('del_status')
            ->maxLength('del_status', 255)
            ->allowEmpty('del_status');

        $validator
            ->scalar('received_by')
            ->maxLength('received_by', 255)
            ->allowEmpty('received_by');

        return $validator;
    }

}
