$(document).ready(function() {
//$("#temp1").hide();
//$("#temp2").hide();
$(".hidden").hide();
  $("#a").hide();
	$("#b").hide();
	$("#c").hide();
	$("#sub1").hide();
	$("#sub2").hide();
	$("#sub3").hide();
$("#bt1").click(function(){
	$("#1").fadeToggle(500);
	});
	$("#bt2").click(function(){
	$("#2").fadeToggle(500);
	});
	$("#bt3").click(function(){
	$("#3").fadeToggle(500);
	});
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
		$("#vqupdmain").hide();
		$("#vqupd").hide();
		$("#vqimg1").click(function() {
		    $("#vqupdmain").show(400,function() {
			$("#vqupd").fadeIn(1000);
		    });
	    });
		$("#vqupdmain").click(function() {
			$("#vqupd").hide(1,function() {
				$("#vqupdmain").hide();
			});
		});
});
