<?php
$this->Widget('CTreeView', array(
	'data' => Category::getChilds(0),
	'animated' => 'fast',	
	'collapsed' => 'true',	
	'persist' => 'cookie',	
	));

?>
