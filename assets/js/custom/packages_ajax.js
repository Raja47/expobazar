


$(document).ready(function(){
	

	$("#myTable").on("click",".packagebtn", function()
	{   

		var ele_with_id = $(this).val();
		var ele_array = ele_with_id.split("_");
		var ele = ele_array[0];
		var id = ele_array[1];
		
		if(ele != "" || id != ""){
	 	 	userStatusUpdate(ele,id);
		}

	});

	$("#myTable").on("click",".pkgRequestBtn", function()
	{   

		var ele_with_id = $(this).val();
		var ele_array = ele_with_id.split("_");
		var ele = ele_array[0];
		var id = ele_array[1];
		
		if(ele != "" || id != ""){
	 	 	requestStatusUpdate($(this),ele,id);
		}

	});


	function requestStatusUpdate(btnitself,ele,id){
		
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/packageRequestStatusUpdate",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:ele,ele_id:id
  			},		  
  			success:function(data){
		  	
			if(data.query==true){
		  		if(data.action=='approve'){
		  			$(btnitself).removeClass('btn-success').addClass('btn-danger');
					$(btnitself).text('Block');
					var btnvalue='block_'+data.id;
					$(btnitself).val(btnvalue);
		  		}
		  		else if(data.action=='block'){
					$(btnitself).removeClass('btn-danger').addClass('btn-success');
					$(btnitself).text('Approve');
					var btnvalue='approve_'+data.id;
					$(btnitself).val(btnvalue);	
		  		}
		  	}
		  	
		  },
    	  error: function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		  ,
		});
	}	
});
