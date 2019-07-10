
$(document).ready(function(){
 
	$("#myTable").on("click", ".userbtn", function(){
		var ele_with_id = $(this).val();
		var ele_array = ele_with_id.split("_");
		var ele = ele_array[0];
		var id = ele_array[1];
		var type=ele_array[2];
		if(ele != "" || id != ""){
	 	 	
	 	 	userStatusUpdate($(this),ele,id,type);
		}
	});


	function userStatusUpdate(btniteself,ele,id,type){
				
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/userStatusUpdate",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:ele,ele_id:id,ele_type:type
  			},		  
  			success:function(data){


		  		if(data.type == 'vendor'){

					if(data.query == true && data.action == 'block' ){
				  		$(btniteself).removeClass('btn-danger').addClass('btn-success');
						$(btniteself).text('approve');
						var btnvalue='approve_'+data.id+'_'+data.type;
						$(btniteself).val(btnvalue);
				  	}
				  	else if(data.query == true && data.action == 'approve'){
				  		$(btniteself).removeClass('btn-success').addClass('btn-danger');
				  		$(btniteself).text('block');
				  		var btnvalue='block_'+data.id+'_'+data.type;
				  		$(btniteself).val(btnvalue);
				  	}
				}
				else if(data.type == 'buyer' ){
					
					if(data.query===true && data.action == 'approve'){
						$(btniteself).removeClass('btn-success').addClass('btn-danger');
				  		$(btniteself).text('block');
				  		var btnvalue='block_'+data.id+'_'+data.type;
				  		$(btniteself).val(btnvalue);
				  	}
				  	else if(data.query==true && data.action == 'block'){
						$(btniteself).removeClass('btn-danger').addClass('btn-success');
						$(btniteself).text('approve');
						var btnvalue='approve_'+data.id+'_'+data.type;
						$(btniteself).val(btnvalue);	
				  	}
				}  	
			},
    	  	error: function(xhr, status, error) {
    	  		alert(xhr.error);
		  	}
		  
		});
	}	
});
