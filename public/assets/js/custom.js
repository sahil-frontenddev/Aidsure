$(".loginusingemail a").click(function(){
	$(".loginusingotp").show();
	$(".loginusingemail").hide();
})

$(".loginusingotp a").click(function(){
	$(".loginusingemail").show();
	$(".loginusingotp").hide();
})

// var apiendpoint = 'http://aidsure.live/api/'; 
// var siteurl = 'http://aidsure.live/hospital2/'; 

var apiendpoint = 'http://localhost/hospital2/api/'; 
var siteurl = 'http://localhost/hospital2/'; 

function storeData(data,url){

	$.ajax({
            url: apiendpoint+url,
            type: "post",
            headers: {
                        'Accept': 'application/json',
            },
            data:data,
            async:false,
          }).done(function(res) {
          	// console.log(res.token.plainTextToken);
          	if(res.status == 'success'){
          		localStorage.setItem("ff_token", res.token);
          		location.href = siteurl+'customer/dashboard';	
          	}
          	else{
          		// alert(res.msg);
          		$('.valid-body').html('<li>'+res.msg+'</li>');
							$('#validationModal').modal('show');
          	}
          })
}

$(".customerlogin").click(function(){

	var data = $('form').serialize();
	storeData(data,'customer/login')
	
})


$(".customersignup").click(function(){
	$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
	}
		var data = $('form').serialize();
		console.log(data);
		storeData(data,'customer/signup')
	
})


function loginadmin(data,url){
	$.ajax({
            url: apiendpoint+url,
            type: "post",
            headers: {
                        'Accept': 'application/json',

            },
            data:data,
            async:false,
          }).done(function(res) {
          	// console.log(res.token.plainTextToken);
          	if(res.status == 'success'){
          		localStorage.setItem("ff_token", res.token);
          		location.href = siteurl+'admin/dashboard';
          	}
          	else{
          		
          		$('.valid-body').html('<li>'+res.msg+'</li>');
				$('#validationModal').modal('show');
          	}
          })
}

$(".adminlogin").click(function(){

	var data = $('form').serialize();
	console.log(data);
	loginadmin(data,'admin/login')
	
})

$(".logout").click(function(){

	$.ajax({
            url: apiendpoint+'admin/logout',
            type: "post",
            headers: {
                        'Accept': 'application/json',
            },
            async:false,
          }).done(function(res) {
          	// console.log(res.token.plainTextToken);
          	if(res.status == 'success'){
          		
          		location.href = siteurl+'admin/login';
          	}
          	else{
          		
          		$('.valid-body').html('<li>'+res.msg+'</li>');
				$('#validationModal').modal('show');
          	}
          })
	
})

$(".logout2").click(function(){

	$.ajax({
            url: apiendpoint+'admin/logout',
            type: "post",
            headers: {
                        'Accept': 'application/json',
            },
            async:false,
          }).done(function(res) {
          	// console.log(res.token.plainTextToken);
          	if(res.status == 'success'){
          		
          		location.href = siteurl+'customer/login';
          	}
          	else{
          		
          	}
          })
	
})

$(".createcenter").click(function(){

	$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
		return false;
	}

	var data = $('form').serialize();
	$.ajax({
            url: apiendpoint+'admin/addcenters',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('centers created successfullly');
          		location.href = siteurl+'admin/centers';
          	}
          	
          })
	
})

$(".createhospital").click(function(){

		$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
		return false;
	}

	var data = $('form').serialize();
	$.ajax({
            url: apiendpoint+'admin/addhospital',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('Family created successfullly');
          		location.href = siteurl+'admin/hospitals';
          	}
          	
          })
	
})

$(".createstore").click(function(){

	$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
		return false;
	}

	var data = $('form').serialize();
	$.ajax({
            url: apiendpoint+'admin/addnewmedicalstore',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('Medical Store created successfullly');
          		location.href = siteurl+'admin/medicalstores';
          	}
          	
          })
	
})

$(".addmore").click(function(){

	var numItems = $('.rowc').length;
	numItems = numItems+1;
	var html = '<div class="col-md-12 rowc"><div class="form-group col-md-4"><input type="text" name="member['+numItems+'][name]" class="form-control fname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" min="10" max="10"></div><div class="form-group col-md-4"><input type="text" name="member['+numItems+'][adh]" class="form-control adh" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Adhar Number"></div><div class="form-group col-md-4"><input type="text" name="member['+numItems+'][sign]" class="form-control sign" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Signature"></div></div>';
	$(".multile").append(html);

})


