<div>
	<?php echo $this->Form->create('User', array('novalidate'=>true, 'class' => 'form-horizontal', 'url'=>['controller'=>'users', 'action'=>'signup']));?>
	<fieldset>
		<legend>ユーザー登録</legend>
		<?php
			echo $this->Form->input('username', array('label' => '名前　'));
			echo $this->Form->input('email', array('label' => 'メールアドレス'));
			echo $this->Form->input('password', array('label' => 'パスワード'));
		?>
		<?php echo $this->Form->submit('登録');?>
    </fieldset>
    <?php echo $this->Form->end();?>
</div>