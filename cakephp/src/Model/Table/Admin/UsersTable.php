<?php
namespace App\Model\Table\Admin;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('Users');
        $this->setDisplayField('emailUser');
        $this->setPrimaryKey('idUser');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdUser' => 'new',
                    'modifiedUser' => 'always'
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
            ->integer('idUser')
            ->notEmpty('idUser', 'create');

        $validator
            ->scalar('nomUser')
            ->maxLength('nomUser', 255)
            ->notEmpty('nomUser');

        $validator
            ->scalar('prenomUser')
            ->maxLength('prenomUser', 255)
            ->notEmpty('prenomUser');

        $validator
            ->scalar('emailUser')
            ->maxLength('emailUser', 255)
            ->notEmpty('emailUser')
            ->add('emailUser', 'valid', [
                'rule' => 'email',
                'message' => 'Email invalide'
            ]);

        $validator
            ->scalar('passwordUser')
            ->maxLength('passwordUser', 255)
            ->notEmpty('passwordUser');

        $validator
            ->scalar('telephoneUser')
            ->maxLength('passwordUser', 255)
            ->allowEmpty('telephoneUser');

        $validator
            ->scalar('adresse1User')
            ->maxLength('photoUser', 255)
            ->allowEmpty('adresse1User');

        $validator
            ->scalar('adresse2User')
            ->maxLength('photoUser', 255)
            ->allowEmpty('adresse2User');

        $validator
            ->scalar('cpUser')
            ->maxLength('photoUser', 255)
            ->allowEmpty('cpUser');

        $validator
            ->scalar('villeUser')
            ->maxLength('photoUser', 255)
            ->allowEmpty('villeUser');

        $validator
            ->scalar('paysUser')
            ->maxLength('photoUser', 255)
            ->allowEmpty('paysUser');

        $validator
            ->date('dateNaissUser')
            ->allowEmpty('dateNaissUser');

        $validator
            ->scalar('photoUser')
            ->maxLength('photoUser', 255)
            ->allowEmpty('photoUser');
        
        $validator
            ->date('createdUser')
            ->allowEmpty('createdUser');

        $validator
            ->date('modifiedUser')
            ->allowEmpty('modifiedUser');

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
        
        $rules->add($rules->isUnique(['emailUser']));

        return $rules;
    }
}
