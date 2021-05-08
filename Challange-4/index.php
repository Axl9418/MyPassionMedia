<!DOCTYPE html>
<html lang = "en">
<head>
	<title>List Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="items.js"></script>
</head>
<body>

<h2>Item List</h2>

<table>
	<tr>
		<th>Name</th>
		<th>Weight</th>
		<th>Length</th>
		<th>Width</th>
		<th>Height</th>
		<th>Action</th>
	</tr>
<?php
include 'db_connection.php';
$conn = StartCon();
	$list_items = "SELECT itemId, itemName, weight, length, width, height FROM Items";
	$result = $conn->query($list_items);
		
		if($result-> num_rows > 0){
			
			while($row = $result-> fetch_assoc()){
				echo "<tr>
					<input type='hidden' id='itemid' value=".$row["itemId"].">
					<td>
						<div id='itemname' class='edit edit-".$row["itemId"]."'>".$row["itemName"]."</div>
						<input id='itemname-edit".$row["itemId"]."' class='edit-save-".$row["itemId"]." edit-s' value=".$row["itemName"].">
					</td>
					<td>
						<div id='weight' class='edit edit-".$row["itemId"]."'>".$row["weight"]." kg"."</div>
						<input id='weight-edit".$row["itemId"]."' class='edit-save-".$row["itemId"]." edit-s' value=".$row["weight"].">
					</td>

					<td>
						<div id='length' class='edit edit-".$row["itemId"]."'>".$row["length"]." cm"."</div>
						<input id='length-edit".$row["itemId"]."' class='edit-save-".$row["itemId"]." edit-s' value=".$row["length"].">
					</td>

					<td>
						<div id='width' class='edit edit-".$row["itemId"]."'>".$row["width"]." cm"."</div>
						<input id='width-edit".$row["itemId"]."' class='edit-save-".$row["itemId"]." edit-s' value=".$row["width"].">
					</td>

					<td>
						<div id='height' class='edit edit-".$row["itemId"]."'>".$row["height"]." cm"."</div>
						<input id='height-edit".$row["itemId"]."' class='edit-save-".$row["itemId"]." edit-s' value=".$row["height"].">
					</td>
					
					<td>
						<input type='button' class='btn btn-edit' value='Edit' name=".$row["itemId"].">
						<input type='button' class='btn btn-edit-save edit-s edit-save-".$row["itemId"]."' value='Save' name=".$row["itemId"].">
					</td>
				</tr>";
			}
			
		}
CloseCon($conn);
?>
	
		
	
</table>
	<br>
	<button class='btn' onclick="window.location.href = 'new_item.html';">Add Item</button>  
</body>
</html>