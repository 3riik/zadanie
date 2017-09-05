$(function(){

	self = this;
	Pusher.logToConsole = true;
	var pusher = new Pusher('3e3db88f7ac25cf01317', {
		cluster: 'eu',
		encrypted: true
	});
	var pusherChannel = pusher.subscribe('info-channel');
	pusherChannel.bind('UserRegistered', function(data) {
		alert('sdfasdf');
		console.log(data);
		//self.users.push(data.user);
	})		


	$('#register').on('submit',function(e){
		$.ajaxSetup({
			header:$('meta[name="_token"]').attr('content')
		})
		e.preventDefault(e);

			$.ajax({

				type:"POST",
				url:'register',
				data:$(this).serialize(),
				dataType: 'json',
				success: function(data){
					alert(""+data.responseText);
				},
				error: function(data){		
					var errors = data.responseJSON;	
					$("#ajaxResponse").removeClass("hidden");
					$("#ajaxResponse ul").empty();
					$.each( errors, function( key, value ) {
					    	$("#ajaxResponse ul").append("<li>" +value+ "</li>");
					    });											
				}
			})
	});

	
				
});