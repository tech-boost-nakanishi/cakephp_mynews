<h2><?php echo h($post['Post']['title']); ?></h2> <h4><?php echo $this->Time->format('Y年m月d日 H時i分', $post['Post']['created']); ?></h4>

<h4>投稿者：<?php echo h($post['User']['username']); ?>さん</h4>

<p><?php echo h($post['Post']['body']); ?></p>