$(document).ready(function(){
	setInterval(inter, 0);
});

var menu = 0;
$('#menu').click(function(){
	if(menu == 0){
		$('#nav-bar').addClass('show');
		menu = 1;
	} else{
		$('#nav-bar').removeClass('show');
		menu = 0;

	}
});

function inter(){
	get_width = $('html').width();
	width = get_width/2;
	$('.event-bg').css('border-left', width+'px solid transparent');
	$('.event-bg').css('border-right', width+'px solid transparent');
}

function deletePic(picId){
	console.log("http://localhost:8888/deletepic/?picId="+picId);
	var conf = confirm("האם אתה בטוח שברצונך למחוק תמונה זו?");
	if(conf == true){
		$.get( "http://localhost:8888/deletepic/?picId="+picId)
		.done(function(data){
			if(data == "ok")
				location.reload();
		}); 
	}
	//Send Ajax Get request to remove the picture and check if the admin is login!! 
}