var ratedIndex = -1, uID = 0;

        $(document).ready(function () {
            resetStarColors();

            if (localStorage.getItem('ratedIndex') != null) {
                setStars(parseInt(localStorage.getItem('ratedIndex')));
                uID = localStorage.getItem('uID');
            }

            $('.fa-star').on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
               saveToTheDB();
            });

            $('.fa-star').mouseover(function () {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function () {
                resetStarColors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });

        function saveToTheDB() {
            $.ajax({
               url: '/review',
               method: "POST",
               dataType: 'json',
               data: {
                   save: 1,
                   uID: uID,
                   ratedIndex: ratedIndex
               }, success: function (r) {
                    uID = r.id;
                    localStorage.setItem('uID', uID);
               }
            });
        }

        function setStars(max) {
            for (var i=0; i <= max; i++)
                $('.fa-star:eq('+i+')').css('color', 'orange');
        }

        function resetStarColors() {
            $('.fa-star').css('color', 'black');
        }























/*price range*/


 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};

/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
    });
});

$(".deleCu").click(function(){
    var id= $(this).attr('rel');
    var deleteFunction = $(this).attr('rel1');
          window.location.href="/user/"+deleteFunction+"/"+id;
    });
    $(document).ready(function(){
        $(".changeImage").change(function(){
             var image = $(this).attr("src");
             $('.mainImage').attr("src",image)
        });
    });
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });

$('.delCoupon').click(function(){

});

$(document).ready(function(){

        $('#myPassword').passtrength({
          minChars: 8,
          passwordToggle: true,
          tooltip: true,
          eyeImg:"/img/frontend_images/eye.svg"
        });
        $('#c_pass').keyup(function(){
            var c_pass =$(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

            type:'post',
            url:'/check-pass',
            data:{c_pass:c_pass},
            success:function(resp) {
                if(resp=="false"){
                    $('#check').html("<font color='red' style='margin-bottom:5px;'>Current Password Incorrect</font> ");
                }
            },
            error:function(resp){
                if(resp=="true"){
                    $('#check').html("<font color='green'>Correct Password </font> ");
                }
            }
            });
        });
        $('#BillToship').click(function(){
           if(this.checked){
               $('#shipping_name').val($('#billing_name').val());
               $('#shipping_adress').val($('#billing_adress').val());
               $('#shipping_city').val($('#billing_city').val());
               $('#shipping_country').val($('#billing_country').val());
               $('#shipping_pincode').val($('#billing_pincode').val());
               $('#shipping_mobile').val($('#billing_mobile').val());
           }
           else{
            $('#shipping_name').val();
            $('#shipping_adress').val();
            $('#shipping_city').val();
            $('#shipping_country').val();
            $('#shipping_pincode').val();
            $('#shipping_mobile').val();
           }

        });

});


