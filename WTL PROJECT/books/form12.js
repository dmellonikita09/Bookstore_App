function formValidation()
{
var passid=document.registration.pass;
var cpassid=document.registration.cpass;
var uname=document.registration.name;
var uemail=document.registration.email;
var phoneid=document.registration.numb;
if(allLetter(uname))
{
if(validateEmail(uemail))
{
if(passid_validation(passid,7,20))
{
if(cpass(passid,cpassid))
{
if(allNumeric(phoneid))
{
return true;	
}
}
}
}
}
return false;
}
function passid_validation(passid,mx,my)
{
	var passid_len=passid.value.length;
if(passid_len==0||passid_len>=my||passid_len<mx)
{
	alert("password should not be empty or length be between "+mx+"to "+my);
passid.focus();
return false;
}
return true;
}


function allLetter(uname)
{
	var letters=/^[A-Z a-z]+$/;
if(uname.value.match(letters))
{
	return true;
}
else
{
alert('Name must have alphabet characters only');
uname.focus();
return false;
}
}


function allNumeric(phoneid)
{
	var number=/^[0-9]+$/;
if(phoneid.value.match(number))
{
	return true;
}
else
{
	alert('Phone No must have numbers only');
phoneid.focus();
return false;
}
}


function validateEmail(uemail)
	{
		var mailformat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(uemail.value.match(mailformat))
		{
			return true;
			
		}
		else
		{
			alert('Invalid email id');
            uemail.focus();
              return false;
		}
			
	}
	
	
function cpass(passid,cpassid)
{
	var c=cpassid.value;
	var p=passid.value;
if(c==p)
{
	return true;
}
else
{
alert('Passwords dont match');
cpassid.focus();
return false;
}
}