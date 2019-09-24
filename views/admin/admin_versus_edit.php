<?php include ABSPATH.'views/header.php';
$week_versus = $app->get_versus($id);

	$p1_disable = 'disabled'; $p1_readonly = 'readonly';
	$p2_disable = 'disabled'; $p2_readonly = 'readonly';			  	
	//echo password_hash('TLF2019*ATIL', PASSWORD_DEFAULT);
?>
<div class="container">
	<form method="post">
			<div class="row">
		  		<div class="col-sm-4">
			  		<div class="form-group">
			  		  <label for="player_one">Casa:</label>
			  		  <select class="form-control" id="player_one" name="player_one" required>
			  		  	<option value="">Seleccionar CASA</option>
			  		  	<?php foreach ($app->get_all_player() as $key => $player) { ?>
			  		  			<option value="<?php echo $player->ID; ?>" <?php selected($week_versus->player_one,$player->ID); ?>><?php echo $player->player_name; ?></option>
			  		  	<?php } ?>
			  		  </select>
			  		</div>
		  		</div>
		  		<div class="col-sm-4">
			  		<div class="form-group">
			  		  <label for="versus_week">Semana #:</label>
			  		  <select class="form-control" id="versus_week" name="versus_week" required>
			  		  		<option value="">Seleccionar Semana</option>
			  		  		<?php
			  		  	       	foreach ($app->get_all_weeks() as $key => $week) { ?>
			  		  	       		 <option value="<?php echo $week->ID; ?>" <?php selected($week_versus->versus_week,$week->ID); ?>>#<?php echo $week->ID; ?> / <?php echo $week->week_title; ?></option>
			  		  	       	<?php
			  		  	       	}
			  		  		?>
			  		  </select>
			  		</div>
		  		</div>
		  		<div class="col-sm-4">
			  		<div class="form-group">
			  		  <label for="player_two">Vista:</label>
			  		  <select class="form-control" id="player_two" name="player_two" required>
			  		  	<option value="">Seleccionar VISITA</option>
			  		  	<?php foreach ($app->get_all_player() as $key => $player) { ?>
			  		  			<option value="<?php echo $player->ID; ?>" <?php selected($week_versus->player_two,$player->ID); ?>><?php echo $player->player_name; ?></option>
			  		  	<?php } ?>
			  		  </select>
			  		</div>
		  		</div>
		  		<div class="col-sm-4">
	          	  	<div class="form-group">
	          			<label for="versus_score_one">Puntos Casa:</label>
	          			<input type="number" class="form-control" id="versus_score_one" name="versus_score_one" min="0" value="<?php echo (!empty($week_versus->versus_score_one))? $week_versus->versus_score_one : 0 ; ?>">
	          		</div>
	          	</div>
  		  		<div class="col-sm-4">
  			  		<div class="form-group">
  			  		  <label for="versus_status">Estatus del Versus:</label>
  			  		  <select class="form-control" id="versus_status" name="versus_status" required>
  			  		    <option value="0" <?php selected($week_versus->versus_status,0); ?>>No Realizado</option>
  			  		    <option value="1" <?php selected($week_versus->versus_status,1); ?>>1 Jugador Realizó el Versus</option>
  			  		     <option value="2" <?php selected($week_versus->versus_status,2); ?>>Realizado</option>
  			  		  </select>
  			  		</div>
  		  		</div>
  		  		<div class="col-sm-4">
	          	  	<div class="form-group">
	          			<label for="versus_score_two">Puntos Visita:</label>
	          			<input type="number" class="form-control" id="versus_score_two" name="versus_score_two" min="0" value="<?php echo (!empty($week_versus->versus_score_two))? $week_versus->versus_score_two : 0 ; ?>">
	          		</div>
	          	</div>
		  		<div class="col-sm-12">
		  			<button type="submit" class="btn btn-primary d-block mx-auto mt-4"><?php echo (!$id)? 'Nuevo Versus':'Guardar Versus'; ?></button>
		  		</div>
		  	</div>
	<div class="row">

		<div class="col-sm-12 space40"></div>
		<div class="col-sm-6 player_info_one">
			<h4 class="text-center">Detalles</h4>
				<div id="accordion">
				    <div class="card">
				      <div class="card-header">
				        <a class="card-link" data-toggle="collapse" href="#collapseOne">
				          Canciones
				        </a>
				      </div>
				      <div id="collapseOne" class="collapse" data-parent="#accordion">
				        <div class="card-body">
				            <div class="form-group">
				              <label for="versus_song1">Cancion 1:</label>
				              <input type="text" class="form-control" id="versus_song1" name="versus_song1" value="<?php echo $week_versus->versus_song1; ?>" 
				              <?php echo $p1_readonly; ?>>
				            </div>
				            <div class="row">
				          	  <div class="col-sm-6">
				          	  	<div class="form-group">
				          			<label for="versus_song1l">Nivel Cancion 1:</label>
				          			<input type="number" class="form-control" id="versus_song1l" name="versus_song1l" min="1" max="30" value="<?php echo $week_versus->versus_song1l; ?>" <?php echo $p1_readonly; ?>>
				          		</div>
				          	  </div>
				          	  <div class="col-sm-6">
				          		<div class="form-group">
				          			  <label for="versus_song1v">Version de Cancion 1:</label>
				          			  <select class="form-control" id="versus_song1v" name="versus_song1v" required <?php echo $p1_disable; ?>>
				          			  	<option value="" required>Seleccionar Versión PIU</option>
				          			  	<?php foreach ($versiones as $key => $version) { ?>
				          			  		<option value="<?php echo $key; ?>" <?php selected($week_versus->versus_song1v, $key); ?>><?php echo $version; ?></option>
				          			  	<?php } ?>
				          			  </select>
				          		</div>
				          	  </div>  
				            </div>
				            <!-- end song 1-->
				            <div class="form-group">
				              <label for="versus_song2">Cancion 2:</label>
				              <input type="text" class="form-control" id="versus_song2" name="versus_song2" readonly value="<?php echo $week_versus->versus_song2; ?>">
				            </div>
				              <div class="row">
				            	  <div class="col-sm-6">
				            	  	<div class="form-group">
				            			<label for="versus_song2l">Nivel Cancion 2:</label>
				            			<input type="number" class="form-control" id="versus_song2l" name="versus_song2l" min="1" max="30" readonly value="<?php echo $week_versus->versus_song2l; ?>">
				            		</div>
				            	  </div>
				            	  <div class="col-sm-6">
				            		<div class="form-group">
				            			  <label for="versus_song2v">Version de Cancion 2:</label>
				            			   <select class="form-control" id="versus_song2v" name="versus_song2v" disabled>
	  				          			  	<option value="">Seleccionar Versión PIU</option>
	  				          			  	<?php foreach ($versiones as $key => $version) { ?>
	  				          			  		<option value="<?php echo $key; ?>" <?php selected($week_versus->versus_song2v, $key); ?>><?php echo $version; ?></option>
	  				          			  	<?php } ?>
	  				          			  </select>
				            		</div>
				            	  </div>  
				              </div>
				             <!-- end song 2-->
				            <div class="form-group">
				              <label for="versus_song3">Cancion 3:</label>
				              <input type="text" class="form-control" id="versus_song3" name="versus_song3" value="<?php echo $week_versus->versus_song3; ?>" required <?php echo $p1_readonly; ?>>
				            </div>
				            <div class="row">
				            	  <div class="col-sm-6">
				            	  	<div class="form-group">
				            			<label for="versus_song3l">Nivel Cancion 3:</label>
				            			<input type="number" class="form-control" id="versus_song3l" name="versus_song3l" min="1" max="30" value="<?php echo $week_versus->versus_song3l; ?>" required <?php echo $p1_readonly; ?>>
				            		</div>
				            	  </div>
				            	  <div class="col-sm-6">
				            		<div class="form-group">
				            			  <label for="versus_song3v">Version de Cancion 3:</label>
				            			  <select class="form-control" id="versus_song3v" name="versus_song3v" required <?php echo $p1_disable; ?>>
				            			  	<option value="">Seleccionar Versión PIU</option>
	  				          			  	<?php foreach ($versiones as $key => $version) { ?>
	  				          			  		<option value="<?php echo $key; ?>" <?php selected($week_versus->versus_song3v, $key); ?>><?php echo $version; ?></option>
	  				          			  	<?php } ?>
				            			  </select>
				            		</div>
				            	  </div>  
				              </div>
				             <!-- end song 3-->
				        </div>
				      </div>
				    </div>
				    <div class="card">
				      <div class="card-header">
				        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
				        Scores
				      </a>
				      </div>
				      <div id="collapseTwo" class="collapse" data-parent="#accordion">
				        <div class="card-body">
				          	   <!-- scores -->
				          	   	<div class="row">
				          	   		<div class="col-sm-8">
				          	   			<div class="form-group">
				          	   			  <label for="player_one_score1">Score 1:</label>
				          	   			  <input type="number" class="form-control" id="player_one_score1" name="player_one_score1" min="0" value="<?php echo $week_versus->player_one_score1; ?>" <?php echo $p1_readonly; ?>>
				          	   			</div>
				          	   		</div>
				          	   		<div class="col-sm-4">
				          	   			<div class="form-group">
				          	   			  <label for="player_one_score1_letter">Score 1 Letra:</label>
				          	   			  <input type="text" class="form-control" id="player_one_score1_letter" name="player_one_score1_letter" value="<?php echo $week_versus->player_one_score1_letter; ?>" <?php echo $p1_readonly; ?>>
				          	   			</div>
				          	   		</div>
				          	   		<div class="col-sm-8">
				          	   			<div class="form-group">
				          	   			  <label for="player_one_score2">Score 2:</label>
				          	   			  <input type="number" class="form-control" id="player_one_score2" name="player_one_score2" min="0" value="<?php echo $week_versus->player_one_score2; ?>" <?php echo $p1_readonly; ?>>
				          	   			</div>
				          	   		</div>
				          	   		<div class="col-sm-4">
				          	   			<div class="form-group">
				          	   			  <label for="player_one_score2_letter">Score 2 Letra:</label>
				          	   			  <input type="text" class="form-control" id="player_one_score2_letter" name="player_one_score2_letter" value="<?php echo $week_versus->player_one_score2_letter; ?>" <?php echo $p1_readonly; ?>>
				          	   			</div>
				          	   		</div>
				          	   		<div class="col-sm-8">
				          	   			<div class="form-group">
				          	   			  <label for="player_one_score3">Score 3:</label>
				          	   			  <input type="number" class="form-control" id="player_one_score3" name="player_one_score3" min="0" value="<?php echo $week_versus->player_one_score3; ?>" <?php echo $p1_readonly; ?>>
				          	   			</div>
				          	   		</div>
				          	   		<div class="col-sm-4">
				          	   			<div class="form-group">
				          	   			  <label for="player_one_score3_letter">Score 3 Letra:</label>
				          	   			  <input type="text" class="form-control" id="player_one_score3_letter" name="player_one_score3_letter" value="<?php echo $week_versus->player_one_score3_letter; ?>" <?php echo $p1_readonly; ?>>
				          	   			</div>
				          	   		</div>
				          		</div>
				        </div>
				      </div>
				    </div>
				    <div class="card">
				      <div class="card-header">
				        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
				          Imagenes (proximanente)
				        </a>
				      </div>
				      <div id="collapseThree" class="collapse" data-parent="#accordion">
				        <div class="card-body">
				          	<!-- Screenshots -->
				          	<div class="custom-file mb20">
				          	    <input type="file" class="custom-file-input" id="customFile" multiple accept='image/*' name="images_p1">
				          	    <label class="custom-file-label" for="customFile">Seleccionar 3 Imagenes</label>
				          	</div>
				        </div>
				      </div>
				    </div>
				  </div>
	
		</div>
		<!-- FIN DATA P1 -->
		<div class="col-sm-6 player_info_two">
			<h4 class="text-center">Detalles</h4>
					<input type="hidden" name="side" value="visita">
					<div id="accordion2">
					    <div class="card">
					      <div class="card-header">
					        <a class="card-link" data-toggle="collapse" href="#collapseOnea">
					          Canciones
					        </a>
					      </div>
					      <div id="collapseOnea" class="collapse" data-parent="#accordion2">
					        <div class="card-body">
					          	  <div class="form-group">
					          	    <label for="versus_song1">Cancion 1:</label>
					          	    <input type="text" class="form-control" id="versus_song1" name="versus_song1" readonly="" value="<?php echo $week_versus->versus_song1; ?>">
					          	  </div>
					          	  <div class="row">
					          		  <div class="col-sm-6">
					          		  	<div class="form-group">
					          				<label for="versus_song1l">Nivel Cancion 1:</label>
					          				<input type="number" class="form-control" id="versus_song1l" name="versus_song1l" min="1" max="30" readonly="" value="<?php echo $week_versus->versus_song1l; ?>">
					          			</div>
					          		  </div>
					          		  <div class="col-sm-6">
					          			<div class="form-group">
					          				  <label for="versus_song1v">Version de Cancion 1:</label>
					          				  <select class="form-control" id="versus_song1v" name="versus_song1v" disabled="">
					          				  		<option value="" required>Seleccionar Versión PIU</option>
	  		  				          			  	<?php foreach ($versiones as $key => $version) { ?>
	  		  				          			  		<option value="<?php echo $key; ?>" <?php selected($week_versus->versus_song1v, $key); ?>><?php echo $version; ?></option>
	  		  				          			  	<?php } ?>
					          				  </select>
					          			</div>
					          		  </div>  
					          	  </div>
					          	  <!-- end song 1-->
					          	  <div class="form-group">
					          	    <label for="versus_song2">Cancion 2:</label>
					          	    <input type="text" class="form-control" id="versus_song2" name="versus_song2" value="<?php echo $week_versus->versus_song2; ?>" <?php echo $p2_readonly; ?>>
					          	  </div>
					          	    <div class="row">
					          	  	  <div class="col-sm-6">
					          	  	  	<div class="form-group">
					          	  			<label for="versus_song2l">Nivel Cancion 2:</label>
					          	  			<input type="number" class="form-control" id="versus_song2l" name="versus_song2l" min="1" max="30" value="<?php echo $week_versus->versus_song2l; ?>" <?php echo $p2_readonly; ?>>
					          	  		</div>
					          	  	  </div>
					          	  	  <div class="col-sm-6">
					          	  		<div class="form-group">
					          	  			  <label for="versus_song2v">Version de Cancion 2:</label>
					          	  			  <select class="form-control" id="versus_song2v" name="versus_song2v" <?php echo $p2_disable; ?>>
					          	  			  		<option value="" required>Seleccionar Versión PIU</option>
	  		  				          			  	<?php foreach ($versiones as $key => $version) { ?>
	  		  				          			  		<option value="<?php echo $key; ?>" <?php selected($week_versus->versus_song2v, $key); ?>><?php echo $version; ?></option>
	  		  				          			  	<?php } ?>
					          	  			  </select>
					          	  		</div>
					          	  	  </div>  
					          	    </div>
					          	   <!-- end song 2-->
					          	  <div class="form-group">
					          	    <label for="versus_song3">Cancion 3:</label>
					          	    <input type="text" class="form-control" id="versus_song3" name="versus_song3" readonly="" value="<?php echo $week_versus->versus_song3; ?>">
					          	  </div>
					          	  <div class="row">
					          	  	  <div class="col-sm-6">
					          	  	  	<div class="form-group">
					          	  			<label for="versus_song3l">Nivel Cancion 3:</label>
					          	  			<input type="number" class="form-control" id="versus_song3l" name="versus_song3l" min="1" max="30" readonly="" value="<?php echo $week_versus->versus_song3l; ?>">
					          	  		</div>
					          	  	  </div>
					          	  	  <div class="col-sm-6">
					          	  		<div class="form-group">
					          	  			  <label for="versus_song3v">Version de Cancion 3:</label>
					          	  			  <select class="form-control" id="versus_song3v" name="versus_song3v" disabled="">
					          	  			  		<option value="" required>Seleccionar Versión PIU</option>
	  		  				          			  	<?php foreach ($versiones as $key => $version) { ?>
	  		  				          			  		<option value="<?php echo $key; ?>" <?php selected($week_versus->versus_song3v, $key); ?>><?php echo $version; ?></option>
	  		  				          			  	<?php } ?>
					          	  			  </select>
					          	  		</div>
					          	  	  </div>  
					          	    </div>
					          	   <!-- end song 3-->
					        </div>
					      </div>
					    </div>
					    <div class="card">
					      <div class="card-header">
					        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwoa">
					        Scores
					      </a>
					      </div>
					      <div id="collapseTwoa" class="collapse" data-parent="#accordion2">
					        <div class="card-body">
					          	   <!-- scores -->
					          	   	<div class="row">
					          	   		<div class="col-sm-8">
					          	   			<div class="form-group">
					          	   			  <label for="player_one_score1">Score 1:</label>
					          	   			  <input type="number" class="form-control" id="player_one_score1" name="player_one_score1" value="<?php echo $week_versus->player_one_score1; ?>" <?php echo $p2_readonly; ?>>
					          	   			</div>
					          	   		</div>
					          	   		<div class="col-sm-4">
					          	   			<div class="form-group">
					          	   			  <label for="player_one_score1_letter">Score 1 Letra:</label>
					          	   			  <input type="text" class="form-control" id="player_one_score1_letter" name="player_one_score1_letter" value="<?php echo $week_versus->player_one_score1_letter; ?>" <?php echo $p2_readonly; ?>>
					          	   			</div>
					          	   		</div>
					          	   		<div class="col-sm-8">
					          	   			<div class="form-group">
					          	   			  <label for="player_one_score2">Score 2:</label>
					          	   			  <input type="number" class="form-control" id="player_one_score2" name="player_one_score2" value="<?php echo $week_versus->player_one_score2; ?>" <?php echo $p2_readonly; ?>>
					          	   			</div>
					          	   		</div>
					          	   		<div class="col-sm-4">
					          	   			<div class="form-group">
					          	   			  <label for="player_one_score2_letter">Score 2 Letra:</label>
					          	   			  <input type="text" class="form-control" id="player_one_score2_letter" name="player_one_score2_letter" value="<?php echo $week_versus->player_one_score2_letter; ?>" <?php echo $p2_readonly; ?>>
					          	   			</div>
					          	   		</div>
					          	   		<div class="col-sm-8">
					          	   			<div class="form-group">
					          	   			  <label for="player_one_score3">Score 3:</label>
					          	   			  <input type="number" class="form-control" id="player_one_score3" name="player_one_score3" value="<?php echo $week_versus->player_one_score3; ?>" <?php echo $p2_readonly; ?>>
					          	   			</div>
					          	   		</div>
					          	   		<div class="col-sm-4">
					          	   			<div class="form-group">
					          	   			  <label for="player_one_score3_letter">Score 3 Letra:</label>
					          	   			  <input type="text" class="form-control" id="player_one_score3_letter" name="player_one_score3_letter" value="<?php echo $week_versus->player_one_score3_letter; ?>" <?php echo $p2_readonly; ?>>
					          	   			</div>
					          	   		</div>
					          		</div>
					        </div>
					      </div>
					    </div>
					    <div class="card">
					      <div class="card-header">
					        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThreea">
					          Imagenes (proximamente)
					        </a>
					      </div>
					      <div id="collapseThreea" class="collapse" data-parent="#accordion2">
					        <div class="card-body">
					         	<!-- Screenshots -->
					         	<div class="custom-file mb20">
					         	    <input type="file" class="custom-file-input" id="customFile" multiple accept='image/*' name="images_p2">
					         	    <label class="custom-file-label" for="customFile">Seleccionar 3 Imagenes</label>
					         	</div>
					        </div>
					      </div>
					    </div>
					  </div>
		</div>
				  	
		<!-- FIN DATA P2 -->
	</div>
	<div class="row row_score_photos">
		<div class="col-sm-12">
			<div class="owl-carousel">
			  <div class="image_score_holder">
			  	<h6>Score 1 Casa</h6>
			  	<div class="image_score" style="background-image: url(<?php echo SITE; ?>img/default_score.png);">
			  		
			  	</div>
			  </div>
			  <div class="image_score_holder">
			  	<h6>Score 2 Casa</h6>
			  	<div class="image_score" style="background-image: url(<?php echo SITE; ?>img/default_score.png);">
			  		
			  	</div>
			  </div>
			  <div class="image_score_holder">
			  	<h6>Score 3 Casa</h6>
			  	<div class="image_score" style="background-image: url(<?php echo SITE; ?>img/default_score.png);">
			  		
			  	</div>
			  </div>
			  <div class="image_score_holder">
			  	<h6>Score 1 Visita</h6>
			  	<div class="image_score" style="background-image: url(<?php echo SITE; ?>img/default_score.png);">
			  		
			  	</div>
			  </div>
			  <div class="image_score_holder">
			  	<h6>Score 2 Visita</h6>
			  	<div class="image_score" style="background-image: url(<?php echo SITE; ?>img/default_score.png);">
			  		
			  	</div>
			  </div>
			  <div class="image_score_holder">
			  	<h6>Score 3 Visita</h6>
			  	<div class="image_score" style="background-image: url(<?php echo SITE; ?>img/default_score.png);">
			  		
			  	</div>
			  </div>
			</div>
		</div>
	</div>
				</form>
</div>
<?php include ABSPATH.'views/footer.php'; ?>