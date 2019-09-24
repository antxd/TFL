<?php include ABSPATH.'views/header.php'; ?>
<div class="container pt-5">
	<div class="row">
		<div class="col-sm-4">
			<div class="col-sm-12 bg-success border border-warning shadow rounded-lg p-5 text-center">
				<h4 class="text-light">Jugadores</h4>
				<h1 class="text-light mt-5"><?php echo $db->query("SELECT COUNT(*) as 'total_players' FROM `players`")->fetch(PDO::FETCH_OBJ)->total_players; ?></h1>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="col-sm-12 bg-success border border-warning shadow rounded-lg p-5 text-center">
				<h4 class="text-light">Versus</h4>
				<h1 class="text-light mt-5"><?php echo $db->query("SELECT COUNT(*) as 'total_versus' FROM `versus`")->fetch(PDO::FETCH_OBJ)->total_versus; ?></h1>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="col-sm-12 bg-success border border-warning shadow rounded-lg p-5 text-center">
				<h4 class="text-light">Semana Actual</h4>
				<h1 class="text-light mt-5">#<?php echo $db->query('SELECT ID FROM `weeks` WHERE week_status = 1')->fetch(PDO::FETCH_OBJ)->ID; ?></h1>
			</div>
		</div>
	</div>
</div>
<?php include ABSPATH.'views/footer.php'; ?>