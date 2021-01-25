<h2>記事の投稿</h2>

<?php

echo $this->Form->create('Post', array('novalidate'=>true, 'class' => 'form-horizontal'));
echo $this->Form->input('title', array( 'label' => 'タイトル'));
echo $this->Form->input('body', array('rows'=>6, 'label' => '本文'));
echo $this->Form->input('Post.user_id', array('type'=>'hidden', 'value'=>$auth['id']));
echo $this->Form->end('投稿');

?>