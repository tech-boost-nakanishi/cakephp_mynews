<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
	<div id="container">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php echo $this->Html->link(Configure::read('App.name'), '/', array('class'=>'navbar-brand')); ?>
				</div>

				<div class="collapse navbar-collapse" id="navbarEexample">
					<ul class="nav navbar-nav">
						<li>
							<div class="dropdown" style="display: block; margin-top: 8px;">
								<a href="#" class="btn btn-default" data-toggle="dropdown" role="button" aria-expanded="false">
									メニュー
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<?php if(is_null($auth)): ?>
										<li role="presentation">
											<?php echo $this->Html->link('ログイン', array('controller'=>'users', 'action'=>'login')); ?>
										</li>
										<li role="presentation">
											<?php echo $this->Html->link('新規登録', array('controller'=>'users', 'action'=>'signup')); ?>
										</li>
									<?php else: ?>
										<li role="presentation">
											<?php echo $this->Html->link('マイページ', array('controller'=>'users', 'action'=>'dashboard')); ?>
										</li>
										<li role="presentation">
											<?php echo $this->Html->link('新規投稿', array('controller'=>'posts', 'action'=>'add')); ?>
										</li>
										<li role="presentation">
											<?php echo $this->Html->link('投稿記事一覧', array('controller'=>'posts', 'action'=>'list', $auth['id'])); ?>
										</li>
										<li role="presentation">
											<?php echo $this->Html->link('ログアウト', array('controller'=>'users', 'action'=>'logout')); ?>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- <div id="header">
			<?php
				echo $this->Html->link('Home', array('controller'=>'posts', 'action'=>'index'));
				echo h(' ');
				if (!is_null($auth)) {
					echo $this->Html->link('マイページ', array('controller'=>'users', 'action'=>'dashboard'));
					echo h(' ');
					echo $this->Html->link('ログアウト', array('controller'=>'users', 'action'=>'logout'));
				}
				else{
					echo $this->Html->link('ログイン', array('controller'=>'users', 'action'=>'login'));
					echo h(' ');
					echo $this->Html->link('新規登録', array('controller'=>'users', 'action'=>'signup'));
				}
			?>
		</div> -->
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<script type="text/javascript">
		$(function(){
			setTimeout(function(){
				$('#flashMessage').fadeOut('slow');
			}, 800);
		});
	</script>
</body>
</html>
