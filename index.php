<?php
require 'config.php';
require 'vendor/autoload.php';
use flight\Engine;
$app = new Engine();
require 'helper.php';
require 'admin.php';
session_start();

$app->route('GET /', function() use ($app){
	if(!empty($_SESSION['tfl_player'])){
        $app->render('dash', array('ptitle' => 'Dash'));
        die();
    }
   	$app->render('home', array('ptitle' => 'Home'));
});

$app->route('GET /profile', function() use ($app){
	$app->checkAuth();
   	$app->render('profile', array('ptitle' => 'Profile'));
});
$app->route('POST /profile', function() use ($app){
	$app->checkAuth();
	$db = $app->db();
	$request = $app->request()->data;
	$uid = $_SESSION['tfl_player']['ID'];
	$versiones = '';
	if (!empty($request->player_versions)) {
		$versiones = serialize($request->player_versions);
	}
	$hashpass = password_hash($request->player_pass, PASSWORD_DEFAULT);
	$sql_users = "UPDATE `players` SET 
			`player_name` = '$request->player_name',
			`player_user` = '$request->player_user',
			`player_piuuser` = '$request->player_piuuser', ";
	if (!empty($request->player_pass)) {
			$sql_users .= " `player_pass` = '$hashpass', ";
	}
	$sql_users .= "
			`player_country` = '$request->player_country',
			`player_versions` = '$versiones' 
			WHERE `ID` = $uid";
	$stmt = $db->prepare($sql_users);
	$stmt->execute();
	$app->redirect('/profile');
	die();
   	//$app->render('profile', array('ptitle' => 'Profile')); */
});
$app->route('GET /versus-history', function() use ($app){
	$app->checkAuth();
   	$app->render('versus', array('ptitle' => 'Historial de Versus'));
});
$app->route('GET /versus-edit/@id', function($id) use ($app){
	$app->checkAuth();
   	$app->render('versus_edit', array('ptitle' => 'Editar Versus #'.$id, 'versus_id' => $id));
});
$app->route('POST /versus-edit/@id', function($id) use ($app){
	$app->checkAuth();
	$db = $app->db();
	$request = $app->request()->data;
	$uid = $_SESSION['tfl_player']['ID'];
	if ($request->side === 'casa') {
		$sql_one = "
				UPDATE `versus` SET
				`versus_song1`= '$request->versus_song1',
				`versus_song1l`= $request->versus_song1l,
				`versus_song1v`= $request->versus_song1v, 
				`versus_song3`= '$request->versus_song3',
				`versus_song3l`= $request->versus_song3l, 
				`versus_song3v`= $request->versus_song3v ";
				//scores
				if (!empty($request->player_one_score1)) {
					$sql_one .= ", `player_one_score1`= $request->player_one_score1 ";
				}
				if (!empty($request->player_one_score1_letter)) {
					$sql_one .= ", `player_one_score1_letter`= '$request->player_one_score1_letter' ";
				}
				if (!empty($request->player_one_score2)) {
					$sql_one .= ", `player_one_score2`= $request->player_one_score2 ";
				}
				if (!empty($request->player_one_score2_letter)) {
					$sql_one .= ", `player_one_score2_letter`= '$request->player_one_score2_letter' ";
				}
				if (!empty($request->player_one_score3)) {
					$sql_one .= ", `player_one_score3`= $request->player_one_score3 ";
				}
				if (!empty($request->player_one_score3_letter)) {
					$sql_one .= ",`player_one_score3_letter`= '$request->player_one_score3_letter' ";
				}

				$sql_one .= "WHERE `ID` = $id";
 		$stmt = $db->prepare($sql_one);
	}

	if ($request->side === 'visita') {
		$sql_two = "
				UPDATE `versus` SET
				`versus_song2`= '$request->versus_song2',
				`versus_song2l`= $request->versus_song2l,
				`versus_song2v`= $request->versus_song2v ";
				//scores
				if (!empty($request->player_two_score1)) {
					$sql_two .= ", `player_two_score1`= $request->player_two_score1 ";
				}
				if (!empty($request->player_two_score1_letter)) {
					$sql_two .= ", `player_two_score1_letter`= '$request->player_two_score1_letter' ";
				}
				if (!empty($request->player_two_score2)) {
					$sql_two .= ", `player_two_score2`= $request->player_two_score2 ";
				}
				if (!empty($request->player_two_score2_letter)) {
					$sql_two .= ", `player_two_score2_letter`= '$request->player_two_score2_letter' ";
				}
				if (!empty($request->player_two_score3)) {
					$sql_two .= ", `player_two_score3`= $request->player_two_score3 ";
				}
				if (!empty($request->player_two_score3_letter)) {
					$sql_two .= ",`player_two_score3_letter`= '$request->player_two_score3_letter' ";
				}

				$sql_two .= "WHERE `ID` = $id";
 		$stmt = $db->prepare($sql_two);
	}
	$stmt->execute();
	$app->redirect('/versus-edit/'.$id);
});

