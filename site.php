<?php
use HCode\Page;

$app->get('/', function() {
    
	$page = new Hcode\Page();

	$page->setTpl("index");

});


?>