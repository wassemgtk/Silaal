<?php
//$this->layout='//layouts/column2';
$this->breadcrumbs=array(
	Yii::t('msg', 'Dashboard')=>array('site/index'),
	
);

?>
<H1> Welcome to Dashboard </H1>
<div class="row">
<?php echo "<b>".CHtml::link("Create Featured Image",array('/image/createfeature'))."</b>";?>
</div>
<br>

	<div class="span-11" style="height:400px;"> 
	<?php $this->beginWidget('zii.widgets.CPortlet',
			array('title' => Yii::t('msg', 'Administrate Categories'))); ?>
	<?php $this->renderPartial('/category/admin'); ?>
	<?php $this->endWidget(); ?>
	</div>
	
	<div class="span-11" > 
	<?php $this->beginWidget('zii.widgets.CPortlet',
			array('title' => Yii::t('msg', 'Administrate your Products'))); ?>
	<?php $this->renderPartial('/products/admin'); ?>
	<?php $this->endWidget(); ?>
	</div>


<div class="row span-23" > 
<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('msg', 'Administrate Pending Orders'))); ?>
<?php $this->renderPartial('/order/admin'); ?>
<?php $this->endWidget(); ?>
</div>

<div class="row span-23" > 
<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('msg', 'Track your Order Prositions'))); ?>
<?php $this->renderPartial('/orderposition/admin'); ?>
<?php $this->endWidget(); ?>
</div>




