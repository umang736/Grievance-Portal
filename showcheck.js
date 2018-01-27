// JavaScript Document
// JavaScript Document
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

function process(oldtext,textid,uniqid,parno)
{
	//var str="  "+uniqid;document.getElementById("r1").innerHTML=str;
	
if(xmlhttp)
{
try{
	var d=new Date();
	var datetime=d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
	var text=encodeURIComponent(document.getElementById(textid).value);
	if(text=="")
	{
	var error="submit box cannot be left blank";
	document.getElementById(parno).innerHTML='<span style="color:red;">'+error+'</span>';
	setTimeout(function(){document.getElementById(parno).innerHTML="";},1000);
	return;
	}
	if(oldtext!="")
	text=oldtext+"-------------------------------------"+text+"-------------------------------------"+"user"+"/"+datetime;
	else
	text=text+"-------------------------------------"+"user"+"/"+datetime;
	xmlhttp.onreadystatechange=handleServerResponse(oldtext,textid,uniqid,parno);
	xmlhttp.open("GET","queryadd.php?text="+text+"&uniqid="+uniqid+"&datetime="+datetime,true);
xmlhttp.send(null);
}
catch(e){alert("from1"+e.toString() );}
}
else
{
setTimeout('process(oldtext,textid,uniqid,parno)',1000);
}
}
function handleServerResponse(oldtext,textid,uniqid,parno){
if(xmlhttp.readyState==4)
{
	if(xmlhttp.status==200)
	{
		try{
		var message=xmlhttp.responseText;
	document.getElementById(parno).innerHTML='<span style="color:blue;">'+message+'</span>';
	setTimeout(function(){document.getElementById(parno).innerHTML="";},1000);
	setTimeout('process(oldtext,textid,uniqid,parno)',1000);
		}
		catch(e){alert("from2"+ e.toString() );}
	}
	else
	{
	alert("from3"+xmlhttp.statusText);
	}
}
}
