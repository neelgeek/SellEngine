<?php
require_once 'php/init.php';
$prod = new product();
if(input::exists('get'))
{
 $title = $_GET['title'];
if($prod->search(array('title'=>$title)))
{
  $res=$prod->results();
  foreach ($res as $value) 
  {
    echo "<br>" ,$value->title;
    echo "<br>" ,$value->price;
  }
}
else
{
	echo "No Result Found !";
}
}




?>