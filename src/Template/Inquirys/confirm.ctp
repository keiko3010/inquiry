<?php
	$this->assign('title', 'お問い合わせ');
?>

<p>こちらの内容でよろしいでしょうか。</p>
<dl>
  <dt>お名前</dt>
  <dd><?php echo h($inquiry->name); ?></dd>
</dl>
<dl>
  <dt>メールアドレス</dt>
  <dd><?php echo h($inquiry->email_address); ?></dd>
</dl>
<dl>
  <dt>会社名</dt>
  <dd><?php echo h($inquiry->company); ?></dd>
</dl>
<dl>
  <dt>電話番号</dt>
  <dd><?php echo h($inquiry->phone_number); ?></dd>
</dl>
<dl>
  <dt>郵便番号</dt>
  <dd><?php echo h($inquiry->postcode); ?></dd>
</dl>
<dl>
  <dt>住所</dt>
  <dd><?php echo h($inquiry->address); ?></dd>
</dl>
<dl>
  <dt>件名</dt>
  <dd><?php echo h($inquiry->subject); ?></dd>
</dl>
<dl>
  <dt>お問い合わせ内容</dt>
  <dd><?php echo nl2br($inquiry->body); ?></dd>
</dl>

<?= $this->Form->create($inquiry); ?>
<?= $this->Form->hidden('name', ['value' => $inquiry->name]); ?>
<?= $this->Form->hidden('email_address', ['value' => $inquiry->email_address]); ?>
<?= $this->Form->hidden('company', ['value' => $inquiry->company]); ?>
<?= $this->Form->hidden('phone_number', ['value' => $inquiry->phone_number]); ?>
<?= $this->Form->hidden('postcode', ['value' => $inquiry->postcode]); ?>
<?= $this->Form->hidden('address', ['value' => $inquiry->address]); ?>
<?= $this->Form->hidden('subject', ['value' => $inquiry->subject]); ?>
<?= $this->Form->hidden('body', ['value' => $inquiry->body]); ?>
<?= $this->Form->button('送信する', ['type' => 'submit','name' => 'confirm','value' => 'send']); ?>
<?= $this->Form->end(); ?>
