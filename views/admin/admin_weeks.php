<?php include ABSPATH.'views/header.php';
$week_ID = (empty($_GET['week_ID']))? null : $_GET['week_ID'] ;
$week = $app->get_weeks($week_ID);?>
<div class="container">
  <h2>Semanas</h2>
  <p>Para ver a detalle haz click en el numero de la Semana</p>
  <form class="mt-3 mb-3" method="post">
  	 	<input type="hidden" name="week_ID" value="<?php echo $week_ID; ?>">
	  	<div class="row">
	  		<div class="col-sm-6">
		  		<div class="form-group">
		  		  <label for="week_title">Titulo:</label>
		  		  <input type="text" class="form-control" id="week_title" name="week_title" value="<?php echo $week->week_title; ?>" required>
		  		</div>
	  		</div>
	  		<div class="col-sm-6">
		  		<div class="form-group">
		  		  <label for="week_status">Estatus de la semana:</label>
		  		  <select class="form-control" id="week_status" name="week_status" required>
		  		    <option value="0" <?php selected($week->week_status,0); ?>>Desactivada</option>
		  		    <option value="1" <?php selected($week->week_status,1); ?>>Activada</option>
		  		  </select>
		  		</div>
	  		</div>
	  		<div class="col-sm-6">
		  		<div class="form-group">
		  		  <label for="week_title">Desde:</label>
		  		  <input type="date" class="form-control" id="week_start" name="week_start" value="<?php echo $week->week_start; ?>" required>
		  		</div>
	  		</div>
	  		<div class="col-sm-6">
		  		<div class="form-group">
		  		  <label for="week_end">Hasta:</label>
		  		  <input type="date" class="form-control" id="week_end" name="week_end" value="<?php echo $week->week_end; ?>" required>
		  		</div>
	  		</div>
	  		<div class="col-sm-12">
		  		<div class="form-group">
		  		  <label for="week_description">Descripción:</label>
		  		  <textarea class="form-control" rows="5" id="week_description" name="week_description" required><?php echo $week->week_description; ?></textarea>
		  		</div>
	  		</div>
	  	</div>
	  	<button type="submit" class="btn btn-primary"><?php echo (!$week_ID)? 'Nueva':'Guardar'; ?></button>
  </form>
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th>Semana #</th>
	      <th>Titulo</th>
	      <th>Desde</th>
	      <th>Hasta</th>
	      <th>Estatus</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	         	foreach ($app->get_all_weeks() as $key => $week) { ?>
	         		<tr>
	         			<td><a href="<?php echo SITE; ?>admin/weeks?week_ID=<?php echo $week->ID; ?>" class="btn btn-link">#<?php echo $week->ID; ?></a></td>
	         			<td><?php echo $week->week_title; ?></td>
	         			<td><?php echo $week->week_start; ?></td>
	         			<td><?php echo $week->week_end; ?></td>
	         			<td><?php echo ($week->week_status == 0)? 'Inactiva' : 'En curso' ; ?></td>
	         			<td><a href="<?php echo SITE; ?>admin/weeks?week_ID=<?php echo $week->ID; ?>" class="btn btn-primary">Editar #<?php echo $week->ID; ?></a></td>
	         			<tr>
	         				<td colspan="6">
	         				<strong>Descripción</strong>
	         				<div class="week_descripcion">
	         					<?php echo $week->week_description; ?>
	         				</div>
	         			</td>
	         			</tr>
	         			
	         		</tr>
	         	<?php
	         	}
	  	?>
	  </tbody>
	</table>
</div>
<?php include ABSPATH.'views/footer.php'; ?>