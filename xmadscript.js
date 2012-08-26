

$(document).ready(function(){
	$("#progressbar").hide();
	$("#field").keyup(function() {
		$("#x").fadeIn();
		if ($.trim($("#field").val()) == "") {
			$("#x").fadeOut();
			$("#progressbar").progressbar("value",0)
			$("#progressbar").hide(2000);
		}
	});
	// on click of "X", delete input field value and hide "X"
	$("#x").click(function() {
		$("#field").val("");
		$(this).hide();
		$("#progressbar").progressbar("value",0)
		$("#progressbar").hide(2000);
	});
	
	$( "#progressbar" ).progressbar({

		});
	
		
	$('#target').submit(function() {
	 var old = $("#progressbar").progressbar("value");
	 $("#progressbar").show(2000);
    $("#progressbar").progressbar("value", old+20)
			$.post( 
             "searchstuff.php",
             { searchq: $('#field').val() },
			 			 
             function(data) {
                $('#message').html(data);
				  var old = $("#progressbar").progressbar("value");
    $("#progressbar").progressbar("value", old+80)
	$("#progressbar").hide(2000);
             }
			 ) 
			  return false;
});	


    $('.recents').live('click', function() {
        $("#field").val($(this).html());
		$('.helper').empty(2000);
		$('#submit').trigger('click');
		 $('html, body').animate({scrollTop:0}, 'slow');
    });
		
	
		$('.itunescontent').live('click', function() {
        $('.helper').empty();
		$('#message').empty();
		var itunesurl1 = "itunesrss.php?url=";
		var itunesurl2 = $(this).attr("url"); 
		var itunesurl3 = itunesurl1 + itunesurl2
		$(".helper").load(itunesurl3);	 
    });
	
			$('.itunescontent2').live('click', function() {
        $('.helper').empty();
		$('#message').empty();
		var itunesurl1 = "itunesrss2.php?url=";
		var itunesurl2 = $(this).attr("url"); 
		var itunesurl3 = itunesurl1 + itunesurl2
		$(".helper").load(itunesurl3);	 
    });
	
	$("div.clickable").click(
function()
{
    window.location = $(this).attr("url");
});

var seen = {}; $('a').each(function() {var txt = $(this).text(); if (seen[txt])$(this).remove(); else seen[txt] = true;});



 //		var count = 0;
// 		setInterval(function() {
 //		 count = count + 0.5;
// 		 $('#progressbar').progressbar({
//  		 value : count         
// 		 });
// 		}, 10);

});



$(function(){
   $("ul.dropdown li").hover(function(){
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    
    }, function(){
   $(this).removeClass("hover");
   $('ul:first',this).css('visibility', 'hidden');
});
$("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
});
