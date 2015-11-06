get_ammount_of_pic = $('#gallery-inside').children('img').length;
image_width = 100 / get_ammount_of_pic;


$('#gallery-inside').css('width', get_ammount_of_pic*100+'%');
$('.galley').css('width', image_width+'%');


for(var i = 0; i < get_ammount_of_pic; i++){
	$('#galley-dotted').append('<li class="galley-dotted">');
}

$('.galley-dotted:nth-child(1)').addClass('active');
var inter; 
$(document).ready(function(){
	inter = setInterval(next, 4000);
});



$('.galley-dotted').click(function(){
	clearInterval(inter);

	child = $(this).index();

	inter = setInterval(next, 4000);
	go_to(child);
});

function next(){
	get_left = $('#gallery-inside').position().left;
	get_width = $('html').width();

	child = get_left/get_width*(-1);

	if(child+1 >= get_ammount_of_pic)
		child = -1;

	go_to(child+1);
};

function go_to(get){
	$('#gallery-inside').css('left', '-'+(100*get)+'%');
	$('.galley-dotted').removeClass('active');
	$('.galley-dotted:nth-child('+(get+1)+')').addClass('active');
}