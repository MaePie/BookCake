<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class RTablesTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('RTables');
        $this->setDisplayField('nomRTable');
        $this->setPrimaryKey('idRTable');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdRTable' => 'new',
                    'modifiedRTable' => 'always'
                ]
            ]
        ]);

        $this->belongsTo('RZones')
            ->setForeignKey('idRZone');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idRTable')
            ->notEmpty('idRTable', 'create');

        $validator
            ->integer('idRZone')
            ->notEmpty('idRZone');

        $validator
            ->scalar('nomRTable')
            ->maxLength('nomRTable', 255)
            ->notEmpty('nomRTable');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {        
        $rules->add($rules->isUnique(['nomRTable']));

        return $rules;
    }
}
