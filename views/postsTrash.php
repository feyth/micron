<div class="container mt-3">
	<div class="mt-3 mb-3">
		<h4>Lixeira</h4>
	</div>
	<?php if(count($posts) > 0):?>
	<table class="table">
		<thead>
			<tr>
				<th>Título</th>
				<th>Data</th>
				<th>Visualizações</th>
				<th></th>
			</tr>			
		</thead>
		<tbody>
			<?php foreach($posts as $post):?>
			<tr>
				<td><a href="<?php echo BASE_URL.'posts/update/'.$post['id'];?>"><?php echo $post['title'];?></a></td>
				<td><?php echo date('d/m/Y', strtotime($post['date']));?></td>
				<td><?php echo $post['views'];?></td>
				<td><a href="<?php echo BASE_URL.'posts/restore/'.$post['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Restaurar item"><i class="fa fa-fw fa-undo"></i></a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<?php else:?>
	<div class="alert alert-info">Sua lixeira está vazia!</div>
	<?php endif;?>
</div>