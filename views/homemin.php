<?php include 'header.php'; ?>
<div id="header_wrap">
  <div class="bgVideoF"></div>
  <div class="background bg2"></div>
  <div class="header_visual">
    <div class="row">
    <div class="col-sm-4 text-center">
        <img class="logoImg" src="<?php echo SITE ?>img/prime2.png" title="">
    </div>
    <div class="col-sm-4 text-center">
        <img class="logoImg" src="<?php echo SITE ?>img/piu_xx_logoM.png" title="">
    </div>
    <div class="col-sm-4 text-center">
        <img class="logoImg" src="<?php echo SITE ?>img/prime.png" title="">
    </div>
    </div>
  </div>
</div>
<div class="container">
  <h2 class="text-center font-italic">The Fundamental League - Administrator</h2>
  <div class="col-sm-4 offset-sm-4">
    <form class="ajax_form">
      <input type="hidden" name="action" value="sign-in-admin">
      <div class="resp">
        
      </div>
      <div class="form-group">
        <label for="iguser">Admin User:</label>
        <input type="text" class="form-control" id="Iguser" required name="iguser" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="Pwd" required name="pswd" autocomplete="off">
      </div>
      <button type="submit" class="btn btn-primary d-block mx-auto"><div class="loader lds-ellipsis"><div></div><div></div><div></div><div></div></div> Entrar</button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>