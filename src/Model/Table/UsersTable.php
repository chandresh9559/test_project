<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasOne('Profile');
        $this->hasMany('Posts', [
            'foreignKey' => 'users_id',
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name','First Name is Required')
            ->add('name',['name'=>[
               
                'rule'=>['custom','/^[A-Za-z_]*$/i'],
                'message'=>'first name can not contain alphanumeric characters',
            ]
            ]);
            
        $validator
            ->email('email',true,'Please enter a valid email')
            ->maxLength('email', 50)
            ->requirePresence('email', 'create')
            ->notEmptyString('email','Email is Required')
            ->add('email','unique',[
                'rule'=>'validateUnique',
                'provider'=>'table',
                'message'=>'This Email is Already Exists',
            ],
            
        );

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmptyString('password','Password is Required')
            ->minLength('password',8,'minimum eight characters, at least one letter and one number')
            ->add('password',[
                'upperCase'=>[
                'rule' => ['custom', '/(?=.*?[A-Z])/'],
                'message' => 'add one upper case'],

                'lowerCase'=>[
                    'rule' => ['custom','/(?=.*?[a-z])/'],
                    'message'=>'add one lower case',
                ],

                'number'=>[
                    'rule'=>['custom','/(?=.*?[0-9])/'],
                    'message' => 'add one number',
                ],

                'specialChar'=>[
                    'rule'=>['custom','/(?=.*?[#?!@$%^&*-])/'],
                    'message'=>'add one special character'
                ],
                
            ]);
        $validator
            ->scalar('Confirm_password')
            ->requirePresence('Confirm_password', 'create')
            ->notEmptyString('Confirm_password','Confirm Password is Required')
            ->minLength('Confirm_password',8,'minimum eight characters, at least one letter and one number')
            ->add('Confirm_password',[
                'upperCase'=>[
                'rule' => ['custom', '/(?=.*?[A-Z])/'],
                'message' => 'add one upper case'],

                'lowerCase'=>[
                    'rule' => ['custom','/(?=.*?[a-z])/'],
                    'message'=>'add one lower case',
                ],

                'number'=>[
                    'rule'=>['custom','/(?=.*?[0-9])/'],
                    'message' => 'add one number',
                ],

                'specialChar'=>[
                    'rule'=>['custom','/(?=.*?[#?!@$%^&*-])/'],
                    'message'=>'add one special character'
                ],

                'compare'=>[
                    'rule'=>['compareWith','password'],
                    'message'=>'confirm password does not matched',
                ],
                
            ]);
        
        $validator
            ->scalar('image')
            ->maxLength('image', 100)
            ->requirePresence('image', 'create')
            ->notEmptyString('image' ,'Upload Your Image');

        $validator
            ->scalar('occupation')
            ->maxLength('occupation', 250)
            ->requirePresence('occupation', 'create')
            ->notEmptyString('occupation','Select Your Occupation');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