$(".createfamily").click(function(){
	$('.valid-body').html('');
	var html = '';
	var val = [];
	var val2 = [];
	var val3 	 = [];

	$(".fname").each(function(){
		if($(this).val().length < 6){
			val.push(1);
		}
	})
	$(".adh").each(function(){
		if($(this).val().length < 6){
			val2.push(1);
		}
	})
	$(".sign").each(function(){
		if($(this).val().length < 6){
			val3.push(1);
		}
	})

	if(val.length > 0){
		$('.valid-body').html('<li>Name Should Be minimum 6 character</li>');
		$('#validationModal').modal('show');
		return false;
	}
	if(val2.length > 0){
		$('.valid-body').html('<li>Adhar Number Should Be minimum 6 character</li>');
		$('#validationModal').modal('show');
		return false;
	}
	if(val2.length > 0){
		$('.valid-body').html('<li>Signature Should Be minimum 6 character</li>');
		$('#validationModal').modal('show');
		return false;
	}

	$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
		return false;
	}

	var data = $('form').serialize();

	$.ajax({
            url: apiendpoint+'customer/createfamily',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('Family created successfullly');
          		location.href = siteurl+'customer/family';
          	}
          	
          })
	
})

$(".createorder").click(function(){

		$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
		return false;
	}

	var data = $('form').serialize();

	console.log(data);

	$.ajax({
            url: apiendpoint+'customer/createorder',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            processData: false,
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('Order created successfullly');
          		location.href = siteurl+'customer/orders';
          	}
          	
          })
	
})

$(".createlaboratory").click(function(){

		$('.valid-body').html('');
	var vdata = $('form').serializeArray();
	var html = '';
	var val = [];
	for (const key of  vdata){
		if(key.value == "" && key.name != 'email'){
			val.push(key.value);
			html += '<li>'+key.name+' is requeired!</li>';
		}
		
	}
	if(val.length > 0){
		$('.valid-body').html(html);
		$('#validationModal').modal('show');
		return false;
	}

	var data = $('form').serialize();

	console.log(data);

	$.ajax({
            url: apiendpoint+'admin/addnewlaboratory',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            processData: false,
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('Laboratory created successfullly');
          		location.href = siteurl+'admin/laboratory';
          	}
          	
          })
	
})


$(".makeactive i").click(function(){
	
	var id = $(this).attr('data-id');
	var status = $(this).attr('data-status');

	var data = {id:id,status:status};

	$.ajax({
          url: apiendpoint+'admin/hospitalstatus/'+id+'/'+status,
          type: "get",
          headers: {
                      'Accept': 'application/json',
                      'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
          },
          processData: false,
          data:{},
          async:false,
        }).done(function(res) {
        	
        	if(res.status == 'success'){
        		
        		location.reload();
        		
        	}
        	
        })

})

$(".makeactivestore i").click(function(){
	
	var id = $(this).attr('data-id');
	var status = $(this).attr('data-status');

	var data = {id:id,status:status};

	$.ajax({
          url: apiendpoint+'admin/medicalstorestatus/'+id+'/'+status,
          type: "get",
          headers: {
                      'Accept': 'application/json',
                      'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
          },
          processData: false,
          data:{},
          async:false,
        }).done(function(res) {
        	
        	if(res.status == 'success'){
        		
        		location.reload();
        		
        	}
        	
        })

})

$(".makeactiveCenter i").click(function(){
	
	var id = $(this).attr('data-id');
	var status = $(this).attr('data-status');

	var data = {id:id,status:status};

	$.ajax({
          url: apiendpoint+'admin/centerstatus/'+id+'/'+status,
          type: "get",
          headers: {
                      'Accept': 'application/json',
                      'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
          },
          processData: false,
          data:{},
          async:false,
        }).done(function(res) {
        	
        	if(res.status == 'success'){
        		
        		location.reload();
        		
        	}
        	
        })

})

$(".makeactiveOrder i").click(function(){
	
	var id = $(this).attr('data-id');
	var status = $(this).attr('data-status');

	var data = {id:id,status:status};

	$.ajax({
          url: apiendpoint+'admin/orderstatus/'+id+'/'+status,
          type: "get",
          headers: {
                      'Accept': 'application/json',
                      'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
          },
          processData: false,
          data:{},
          async:false,
        }).done(function(res) {
        	
        	if(res.status == 'success'){
        		
        		location.reload();
        		
        	}
        	
        })

})
$(".makeactivelaboratory i").click(function(){
	
	var id = $(this).attr('data-id');
	var status = $(this).attr('data-status');

	var data = {id:id,status:status};

	$.ajax({
          url: apiendpoint+'admin/laboratorystatus/'+id+'/'+status,
          type: "get",
          headers: {
                      'Accept': 'application/json',
                      'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
          },
          processData: false,
          data:{},
          async:false,
        }).done(function(res) {
        	
        	if(res.status == 'success'){
        		
        		location.reload();
        		
        	}
        	
        })

})


											
function readFile() {
  
  if (this.files && this.files[0]) {
    
    var FR= new FileReader();
    
    FR.addEventListener("load", function(e) {
     
       $(".attachimage").val(e.target.result)

      var data = $('form').serialize();

		console.log(data);

      $.ajax({
            url: apiendpoint+'uploadimage',
            type: "post",
            headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer '+localStorage.getItem('ff_token'),
            },
            processData: false,
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		
          		$(".attachimage").val(res.image);
          		
          	}
          	
          })


    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  
}

document.getElementById("inp").addEventListener("change", readFile);



