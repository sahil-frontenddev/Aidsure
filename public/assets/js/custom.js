$(".loginusingemail a").click(function(){
	$(".loginusingotp").show();
	$(".loginusingemail").hide();
})

$(".loginusingotp a").click(function(){
	$(".loginusingemail").show();
	$(".loginusingotp").hide();
})

var apiendpoint = 'http://aidsure.live/api/'; 
var siteurl = 'http://aidsure.live/hospital2/'; 

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
          		localStorage.setItem("token", res.token);
          		location.href = siteurl+'customer/dashboard';
          	}
          	else{
          		// alert(res.msg);
          		$('.valid-body').html('<li>'+res.msg+'</li>');
				$('#validationModal').modal('show');
          	}
          })
}

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
$(".customerlogin").click(function(){

	var data = $('form').serialize();
	storeData(data,'customer/login')
	
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
          		localStorage.setItem("token", res.token);
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
                        'Authorization': 'Bearer '+localStorage.getItem('token'),
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
                        'Authorization': 'Bearer '+localStorage.getItem('token'),
            },
            data:data,
            async:false,
          }).done(function(res) {
          	
          	if(res.status == 'success'){
          		alert('Hospital created successfullly');
          		location.href = siteurl+'admin/hospitals';
          	}
          	
          })
	
})