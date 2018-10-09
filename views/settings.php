<div class="container mt-3">
	<div class="mt-3 mb-3">
		<h4>Configurações</h4>
	</div>
	<form method="POST">
		<div class="row form-group">
			<div class="col-md-6">
				<label for="sitename">Nome do site</label>
				<input required type="text" class="form-control" id="sitename" name="sitename" value="<?php echo $this->config['sitename'];?>">	
			</div>
			<div class="col-md-6">
				<label for="author">Autor (seu nome)</label>
				<input required type="text" class="form-control" id="author" name="author" value="<?php echo $this->config['author'];?>">	
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="disqus_site">URL Disqus</label>
				<input type="text" class="form-control" id="disqus_site" name="disqus_site" value="<?php echo $this->config['disqus_site'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="description">Descrição</label>
			<textarea required class="form-control ckeditor" id="description" name="description"><?php echo $this->config['description'];?></textarea>
		</div>
		<button class="btn"><i class="fa fa-fw fa-save"></i> Salvar</button>
	</form>
</div>