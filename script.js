// JavaScript Document
function func3()
{
	document.getElementById("1").disabled=true;
document.getElementById("2").disabled=true;
document.getElementById("3").disabled=false;
}
function func2()
{
	document.getElementById("1").disabled=true;
	document.getElementById("3").disabled=true;
	 document.getElementById("2").disabled=false;
}
function func1()
{
	document.getElementById("3").disabled=true;
	 document.getElementById("2").disabled=true;
	document.getElementById("1").disabled=false;
}
function check1(){
	var name=document.getElementById("user").value;
	if(name.length<5){
		document.getElementById("error1").innerHTML="Too short";	
		document.getElementById("user").style.background="#F00";
	}
	else{
		document.getElementById("error1").innerHTML="";
		document.getElementById("user").style.backgroundColor="#0F6";
	}
}
function check2(){
	var name=document.getElementById("pass").value;
	if(name.length<5){
		document.getElementById("error2").innerHTML="Too short";	
		document.getElementById("pass").style.background="#F00";
	}
	else{
		document.getElementById("error2").innerHTML="";
		document.getElementById("pass").style.backgroundColor="#0F6";
	}
}
function check3(){
	var name=document.getElementById("pass2").value;
	if(name.length<5){
		document.getElementById("error3").innerHTML="Too short";	
		document.getElementById("pass2").style.background="#F00";
	}
	else{
		document.getElementById("error3").innerHTML="";
		document.getElementById("pass2").style.backgroundColor="#0F6";
	}
}
function check4(){
	var name=document.getElementById("regno").value;
	if(name.length<5){
		document.getElementById("error4").innerHTML="Too short";	
		document.getElementById("regno").style.background="#F00";
	}
	else{
		document.getElementById("error4").innerHTML="";
		document.getElementById("regno").style.backgroundColor="#0F6";
	}
}