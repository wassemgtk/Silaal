<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
	<?php
	    foreach(Yii::app()->user->getFlashes() as $key => $message) {
	        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	    }
	?>
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
    <?php
        $this->widget('ShoppingCartWidget'); 
        $this->widget('CategoriesWidget'); 
        //if(!Yii::app()->user->isGuest)  $this->widget('AdminWidget');
    
        ?>
        
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>