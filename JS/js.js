
function checkname(pname,errorname)
			{

	var vname= /^[a-zA-Z]+$/;
	if(pname.value=="")
	{
		errorname.innerHTML="You can't leave this field empty";
		return 0;
	}
	if(vname.test(pname.value))
	{
		errorname.innerHTML=" ";
		return 1;
	}
	else
	{
		errorname.innerHTML="Invalid name, Please Enter valid First name";
		return 0;
	}
}

function checkuser(pname,errorname)
			{

	var vname= /^[a-zA-Z]+$/;
	if(pname.value=="")
	{
		errorname.innerHTML="You can't leave this field empty";
		return 0;
	}
	if(vname.test(pname.value))
	{
		errorname.innerHTML=" ";
		return 1;
	}
	else
	{
		errorname.innerHTML="Invalid name, Please Enter valid User Name";
		return 0;
	}
}
function checklname(pname,errorname)
			{

	var vname= /^([a-zA-Z])+([a-zA-Z\ ])+$/;
	if(pname.value=="")
	{
		errorname.innerHTML="You can't leave this field empty";
		return 0;
	}
	if(vname.test(pname.value))
	{
		errorname.innerHTML=" ";
		return 1;
	}
	else
	{
		errorname.innerHTML="Invalid name, Please Enter valid Last name";
		return 0;
	}
}

function checkdate(pname,errorname)
			{

	if(pname.value=="")
	{
		errorname.innerHTML="Please Select Your Date of Birth";
		return 0;
	}
	else{
		errorname.innerHTML=" ";
		return 1;
	}

}

function checkEmail(email,div) 
			{
		    	var filter = /^([\w\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/;
				if(email.value=="")
				{
					div.innerText= "You can't leave this field empty";
					return 0;
				}
	    		if (filter.test(email.value)){
  		  			div.innerText= "";
					return 1;}
				
				else {
					div.innerText="\"" + email.value +"\""+"  is not valid email";
				return 0;
				}
				
			 }
			
function checkmob(pname,errorname)
			{

	var vname= /^([0-9]{10})+$/;
	if(pname.value=="")
	{
		errorname.innerHTML="You can't leave this field empty";
		return 0;
	}
	if(vname.test(pname.value))
	{
		errorname.innerHTML=" ";
		return 1;
	}
	else
	{
		errorname.innerHTML="Invalid Mobile Number";
		return 0;
	}
}

function checkgender(r1,r2,errorgender)
{
	if((!r1.checked)&& (!r2.checked))
	{
		errorgender.innerHTML="Select your Gender";
		return 0;
	}
	else
	{
		errorgender.innerHTML="";
		return 1;
	}
}

function pmatch(id,id2,errorid)
			{
		    var a=id.value;
			var b=id2.value;
			if(a==b)
			{
				errorid.innerHTML=" ";
				return 1;
			}
			else		
				errorid.innerHTML= "Password Does not matched";{
			return 0;}
		}
		
function start()
{
	var eid=document.getElementById('eid');
	var eeid=document.getElementById('eeid');
	var rname=document.getElementById('rname');
	var ername=document.getElementById('ername');
	var uname=document.getElementById('username');
	var euname=document.getElementById('eusername');
	var rlname=document.getElementById('rlname');
	var erlname=document.getElementById('erlname');
	var dob=document.getElementById('dob');
	var edob=document.getElementById('edob');
	var Mno=document.getElementById('Mno');
	var eMno=document.getElementById('eMno');
	var pass=document.getElementById('pass');
	var cpass=document.getElementById('cpass');
	var epass=document.getElementById('epass');
	var signin=document.getElementById('signin');
	var r1=document.getElementById("MALE");
	var r2=document.getElementById("FEMALE");
	var errorgender=document.getElementById("errorgender");
	var frm=document.getElementById("frmHome");

		signin.onclick=function(evt)
		{
			if(checkEmail(eid,eeid)&&checkname(rname,ername)&&checklname(rlname,erlname)&&pmatch(pass,cpass,epass)&&checkmob(Mno,eMno)&&checkgender(r1,r2,errorgender)&&checkdate(dob,edob)&&checkuser(uname,euname))
			{
				alert("registration successfull");
				form1.submit();
			}
		    else{
			checkEmail(eid,eeid);
			checkname(rname,ername);
			checklname(rlname,erlname);
			pmatch(pass,cpass,epass);
			checkmob(Mno,eMno);
			checkgender(r1,r2,errorgender);
			checkdate(dob,edob);
			checkuser(uname,euname);
			}
		};
		rname.onkeyup=function(evt)
		{
			a=rname.value;
			rname.value=a.toUpperCase();
		};
		
		eid.onblur=function(evt)
		{
			checkEmail(eid,eeid);
		};

		uname.onblur=function(evt)
		{
			checkuser(uname,euname)
		};
		rname.onblur=function(evt)
		{
			checkname(rname,ername);
		};
		r1.onclick=function(evt)
		{
			checkgender(r1,r2,errorgender);
		}
		r2.onclick=function(evt)
		{
			checkgender(r1,r2,errorgender);
		}
		rlname.onblur=function(evt)
		{
			checklname(rlname,erlname);
		};
		
		Mno.onblur=function(evt)
		{
			checkmob(Mno,eMno);
		};
		
		dob.onblur=function(evt)
		{
			checkdate(dob,edob);
		};
		cpass.onblur=function(evt)
		{
			pmatch(pass,cpass,epass);
		};
};
window.onload=start;