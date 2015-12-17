 <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
  <?php if ($sf_user->isAuthenticated()): ?>
    <li>
     <a href="<?php echo url_for('@user_profile?username='.$sf_user->getUsername())?>" title="<?php echo __('my profile')?>"><?php echo $sf_user->getUsername()?></a>       </li>
     <li><?php echo link_to(__('sign out'), '@logout') ?></li>
  <?php else: ?>
    <li><?php echo link_to(__('sign in'), '@login') ?></li>
  <?php endif ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



