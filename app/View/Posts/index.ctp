<h2>記事一覧</h2>

<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<td>タイトル</td>
			<td>本文</td>
			<td>投稿日時</td>
			<td>投稿者</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($posts as $post): ?>
			<tr>
				<td><?php echo $this->Html->link($post['Post']['title'], array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?></td>
				<td><?php echo h($post['Post']['body']); ?></td>
				<td><?php echo $this->Time->format('Y年m月d日 H時i分', $post['Post']['created']); ?></td>
				<td><?php echo h($post['User']['username']); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php debug($_ENV); ?>