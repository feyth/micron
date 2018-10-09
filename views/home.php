<div class="container jumbotron mt-3 p-5">
    <img src="<?php echo BASE_URL;?>assets/images/picture.png" style="max-height: 150px; border-radius: 100px !important;" class="rounded mx-auto d-block mb-2">
    <div class="lead text-center">
    	<?php  echo $this->config['description'];?>	
    </div>
    <div class="p-2 text-center">
    	<a href="https://api.whatsapp.com/send?phone=5553999372205" target="_blank" class="btn btn-outline-secondary"  data-toggle="tooltip" data-placement="top" title="Whatsapp"><i class="fab fa-fw fa-whatsapp"></i></a>
        <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="E-mail" onclick="mostra_email();"><i class="fa fa-fw fa-at"></i></a>
    </div>
</div>

<section class="container">
    <?php if(count($posts) > 0):?>
        <?php foreach($posts as $post):?>
        <div class="post-resume">
            <a href="<?php echo BASE_URL.$post['id'].'/'.$post['uri'];?>">
                <div class="post-title"><?php echo $post['title'];?></div>
                <div class="post-content">
                    <p><?php echo substr(strip_tags($post['content']), 0, 500).'...';?></p>
                    <small><?php echo date('d/m/Y', strtotime($post['date']));?></small>
                </div>
            </a>
        </div>
        <hr class="my-4">
        <?php endforeach;?>
    <?php else:?>
    Não há posts...
    <?php endif;?>
</section>
<?php if($pages > 1):?>
<nav aria-label="pagination">
    <ul class="pagination justify-content-center">
        <?php for($q = 1; $q <= $pages; $q++):?>
            <?php if($currentPage == $q):?>
            <li class="page-item disabled"><a class="page-link" href="#"><?php echo $q;?></a></li>
            <?php else:?>
            <li class="page-item"><a class="page-link" href="<?php echo BASE_URL.'?p='.$q;?>"><?php echo $q;?></a></li>
            <?php endif;?>
        <?php endfor;?>
    </ul>
</nav>
<?php endif;?>
<script type="text/javascript">
    function mostra_email() {
        alert('Contato via e-mail: tsfurlan@gmail.com');
    }
</script>