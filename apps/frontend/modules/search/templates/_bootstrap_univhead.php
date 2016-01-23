 <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>



        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

             <li><?php echo link_to(__('home'), '@homepage') ?></li>
              <li><?php echo link_to(__('news'), '@xeber_search') ?></li>
              <li><?php echo link_to(__('business'), '@biznes_search') ?></li>

             <?php if ($sf_user->isAuthenticated()): ?>
             <li>
               <a href="<?php echo url_for('@user_profile?username='.$sf_user->getUsername())?>" title="<?php echo __('my profile')?>"><?php echo $sf_user->getUsername()?></a> 
             </li>
             <li><?php echo link_to(__('sign out'), '@logout') ?></li>
             <?php else: ?>
             <li><?php echo link_to(__('sign in'), '@login') ?></li>
             <?php endif ?>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/images/icons/page/teker.png"/><span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <?php include_component('sfLanguageSwitch', 'get') ?>
                 <li class="first"><?php echo link_to(__('About'), '@about') ?></li>
                 <li class="first"><?php echo link_to(__('Contact us'), '@contact') ?></li>
                 <li class="first"><?php echo link_to(__('Investor'), '@investor') ?></li>
                 <li class="first"><?php echo link_to(__('Faq'), '@faq') ?></li>
                 <li class="first"><?php echo link_to(__('Submit your site'), '@submiturl') ?></li>
                 <li class="first"><?php echo link_to(__('Collaboration'), '@collaboration') ?></li>

              </ul>
            </li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

 <!-- Static navbar 
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div>
      </div>
    </nav>
-->
