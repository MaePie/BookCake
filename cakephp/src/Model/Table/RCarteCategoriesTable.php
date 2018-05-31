<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class RCarteCategoriesTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('RCarteCategories');
        $this->setPrimaryKey('idRCarteCategorie');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdRCarteCategorie' => 'new',
                    'modifiedRCarteCategorie' => 'always'
                ]
            ]
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idRCarteCategorie')
            ->notEmpty('idRCarteCategorie', 'create');

        $validator
            ->scalar('nomRCarteCategorie')
            ->maxLength('nomRCarteCategorie', 255)
            ->notEmpty('nomRCarteCategorie');

        $validator
            ->integer('ordreRCarteCategorie')
            ->allowEmpty('ordreRCarteCategorie');

        $validator
            ->integer('sectionRCarteCategorie')
            ->notEmpty('sectionRCarteCategorie');

        $validator
            ->date('createdRCarteCategorie')
            ->allowEmpty('createdRCarteCategorie');

        $validator
            ->date('modifiedRCarteCategorie')
            ->allowEmpty('modifiedRCarteCategorie');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {        
        // $rules->add($rules->isUnique(['']));

        return $rules;
    }
}
