

window.onbeforeunload = function (){
// alert('http://'+document.domain+':9177/user/register');
// alert(document.referrer);

if(document.referrer=='http://'+document.domain+':9177/user/register'){
	//alert('its here');	
	if(!confirm(" You have not completed the signup process and if you close this page your information will not be saved.  Do you want to continue? "))
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
}