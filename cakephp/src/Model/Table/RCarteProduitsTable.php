<?php
namespace App\Model\Table;

// use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class RCarteProduitsTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('RCarteProduits');
        $this->setPrimaryKey('idRCarteProduit');
        $this->setDisplayField('nomRCarteProduit');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdRCarteProduit' => 'new',
                    'modifiedRCarteProduit' => 'always'
                ]
            ]
        ]);

        $this->belongsTo('RCarteCategories')
            ->setForeignKey('idRCarteCategorie');
        $this->belongsTo('RCarteSCategories')
            ->setForeignKey('idRCarteSCategorie');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idRCarteProduit')
            ->notEmpty('idRCarteProduit', 'create');

        $validator
            ->integer('idRCarteCategorie')
            ->notEmpty('idRCarteCategorie');

        $validator
            ->integer('idRCarteSCategorie')
            ->allowEmpty('idRCarteSCategorie');

        $validator
            ->scalar('nomRCarteProduit')
            ->maxLength('nomRCarteProduit', 255)
            ->notEmpty('nomRCarteProduit');

        $validator
            ->scalar('descriptionRCarteProduit')
            ->maxLength('descriptionRCarteProduit', 255)
            ->allowEmpty('descriptionRCarteProduit');

        $validator
            ->integer('prixRCarteProduit')
            ->allowEmpty('prixRCarteProduit');

        $validator
            ->integer('ordreRCarteProduit')
            ->allowEmpty('ordreRCarteProduit');

        $validator
            ->integer('actifRCarteProduit')
            ->notEmpty('actifRCarteProduit');

        $validator
            ->date('createdRCarteProduit')
            ->allowEmpty('createdRCarteProduit');

        $validator
            ->date('modifiedRCarteProduit')
            ->allowEmpty('modifiedRCarteProduit');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {        
        // $rules->add($rules->isUnique(['']));

        return $rules;
    }
}
