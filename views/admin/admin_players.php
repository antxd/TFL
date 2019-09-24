<?php include ABSPATH.'views/header.php'; ?>
<div class="container">
  	<h2>Jugadores <a href="<?php echo SITE; ?>admin/players/0" class="btn btn-info float-right" role="button">Nuevo Jugador</a></h2>
  	<p>Para ver a detalle haz click en el numero de Jugador</p>
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th>ID</th>
	      <th>Usuario</th>
	      <th>Nombre</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	     	foreach ($app->get_all_player() as $key => $player) { ?>
	     		<tr>
	     			<td><a href="<?php echo SITE; ?>admin/players/<?php echo $player->ID; ?>">#<?php echo $player->ID; ?></a></td>
	     			<td><?php echo $player->player_user; ?></td>
	     			<td><?php echo $player->player_name; ?></td>
	     			<td><a href="<?php echo SITE; ?>admin/players/<?php echo $player->ID; ?>" class="btn btn-primary float-right" role="button">Editar Jugador</a></td>
	     		</tr>
	     	<?php
	     	}
	  	?>
	  </tbody>
	</table>
</div>
<?php include ABSPATH.'views/footer.php'; ?>