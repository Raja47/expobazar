$(document).ready(function(){
	
	$(".wlbtn").on("click", function()
	{   

		var userid="40";
		var prdid= $(this).val();
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"user/caddToWishList",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				userId:userid,prdiId:prdid
  			},		  
  			success:function(data){
		  	
			if(data.result==true){
		  		alert('addded');//window.location.href = BASE_URL+"/admin/manageCategory/success";
		  	}
		  	else {
		  		alert('notadded');
				//window.location.href = BASE_URL+"/admin/manageCategory/danger";
		  	}
		  },
    	  error: function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		  ,
		});
	});



});



