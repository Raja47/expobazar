
$(document).ready(function(){
	

	$("#myTable").on("click",".prdbtn", function()
	{   

		var prd_data= $(this).val();
		var prd_array = prd_data.split("_");
		var action = prd_array[0];
		var id = prd_array[1];
		
		if(action != "" || id != ""){
	 	 	productStatusUpdate($(this),action,id);
		}

	});


	function productStatusUpdate(btnitself,action,id){
		
		
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/productStatusUpdate",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:action,id:id
  			},		  
  			success:function(data){
		  	
			if(data.query==true ){
				if(data.action=='approve'){
		  			$(btnitself).removeClass('btn-success').addClass('btn-danger');
					$(btnitself).text('Block');
					var btnvalue='block_'+data.id+'_buyer';
					$(btnitself).val(btnvalue);
		  		}
		  		else if(data.action=='block'){
					$(btnitself).removeClass('btn-danger').addClass('btn-success');
					$(btnitself).text('Approve');
					var btnvalue='approve_'+data.id+'_buyer';
					$(btnitself).val(btnvalue);	
		  		}
		  	}
		  		
		  	
		  },
    	  error: function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		
		});  
	}

});

