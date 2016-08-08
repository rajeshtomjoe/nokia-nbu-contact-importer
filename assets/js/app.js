$(document).ready(function(){
	$("#trigger-file").click(function(){
	    $("input[type='file']").trigger('click');
	});

	var contacts;

	$("input[type='file']").on('change',function(){
		var el = $(this);
	    var file = this.files[0];
	    name = file.name;
	    size = file.size;
	    ext = name.slice((Math.max(0, name.lastIndexOf(".")) || Infinity) + 1);

	    if(file.name.length < 1) {
	    }
	    else if(file.size > 1000000) {
	        alert("The file is too big");
	    }
	    else if(ext != 'nbu') {
	        alert("The file does not match nbu format");
	    }
	    else { 
            var formData = new FormData($('#nokia-form')[0]);
            $.ajax({
                url: 'import.php',  //server script to process data
                type: 'POST',
                dataType: 'json',
                // Ajax events
                success: completeHandler = function(data) {
                	if(data.status == 'success')
                	{
                		contacts = data.contacts;
                		var html = '';
                		var count = 1;
	                	$.each(contacts,function(i,v){
	                		html+='<tr><td>'+count+'</td><td>'+v.name+'</td><td>'+v.number+'</td><td id="contact'+count+'"> Not Synched</td></tr>'
	                		count++;
	                	})
	                	$('.contacts table tbody').html(html);
	                   $('.jumbotron').slideUp();
	                   $('.contacts').removeClass('hide');
	               }else {
	               		alert(data.error);
	               }
                	
                },
                error: errorHandler = function() {
                    alert("Something went wrong!");
                },
                // Form data
                data: formData,
                // Options to tell jQuery not to process data or worry about the content-type
                cache: false,
                contentType: false,
                processData: false
            });
	    }
	    el.val(null);
	});

	$('#sync').click(function(){
		$(this).remove();
		var count = 1;
		sync(count);
	});

	function sync(count){
		$('#contact'+count).html('<span class="text-warning">Syncing...</span>');
		var contact = contacts[count-1];
		$.ajax({
			url: 'sync.php',
			type: 'POST',
			dataType: 'json',
			data: {name: contact.name,phoneNumber: contact.number},
			success: function(data){
				if(data.status == 'success'){
					$('#contact'+count).html('<span class="text-success">Synched!</span>');
				}else if(data.status == 'redirect'){
					location.reload();
				}else {
					$('#contact'+count).html('<span class="text-danger">'+data.error+'</span>');
				}
				count++;
				if(count < contacts.length + 1)
				{
					sync(count);
				}
			}
		});
	}
});