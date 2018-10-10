<div class="container mt-3">
	<div class="mt-3 mb-3">
		<h4>Postagens</h4>
		<button class="btn" onclick="window.location.href='<?php echo BASE_URL;?>posts/novo'" data-toggle="tooltip" data-placement="bottom" title="Nova postagem"><i class="fa fa-fw fa-plus-circle"></i></button>
		<button class="btn" onclick="window.location.href='<?php echo BASE_URL;?>posts/lixeira'" data-toggle="tooltip" data-placement="bottom" title="Lixeira"><i class="fa fa-fw fa-trash"></i></button>
	</div>
	<?php if(count($posts) > 0):?>
	<table class="table">
		<thead>
			<tr>
				<th>Título</th>
				<th>Data</th>
				<th>Visualizações</th>
				<th></th>
				<th></th>
			</tr>			
		</thead>
		<tbody>
			<?php foreach($posts as $post):?>
			<tr>
				<td><a href="<?php echo BASE_URL.'posts/editar/'.$post['id'];?>"><?php echo $post['title'];?></a></td>
				<td><?php echo date('d/m/Y', strtotime($post['date']));?></td>
				<td><?php echo $post['views'];?></td>
				<td>
					<?php if($post['published'] == 1):?>
						<span class="badge badge-success">Publicado</span>
					<?php else:?>
						<span class="badge badge-danger">Despublicado</span>
					<?php endif;?>
				</td>
				<td><a href="<?php echo BASE_URL.'posts/mover/'.$post['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Mover para a lixeira"><i class="fa fa-fw fa-trash"></i></a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<?php else:?>
	<div class="alert alert-info">Você ainda não escreveu nenhum post...</div>
	<?php endif;?>
</div>