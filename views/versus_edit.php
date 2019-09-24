<?php include 'header.php'; 
$week_info = $db->prepare("SELECT * FROM `weeks` WHERE week_status = 1 LIMIT 1"); 
$week_info->execute();
$week_info = $week_info->fetch(PDO::FETCH_OBJ);
$weekID = $week_info->ID;
$week_versus = $db->prepare("SELECT * FROM `versus` WHERE ID = $versus_id");
$week_versus->execute();
$week_versus = $week_versus->fetch(PDO::FETCH_OBJ);
//var_dump($week_versus);
$p1_disable = $p1_readonly = '';
if ($week_versus->player_two == $uid) {
	$p1_disable = 'disabled'; $p1_readonly = 'readonly';
}
$p2_disable = $p2_readonly = '';
if ($week_versus->player_one == $uid) {
	$p2_disable = 'disabled'; $p2_readonly = 'readonly';			  	
}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<h3 class="text-center">Casa</h3>
			<span class="rounded-circle player_info shadow">
				<?php echo $app->get_player($week_versus->player_one)->player_name; ?>
			</span>
		</div>
		<div class="col-sm-6">
			<div class="card versus_info">
			    <div class="card-body text-center shadow-lg" data-toggle="popover" title="Descripción" data-content="<?php echo $week_info->week_description; ?>" data-placement="top">
			    	Semana #<?php echo ($week_info->ID < 9)? '0'.$week_info->ID : $week_info->ID ; ?>
			    	<h3><?php echo $week_info->week_title; ?></h3>
			    	<h4>vs</h4>
			    	<?php $app->versusStatus($week_versus->versus_status); ?>
			    </div>
			</div>
		</div>
		<div class="col-sm-3">
			<h3 class="text-center">Visita</h3>
			<span class="rounded-circle player_info shadow">
				<?php echo $app->get_player($week_versus->player_two)->player_name; ?>
			</span>
		</div>
		<div class="col-sm-12 space40"></div>
		<div class="col-sm-6 player_info_one">
			<h4 class="text-center">Detalles</h4>
				<form method="post">
					<input type="hidden" name="side" value="casa">
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
				  <?php if ($week_versus->player_one == $uid) { ?>
				  	 <button type="submit" class="btn btn-primary d-block mx-auto mt-4">Guardar</button>
				  <?php } ?>
				</form>
		</div>
		<!-- FIN DATA P1 -->
		<div class="col-sm-6 player_info_two">
			<h4 class="text-center">Detalles</h4>
				<form method="post">
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
				   <?php if ($week_versus->player_two == $uid) { ?>
				  	 <button type="submit" class="btn btn-primary d-block mx-auto mt-4">Guardar</button>
				  <?php } ?>
				</form>
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
</div>
<?php include 'footer.php'; ?>