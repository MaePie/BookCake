<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Admins Model
 *
 * @method \App\Model\Entity\Admin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin findOrCreate($search, callable $callback = null, $options = [])
 */
class AdministrateursTable extends Table
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

        $this->setTable('Administrateurs');
        $this->setDisplayField('emailAdmin');
        $this->setPrimaryKey('idAdmin');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdAdmin' => 'new',
                    'modifiedAdmin' => 'always'
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
            ->integer('idAdmin')
            ->notEmpty('idAdmin', 'create');

        $validator
            ->scalar('emailAdmin')
            ->maxLength('emailAdmin', 255)
            ->notEmpty('emailAdmin')
            ->add('emailAdmin', 'valid', [
                'rule' => 'email',
                'message' => 'Email invalide'
            ]);

        $validator
            ->scalar('passwordAdmin')
            ->maxLength('passwordAdmin', 255)
            ->notEmpty('passwordAdmin');

        $validator
            ->scalar('nomAdmin')
            ->maxLength('nomAdmin', 255)
            ->notEmpty('nomAdmin');
        
        $validator
            ->date('createdAdmin')
            ->allowEmpty('createdAdmin');

        $validator
            ->date('modifiedAdmin')
            ->allowEmpty('modifiedAdmin');

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
        
        $rules->add($rules->isUnique(['emailAdmin']));

        return $rules;
    }
}
