<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?>
        <div id="logout">
		<?php 
		 	
		//$data= Yii::app()->db->createCommand()->select("country_id,name,iso_code_2")->from("yc_country")->where("status='2'")->queryAll();
		?>
        <!--<form  method="post">
            <select name="country_code" onChange="this.form.submit()">
                <?php
               /* foreach($data as $row){
					if(strtolower($row['iso_code_2']) == Yii::app()->language)
					echo '<option selected="selected" value="'.$row['iso_code_2'].'">'.$row['name'].'</option>';					
					else
					echo '<option value="'.$row['iso_code_2'].'">'.$row['name'].'</option>';					
				}*/
				?>
            </select>
        </form>-->
		<?php //if(!Yii::app()->user->isGuest)echo CHtml::link('Logout ('.Yii::app()->user->name.')',array('/site/logout'));?> </div>
    </div>
        
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
		$menu = array(
				array('label'=>'Dashboard', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Catalog', 'url'=>array('/category/admin'),'visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Categories','url'=>array('/category/admin'),),
						array('label'=>'Products','url'=>array('/products/admin'),),//
						array('label'=>'Product Specifications','url'=>array('/productspecification/admin'),),
						array('label'=>'Shipping Methods','url'=>array('/shippingmethod/admin'),),
						array('label'=>'Payment Methods','url'=>array('/paymentmethod/index'),),
						array('label'=>'Tax','url'=>array('/tax/admin'),),
						array('label'=>'Featured Image','url'=>array('/image/featureadmin'),),
						array('label'=>'Create Static Pages','url'=>array('/staticpages/admin'),),
						),
					),
				/* array('label'=>'Extensions', 'visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'modules','url'=>array(''),),
						),
					), */
				array('label'=>'Sales', /*'url'=>array(''),*/'visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Orders','url'=>array('/order/admin'),),
						),
					),
				array('label'=>'System', 'url'=>array('/config/admin'),'visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Settings','url'=>array('/config/admin'),
							'items'=> array(
								array('label'=>'Site Configuration','url'=>array('config/admin'),),
								//array('label'=>'Currencies','url'=>array(''),),
								),
								),
						array('label'=>'Localization','url'=>array(''),
							'items'=> array(
								array('label'=>'Languages','url'=>array('/language/admin'),),
								array('label'=>'Currencies','url'=>array('/currency/admin'),),
								array('label'=>'Countries','url'=>array('/country/admin'),),
									
								),
							),
						array('label'=>'System users','url'=>array(''),
							'items'=> array(
								array('label'=>'Administrators','url'=>array('/administrator/admin'),),
								array('label'=>'Users','url'=>array('/user/admin'),),
								array('label'=>'Customers','url'=>array('/customer/admin'),),
								),
							),
						),
					),
				array('label'=>'Reports', 'url'=>array(''),'visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Products viewed','url'=>array('/productcounter/admin','ProductCounter_sort'=>'view_counter.desc'),),
						array('label'=>'Products Purchased','url'=>array('/productcounter/admin','ProductCounter_sort'=>'purchase_counter.desc'),),
						),
					),
				array('label'=>'Help','visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Support','url'=>'http://linkplusoffshore.com',),
						array('label'=>'Documentation','url'=>'http://www.yiiframework.com/doc/',),
						),
					),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					
			);
		$this->widget('ext.mbmenu.MbMenu',array(
			'items'=>$menu,)); ?>
	</div><!-- mainmenu -->
    
	<?php if(!Yii::app()->user->isGuest and isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    
  
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <strong>Silaal.com</strong>.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
