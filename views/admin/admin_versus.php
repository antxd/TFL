<?php include ABSPATH.'views/header.php'; ?>
<div class="container">
  <h2>Versus <a href="<?php echo SITE; ?>admin/versus/0" class="btn btn-info float-right" role="button">Nuevo Versus</a></h2>
  <p>Para ver a detalle haz click en el numero de Versus</p>
	<!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li class="nav-item">
	      <a class="nav-link active" data-toggle="tab" href="#home">Todos</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="tab" href="#menu1">Pendientes</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="tab" href="#menu2">Realizados</a>
	    </li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div id="home" class="container tab-pane active"><br>
	      <h3>Todos</h3>
	      	<table class="table">
	      	  <thead class="thead-dark">
	      	    <tr>
	      	      <th>ID</th>
	      	      <th>Semana</th>
	      	      <th>Casa</th>
	      	      <th>Visita</th>
	      	      <th></th>
	      	    </tr>
	      	  </thead>
	      	  <tbody>
	      	  	<?php
	      	  			$versus = $db->prepare("SELECT * FROM `versus`");
	      	          	$versus->execute();
	      	         	foreach ($versus->fetchAll() as $key => $versus) { ?>
	      	         		<tr>
	      	         			<td><a href="<?php echo SITE; ?>admin/versus/<?php echo $versus->ID; ?>" class="btn btn-link">#<?php echo $versus->ID; ?></a></td>
	      	         			<td>Semana #<?php echo $versus->versus_week; ?></td>
	      	         			<td><?php echo $app->get_player($versus->player_one)->player_name; ?></td>
	      	         			<td><?php echo $app->get_player($versus->player_two)->player_name; ?></td>
	      	         			<td><a href="<?php echo SITE; ?>admin/versus/<?php echo $versus->ID; ?>" class="btn btn-primary">Editar #<?php echo $versus->ID; ?></a></td>
	      	         		</tr>
	      	         	<?php
	      	         	}
	      	  	?>
	      	  </tbody>
	      	</table>
	    </div>
	    <div id="menu1" class="container tab-pane fade"><br>
	      <h3>Casa</h3>
	     	<table class="table">
	     	  <thead class="thead-dark">
	     	    <tr>
	     	      <th>ID</th>
	     	      <th>Semana</th>
	     	      <th>Casa</th>
	     	      <th>Visita</th>
	     	      <th>Puntos</th>
	     	    </tr>
	     	  </thead>
	     	  <tbody>
	     	  	<?php
	     	  		$versus = $db->prepare("SELECT * FROM `versus` WHERE versus_status = 0");
	     	          $versus->execute();
	     	         	foreach ($versus->fetchAll() as $key => $versus) { ?>
	     	         		<tr>
	     	         			<td><a href="<?php echo SITE; ?>/versus-info/<?php echo $versus->ID; ?>">#<?php echo $versus->ID; ?></a></td>
	     	         			<td>Semana #<?php echo $versus->versus_week; ?></td>
	     	         			<td><?php echo $app->get_player($versus->player_one)->player_name; ?></td>
	     	         			<td><?php echo $app->get_player($versus->player_two)->player_name; ?></td>
	     	         			<td><?php echo $versus->versus_score_one; ?></td>
	     	         		</tr>
	     	         	<?php
	     	         	}
	     	  	?>
	     	  </tbody>
	     	</table>
	    </div>
	    <div id="menu2" class="container tab-pane fade"><br>
	      <h3>Visita</h3>
	      	<table class="table">
	      	  <thead class="thead-dark">
	      	    <tr>
	      	      <th>ID</th>
	      	      <th>Semana</th>
	      	      <th>Casa</th>
	      	      <th>Visita</th>
	      	      <th>Puntos</th>
	      	    </tr>
	      	  </thead>
	      	  <tbody>
	      	  	<?php
	      	  		$versus = $db->prepare("SELECT * FROM `versus` WHERE versus_status = 2");
	      	          $versus->execute();
	      	         	foreach ($versus->fetchAll() as $key => $versus) { ?>
	      	         		<tr>
	      	         			<td><a href="<?php echo SITE; ?>/versus-info/<?php echo $versus->ID; ?>">#<?php echo $versus->ID; ?></a></td>
	      	         			<td>Semana #<?php echo $versus->versus_week; ?></td>
	      	         			<td><?php echo $app->get_player($versus->player_one)->player_name; ?></td>
	      	         			<td><?php echo $app->get_player($versus->player_two)->player_name; ?></td>
	      	         			<td><?php echo $versus->versus_score_two; ?></td>
	      	         		</tr>
	      	         	<?php
	      	         	}
	      	  	?>
	      	  </tbody>
	      	</table>
	    </div>
	  </div>

</div>
<?php include ABSPATH.'views/footer.php'; ?>