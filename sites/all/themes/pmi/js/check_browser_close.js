window.onbeforeunload = function (){
		
	if(!confirm("You have not completed the signup process and if you close this page your information will not be saved. Do you want to continue? "))
	{
	//	alert('false');
		return false;
	}
	else
	{
	//alert('true');
	return true;
	}
}