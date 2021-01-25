<h2><?php echo h($auth['username']); ?>さんの投稿一覧</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<td>タイトル</td>
			<td>本文</td>
			<td>投稿日時</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($posts as $post): ?>
			<tr>
				<td><?php echo $this->Html->link($post['Post']['title'], array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?></td>
				<td><?php echo h($post['Post']['body']); ?></td>
				<td><?php echo $this->Time->format('Y年m月d日 H時i分', $post['Post']['created']); ?></td>
				<td>
					<?php echo $this->Html->link('編集', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']), array('class'=>'btn btn-info')); ?>
					<?php echo $this->Form->postLink('削除', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('class'=>'btn btn-danger'), '本当に削除しますか?'); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>