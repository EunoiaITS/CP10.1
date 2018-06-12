<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductMasterlist Model
 *
 * @method \App\Model\Entity\ProductMasterlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductMasterlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductMasterlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductMasterlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductMasterlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductMasterlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductMasterlist findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductMasterlistTable extends Table
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

        $this->table('product_masterlist');
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
            ->notEmpty('id', 'create');

        $validator
            ->notEmpty('part_no', 'Part no is required!');

        $validator
            ->notEmpty('bom_id', 'Bom Id is required!');

        $validator
            ->notEmpty('part_name', 'Part name is required!');

        $validator
            ->notEmpty('zon', 'Zon is required!');

        $validator
            ->notEmpty('rack', 'Rack is required!');

        $validator
            ->notEmpty('bn', 'Bn is required!');

        $validator
            ->notEmpty('product_level', 'Product level is required!');

        $validator
            ->notEmpty('uom', 'UOM is required!');

        $validator
            ->integer('min_stock', 'min stock should be numeric!')
            ->notEmpty('min_stock', 'Minimum stock is required!');

        $validator
            ->integer('max_stock', 'max stock should be numeric!')
            ->notEmpty('max_stock', 'Maximum stock is required!');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['part_no']));

        return $rules;
    }

}
