<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class RCarteSCategoriesTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('RCarteSCategories');
        $this->setPrimaryKey('idRCarteSCategorie');
        $this->setDisplayField('nomRCarteSCategorie');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdRCarteSCategorie' => 'new',
                    'modifiedRCarteSCategorie' => 'always'
                ]
            ]
        ]);

        $this->belongsTo('RCarteCategories')
            ->setForeignKey('idRCarteCategorie');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idRCarteSCategorie')
            ->notEmpty('idRCarteSCategorie', 'create');

        $validator
            ->integer('idRCarteCategorie')
            ->notEmpty('idRCarteCategorie');

        $validator
            ->scalar('nomRCarteSCategorie')
            ->maxLength('nomRCarteSCategorie', 255)
            ->notEmpty('nomRCarteSCategorie');

        $validator
            ->integer('ordreRCarteSCategorie')
            ->allowEmpty('ordreRCarteSCategorie');

        $validator
            ->date('createdRCarteSCategorie')
            ->allowEmpty('createdRCarteSCategorie');

        $validator
            ->date('modifiedRCarteSCategorie')
            ->allowEmpty('modifiedRCarteSCategorie');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {        
        // $rules->add($rules->isUnique(['']));

        return $rules;
    }
}
