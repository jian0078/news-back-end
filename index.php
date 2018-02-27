<?php 
require_once 'database.php';
//get path param info

$param= $_GET['param'];
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");

//we want to have four news api
// ./news/add        => Add a new news
// ./news/delete/'id'=> Delete a news by id
// ./news/update/'id'=> Update a news by id
// ./news            => Get all news
// ./news/'id'       => Get a news by id
// ./read/'id'       => Read a news


$pa =explode('/',$param);
//seperate the string to array
 if (!file_exists($pa[0].'.php')){
 	echo  "Sorrry , wrong route";
 	exit;
 }

require_once $pa[0].'.php';
// require_once 'news.php';

$handle_obj=new $pa[0]();
// $handle_obj=new news();

if(array_key_exists(1,$pa)){
	$method=$pa[1].'Method';
}
else{
	$method='defaultMethod';
}

// if thid param exist, pass the value
if(array_key_exists(2,$pa)){
	$handle_obj->$method($pa[2]);
}
else{
	$handle_obj->$method();;
}
// $method='getMethod';


// $handle_obj->$method();



 ?>