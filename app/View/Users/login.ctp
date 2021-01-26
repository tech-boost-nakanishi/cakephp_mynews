<div>
    <?php echo $this->Form->create('User', array('novalidate'=>true, 'class' => 'form-horizontal', 'url'=>['controller'=>'users', 'action'=>'login']));?>
    <fieldset>
        <legend>ログイン</legend>
        <?php
        echo $this->Form->input('email', array( 'label' => 'メールアドレス', 'requred'=>false));
        echo $this->Form->input('password', array( 'label' => 'パスワード', 'requred'=>false));
        echo $this->Form->submit('ログイン');
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>