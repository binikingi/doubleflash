var pics = 2;
function addpic(){
	$("#pics").append('<input type="file" name="pic' + pics + '" />');
	pics++;
}