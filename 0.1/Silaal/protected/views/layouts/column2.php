<?php $this->beginContent('//layouts/main'); ?>
<div class="span-24 prepend-top" id="main_container">
	<?php
	    foreach(Yii::app()->user->getFlashes() as $key => $message) {
	        echo '<div class="flash-' . $key . '">' . Yep::t($message) . "</div>\n";
	    }
	?>
	<?php //$this->renderPartial("/layouts/left-sidebar"); ?>
    <!--end of left-sidebar-->
    <div class="span-19" id="main">
     <?php echo $content;?>
    </div>
    <!-- end of main-->
    <?php $this->renderPartial("/layouts/right-sidebar");?>
    <!--end of right-sidebar-->
  </div>
  <!--end of main_container-->
<?php $this->endContent(); ?>