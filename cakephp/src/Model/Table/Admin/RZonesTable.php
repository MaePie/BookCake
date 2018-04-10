<?php
namespace App\Model\Table\Admin;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class RZonesTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('RZones');
        $this->setDisplayField('nomRZone');
        $this->setPrimaryKey('idRZone');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdRZone' => 'new',
                    'modifiedRZone' => 'always'
                ]
            ]
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idRZone')
            ->notEmpty('idRZone', 'create');

        $validator
            ->scalar('nomRZone')
            ->maxLength('nomRZone', 255)
            ->notEmpty('nomRZone');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {        
        $rules->add($rules->isUnique(['nomRZone']));

        return $rules;
    }
}
