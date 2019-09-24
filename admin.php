<?php
$app->route('GET /admin/out', function(){
  global $app;
  unset($_SESSION['tfl_admin']);
  session_destroy();
  $app->redirect('/admin');
});

$app->route('GET /admin', function() use ($app){
    if(!empty($_SESSION['tfl_admin'])){
        $app->render('admin/dashmin', array('ptitle' => 'Dash'));
        die();
    }
    $app->render('homemin', array('ptitle' => 'Admin Login'));
});

$app->route('GET /admin/versus', function() use ($app){
    $app->checkAuth(true);
    $app->render('admin/admin_versus', array('ptitle' => 'Versus'));
});
$app->route('GET /admin/versus/@id', function($id) use ($app){
    $app->checkAuth(true);
    $app->render('admin/admin_versus_edit', array('ptitle' => 'Versus', 'id' => $id));
});

$app->route('GET /admin/weeks', function() use ($app){
    $app->checkAuth(true);
    $app->render('admin/admin_weeks', array('ptitle' => 'Semanas'));
});
$app->route('POST /admin/weeks', function() use ($app){
    $app->checkAuth(true);
    $db = $app->db();
    $request = $app->request()->data;
    if ($request->week_ID == 0) {
        $sql_weeks = "INSERT INTO `weeks`(`week_start`, `week_end`, `week_title`, `week_description`, `week_status`) VALUES 
        ('$request->week_start','$request->week_end','$request->week_title','$request->week_description',$request->week_status)";
        $stmt = $db->prepare($sql_weeks);
        $stmt->execute();
        $app->redirect('/admin/weeks');
        die();
    }
    if ( $request->week_status == 1) {
        $week_activa = $db->query('SELECT ID FROM `weeks` WHERE week_status = 1')->fetch(PDO::FETCH_OBJ)->ID;
        $db->query('UPDATE `weeks` SET week_status = 0 WHERE ID = '.$week_activa);
    }
    
    $sql_weeks = "UPDATE `weeks` SET 
            `week_start` = '$request->week_start',
            `week_end` = '$request->week_end',
            `week_title` = '$request->week_title',
            `week_description` = '$request->week_description',
            `week_status` = $request->week_status 
            WHERE `ID` = ".$request->week_ID;
    $stmt = $db->prepare($sql_weeks);
    $stmt->execute();
    $app->notify_helper_add(array('type' => 'success', 'expire' => time()+10, 'created' => time(), 'text' => '<strong>Semana actualizada exitosamente!</strong>.'));
    $app->redirect('/admin/weeks');
    die();
});

$app->route('GET /admin/players', function() use ($app){
    $app->checkAuth(true);
    $app->render('admin/admin_players', array('ptitle' => 'Jugadores'));
});
$app->route('GET /admin/players/@id', function($id) use ($app){
    $app->checkAuth(true);
    $app->render('admin/admin_players_edit', array('ptitle' => 'Jugador', 'id' => $id));
});
$app->route('POST /admin/players/@id', function($id) use ($app){
    $app->checkAuth(true);
    $db = $app->db();
    $request = $app->request()->data;
    $uid = $id;
    $versiones = '';
    if (!empty($request->player_versions)) {
        $versiones = serialize($request->player_versions);
    }
    $hashpass = password_hash($request->player_pass, PASSWORD_DEFAULT);
    if ($id == 0) {
        $sql_users = "INSERT INTO `players`(`player_name`, `player_user`, `player_piuuser`, `player_pass`, `player_country`, `player_versions`) 
        VALUES ('$request->player_name','$request->player_user','$request->player_piuuser','$hashpass','$request->player_country','$versiones')";
        $stmt = $db->prepare($sql_users);
        $stmt->execute();
        $app->redirect('/admin/players/'.$db->lastInsertId());
        die();
    }
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
    $app->notify_helper_add(array('type' => 'success', 'expire' => time()+10, 'created' => time(), 'text' => '<strong>Jugador actualizado exitosamente!</strong>.'));
    $app->redirect('/admin/players/'.$id);
    die();
});

$app->route('POST /admin/versus/@id', function($id) use ($app){
    $app->checkAuth(true);
    $db = $app->db();
    $request = $app->request()->data;
    $uid = $id;
    if ($id == 0) {
        $sql_versus = "INSERT INTO `versus`(`player_one`, `player_two`, `versus_week`, `versus_status`, `versus_score_one`, `versus_score_two`) 
        VALUES ($request->player_one,$request->player_two,$request->versus_week,$request->versus_status,$request->versus_score_one,$request->versus_score_two)";
        $stmt = $db->prepare($sql_versus);
        $stmt->execute();
        $app->redirect('/admin/versus/'.$db->lastInsertId());
        die();
    }
    $sql_versus = "UPDATE `versus` SET 
            `player_one` = $request->player_one,
            `player_two` = $request->player_two,
            `versus_week` = $request->versus_week,
            `versus_status` = $request->versus_status,
            `versus_score_one` = $request->versus_score_one,
            `versus_score_two` =  $request->versus_score_two 
            WHERE `ID` = $uid";
    $stmt = $db->prepare($sql_versus);
    $stmt->execute();
    $app->notify_helper_add(array('type' => 'success', 'expire' => time()+10, 'created' => time(), 'text' => '<strong>Versus actualizado exitosamente!</strong>.'));
    $app->redirect('/admin/versus/'.$id);
    die();
});
