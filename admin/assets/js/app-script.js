
$(function() {
    "use strict";
     
	 
//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js

$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });	   
	
	   
// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }), 	   
	   
/* Back To Top */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 300) { 
            $('.back-to-top').fadeIn(); 
        } else { 
            $('.back-to-top').fadeOut(); 
        } 
    }); 
    $('.back-to-top').on("click", function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});	   
	   
$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

});

// Inovice add

$(document).ready(function(){
    //Add Row
    var i=1;
    $("#add_row").click(function(){b=i-1;
        $('#addr'+i).html($('#addr'+b).html());
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
    }); 

    // Remove ROW
    $("#delete_row").click(function(){
        if(i>1){
        $("#addr"+(i-1)).html('');
        i--;
        }
        calc();
    });
       
});