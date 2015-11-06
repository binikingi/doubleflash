pics = 1;
function addpic(){
	if(pics < 9){
		pics++;
		$("#pics").append('<input type="file" name="pic' + pics + '" />');
	}
	else alert('הגעת למיספר תמונות מקסימלי');
}