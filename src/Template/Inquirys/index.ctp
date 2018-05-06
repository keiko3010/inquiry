<?php
	$this->assign('title', 'お問い合わせ');
?>

<?= $this->Form->create($inquiry); ?>
<?= $this->Form->input('name', ['label' => 'お名前 ※必須']); ?>
<?= $this->Form->input('email_address', ['label' => 'メールアドレス ※必須']); ?>
<?= $this->Form->input('company', ['label' => '会社名 ※必須']); ?>
<?= $this->Form->input('phone_number', ['label' => '電話番号 ※必須']); ?>
<?= $this->Form->input('postcode', ['label' => '郵便番号']); ?>
<?= $this->Form->input('address', ['label' => '住所']); ?>
<?= $this->Form->input('subject', ['label' => '件名 ※必須']); ?>
<?= $this->Form->input('body', ['label' => 'お問い合わせ内容 ※必須', 'rows'=>'3']); ?>
<?= $this->Form->input('chk_flag', ['label'=>'プライバシーポリシー', 'type'=>'checkbox']); ?>
<?= $this->Form->button('確認', ['type' => 'submit','name' => 'confirm','value' => 'confirm']); ?>
<?= $this->Form->end(); ?>
