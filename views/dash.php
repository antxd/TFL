<?php include 'header.php'; 
$week_info = $db->prepare("SELECT * FROM `weeks` WHERE week_status = 1 LIMIT 1"); 
$week_info->execute();
$week_info = $week_info->fetch(PDO::FETCH_OBJ);
$weekID = $week_info->ID;
$week_versus = $db->prepare("SELECT * FROM `versus` WHERE player_one = $uid OR player_two = $uid AND versus_week = $weekID");
$week_versus->execute();
//var_dump($week_versus);
?>
<div class="container" id="versus_list">
	<div class="row">
		<div class="col-sm-8 offset-sm-2">
			<div class="card versus_info">
			    <div class="card-body text-center shadow" data-toggle="popover" title="Descripción" data-placement="top" data-content="<?php echo $week_info->week_description; ?>">
			    	Semana #<?php echo ($week_info->ID < 9)? '0'.$week_info->ID : $week_info->ID ; ?>
			    	<h3><?php echo $week_info->week_title; ?></h2>
			    </div>
			</div>
			<div class="mb-5"></div>
			<ul class="list-group">
				<?php 
					foreach ($week_versus->fetchAll() as $key => $versus) { 
						?>
						 <li class="list-group-item d-flex justify-content-between align-items-center">
						    <a href="<?php echo SITE; ?>versus-edit/<?php echo $versus->ID; ?>" class="">
								#<?php echo $versus->ID; ?> - 
								Casa: <?php echo $app->get_player($versus->player_one)->player_name; ?> 
								/ Visita: <?php echo $app->get_player($versus->player_two)->player_name; ?> 
							</a>
						    <?php $app->versusStatus($versus->versus_status); ?>
						</li>	
				<?php
					}
				?>
			</ul>
			<div class="list-group shadow-sm">
			
			</div>	
		</dib>
	</div>
</div>
<?php include 'footer.php'; ?>