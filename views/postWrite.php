<div class="container mt-3">
	<div class="mt-3 mb-3">
		<h4>Nova postagem</h4>
	</div>
	<form method="POST">
		<div class="form-group">
			<label for="title">Título</label>
			<input type="text" id="title" name="title" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="published">Publicado?</label>
			<select class="form-control" id="published" name="published">
				<option value="1">Sim</option>
				<option value="0">Não</option>
			</select>
		</div>
		<div class="form-group">
			<label for="content">Conteúdo</label>
			<textarea id="content" name="content" class="form-control ckeditor" required></textarea>
		</div>
		<button class="btn"><i class="fa fa-fw fa-save"></i> Salvar</button>
	</form>
</div>