<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;


class ProspectsTable extends Table
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

        $this->setTable('Prospects');
        $this->setDisplayField('emailProspect');
        $this->setPrimaryKey('idProspect');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdProspect' => 'new',
                    'modifiedProspect' => 'always'
                ]
            ]
        ]);
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
            ->integer('idProspect')
            ->notEmpty('idProspect', 'create');

        $validator
            ->scalar('nomProspect')
            ->maxLength('nomProspect', 255)
            ->notEmpty('nomProspect');

        $validator
            ->scalar('emailProspect')
            ->maxLength('emailProspect', 255)
            ->notEmpty('emailProspect')
            ->add('emailProspect', 'valid', [
                'rule' => 'email',
                'message' => 'Email invalide'
            ]);

        $validator
            ->scalar('telProspect')
            ->maxLength('telProspect', 255)
            ->allowEmpty('telProspect');
        
        $validator
            ->date('createdProspect')
            ->allowEmpty('createdProspect');

        $validator
            ->date('modifiedProspect')
            ->allowEmpty('modifiedProspect');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        // // Ajoute une règle qui est appliquée pour la création et la mise à jour d'opérations
        // $rules->add(function ($entity, $options) {
        //     // Retourne un booléen pour indiquer si succès/échec
        // }, 'ruleName');

        // // Ajoute une règle pour la création.
        // $rules->addCreate(function ($entity, $options) {
        //     // Retourne un booléen pour indiquer si succès/échec
        // }, 'ruleName');

        // // Ajoute une règle pour la mise à jour.
        // $rules->addUpdate(function ($entity, $options) {
        //     // Retourne un booléen pour indiquer si succès/échec
        // }, 'ruleName');

        // // Ajoute une règle pour la suppression.
        // $rules->addDelete(function ($entity, $options) {
        //     // Retourne un booléen pour indiquer si succès/échec
        // }, 'ruleName');
        
        $rules->add($rules->isUnique(['emailProspect']));
        $rules->add($rules->isUnique(['telProspect']));

        return $rules;
    }
}
