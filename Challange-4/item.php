<?php

include 'db_connection.php';

//Defining Class Item
class Item {

	//Attributes
	private $itemname;
	private $weight;
	private $length;
	private $width;
	private $height;
	private $itemid;
	//End Attributes


	//Defining getters and setters
	public function getItemname() {		
		return $this->itemname;
	   }
	  
	public function setItemname($itemname) {
		$this->itemname = $itemname;
		return $this;
	}


	public function getWeight() {
		return $this->weight;
	   }
	  
	public function setWeight($weight) {
		$this->weight = $weight;
		return $this;
	}

	public function getLength() {
		return $this->length;
	   }
	  
	public function setLength($length) {
		$this->length = $length;
		return $this;
	}

	public function getWidth() {
		return $this->width;
	   }
	  
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}

	public function getHeight() {
		return $this->height;
	   }
	  
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}

	public function getLocation() {
		return $this->location;
	   }
	  
	public function setLocation($location) {
		$this->location = $location;
		return $this;
	}

	public function getItemid() {
		return $this->itemid;
	   }
	  
	public function setItemid($itemid) {
		$this->itemid = $itemid;
		return $this;
	}
	//End getters and setters

	//Constructor
	public function __construct($itemname, $weight, $length, $width, $height, $itemid)
	{
		$this->itemname = $itemname;
		$this->weight = $weight;
		$this->length = $length;
		$this->width = $width;
		$this->height = $height;
		$this->itemid = $itemid;
	}

	//saveItem 
	public function saveitem ($item){	
	
		$conn = StartCon();
		$sql = "INSERT INTO Items (itemName, weight, length, width, height) VALUES ('".$item->getItemname()."', ".$item->getWeight().", ".$item->getLength().", ".$item->getWidth().", ".$item->getHeight().")";		
		
		if ($conn->query($sql) === TRUE) {
			echo "New item added successfully";
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		CloseCon($conn);
		
	}
	//End saveItem 

	//updateitem 
	public function updateitem ($item){
		$conn = StartCon();
		$sql = "UPDATE Items SET itemName = '".$item->getItemname()."', weight = ".$item->getWeight().", length = ".$item->getLength().", width = ".$item->getWidth().", height = ".$item->getHeight()." WHERE itemId = ".$item->getItemid()."";
		
		if ($conn->query($sql) === TRUE) {
			echo "Item updated successfully";
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		CloseCon($conn);
	}
	//End updateitem

}
//End class Item



?>