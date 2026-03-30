@extends('frontend::layouts.frontendMaster')
@section('title', $ws->website_title)


@push('css')
    <link rel="stylesheet" href="{{ asset('/frontend/css/demos/demo-coffee.css') }}">

    <style>
        .owl-carousel.nav-inside.nav-inside-edge .owl-nav button.owl-prev {
            top: -11px !important;
        }

        .owl-carousel.nav-inside.nav-inside-edge .owl-nav button.owl-next {
            top: -11px !important;
        }
    </style>




    <style>

        .mapimage{
            position: relative;
        }

        .pin {
            width: 20px;
            height: 20px;
            background-color: rgb(17, 109, 238);
            border-radius: 50%;
            position: absolute;  /* Change this to absolute positioning */
            top: 63%;            /* Centering vertically */
            left: 64%;           /* Centering horizontally */
            transform: translate(-50%, -50%); /* Correctly align center */
            animation: pulse 1.5s infinite;
            z-index: 2;
        }

        .pin::before {
            content: '';
            width: 100%;
            height: 100%;
            background-color: rgba(2, 72, 251, 0.847);
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            transform: scale(1);
            animation: pulse-ring 1.5s infinite;
        }
        .pin2 {
            width: 20px;
            height: 20px;
            background-color: rgb(17, 109, 238);
            border-radius: 50%;
            position: absolute;  /* Change this to absolute positioning */
            top: 59%;            /* Centering vertically */
            left: 84.5%;           /* Centering horizontally */
            transform: translate(-50%, -50%); /* Correctly align center */
            animation: pulse 1.5s infinite;
            z-index: 2;
        }

        .pin2::before {
            content: '';
            width: 100%;
            height: 100%;
            background-color: rgba(2, 72, 251, 0.847);
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            transform: scale(1);
            animation: pulse-ring 1.5s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.5);
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(2);
                opacity: 0;
            }
        }
    </style>
@endpush
@section('content')

    <div role="main" class="main lazy-load" data-url="{{ route('lazyloadContent') }}">
        <section>
            <div class="row">
                <div class="col-lg-12 carousel-container">
                    <div class="box box-widget mb-3 w3-animate-zoom">
                        <div class="box-body" style="min-height: 150px;text-align: center;">
                            <i class="fa fa-spinner w3-jumbo w3-text-light-gray fa-spin" style="margin-top: 50px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="mb-0">
            <div class="row">
                <div class="col-lg-12 homepage-container">
                    <div class="box box-widget mb-3 w3-animate-zoom">
                        <div class="box-body" style="min-height: 150px;text-align: center;">
                            <i class="fa fa-spinner w3-jumbo w3-text-light-gray fa-spin" style="margin-top: 50px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>



@endsection

@push('scripts')
    <script>
        $(document).ready(function() {


            function loadajax() {
                var url = $('.lazy-load').attr('data-url');
                $.ajax({
                    url: url,
                    type: "get",
                    success: function(response) {

                        $('.carousel-container').empty().append(response.carouselContainer);

                        $('.homepage-container').empty().append(response.homepageContainer);

                        var owl = $(".owl-carousel");
                        owl.owlCarousel({
                            'items': 1,
                            'margin': 10,
                            'loop': true,
                            'nav': true,
                            'dots': true,
                            'autoplay': true
                        });

                    }
                });
            }
            setTimeout(loadajax, 1);
        });
    </script>







    <script>
        // Animated Pin (Pulse)
        function initializeGoogleMapAnimatedPin() {

            // Map Options
            var mapSettings = {
                controls: {
                    draggable: (($.browser.mobile) ? false : true),
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true
                },
                customHTMLMarkers: [{
                    latitude: 37.09024,
                    longitude: -95.71289,
                    htmlText: 'Kansas Office'
                }, {
                    latitude: 37.09024,
                    longitude: -85.71289,
                    htmlText: 'Kentucky Office'
                }],
                scrollwheel: false,
                latitude: 37.16631,
                longitude: -91.219409,
                zoom: $(window).width() < 500 ? 4 : 6
            };

            // Initialize Google Map with gMap plugin
            $("#googlemapsAnimatedPin").gMap(mapSettings);

            // Get original reference of google map
            var mapRef = $('#googlemapsAnimatedPin').data('gMap.reference');

            // Custom HTML Marker
            function HTMLMarker(lat, lng, infoBoxText) {
                this.lat = lat;
                this.lng = lng;
                this.pos = new google.maps.LatLng(lat, lng);
                this.infoBoxText = infoBoxText;
            }

            HTMLMarker.prototype = new google.maps.OverlayView();
            HTMLMarker.prototype.onRemove = function() {}

            // Append Marker/PIN HTML
            HTMLMarker.prototype.onAdd = function() {
                var self = this;
                this.uniqid = Math.floor(Math.random() * Date.now());
                var html = $('<div class="map-rounded-pin map-rounded-pin-animated cur-pointer"></div>');
                html.css({
                    position: 'absolute'
                });
                var panes = this.getPanes();
                panes.overlayImage.appendChild(html[0]);

                google.maps.event.addDomListener(html[0], "click", function(event) {
                    google.maps.event.trigger(self, "click");

                    if ($('.map-info-window-id-' + self.uniqid).length == 0) {
                        var mapInfoWindow = $('<div class="map-info-window-id-' + self.uniqid +
                            ' map-info-window">' + self.infoBoxText +
                            '<div class="map-info-window-close"><svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" viewBox="0 0 24 24" fill="#000000"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg></div></div>'
                        );

                        html.append(mapInfoWindow);

                        $(document).on('click', '.map-info-window-close', function() {
                            mapInfoWindow.remove();
                        });
                    }
                });

                this.html = html[0];
            }

            // Draw Marker/PIN
            HTMLMarker.prototype.draw = function() {
                var overlayProjection = this.getProjection();
                var position = overlayProjection.fromLatLngToDivPixel(this.pos);
                var panes = this.getPanes();
                this.html.style.left = position.x + 'px';
                this.html.style.top = position.y - 30 + 'px';
            }

            // Add Markers on the map (mutiple markers suported)
            for (var i = 0; i < mapSettings.customHTMLMarkers.length; i++) {
                var htmlMarker = new HTMLMarker(
                    mapSettings.customHTMLMarkers[i].latitude,
                    mapSettings.customHTMLMarkers[i].longitude,
                    mapSettings.customHTMLMarkers[i].htmlText
                );
                htmlMarker.setMap(mapRef);
            }

            // Styles from https://snazzymaps.com/
            var styles = [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#e9e9e9"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 21
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#dedede"
                }, {
                    "lightness": 21
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#333333"
                }, {
                    "lightness": 40
                }]
            }, {
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f2f2f2"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }];

            var styledMap = new google.maps.StyledMapType(styles, {
                name: 'Styled Map'
            });

            mapRef.mapTypes.set('map_style', styledMap);
            mapRef.setMapTypeId('map_style');

        }

        theme.fn.intObs('#googlemapsAnimatedPin', 'initializeGoogleMapAnimatedPin()', {});
    </script>
@endpush
