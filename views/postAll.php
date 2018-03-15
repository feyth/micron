<div class="container mt-3">
	<?php foreach($posts as $post):?>
	<div class="post-resume">
	<a href="<?php echo BASE_URL.'posts/read/'.$post['id'].'/'.$post['uri'];?>">
		<div class="post-title"><?php echo $post['title'];?></div>
		<div class="post-content">
			<p><?php echo substr(strip_tags($post['content']), 0, 300).'...';?></p>
			<small><?php echo date('d/m/Y', strtotime($post['date']));?></small>
		</div>
	</a>
	</div>
	<hr class="my-4">
	<?php endforeach;?>
</div>