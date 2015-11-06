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

function deletePic(path, id){
	$.get( "http://doubleflash.co.il/deletepic/?path="+path+"&id="+id)
	.done(function(data){
		alert("this is what we got:   "+data);
	});   
	console.log( "http://doubleflash.co.il/deletepic/?path="+path+"&id="+id);  
	//Send Ajax Get request to remove the picture and check if the admin is login!! 
}