$app->route('POST /ajax', function() use ($app){
    $db = $app->db();
    $data = '';
    $request = $app->request()->data;
    $action = $request->action;
    switch ( $action ) {
        case 'sign-in-admin':
                $stmt = $db->prepare("SELECT * FROM admins WHERE `admin_user` = '{$request->iguser}' LIMIT 1"); 
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if(empty($user)){
                    $data = array( 'state' => 0,'action' => 'alert','param' => 
                    	'<div class="alert alert-warning">
					        <strong>Hey!</strong> Usuario Incorrecto 🤨.
					     </div>');
                    $app->json($data);
                    die();
                }else{
                    $hash = $user->admin_pass;
                    if (password_verify($request->pswd, $hash)) {
                        $_SESSION['tfl_admin'] = array(
                            'ID' => $user->ID,
                            'name' => $user->admin_user,
                            'liga_ID' => $user->liga_ID
                        );
                        $data = array('state' => 1,'action' => 'reload','param' => null);
                    } else {
                        $data = array('state' => 0,'action' => 'alert','param' => '<div class="alert alert-warning">
					        <strong>Hey!</strong> Contraseña Incorrecta 😓.
					     </div>');
                    }
                }
                $app->json($data);
            break;
        case 'sign-in':
                $stmt = $db->prepare("SELECT * FROM players WHERE `player_user` = '{$request->iguser}' LIMIT 1"); 
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if(empty($user)){
                    $data = array( 'state' => 0,'action' => 'alert','param' => 
                    	'<div class="alert alert-warning">
					        <strong>Hey!</strong> Usuario Incorrecto 🤨.
					     </div>');
                    $app->json($data);
                    die();
                }else{
                    if ($user->player_status === 0) {
                        $data = array( 'state' => 0,'action' => 'alert','param' => '<div class="alert alert-warning">
					        <strong>Hey!</strong> Usuario Inactivo 😒.
					     </div>');
                        $app->json($data);
                        die();
                    }
                    $hash = $user->player_pass;
                    if (password_verify($request->pswd, $hash)) {
                        $_SESSION['tfl_player'] = array(
                            'ID' => $user->ID,
                            'name' => $user->player_user,
                            'liga_ID' => $user->player_league
                        );
                        $data = array('state' => 1,'action' => 'reload','param' => null);
                    } else {
                        $data = array('state' => 0,'action' => 'alert','param' => '<div class="alert alert-warning">
					        <strong>Hey!</strong> Contraseña Incorrecta 😓.
					     </div>');
                    }
                }
                $app->json($data);
            break;
        case 'delete':
                $condval =  explode(':', $request->sqlcondval);
                $lead_chat = base64_encode($request->lead_chat);
                $stmt = $db->prepare( "DELETE FROM `mc_{$request->sqltable}` WHERE `$condval[1]` = $condval[0]"); 
                $stmt->execute();
                $data = array( 'state' => 0, 'action' => 'delete_item','param' => $request->domresp );
                $app->json($data);
                die();
            break;
        default:
                $app->json(array('state' => 0,'action' => null,'param' => null));
            break;
    }
});

$app->route('GET /out', function(){
  global $app;
  unset($_SESSION['tfl_player']);
  session_destroy();
  $app->redirect('/');
});

$app->start();