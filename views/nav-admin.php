<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITE; ?>admin/">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITE; ?>admin/weeks">Semanas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITE; ?>admin/versus">Versus</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITE; ?>admin/players">Jugadores</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITE; ?>admin/out">Salir</a>
    </li>
  </ul>
</nav>
<br>
<div id="notify-placeholder" class="container">
    <?php $app->notify_helper(); ?>
</div>