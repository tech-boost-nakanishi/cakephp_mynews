<div>
	<?php echo $this->Form->create('User', array('novalidate'=>true, 'class' => 'form-horizontal', 'url'=>'http://0.0.0.0:80/signup/emailcheck/' . $email . '/' . $token));?>
	<fieldset>
		<legend>ユーザー登録</legend>
		<p>メールアドレス：<?php echo h($email); ?></p>
		<?php
			echo $this->Form->input('email', array('type' => 'hidden', 'value'=>$email));
			echo $this->Form->input('username', array('label' => '名前'));
			echo $this->Form->input('password', array('label' => 'パスワード'));
			echo $this->Form->input('confirmpassword', array('label' => 'パスワード(確認用)', 'type' => 'password', 'requred'=>'requred'));
		?>
		<?php echo $this->Form->submit('登録');?>
    </fieldset>
    <?php echo $this->Form->end();?>
</div>