$(document).ready(function(){
	"use strict";
    
        /*==================================
* Author        : "ThemeSine"
* Template Name : CarVilla HTML Template
* Version       : 1.0
==================================== */




/*=========== TABLE OF CONTENTS ===========
1. Scroll To Top
2. welcome animation support
3. owl carousel
======================================*/
		
		$("#live_search").keyup(function(){
			var input = $(this).val();
			if(input != ""){
				$.ajax({
					url:"livesearch.php",
					method: "POST",
					data:{input:input},

					success:function(data){
						$("#searchresult").html(data);
						$("#searchresult").css("display","block");
						$("#table-all").css("display","none");
					}
				});
			}else{
				$("#searchresult").css("display","none");
				$("#table-all").css("display","block");
			}
		})

		$("#live_searchcar").keyup(function(){
			var input = $(this).val();
			if(input != ""){
				$.ajax({
					url:"livesearch.php",
					method: "POST",
					data:{inputcar:input},

					success:function(data){
						$("#searchresultcar").html(data);
						$("#searchresultcar").css("display","block");
						$("#table-allcar").css("display","none");
					}
				});
			}else{
				$("#searchresultcar").css("display","none");
				$("#table-allcar").css("display","inline-table");
			}
		})

		$("#live_search_admin").keyup(function(){
			var input = $(this).val();
			if(input != ""){
				$.ajax({
					url:"livesearch.php",
					method: "POST",
					data:{inputadmin:input},

					success:function(data){
						$("#searchresultadmin").html(data);
						$("#searchresultadmin").css("display","block");
						$("#table-admin").css("display","none");
					}
				});
			}else{
				$("#searchresultadmin").css("display","none");
				$("#table-admin").css("display","inline-table");
			}
		})

		$("#brand").on("change",function(){
			var input = $("#brand").val();
			let id_db = input.split('-');
			console.log(id_db[0]);
			if(input != ""){
				$.ajax({
					url:"rentcar_live.php",
					method: "POST",
					data:{rentcar:id_db[0]},
					dataType:"json",
					success:function(data){
						var html_append_1 = "";
						var html_append_2 = "";
						var html_append_3 = "";
						var html_append_4 = "";
						var html_append_5 = "";
						var html_img = "";
						$.each(data,function(index,value){
							html_append_1 += "<option value='"+value.car_registration+"-"+value.car_id+"'>"+value.car_registration+"</option>";
							html_append_2 += "<option value='"+value.car_motorbike+"-"+value.car_id+"'>"+value.car_motorbike+"</option>";
							html_append_3 += "<option value='"+value.color_car+"-"+value.car_id+"'>"+value.color_car+"</option>";
							html_append_4 += "<option value='"+value.carmodel+"-"+value.car_id+"'>"+value.carmodel+"</option>";
							html_append_5 += "<option value='"+value.pirce+"-"+value.car_id+"'>"+value.pirce+"</option>";
							html_img += "<div class=\"col-md-4 col-sm-6\"><div class=\"single-service-item\"><div class=\"single-service-icon\"><img src=\"/assets/images/uploads/"+ value.car_img +"\" alt=\"\"></div><h2>"+value.car_registration+"</h2></div></div>"
						});
						$("#registration").html(html_append_1);
						$("#bodystyle").html(html_append_2);
						$("#color").html(html_append_3);
						$("#model").html(html_append_4);
						$("#pirce").html(html_append_5);
						$('#service-content').html(html_img);
						console.log(data);
					}

	
				});
			}else{
				$("#search-by-price").css("display","none");
				$("#buying").css("display","block");
				console.log("no");
			}
		})
    // 1. Scroll To Top 
		$(window).on('scroll',function () {
			if ($(this).scrollTop() > 300) {
				$('.return-to-top').fadeIn();
			} else {
				$('.return-to-top').fadeOut();
			}
		});
		$('.return-to-top').on('click',function(){
				$('html, body').animate({
				scrollTop: 0
			}, 1500);
			return false;
		});

	// 2. welcome animation support

        $(window).load(function(){
        	$(".welcome-hero-txt h2,.welcome-hero-txt p").removeClass("animated fadeInUp").css({'opacity':'0'});
            $(".welcome-hero-txt button").removeClass("animated fadeInDown").css({'opacity':'0'});
            $(".welcome-hero-txt form").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt table").removeClass("animated fadeInDown").css({'opacity':'0'});

			$(".welcome-hero-txt .edit").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .form-control").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt #searchresult").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .dropdown").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .is-active").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .show").removeClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt #searchresultcar").removeClass("animated fadeInDown").css({'opacity':'0'});
        });

        $(window).load(function(){
        	$(".welcome-hero-txt h2,.welcome-hero-txt p").addClass("animated fadeInUp").css({'opacity':'0'});
            $(".welcome-hero-txt button").addClass("animated fadeInDown").css({'opacity':'0'});
            $(".welcome-hero-txt form").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt table").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .edit").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .form-control").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt #searchresult").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .dropdown").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .is-active").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt .show").addClass("animated fadeInDown").css({'opacity':'0'});
			$(".welcome-hero-txt #searchresultcar").addClass("animated fadeInDown").css({'opacity':'0'});
        });

	
	// 3. owl carousel

		// i.  new-cars-carousel
		
			$("#new-cars-carousel").owlCarousel({
				items: 1,
				autoplay:true,
				loop: true,
				dots:true,
				mouseDrag:true,
				nav:false,
				smartSpeed:1000,
				transitionStyle:"fade",
				animateIn: 'fadeIn',
				animateOut: 'fadeOutLeft'
				// navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			});


		// ii. .testimonial-carousel
	
		
			var owl=$('.testimonial-carousel');
			owl.owlCarousel({
				items:3,
				margin:0,
				
				loop:true,
				autoplay:true,
				smartSpeed:1000,
				
				//nav:false,
				//navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				
				dots:false,
				autoplayHoverPause:false,
			
				responsiveClass:true,
					responsive:{
						0:{
							items:1
						},
						640:{
							items:2
						},
						992:{
							items:3
						}
					}
				
				
			});

		// iii. .brand-item (carousel)
		
			$('.brand-item').owlCarousel({
				items:6,
				loop:true,
				smartSpeed: 1000,
				autoplay:true,
				dots:false,
				autoplayHoverPause:false,
				responsive:{
						0:{
							items:2
						},
						415:{
							items:2
						},
						600:{
							items:3
						},
						1000:{
							items:6
						}
					}
				});
				
				
				$('.play').on('click',function(){
					owl.trigger('play.owl.autoplay',[1000])
				})
				$('.stop').on('click',function(){
					owl.trigger('stop.owl.autoplay')
				})

});