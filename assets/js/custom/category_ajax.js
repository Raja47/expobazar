
$(document).ready(function(){
	

	$("#myTable").on("click",".catBtn", function()
	{   

		var cat_data= $(this).val();
		var cat_array = cat_data.split("_");
		var action = cat_array[0];
		var id = cat_array[1];
		
		if(action != "" || id != ""){
	 	 	categoryStatusUpdate($(this),action,id);
		}

	});


	function categoryStatusUpdate(btnitself,action,id){
		
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/categoryStatusUpdate",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:action,id:id
  			},		  
  			success:function(data){
		  	
			if(data.query==true){
			//var tid = $(this).closest('tr').find('td:eq(2)').text();
    		//var td = $(this).val(); //find table id
    		//console.log(tid);	
				if(data.action=='block'){
					$(btnitself).removeClass('btn-danger').addClass('btn-success');
					$(btnitself).text('Approve');
					var btnvalue='approve_'+data.id;
					$(btnitself).val(btnvalue);	
				}
				else if(data.action='approve'){
					$(btnitself).removeClass('btn-success').addClass('btn-danger');
					$(btnitself).text('Block');
					var btnvalue='block_'+data.id;
					$(btnitself).val(btnvalue);
				}
		  	}
		  	else {
		  		
		  	}
		  },
    	  error: function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		  ,
		});
	}


	$(".subCatBtn").on("click", function()
	{   

		var cat_data= $(this).val();
		var cat_array = cat_data.split("_");
		var action = cat_array[0];
		var id = cat_array[1];
		
		if(action != "" || id != ""){
	 	 	subcategoryStatusUpdate($(this),action,id);
		}

	});


	function subcategoryStatusUpdate(btnitself,action,id){
		
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/subCategoryStatusUpdate",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:action,id:id
  			},		  
  			success:function(data){
		  	
			if(data.query==true){
				if(data.action=='block'){
					$(btnitself).removeClass('btn-danger').addClass('btn-success');
					$(btnitself).text('Approve');
					var btnvalue='approve_'+data.id;
					$(btnitself).val(btnvalue);	
				}
				else if(data.action='approve'){
					$(btnitself).removeClass('btn-success').addClass('btn-danger');
					$(btnitself).text('Block');
					var btnvalue='block_'+data.id;
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


    ///*** Category Related  ajax functions ***////
    ////**********************************************////


	$("#myTable").on("click",".catDelete", function()
	{   

		var cat_data= $(this).val();
		var cat_array = cat_data.split("_");
		var action = cat_array[0];
		var id = cat_array[1];

		var currow = $(this).closest('tr');
		//var col1 = currow.find('td:eq(0)').text();
		//var col2 = currow.find('td:eq(2)').text();
		//alert(col1);

		
		if(action != "" || id != ""){
	 	 	categoryDelete($(this),action,id);
		}

	});

	$(document).on("click",".catEdit",function(e){
      var cat_data= $(this).val();
	  var cat_array = cat_data.split("_");
	  var action = cat_array[0];
	  var id = cat_array[1];
	  //alert(id);
		if(action != "" || id != ""){
			singleCategory(action,id);
		}
	});
	
	$('#form_update').submit(function(e){
	  
	  e.preventDefault();
  	  var name=$('#cat_new_title').val(); // for catefory
  	  //var filename = $('input[type=file]').val().split('\\').pop();
  	  //var filename = 'cat_image';
	  var image=$('#cat_new_image').val();
	  var id = $("#updateId").val();
	  var action = $("#action").val();
	  //alert(action);

      let form_data = document.getElementById('form_update'); 

      //$('#form_update');
      let formData = new FormData(form_data);

      
	  	
	  //console.log(formData);
	  //alert(image);
      //var cat_data= $(this).val();
	  //var cat_array = cat_data.split("_");
	  //var action = cat_array[0];
	  //var id = cat_array[1];
		if(action != "" && id != ""){
			if(name != "" && image == ''){
				//alert('update just name');
				updateCategory(name,action,id);
			}
			else if(name != "" && image != ''){
				$.ajax({
				   url: BASE_URL+'admin/updateCategoryintoDb',
				   type: 'POST',
				   data: formData,
				   dataType: 'json',
				   contentType: false,
				   processData: false,
				   success: function (result){
					console.log(result);
					var row = $('#tr_' + id);
	        		var col1 = row.find('td:eq(0)').html(name);
	        		var col2 = row.find('td:eq(1)').html();
	        		var img = $('#tr_' + id+' img').attr('src',BASE_URL+result.picture);
	        		$("#editcatmodal").modal('hide');
	        		console.log(img);
				   },
			       error: function(xhr, status, error) {
			    	  	console.log(error);
				   }
								
				//updateCategoryImage(action,id);
				//updateCategory(name,action,id);

			})
			}
		}
	});
	

	


    ///***Sub Category Related  ajax functions ***////
    ////**********************************************////
  
  	$("#myTable").on("click",".subCatDelete", function(){  
		var cat_data= $(this).val();
		var cat_array = cat_data.split("_");
		var action = cat_array[0];
		var id = cat_array[1];
		var currow = $(this).closest('tr');
		//var col1 = currow.find('td:eq(0)').text();
		//var col2 = currow.find('td:eq(2)').text();
		//alert(col1);		
		if(action != "" || id != ""){
			//alert('no');
	 	 	categoryDelete($(this),action,id);
		}
	});
  	
  	$(document).on("click",".subCatEdit",function(e){
      var cat_data= $(this).val();
	  var cat_array = cat_data.split("_");
	  var action = cat_array[0];
	  var id = cat_array[1];
	  var catid=cat_array[2];
	  // var subCatSelectOptions;
	  // $.each(subCatSelectOptions, function(idx, obj){ 
	  // 	subCatSelectOptions += "<option value='"+obj+"' > "+ obj +"</option>";
   //    });
	  // console.log(subcategories);
	  // subcategories.forEach(function (subCat){
	  // 	subCatSelectOptions += "<option value='"+ subCat.id +"' > "+ subCat.name +"</option>";
	  // });
	  //$("#cat_new_select").html(subCatSelectOptions);
		if(action != "" || id != ""){
			//alert('hi');
			singleCategory(action,id,catid);
		}
	});
  	
	$('#subcat_form').submit(function(e){
	  
	  e.preventDefault();
  	  var name=$('#cat_new_title').val(); // for catefory
  	  //var filename = $('input[type=file]').val().split('\\').pop();
  	  //var filename = 'cat_image';
	  var image=$('#cat_new_image').val();
	  var id = $("#updateId").val();
	  var cat_type = $("#cat_type").val();
	  var main_cat_data = $('#cat_new_select').val();
	  //alert(main_cat_data); // for subcategory
	  var main_cat_array =main_cat_data.split("_");
	  var cat_new_select_id = main_cat_array[0];
	  var subcat_new_cat = main_cat_array[1];
	  //alert(cat_new_select_id);

      let form_data = document.getElementById('subcat_form'); 

      //$('#form_update');
      let formData = new FormData(form_data);

      
	  	
	  //console.log(formData);
	  //alert(image);
      //var cat_data= $(this).val();
	  //var cat_array = cat_data.split("_");
	  //var action = cat_array[0];
	  //var id = cat_array[1];
		if(cat_type == "subcategory" && id != ""){
			if(name != "" && image == ''){
				//alert(cat_type+'hi');
				updateCategory(name,cat_type,id,cat_new_select_id,subcat_new_cat);
			}
			else if(name != "" && image != ''){
				//alert('name and image');
				$.ajax({
				   url: BASE_URL+'admin/updateCategoryintoDb',
				   type: 'POST',
				   data: formData,
				   dataType: 'json',
				   contentType: false,
				   processData: false,
				   success: function (result){
				   	
					if(result.action == 'update' && cat_type==false){
					//alert(result);
					var row = $('#tr_' + id);
	        		var col1 = row.find('td:eq(0)').html(name);
	        		var col2 = row.find('td:eq(1)').html();
	        		var img = $('#tr_' + id+' img').attr('src',BASE_URL+result.picture);
	        		$("#editcatmodal").modal('hide');
	        		}
	        		else if(cat_type == 'subcategory'){
	        			//alert('here');
	        			console.log(result);
					var row = $('#tr_' + id);
	        		var col1 = row.find('td:eq(0)').html(name);
	        		var col3 = row.find('td:eq(2)').html(subcat_new_cat);
	        		var img = $('#tr_' + id+' img').attr('src',BASE_URL+result.picture);
	        		$("#edit_sub_cat_modal").modal('hide');
	        		//alert(img);	        		
	        		}
				   },
			       error: function(xhr, status, error) {
			    	  	alert(error);
				   }
				 });
				
				//updateCategoryImage(action,id);
				//updateCategory(name,action,id);

			}
			
		}
	});



    ///***Products Related  ajax functions ***////
    ////**********************************************////

$("#myTable").on("click",".productDelete", function()
	{   

		var product_data= $(this).val();
		var product_array = product_data.split("_");
		var action = product_array[0];
		var id = product_array[1];

		var currow = $(this).closest('tr');
		//var col1 = currow.find('td:eq(0)').text();
		//var col2 = currow.find('td:eq(2)').text();
		//alert(col1);

		
		if(action != "" || id != ""){
	 	 	procuctDelete($(this),action,id);
		}

	});
	
	function procuctDelete(btnitself,action,id){
		///alert(action+id);
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/productDelete",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:action,id:id
  			},		  
  			success:function(data){
  				console.log(data);
		  	
			if(data.result == true){
				//alert();
					currow = (btnitself).closest('tr');
					currow.remove(); 
				}
		  },
    	  error: function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		  ,
		});
	}

	$(document).on("click",".orderEdit",function(e)
	{
	   
   	   var product_data= $(this).val();
	   var product_array = product_data.split("_");
	   var id = product_array[1];
	   $("#updateId").val(id);

	  	
	});
	

	
	
	$('#form_ordupdate').submit(function(e){ 
	  
	  e.preventDefault();
	  //var id = $("#updateId").val();
	  var product_new_select = $('#order_new_select').val(); 
	  let form_data = document.getElementById('form_ordupdate'); 
      let formData = new FormData(form_data);

       		
      $.ajax({
	        type:'post',
	        dataType:'json',
	        data:formData,
	        url: BASE_URL+"admin/orderStatusUpdate",
	  		contentType: false,
			processData: false,      		
	    
	        success:function(data){
	        	window.location.reload();
	        	
	        },
	        error: function(xhr, status, error) {
	    	  	alert(error);
			}


	    });
      	
	});
	
	$(document).on("click",".productEdit",function(e)
	{
      var product_data= $(this).val();
	  var product_array = product_data.split("_");
	  var action = product_array[0];
	  var id = product_array[1];
	  var subcat_id=product_array[2];
		if(action != "" || id != "")
		{
			singleProduct(action,id,subcat_id);
		}
	});
	function singleProduct(action,id,subcat_id){
		$.ajax({
	        type:'post',
	        dataType:'json',
	        url: BASE_URL+"admin/singleProduct",
	        data:{action:action,id:id,subcat_id:subcat_id},
	        success:function(data){
		        if(data.action == 'product'){

		        	$("#edit_product_modal").modal('show');		
					var subCatSelectOptions;
					var selected='';
					subCatSelectOptions="<option  value=''>All Categories</option>";
					var temp='none';

					$.each(data.query_for_select, function(index,obj) 
					{	
	    				if(obj.cat_name != temp)
	    				{
	  						subCatSelectOptions+="<option  style='background-color:#E9E9E9;font-weight:bold;' disabled='disabled'>"+obj.cat_name+"</option>";
	    				}    
	     				temp=obj.cat_name;
	     				if(obj.subcat_id==subcat_id)
	     				{
	   					 	selected='selected';
	   					}	
	    				subCatSelectOptions+="<option value='"+obj.subcat_id+"' "+selected+" >"+obj.subcat_name+"</option>";
	    				selected='';    				
					});

					$("#product_new_select").html(subCatSelectOptions);
		        	$("#product_new_title").val(data.query.product_title);
		        	$("#product_new_brand").val(data.query.brand_name);
		        	$("#product_new_description").val(data.query.description);
		        	$("#product_new_price").val(data.query.sale_price);
		        	$("#product_new_discount").val(data.query.discount_percentage);
		        	$("#product_new_features").val(data.query.features);
		        	$("#action").val('product');
		        	$("#updateId").val(id);

		        	var count=1;
					$.each(data.pictures, function(index,obj) 
					{	
						$("#product_image_"+count).attr('src',BASE_URL+obj.pic_location);
						$("#productImage"+count).attr('value',obj.pic_id);
						count++;
					});
		        }
	        },
	        error: function(xhr, status, error) {
	    	  	alert(error+status);
			}
	    });
	}

	$('#form_prdupdate').submit(function(e){ 
	  
	  e.preventDefault();
	  var id = $("#updateId").val();
	  var action = $("#action").val();  	 
  	  var product_new_title=$('#product_new_title').val(); 
	  var product_new_brand =  $("#product_new_brand").val();
	  var product_new_description =  $("#product_new_description").val();
	  var product_new_price =  $("#product_new_price").val();
	  var product_new_discount =  $("#product_new_discount").val();
	  var product_new_features =  $("#product_new_features").val();
	  var product_new_select = $('#product_new_select').val();
	 
	  let form_data = document.getElementById('form_prdupdate'); 
      let formData = new FormData(form_data);
   //    		
      $.ajax({
	        type:'post',
	        dataType:'json',
	        data:formData,
	        url: BASE_URL+"admin/updateProduct",
	        contentType: false,
			processData: false,
	        		// id:id,
	        		// product_new_select:product_new_select,
	        		// action:action,
	        		// product_new_title:product_new_title,
	        		// product_new_description:product_new_description,
	        		// product_new_brand:product_new_brand,
	        		// product_new_price:product_new_price,
	        		// product_new_discount:product_new_discount,
	        		// product_new_features:product_new_features
	        	
	    
	        success:function(data){

	        	$("#edit_product_modal").modal('hide');
		        	/*console.log(data);
	        	
		        if(data.action == 'update'){
		        $("#editcatmodal").modal('hide');
		        var row = $('#tr_' + id);
		        var col1 = row.find('td:eq(0)').html(data.cat_name);
		        }
		        else if(data.action == 'subcategory'){
		        $("#edit_sub_cat_modal").modal('hide');
		        var row = $('#tr_' + id);
		        var col1 = row.find('td:eq(0)').html(data.cat_name);
				
		        var col2 = row.find('td:eq(2)').html(subcat_new_cat);
				
		        }*/
	        },
	        error: function(xhr, status, error) {
	    	  	alert(error);
			}


	    });
      	// var prd_old_pic1=$("#product_image_1").attr('src');
      	// var prd_old_pic2=$("#product_image_2").attr('src');
      	// var prd_old_pic3=$("#product_image_3").attr('src');
      	// var prd_old_pic4=$("#product_image_4").attr('src');
      	// var prd_old_pic5=$("#product_image_5").attr('src');
      	// //alert(prd_old_pic1+)

	    
   //    	$.ajax({
		 //   url: BASE_URL+'admin/updateProductIntoDb',
		 //   type: 'POST',
		 //   data: formData,
		 //   dataType: 'json',
		 //   contentType: false,
		 //   processData: false,
		 //   success: function (result)
		 //   {
			// 	if(result.action == 'update' && cat_type==false){
			// 	//alert(result);
			// 		var row = $('#tr_' + id);
		 //    		var col1 = row.find('td:eq(0)').html(name);
		 //    		var col2 = row.find('td:eq(1)').html();
		 //    		var img = $('#tr_' + id+' img').attr('src',BASE_URL+result.picture);
		 //    		$("#editcatmodal").modal('hide');
		 //    	}
	  //   		else if(cat_type == 'subcategory'){
	  //   			//alert('here');
	  //   			console.log(result);
			// 		var row = $('#tr_' + id);
		 //    		var col1 = row.find('td:eq(0)').html(name);
		 //    		var col3 = row.find('td:eq(2)').html(subcat_new_cat);
		 //    		var img = $('#tr_' + id+' img').attr('src',BASE_URL+result.picture);
		 //    		$("#edit_sub_cat_modal").modal('hide');
		 //    		//alert(img);	        		
	  //   		}
		 //   },
	  //      error: function(xhr, status, error) 
	  //      {
	  //   	  	alert(error);
		 //   }
		 // });		
	});		 
			//}
			// else if(prd_pic_1 != '' && prd_pic_2 != '' && prd_pic_3 != ''
			// 	&& prd_pic_4 != '' && prd_pic_5 != ''){
			// 	alert('name and image');
			// 	
			// 	//updateCategoryImage(action,id);
			// 	//updateCategory(name,action,id);

			// }			
		
	  /*
	  var main_product_array =main_product_data.split("_");
	  var product_new_select_id = main_product_array[0];
	  var product_new_subcat = main_product_array[1];
	  */
	  // //alert(product_new_select+' '+id);

       //console.log(formData);
	  //alert(image);
      //var cat_data= $(this).val();
	  //var cat_array = cat_data.split("_");
	  //var action = cat_array[0];
	  //var id = cat_array[1];
	 	
	

