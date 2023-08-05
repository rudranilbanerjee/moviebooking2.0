function usernamevalidation(str)
{
 var result=true;
 var y=document.getElementById("validusername");
 var u1=document.getElementById("validu");
 var u2=document.getElementById("invalidu");
 var user = str;
 var usercheck1= /^[A-Za-z][A-Za-z ]{0,6}$/;
 var usercheck= /^[A-Za-z][A-Za-z ]{7,30}$/;
 if(str.length==0 || str.length<=7)
 {
   if(!usercheck1.test(user) && str.length!=0)
  {
   y.innerHTML="**Name is not valid!";
   y.style.color="red";
   u1.style.display="none";
   u2.style.display="flex";
   return 0;
  }
  else if(str.length==0)
  {
   y.innerHTML=" ";
   u1.style.display="none";
   u2.style.display="none";
   return 0;
  }
  else{ 
   y.innerHTML="**Name must be between 8-30 letters!";
   y.style.color="red";
   u1.style.display="none";
   u2.style.display="flex";
   return 0;
  } 
 }
 else
 {
  if(usercheck.test(user)){
   y.innerHTML=" ";
   u1.style.display="flex";
   u2.style.display="none";
   return 1;
  }else{
   y.innerHTML="**Username is invalid!";
   y.style.color="red";
   u1.style.display="none";
   u2.style.display="flex";
   return 0;
  }
 }
}
function passwordvalidation(str)
{
 var result=true;
 var p=document.getElementById("validpassword");
 var disclaimer1=document.getElementById("disclaimer");
 var p1=document.getElementById("validp");
 var p2=document.getElementById("invalidp");
 var passwordcheck1= /^[A-Z][A-Za-z0-9!@#$%^&*]{0,10}$/;
 var passwordcheck= /^[A-Z](?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*].{9,18}$/;
if(str.length==0 || str.length<11)
{
 if(!passwordcheck1.test(str) && str.length !=0)
  {
   p.innerHTML="**First letter is must be capital letter!";
   p.style.color="red";
   p1.style.display="none";
   p2.style.display="flex";
   return 0;
  }
  else if(str.length!=0)
  {
   p.innerHTML="**password must be between 11 to 15 character!!";
   p.style.color="red"; 
   p1.style.display="none";
   p2.style.display="flex";
   return 0;
  } 
  else
  {
   p.innerHTML=" ";
   p1.style.display="none";
   p2.style.display="none";
   return 0;
  }
}
else
{ 
 if(passwordcheck.test(str)){
  p.innerHTML=" ";
  p1.style.display="flex";
  p2.style.display="none";
  return 1;
 }
 else if(str.length>15)
  {
   p.innerHTML="**password must be between 11 to 15 character!!";
   p.style.color="red"; 
   p1.style.display="none";
   p2.style.display="flex";
   return 0;
  } 
 else{
   p.innerHTML="**invalid password!";
   p.style.color="red";
   p1.style.display="none";
   p2.style.display="flex";
   return 0;
  }
 }
}
function instruction()
{
  var message=document.getElementById("message");
  message.style.display="block";
}
function removeinstruc()
{
  var message=document.getElementById("message");
  message.style.display="none";
}
function compasswordvalidation(str)
{
 var compassword=document.getElementById("validcompassword");
 var password = document.getElementById("pass").value;
 var p=document.getElementById("validpassword");
//  var disclaimer=document.getElementById("disclaimer");
 var cp1=document.getElementById("validcp");
 var cp2=document.getElementById("invalidcp");
 if(str.length!=0 && password.length==0)
  {
   compassword.innerHTML="First fill the password box!!"
   compassword.style.color="red";
   cp1.style.display="none";
   cp2.style.display="flex";
  //  disclaimer.style.display="block";
   return 0;
  }
 else if(str.length==0)
  {
   compassword.innerHTML=" ";
   cp1.style.display="none";
   cp2.style.display="none";
  //  disclaimer.style.display="none";
   return 0;
  }
  else
  { 
   if(password!=str && str.length!=0)
   {
   compassword.innerHTML="**password does not match!";
   compassword.style.color="red";
   cp1.style.display="none";
   cp2.style.display="flex";
  //  disclaimer.style.display="none";
   return 0;
   }else{
   compassword.innerHTML=" ";
   cp1.style.display="flex";
   cp2.style.display="none";
  //  disclaimer.style.display="none";
   return 1;
  }
 }
}
function emailvalidation(str)
{
 var m = document.getElementById("validemailid");
 var e1=document.getElementById("valide");
 var e2=document.getElementById("invalide");
 var EmailIdcheck= /^[A-Za-z][A-Za-z0-9_.]{2,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,5}/;
 if(str.length==0 || str.length<=11)
  {
   if(str.length==0)
   {
   m.innerHTML=" ";
   e1.style.display="none";
   e2.style.display="none";
   return 0;
   } 
   else
   {
    m.innerHTML="**Fill your email id properly";
    m.style.color="red";
    e1.style.display="none";
    e2.style.display="flex";
    return 0;
   }
  }
 else if(EmailIdcheck.test(str))
  {
   m.innerHTML=" ";
   e1.style.display="flex";
   e2.style.display="none";
   return 1;
  }
  else
  {
   m.innerHTML="**invalid Email id !! ";
   m.style.color="red";
   e1.style.display="none";
   e2.style.display="flex";
   return 0;
  }
}
 
function uservalidation(str)
{
 var mob=0;
 var mobilenocheck= /^[6789][0-9]{9}$/;
 var validmob = document.getElementById("validmob");
 var m1= document.getElementById("validm");
 var m2= document.getElementById("invalidm");
  var req = new XMLHttpRequest();
  req.open("GET","http://localhost/moviebookingwebsite2.0/pages/user.php?phoneno="+str,true); 
  req.send();
  req.onreadystatechange = function(){
   if(req.readyState==4 && req.status==200 && str.length>0)
   {
    var x=req.responseText;
    if(x==1)
    {
     validmob.innerHTML="**This Phone no already exist";
     validmob.style.color="red";
     m1.style.display="none";
     m2.style.display="flex";
     document.getElementById("addvalue").innerHTML=" ";
     document.getElementById("addvalue").setAttribute("xyz","0");
    }
    else if(x==0)
    {
     if(mobilenocheck.test(str))
     {
      m1.style.display="flex";
      m2.style.display="none";
      document.getElementById("addvalue").setAttribute("xyz","5");
     }
     else{ 
     validmob.innerHTML="**Pls enter a valid phone no!!";
     validmob.style.color="red";
     m1.style.display="none";
     m2.style.display="flex";
     document.getElementById("addvalue").innerHTML=" ";
     document.getElementById("addvalue").setAttribute("xyz","0");
     }
    }
   }
   else
   {
    validmob.innerHTML=" ";
     m1.style.display="none";
     m2.style.display="none";
    document.getElementById("addvalue").innerHTML=" ";
    document.getElementById("addvalue").setAttribute("xyz","0");
   }
  };
element=document.getElementById("addvalue").getAttribute("xyz");
return element;
}

// when all the fields are correct then the sign up button active or enabled
function enable()
{
 var btn= document.getElementById("btn");
 var username= document.getElementById("username").value;
 var phoneno= document.getElementById("phoneNo").value;
 var emailId= document.getElementById("emailid").value;
 var password= document.getElementById("pass").value;
 var compassword= document.getElementById("compass").value;
 var a=emailvalidation(emailId);
 var b=usernamevalidation(username);
 var c=compasswordvalidation(compassword);
 var d=passwordvalidation(password);
 var e=uservalidation(phoneno);
 if(a==1 && b==1 && c==1 && d==1 && e==5)
 {
   btn.removeAttribute('disabled');
   btn.style.opacity="1";
 }
 else
 {
   btn.setAttribute('disabled','disabled');
   btn.style.opacity="0.5";
 }
}