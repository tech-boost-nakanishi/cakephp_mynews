<div>
	<?php echo $this->Form->create('PreUser', array('novalidate'=>true, 'class' => 'form-horizontal', 'url'=>['controller'=>'users', 'action'=>'signup']));?>
	<fieldset>
		<legend>ユーザー仮登録</legend>
		<?php
			echo $this->Form->input('email', array('label' => 'メールアドレス'));
		?>
		<?php echo $this->Form->submit('送信');?>
    </fieldset>
    <?php echo $this->Form->end();?>
</div>