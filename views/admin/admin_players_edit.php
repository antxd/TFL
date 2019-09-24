<?php include ABSPATH.'views/header.php';
$user = $app->get_player($id);
?>
<div class="container">
	<h1 class="text-center"><?php echo ($id != 0)? 'Editar jugador: '.$id : 'Nuevo jugador'; ?></h1>
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
			<form method="post">
			  <div class="form-group">
			    <label for="player_name">Nombre:</label>
			    <input type="text" class="form-control" id="player_name" name="player_name" value="<?php echo $user->player_name; ?>">
			  </div>
			  <div class="form-group">
			    <label for="player_user">Usuario de Instagram:</label>
			    <input type="text" class="form-control" id="player_user" name="player_user" value="<?php echo $user->player_user; ?>">
			  </div>
			  <div class="form-group">
			    <label for="player_piuuser">Nick PIU:</label>
			    <input type="text" class="form-control" id="player_piuuser" name="player_piuuser" value="<?php echo $user->player_piuuser; ?>">
			  </div>
			  <div class="form-group">
			    <label for="player_pass">Contraseña:</label>
			    <input type="password" class="form-control" id="player_pass" name="player_pass" autocomplete="new-password">
			  </div>
			  <div class="form-group">
			  	  <label for="player_country">Vivo en:</label>
			  	  <select class="form-control" id="player_country" name="player_country">
			  	  	 <?php 
			  	  	 foreach ($paises as $key => $value) {
			  	  	 	if ($user->player_country == $value) {
			  	  	 		echo "<option value='{$value}' selected>{$value}</option>";
			  	  	 	}else{
			  	  	 		echo "<option value='{$value}'>{$value}</option>";
			  	  	 	}
			  	  	 }
			  	  	 ?>
			  	  </select>
			  </div>
			  <div class="form-group">
			    <label for="player_league">Liga:</label>
			    <input type="text" class="form-control" id="player_league" name="" readonly="" value="<?php echo $app->get_league($user->player_league); ?>">
			  </div>
			  <h3>Tengo estas versiones de PUMP</h2>
			  <?php
			  $player_versions = array(0);
			  if (!empty($user->player_versions)) {
			  	$player_versions = unserialize($user->player_versions);
			  }
			  //var_dump($player_versions);
			  foreach ($versiones as $key => $value) {
			  	$checked_version = (in_array($key, $player_versions))? 'checked' : '' ;
			  	echo "<div class='form-check-inline'>
					    <label class='form-check-label'>
					      <input type='checkbox' class='form-check-input' name='player_versions[]' value='{$key}' {$checked_version }>{$value}
					    </label>
					  </div>";
			  }
			  ?>
			  <div class="mb-2"></div>
			  <button type="submit" class="btn btn-primary d-block mx-auto">Guardar</button>
			</form>
		</div>
	</div>
	
</div>
<?php include ABSPATH.'views/footer.php'; ?>