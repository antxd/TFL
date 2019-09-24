<?php include 'header.php'; ?>
<div class="container">
  <h2>Resultados de tus Versus</h2>
  <p>Para ver a detalle haz click en el numero de Versus</p>
	<!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li class="nav-item">
	      <a class="nav-link active" data-toggle="tab" href="#home">Todos</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="tab" href="#menu1">Casa</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" data-toggle="tab" href="#menu2">Visita</a>
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
	      	    </tr>
	      	  </thead>
	      	  <tbody>
	      	  	<?php
	      	  		$versus = $db->prepare("SELECT * FROM `versus` WHERE player_one	= $uid OR player_two = $uid AND versus_status = 0");
	      	          $versus->execute();
	      	         	foreach ($versus->fetchAll() as $key => $versus) { ?>
	      	         		<tr>
	      	         			<td><a href="<?php echo SITE; ?>/versus-info/<?php echo $versus->ID; ?>">#<?php echo $versus->ID; ?></a></td>
	      	         			<td>Semana #<?php echo $versus->versus_week; ?></td>
	      	         			<td><?php echo $app->get_player($versus->player_one)->player_name; ?></td>
	      	         			<td><?php echo $app->get_player($versus->player_two)->player_name; ?></td>
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
	     	  		$versus = $db->prepare("SELECT * FROM `versus` WHERE player_one	= $uid AND versus_status = 0");
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
	      	  		$versus = $db->prepare("SELECT * FROM `versus` WHERE player_two	= $uid AND versus_status = 0");
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
<?php include 'footer.php'; ?>