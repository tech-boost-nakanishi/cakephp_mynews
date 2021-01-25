<h2>Edit Post</h2>

<?php
echo $this->Form->create('Post', array('novalidate'=>true));
echo $this->Form->input('title', array( 'label' => 'タイトル'));
echo $this->Form->input('body', array( 'label' => '本文'));
echo $this->Form->end('更新');
?>