
$(document).ready(function () {
    /*===================================================================================*/
    /*  WOW 
    /*===================================================================================*/
    new WOW().init();

    /*===================================================================================*/
    /*  OWL CAROUSEL
    /*===================================================================================*/
    var dragging = true;
    var owlElementID = "#owl-main";

    function fadeInReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
        }
    }

    function fadeInDownReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
        }
    }

    function fadeInUpReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
        }
    }

    function fadeInLeftReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
        }
    }

    function fadeInRightReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
        }
    }

    function fadeIn() {
        $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInDown() {
        $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInUp() {
        $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInLeft() {
        $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInRight() {
        $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    $(owlElementID).owlCarousel({

        autoPlay: 5000,
        stopOnHover: true,
        navigation: true,
        pagination: true,
        singleItem: true,
        addClassActive: true,
        transitionStyle: "fade",
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],

        afterInit: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        afterMove: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        afterUpdate: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        startDragging: function() {
            dragging = true;
        },

        afterAction: function() {
            fadeInReset();
            fadeInDownReset();
            fadeInUpReset();
            fadeInLeftReset();
            fadeInRightReset();
            dragging = false;
        }

    });

    if ($(owlElementID).hasClass("owl-one-item")) {
        $(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
    }

    $(owlElementID + ".owl-one-item").owlCarousel({
        singleItem: true,
        navigation: false,
        pagination: false
    });

    $('#transitionType li a').click(function () {

        $('#transitionType li a').removeClass('active');
        $(this).addClass('active');

        var newValue = $(this).attr('data-transition-type');

        $(owlElementID).data("owlCarousel").transitionTypes(newValue);
        $(owlElementID).trigger("owl.next");

        return false;

    });

     $('.single-product-gallery .horizontal-thumb').click(function(){
        var $this = $(this), owl = $($this.data('target')), slideTo = $this.data('slide');
        owl.trigger('owl.goTo', slideTo);
        $this.addClass('active').parent().siblings().find('.active').removeClass('active');
        return false;
    });


    /*===================================================================================*/
    /*  CUSTOM CONTROLS
    /*===================================================================================*/

    $('.close-btn').click(function(){
        var id = $(this).data('product');
        var formData = { productId: id}; //Array 
        $.ajax({
            url : "/cart/delete",
            type: "POST",
            data : formData,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data, textStatus, jqXHR)
            {   
                location.reload();
            }
        });      
    });

    //Add to cart
    $('.add-cart-button a').click(function(){
        var id = $(this).parent().find('input[name=product_id]').val();
        var formData = { productId: id}; //Array 
        $.ajax({
            url : "/cart/add",
            type: "POST",
            data : formData,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data, textStatus, jqXHR)
            {   
                location.reload();
            }
        });      
    });
    
    // Quantity Spinner
    $('.le-quantity a').click(function(e){
            e.preventDefault();
            var currentQty = $(this).parent().parent().find('input[name=quantity]').val();
 
            if( $(this).hasClass('minus') && currentQty > 1){
                $(this).parent().parent().find('input[name=quantity]').val(parseInt(currentQty, 10) - 1);

            }else{
                if( $(this).hasClass('plus')){
                    $(this).parent().parent().find('input[name=quantity]').val(parseInt(currentQty, 10) + 1);
                }
            }

            currentQty = $(this).parent().parent().find('input[name=quantity]').val();

            var id = $(this).parent().children('input[name=product_id]').val();
            var formData = { productId: id, quantity: currentQty}; //Array 
            $.ajax({
                url : "/cart/update",
                type: "POST",
                data : formData,
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data, textStatus, jqXHR)
                {   
                    location.reload();
                }
            });      
        });
    /*===================================================================================*/
    /*  GMAP ACTIVATOR
    /*===================================================================================*/

    var zoom = parseInt($('input[name="zoom"]').val());
    var latitude = parseFloat($('input[name="latitude"]').val());
    var longitude = parseFloat($('input[name="longitude"]').val());
    var mapIsNotActive = true;
    setupCustomMap();

    function setupCustomMap() {
        if ($('.map-holder').length > 0 && mapIsNotActive) {

            var styles = [
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        },
                        {
                            "color": "#E6E6E6"
                        }
                    ]
                }, {}
            ];

            var lt, ld;
            if ($('.map').hasClass('center')) {
                lt = (latitude);
                ld = (longitude);
            } else {
                lt = (latitude + 0.0027);
                ld = (longitude - 0.010);
            }

            var options = {
                mapTypeControlOptions: {
                    mapTypeIds: ['Styled']
                },
                center: new google.maps.LatLng(lt, ld),
                zoom: zoom,
                disableDefaultUI: true,
                scrollwheel: false,
                mapTypeId: 'Styled'
            };
            var div = document.getElementById('map');

            var map = new google.maps.Map(div, options);

            var styledMapType = new google.maps.StyledMapType(styles, {
                name: 'Styled'
            });

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude, longitude),
                map: map
            });

            map.mapTypes.set('Styled', styledMapType);

            mapIsNotActive = false;
        }

    }

});