///*** These functions are going to be used in each fuction to prevent avoid repeatation of same block of code in ajax functions ***/////
    ////**********************************************////
	

	function categoryDelete(btnitself,action,id){
		///alert(action+id);
		$.ajax({
  			type: 'post',
  			dataType:'json',
  			url: BASE_URL+"admin/categoryDelete",  //BASE_URL a js variable already defined in header of the file
  			data:{
  				action:action,id:id
  			},		  
  			success:function(data){
  				console.log(data);
		  	
			if(data.query == true){
				//alert();
					currow = (btnitself).closest('tr');
					currow.remove(); 
				}
		  },
    	  error: function(xhr, status, error) {
    	  	alert("error in ajax call");
		  }
		  ,
		});
	}

	function singleCategory(action,id,catid=2){
		//alert(id);
		$.ajax({

	        type:'post',
	        dataType:'json',
	        url: BASE_URL+"admin/singleCategory",
	        data:{action:action,id:id},
	        success:function(data){
	        	
	        	if(data.action == 'category'){
	        		//alert(action);
	        		
			        $("#editcatmodal").modal('show');
			        $("#cat_new_title").val(data.query.name);
			        $("#cat_image").attr('src',BASE_URL+data.query.pic_location);
			        $("#action").val('update');
			        $("#updateId").val(id);
		    	
		    	}
		        else if(data.action == 'subcategory'){
		        	console.log(data);
		        	
		        	$("#edit_sub_cat_modal").modal('show')		
					var subCatSelectOptions;
					var selected='';
					$.each(data.query_for_select, function(index,obj) 
					{	
						if(obj.id == catid){
							//alert(obj.id '==' catid);
							selected='selected';
						}
						else{
							//alert(obj.id '==' catid);
						}
						subCatSelectOptions += "<option value='"+obj.id+'_'+obj.name+"'"+ selected +" > "+ obj.name +"</option>";			    
						selected='';
					});
					$("#cat_new_select").html(subCatSelectOptions);
		        	$("#cat_new_title").val(data.query.name);
		        	$("#cat_image").attr('src',BASE_URL+data.query.pic_location);
		        	$("#action").val('update');
		        	$("#updateId").val(id);
		        }
	        },
	        error: function(xhr, status, error) {
	    	  	alert(error+status);
			}
	    });
	}

function updateCategory(name,action,id,catNewSelect=2,subcat_new_cat=5){
      $.ajax({
        type:'post',
        dataType:'json',
        url: BASE_URL+"admin/updateCategory",
        data:{name:name,action:action,id:id,catNewSelect:catNewSelect},
        success:function(data){
        	console.log(data);
        	
	        if(data.action == 'update'){
	        $("#editcatmodal").modal('hide');
	        var row = $('#tr_' + id);
	        var col1 = row.find('td:eq(0)').html(data.cat_name);
	        }
	        else if(data.action == 'subcategory'){
	        $("#edit_sub_cat_modal").modal('hide');
	        var row = $('#tr_' + id);
	        var col1 = row.find('td:eq(0)').html(data.cat_name);

	        var col2 = row.find('td:eq(2)').html(subcat_new_cat);

	        }
        },
        error: function(xhr, status, error) {
    	  	alert(error);
		}
      });
  	}

});
