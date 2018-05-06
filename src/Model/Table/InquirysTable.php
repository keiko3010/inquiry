<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class InquirysTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
  }

  public function sql(){
    $sql = $this->getDataSource()->getLog();
  
    $this->log($sql);
    return $sql;
  }

  public function validationDefault(Validator $validator)
  {
    $validator
      ->notEmpty('name','未入力です。')
      ->requirePresence('name')
      ->add('name', [
        'length' => [
          'rule' => ['maxLength', 100],
          'message' => '100文字以内で入力してくだい。'
        ]
      ])
      ->notEmpty('email_address','未入力です。')
      ->requirePresence('email_address')
      ->add('email_address', [
        'length' => [
          'rule' => ['maxLength', 255],
          'message' => '255文字以内で入力してくだい。'
        ]
      ])
      ->add('email_address', [
        'valid-email' => [
          'rule' => ['email'],
          'message' => 'メールアドレス以外が入力されています。'
        ]
      ])
      ->notEmpty('company','未入力です。')
      ->requirePresence('company')
      ->add('company', [
        'length' => [
          'rule' => ['maxLength', 100],
          'message' => '100文字以内で入力してくだい。'
        ]
      ])
      ->notEmpty('phone_number')
      ->requirePresence('phone_number')
      ->add('phone_number', [
        'length' => [
          'rule' => ['maxLength', 20],
          'message' => '20文字以内で入力してくだい。'
        ]
      ])
      ->add('phone_number', [
        'valid-phone' => [
          'rule' => ['custom','/\d{2,4}-\d{2,4}-\d{4}/'],
          'message' => '電話番号以外が入力されています。'
        ]
      ])
      ->requirePresence('postcode')
      ->add('postcode', [
        'length' => [
          'rule' => ['maxLength', 20],
          'message' => '20文字以内で入力してくだい。'
        ]
      ])
      ->add('postcode', [
        'valid-postal' => [
          'rule' => ['custom','/\d{3}-\d{4}/'],
          'message' => '郵便番号以外が入力されています。'
        ]
      ])
      ->requirePresence('address')
      ->add('address', [
        'length' => [
          'rule' => ['maxLength', 255],
          'message' => '255文字以内で入力してくだい。'
        ]
      ])
      ->notEmpty('subject')
      ->requirePresence('subject')
      ->add('subject', [
        'length' => [
          'rule' => ['maxLength', 100],
          'message' => '100文字以内で入力してくだい。'
        ]
      ])
      ->notEmpty('body')
      ->requirePresence('body')
      ->add('subject', [
        'length' => [
          'rule' => ['maxLength', 3000],
          'message' => '3000文字以内で入力してくだい。'
        ]
      ]);
    return $validator;
  }

}
