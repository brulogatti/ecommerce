<?php

use HCode\Model\Product;
use HCode\Page;
use HCode\Model\Category;
Use HCode\Model\Cart;

$app->get('/', function() {

	$products = Hcode\Model\Product::listAll();
    
	$page = new Hcode\Page();

	$page->setTpl("index", [
		'products'=>Hcode\Model\Product::checkList($products)
	]);

});

$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;

	$category = new Hcode\Model\Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination["pages"]; $i++) { 
		array_push($pages,[
			"link"=>"/categories/".$category->getidcategory()."?page=".$i,
			"page"=>$i
		]);
	}

	$page = new Hcode\Page();

	$page->setTpl("category",array(
		"category"=>$category->getValues(),
		"products"=>$pagination["data"],
		"pages"=>$pages
	));

});

$app->get("/products/:desurl", function($desurl){
	$product = new Hcode\Model\Product();

	$product->getFromUrl($desurl);

	$page = new Hcode\Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);
});

$app->get("/cart", function(){
	$cart = Hcode\Model\Cart::getFromSession();

	$page = new Hcode\Page();

	$page->setTpl("cart");
});


?>