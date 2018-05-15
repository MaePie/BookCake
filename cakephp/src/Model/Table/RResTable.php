<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class RResTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('RRes');
        $this->setPrimaryKey('idRRes');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'createdRRes' => 'new',
                    'modifiedRRes' => 'always'
                ]
            ]
        ]);

        $this->belongsTo('Users')
            ->setForeignKey('idUser');
        $this->belongsTo('Prospects')
            ->setForeignKey('idProspect');
        $this->belongsTo('RZones')
            ->setForeignKey('idRZone');
        $this->belongsTo('RTables')
            ->setForeignKey('idRTable');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idRRes')
            ->notEmpty('idRRes', 'create');

        $validator
            ->integer('idUser')
            ->allowEmpty('idUser');

        $validator
            ->integer('idProspect')
            ->allowEmpty('idProspect');

        $validator
            ->integer('idRZone')
            ->allowEmpty('idRZone');

        $validator
            ->integer('idRTable')
            ->allowEmpty('idRTable');

        $validator
            ->date('dateRRes')
            ->notEmpty('dateRRes');

        $validator
            ->time('heureRRes')
            ->notEmpty('heureRRes');

        $validator
            ->integer('nbPersRRes')
            ->allowEmpty('nbPersRRes');

        $validator
            ->integer('statutRRes')
            ->allowEmpty('statutRRes');

        $validator
            ->date('createdRRes')
            ->allowEmpty('createdRRes');

        $validator
            ->date('modifiedRRes')
            ->allowEmpty('modifiedRRes');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {        
        // $rules->add($rules->isUnique(['']));

        return $rules;
    }
}
