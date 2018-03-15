<div class="container mt-3">
	<div class="mt-3 mb-3">
		<h4>Atualizar postagem</h4>
	</div>
	<form method="POST">
		<div class="form-group">
			<label for="title">Título</label>
			<input type="text" id="title" name="title" class="form-control" value="<?php echo $post['title'];?>" required>
		</div>
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="published">Publicado?</label>
				<select class="form-control" id="published" name="published">
					<option value="<?php echo $post['published'];?>"><?php echo($post['published'] == 1 ? 'Sim' : 'Não');?></option>
					<option value="1">Sim</option>
					<option value="0">Não</option>
				</select>
			</div>
			<div class="col-sm-6">
				<label for="date">Data</label>
				<input type="date" id="date" name="date" class="form-control" value="<?php echo $post['date'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="content">Conteúdo</label>
			<textarea id="content" name="content" class="form-control ckeditor" required><?php echo $post['content'];?></textarea>
		</div>
		<button class="btn"><i class="fa fa-fw fa-save"></i> Salvar</button>
	</form>
</div>