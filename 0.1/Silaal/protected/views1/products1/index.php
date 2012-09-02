<?php
//$this->breadcrumbs=array(Yep::t('Products'),);
Yep::renderFlash();
Yep::renderFeaturImage();
?>
<div class="content span-14" style="border: 0px solid blue;">
<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
		
		
)); ?>
</div>

