$( document ).ready(function() {

    $("#btn-save").click(function(){
		var name 	= $("#itemname").val();
		var weight 	= $("#weight").val();
		var length 	= $("#length").val();
		var width 	= $("#width").val();
		var height 	= $("#height").val();
		var itemid 	= $("#itemid").val();
		
		if(name == '' || weight == ''|| length == ''|| width == ''|| height == ''){
			alert("Please, complete all the fields!");
			return;
		   }

			$.ajax({
				  method: "POST",
				  url: "itemscontrol.php",
				  data: { name: name,weight: weight,length: length,width: width,height: height, action: "new",itemid: itemid,  },
				 success:function(data){					 
					alert(data);
					window.location.href = 'index.php';
				 }

		  	});
	 });
	 

	$(".btn-edit-save").click(function(){	
		console.log(this.name);
		var itemid 	= this.name;
		var name = $("#itemname-edit"+this.name).val();
		var weight 	= $("#weight-edit"+this.name).val();
		var length 	= $("#length-edit"+this.name).val();
		var width 	= $("#width-edit"+this.name).val();
		var height 	= $("#height-edit"+this.name).val();

		if(name == '' || weight == ''|| length == ''|| width == ''|| height == ''){
			alert("Please, complete all the fields!");
			return;
		   }

			$.ajax({
				  method: "POST",
				  url: "itemscontrol.php",
				  data: { name: name,weight: weight,length: length,width: width,height: height, action: "update",itemid: itemid,  },
				 success:function(data){
					alert(data);
					window.location.href = 'index.php';
				 }

		  	});
     });
		
	var x = document.getElementsByClassName("edit-s");

		for (var i = 0; i < x.length; i++) {
		x[i].style.display = "none";
		}
	
	$(".btn-edit").click(function(){	
		
		$(".btn-edit-save").css("display","none");
		$(".btn-edit").css("display","none");
		$(".edit-s").css("display","none");
		$(".edit").css("display","block");
		
		var x = document.getElementsByClassName("edit-"+this.name);

			for (var i = 0; i < x.length; i++) {
			x[i].style.display = "none";
			}
		
		var x = document.getElementsByClassName("edit-save-"+this.name);

			for (var i = 0; i < x.length; i++) {
			x[i].style.display = "block";
			}
		
     });

});