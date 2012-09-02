<?php
	if(!isset($this->breadcrumbs))
		$this->breadcrumbs = array(
Yep::t('msg'),
Yep::t('already registered'));
?>

<?php
echo CHtml::link(Yep::t('I am a new customer'), array(
			'/order/create', 'customer' => 'new'));
echo '<br />';
echo CHtml::link(Yep::t('I am a customer already'), array(
			'/site/login'));

