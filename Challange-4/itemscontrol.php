<?php

include 'item.php';
//Receiving data sent by Post method
$itemname = $_POST['name'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$length = $_POST['length'];
$width = $_POST['width'];
$action = $_POST['action'];
$itemid = $_POST['itemid'];

//Creating new object type Item
$item = new Item($itemname, $weight, $length, $width, $height, $itemid);

if ($action == 'new'){
	Item::saveitem($item);
}else if ($action == 'update'){
	Item::updateitem($item);
}

?>