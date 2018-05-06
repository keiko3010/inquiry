<?php

namespace App\Controller;

error_reporting(E_ERROR & ~E_NOTICE & ~E_PARSE); 

use Cake\Mailer\Email;

class InquirysController extends AppController
{
  public function index()
  {

    $inquiry = $this->Inquirys->newEntity();
    $this->set(compact('inquiry')); 
    if (!$this->request->is('post') || !$this->request->data) {
      return;
    }

    $inquiry = $this->Inquirys->patchEntity($inquiry, $this->request->data);
    $this->set(compact('inquiry')); 
    if ($inquiry->errors()){
      // error
      $this->Flash->error('問い合わせ内容に不備があります');
      return;
    }

    switch ($this->request->data['confirm']) {
      case 'confirm':
        if (!$this->request->data['chk_flag']){
          // error
          $this->Flash->error('プライバシーボリシーを確認して下さい。');
          return;
        }

        $this->render('confirm');
        break;
      case 'send':
        if (!$this->Inquirys->save($inquiry)){
          $this->Flash->error('問い合わせを受けるつけることができませんでした。');
          return;
        }
        if (!$this->sendInquiry($inquiry)) {
          $this->Flash->error('メールを送信することができませんでした');
          return;
        }

        $this->render('result');
        break;
    }

  }

  private function sendInquiry($inquiry)
  {
    $email = new Email('default');

    return $email->setFrom(['keiko.3010@gmail.com' => 'keiko_test'])
    	->setTo($inquiry->email)
    	->setSubject('お問い合わせありがとうございます')
    	->send('お問い合わせありがとうございます');
  }

}


