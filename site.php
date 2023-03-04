<?php

use HCode\Model\Product;
use HCode\Page;

$app->get('/', function() {

	$products = Hcode\Model\Product::listAll();
    
	$page = new Hcode\Page();

	$page->setTpl("index", [
		'products'=>Hcode\Model\Product::checkList($products)
	]);

});


?>