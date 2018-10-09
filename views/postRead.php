<section class="container mt-3">
	<div class="text-center mx-auto">
		<?php if(isset($_SESSION['id'])):?>
		<a class="btn btn-secondary" href="<?php echo BASE_URL.'posts/update/'.$post['id'];?>"><i class="fa fa-pen-square"></i> Editar</a>
		<?php endif;?>
		<h1 class="post-title mb-3 mt-3"><?php echo $post['title'];?></h1>
		<p class="text-center"><?php echo date('d/m/Y', strtotime($post['date']));?></p>
	</div>
	<div class="mx-auto">
		<div class="post-content"><?php echo $post['content'];?></div>
		<hr class="my-4">
	    <h4><?php  echo $this->config['author'];?></h4>
	    <div style="font-size: 14px;"><?php  echo $this->config['description'];?></div>
	    <hr class="my-4">
	    <div id="disqus_thread"></div>
	</div>
</section>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
//s.src = 'https://thiagofurlan.disqus.com/embed.js';
s.src = '<?php echo $this->config['disqus_site'];?>/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>
	<div class="alert alert-danger">
		Por favor, ative o JavaScript para poder comentar no site.
	</div>
</noscript>