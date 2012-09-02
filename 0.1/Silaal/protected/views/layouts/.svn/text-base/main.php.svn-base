<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Framework CSS -->
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.'/images/rss.jpg';?>"/>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/blueprint/screen.css';?>" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'blueprint/print.css';?>" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css/style.css'?>" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css/form.css'?>" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/js/jquery-1.7.2.min.js'?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/js/easySlider1.7.js'?>"></script>
	<script type="text/javascript">
	var j = jQuery.noConflict();
		j(document).ready(function(){	
			j("#slider").easySlider({
				auto: true, 
				continuous: true,
				numeric: true
			});
		});	
	</script>
    <link href="<?php echo Yii::app()->request->baseUrl.'/css/screen.css'?>" rel="stylesheet" type="text/css" media="screen" />	
    <script src="<?php echo Yii::app()->request->baseUrl.'/js/DD_roundies_0.0.2a-min.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl.'/js/DD_roundies_css.js';?>" type="text/javascript"></script>
    <title><?php if(isset($this->pageTitle))echo Yep::t(CHtml::encode($this->pageTitle)); else echo Yep::t(Yii::app()->name); ?></title>
</head>
<body>
<div class="container">
<div id="header" class="span-24">
    <div class="logo span-7 prepend-top last"> <a href="<?php echo Yii::app()->homeUrl;?>">
      <h1>Magezon</h1>
      </a> </div>
      
    <!--end of logo-->
    
    <div class="span-11 header-left"> 
    
      <ul class="account_info_links">
      <?php if(!Yii::app()->user->isGuest)echo '<li>'.CHtml::link(Yep::t('My Account'),array('user/view/'.Yii::app()->user->getId())).'</li>';?>
      <li><?php echo CHtml::link(Yep::t('My Cart'), array('/shoppingcart/view'));?></li>
      <li><?php // if(Yii::app()->user->isGuest) echo CHtml::link('Log In',array('site/login')); else echo CHtml::link('Log out('.Yii::app()->user->name.')',array('site/logout')); ?></li>
      <li><?php echo CHtml::link(Yep::t('Checkout'),array('/shoppingcart/checkout'));  ?></li>
      <li><?php echo Yii::app()->user->isGuest ? CHtml::link(Yep::t('Login'),array('/site/login')):CHtml::link(Yep::t('Logout'),array('/site/logout')); //.'('.Yii::app()->user->name.')'?></li>
      </ul>
      <span class="welcome_msg"><?php if(Yii::app()->user->isGuest) echo Yep::t('Welcome Guest'); else echo Yep::t('Welcome').' '.Yii::app()->user->name; ?></span>
      <ul class="language-currency">
      <li><?php Yep::renderLanguage();?></li>
      <li><?php Yep::renderCurrency(); ?></li>  
      </ul>
      <div class="clear"></div>
<!--       <div class="span-8 search border_radius8 last"> -->
<!--         <input type="text" value="Products search" class="border_radius8" /> -->
<!--         <input type="button" /> -->
<!--       </div> -->
    </div>
    <div class="clear"></div>
    
    <div id="mainmenu">
	<?php	$this->widget('ext.mbmenu.MbMenu',array('items'=>Yep::renderMenu()));?>
	</div><!-- mainmenu -->	 
    <div class="clear"></div>
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
  </div>
  
  <!--end of header-->
  <?php  echo $content; ?>
  <?php $this->renderPartial("/layouts/footer"); ?>
</div>
<!--end of container-->
</body>
</html>
