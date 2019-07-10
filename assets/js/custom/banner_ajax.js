$(document).ready(function(){
	

	$(".bannerBtn").on("click", function()
	{   

		var banner_data= $(this).val();
		var banner_array = banner_data.split("_");
		var action = banner_array[0];
		var id = banner_array[1];
		
		if(action != "" || id != ""){
	 	 	bannerStatusUpdate($(this),action,id);
		}

	});


	function bannerStatusUpdate(btnitself,action,id){
		
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/bannerStatusUpdate",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:action,id:id
  			},		  
  		  success:function(data){
		  	
			if(data.query==true){
				
				//alert();
				


				if(data.action=='approve'){
					$(btnitself).removeClass('btn-success').addClass('btn-danger');
					$(btnitself).text('Reject');
					var btnvalue='block_'+data.id;
					$(btnitself).val(btnvalue);
				}
				else if(data.action=='block'){
					$(btnitself).removeClass('btn-danger').addClass('btn-success');
					$(btnitself).text('Accept');
					var btnvalue='approve_'+data.id;
					$(btnitself).val(btnvalue);
				}
				else if(data.action=='delete'){
					$(btnitself).closest('tr').fadeOut();
				}

		  	}
		  },
    	  error:function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		  ,
		});
	}
});
