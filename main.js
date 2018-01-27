// JavaScript Document
/*$(document).ready(function(){
	 
	 $("#td2 input").click(function() {
		 $("#div4").show(400,function(){
			      $("#div5").fadeIn(1000);
		 });
	 });
	 $("#div4").click(function() {
		 $("#div5").hide(1,function() {
			  $("#div4").hide(1);
		 });
	 });
	 $("#div6").hover(function() {
		  $("#logout").hide(1000);
	 }); 
});*/
function funcs(pro,str)
{
	document.getElementById(pro).innerHTML=str;
document.getElementById(pro).style.color="#F00";
}
function blank()
{
	document.getElementById("pro1").innerHTML="";
	document.getElementById("pro2").innerHTML="";
}
function fu()
{
	document.getElementById("login").style.visibility="hidden";
}

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
function check5(){
	var name=document.getElementById("user1").value;
	if(name.length<5){
		document.getElementById("error1").innerHTML="Too short";	
		document.getElementById("user1").style.background="#F00";
	}
	else{
		document.getElementById("error1").innerHTML="";
		document.getElementById("user1").style.backgroundColor="#0F6";
	}
}
function check6(){
	var name=document.getElementById("pass3").value;
	if(name.length<5){
		document.getElementById("error2").innerHTML="Too short";	
		document.getElementById("pass3").style.background="#F00";
	}
	else{
		document.getElementById("error2").innerHTML="";
		document.getElementById("pass3").style.backgroundColor="#0F6";
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
function check2(){
	var name=document.getElementById("pass").value;
	if(name.length<5){
		document.getElementById("error2").innerHTML="Too Short";	
		document.getElementById("pass").style.background="#F00";
	}
	else{
		document.getElementById("error2").innerHTML="";
		document.getElementById("pass").style.backgroundColor="#0F6";
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
var xmlhttp=createxmlhttprequestObject();
function createxmlhttprequestObject(){
var xmlhttp;
if(window.ActiveXObject){
	try{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}catch(e)
	{
	xmlhttp=false;
	}
}
else
{
try{
xmlhttp= new XMLHttpRequest();
}
catch(e)
{
	xmlhttp=false;
}
}

if(!xmlhttp)
alert("can't create that object!");
else
return xmlhttp;
}

function process(textid,uniqid,parno)
{
	//var str=a+"  "+"  "+uniqid+"  "+no;document.getElementById("1").innerHTML=str;
	
if(xmlhttp)
{
try{
	var text=encodeURIComponent(document.getElementById(textid).value);
	xmlhttp.onreadystatechange=handleServerResponse(textid,uniqid,parno);
	xmlhttp.open("GET","queryreply.php?text="+text+"&uniqid="+uniqid,true);
xmlhttp.send(null);
}
catch(e){alert("from1"+e.toString() );}
}
else
{
setTimeout('process(textid,uniqid,parno)',1000);
}
}
function handleServerResponse(a,uniqid,no){
if(xmlhttp.readyState==4)
{
	if(xmlhttp.status==200)
	{
		try{
		var message=xmlhttp.responseText;
	document.getElementById(no).innerHTML='<span style="color:blue;">'+message+'</span>';
	setTimeout(function(){document.getElementById(no).innerHTML="";},1000);
	setTimeout('process(textid,uniqid,parno)',1000);
		}
		catch(e){alert("from2"+ e.toString() );}
	}
	else
	{
	alert("from3"+xmlhttp.statusText);
	}
}
}
$(document).ready(function() {
    $("#a").hide();
	$("#b").hide();
	$("#c").hide();
	$("#sub1").hide();
	$("#sub2").hide();
	$("#sub3").hide();
	$("#but1").click(function(){
		$("#a").fadeToggle(500);
		$("#sub1").fadeToggle(500);
		});
		$("#sub1").click(function(){
		$("#a").fadeOut();
		$(this).fadeOut();
		});
	$("#but2").click(function(){
		$("#b").fadeToggle(500);
		$("#sub2").fadeToggle(500);
		});
		$("#sub2").click(function(){
		$("#b").fadeOut();
		$(this).fadeOut();
		});
	$("#but3").click(function(){
		$("#c").fadeToggle(500);
		$("#sub3").fadeToggle(500);
		});
		$("#sub3").click(function(){
		$("#c").fadeOut();
		$(this).fadeOut();
		});
});



