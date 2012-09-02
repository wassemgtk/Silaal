<?php 
$this->pageTitle=Yii::t("tln",Yii::app()->name);; 
$this->layout='//layouts/column2';
//$this->breadcrumbs=array('Dashboard'=>array('index'));
$this->menu=array(
	array('label'=>Yii::t("tln",'Categories'), 'url'=>array('category/admin')),
	array('label'=>Yii::t("tln",'Products'), 'url'=>array('products/admin')),
	);
?>

<font size="+2" face="Arial Black, Gadget, sans-serif">Welcome to Dashboard</font><br /><br />
<div class="span"> 

<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('msg', 'Administrate Categories'))); ?>
<?php $this->renderPartial('/category/admin'); ?>
<?php $this->endWidget(); ?>
</div>

<div class="span"> 
<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('msg', 'Administrate your Products'))); ?>
<?php $this->renderPartial('/products/admin'); ?>
<?php $this->endWidget(); ?>
</div>


