$(document).ready(function(){
			
		    $(".icon-share").on("click", function(){
		        $("#text>a").css("display", "inline");
				$(".textmid").css("z-index", "1");
		        $(".st_sf_sub_legend, .st_sf_vc_sep, .st_sf_vc_port_cat").css("display", "none");
				return false;
		    });


		    $(".st_sf_vc_potrfolio").mouseleave(function(){
		$("#text>a").hide();
		        $(".st_sf_sub_legend, .st_sf_vc_sep, .st_sf_vc_port_cat").show();    });




		});

$(".single_img").on("click", function(){
	
	var href=$(this).siblings(".single_img_link").attr('href');;
window.open(href, '_blank');});