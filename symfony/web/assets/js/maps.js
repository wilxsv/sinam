			var baseLink = "http://localhost/osm/";
			var multimapBaseLink = "http://www.multimap.com/map/browse.cgi?scale=10000&icon=x";
			var setLat = 13.47210;
			var setLon = -88.57178;   
			var setZoom = 8;
            var map;
			var projGoogle;
			var projWGS84;	
			var markersvector;
			function argItems (theArgName) {
				sArgs = location.search.slice(1).split('&');
					r = '';
					for (var i = 0; i < sArgs.length; i++) {
						if (sArgs[i].slice(0,sArgs[i].indexOf('=')) == theArgName) {
								r = sArgs[i].slice(sArgs[i].indexOf('=')+1);
								break;
						}
					}
				return (r.length > 0 ? unescape(r).split(',') : '')
			}			
			
            OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
                defaultHandlerOptions: {
                    'single': true,
                    'double': false,
                    'pixelTolerance': 0,
                    'stopSingle': false,
                    'stopDouble': false
                },

                initialize: function(options) {
                    this.handlerOptions = OpenLayers.Util.extend(
                        {}, this.defaultHandlerOptions
                    );
                    OpenLayers.Control.prototype.initialize.apply(
                        this, arguments
                    ); 
                    this.handler = new OpenLayers.Handler.Click(
                        this, {
                            'click': this.trigger
                        }, this.handlerOptions
                    );
                }, 

                trigger: function(e) {
                    var lonlat = map.getLonLatFromPixel(e.xy);
					var zoom = map.getZoom();
					var vectors = map.getLayersByName('My Location');
					var vector = vectors[0];
					
					map.setCenter(lonlat, map.getZoom());
					updateLocation(map.getCenter(), map.getZoom());
					placeMark(map.getCenter());		
					
					
											  
                }

            });
			
			function placeMark(lonlat) {
				var markersvectorlayer = map.getLayer('Markersvector');
 				markersvectorlayer.removeAllFeatures();					
				point = new OpenLayers.Geometry.Point(lonlat.lon, lonlat.lat);
				markersvectorlayer.addFeatures([
					new OpenLayers.Feature.Vector(
						point,
						{},
						{
							graphicName: 'cross',
							strokeColor: '#f00',
							strokeWidth: 2,
							fillOpacity: 0,
							pointRadius: 10
						}
					)
				]);
			}
			
			function updateLocation(lonlat, zoom) {
			
					// var lonlat = map.getCenter();
					// var zoom = map.getZoom();
					// updateLocation(map.getCenter(), map.getZoom());
					lonlatWGS84 = lonlat.transform(projGoogle, projWGS84);
					
					var lat = lonlatWGS84.lat;
					var lon = lonlatWGS84.lon;
					var latFixed = lat.toFixed(6);
					var lonFixed = lon.toFixed(6);
					
					var message = "geotagged geo:lat=" + latFixed + " geo:lon=" + lonFixed + " "; 
					var messageRoboGEO = latFixed + ";" + lonFixed + ""; 
					
					document.getElementById("busqueda_basica_latitud").value = lat;
					document.getElementById("busqueda_basica_longitud").value = lon;					
					document.getElementById("geocode").value = message;
					document.getElementById("geocodeRoboGEO").value = messageRoboGEO;
					document.getElementById("geocode").focus();
					document.getElementById("geocode").select();
			
			}
			

            function init(){
			
                map = new OpenLayers.Map("map", {
					projection: new OpenLayers.Projection("EPSG:4326"),
					displayProjection: new OpenLayers.Projection("EPSG:4326")
				});
				
				projWGS84 = new OpenLayers.Projection("EPSG:4326");
				projGoogle = new OpenLayers.Projection("EPSG:4326");
				

				var osm = new OpenLayers.Layer.OSM("Open Streetmap");
				osm.setVisibility(true);	
				var gmap = new OpenLayers.Layer.Google("Google Streets", {visibility: false});	
				var gmap2 = new OpenLayers.Layer.Google("Google Satellite", {type: google.maps.MapTypeId.SATELLITE, visibility: false});	
				var gmap3 = new OpenLayers.Layer.Google("Google Hybrid", {type: google.maps.MapTypeId.HYBRID, visibility: false});	
				var gmap4 = new OpenLayers.Layer.Google("Google Terrain", {type: google.maps.MapTypeId.TERRAIN, visibility: false});	

				var vector = new OpenLayers.Layer.Vector('My Location');	
				markersvector = new OpenLayers.Layer.Vector("My Marker");   	
				markersvector.id = "Markersvector";		
				

				map.addLayers([osm, gmap, gmap2, gmap3, gmap4, vector, markersvector]);
                map.addControl(new OpenLayers.Control.LayerSwitcher());
				map.addControl(new OpenLayers.Control.Permalink({div:maplink }));
				map.addControl(new OpenLayers.Control.ScaleLine());
				map.addControl(new OpenLayers.Control.MousePosition({}));
				
				if (!map.getCenter()) {
					var point = new OpenLayers.LonLat(setLon, setLat);
					map.setCenter(point.transform(projWGS84, map.getProjectionObject()), setZoom);
					updateLocation(map.getCenter(), map.getZoom());
					placeMark(map.getCenter());
                } else if (argItems("lat") != '' && argItems("lon") != '') {
					var point = new OpenLayers.LonLat(parseFloat(argItems("lon")).toFixed(6), parseFloat(argItems("lat")).toFixed(6));
					map.setCenter(point.transform(projWGS84, map.getProjectionObject()), setZoom);
					updateLocation(map.getCenter(), map.getZoom());
					placeMark(map.getCenter());

				} else {
				    updateLocation(map.getCenter(), map.getZoom());
					placeMark(map.getCenter());
				}
                
                var click = new OpenLayers.Control.Click();
                map.addControl(click);
                click.activate();
				
				//
				// start code for 'locate me button'
				//
				var pulsate = function(feature) {
					var point = feature.geometry.getCentroid(),
						bounds = feature.geometry.getBounds(),
						radius = Math.abs((bounds.right - bounds.left)/2),
						count = 0,
						grow = 'up';

					var resize = function(){
						if (count>16) {
							clearInterval(window.resizeInterval);
						}
						var interval = radius * 0.03;
						var ratio = interval/radius;
						switch(count) {
							case 4:
							case 12:
								grow = 'down'; break;
							case 8:
								grow = 'up'; break;
						}
						if (grow!=='up') {
							ratio = - Math.abs(ratio);
						}
						feature.geometry.resize(1+ratio, point);
						vector.drawFeature(feature);
						count++;
					};
					window.resizeInterval = window.setInterval(resize, 50, point, radius);
				};
				
				var geolocate = new OpenLayers.Control.Geolocate({
					bind: false,
					geolocationOptions: {
						enableHighAccuracy: false,
						maximumAge: 0,
						timeout: 7000
					}
				});
								
				map.addControl(geolocate);
				var firstGeolocation = true;
				var style = {
					fillColor: '#000',
					fillOpacity: 0.1,
					strokeWidth: 0
				};
				geolocate.events.register("locationupdated",geolocate,function(e) {
					vector.removeAllFeatures();
					var circle = new OpenLayers.Feature.Vector(
						OpenLayers.Geometry.Polygon.createRegularPolygon(
							new OpenLayers.Geometry.Point(e.point.x, e.point.y),
							e.position.coords.accuracy/2,
							40,
							0
						),
						{},
						style
					);
					vector.addFeatures([
						new OpenLayers.Feature.Vector(
							e.point,
							{},
							{
								graphicName: 'cross',
								strokeColor: '#f00',
								strokeWidth: 2,
								fillOpacity: 0,
								pointRadius: 10
							}
						),
						circle
					]);
					if (firstGeolocation) {
						map.zoomToExtent(vector.getDataExtent());
						pulsate(circle);
						firstGeolocation = false;
						this.bind = true;
						updateLocation(map.getCenter(), map.getZoom());
					}
				});
				geolocate.events.register("locationfailed",this,function() {
					OpenLayers.Console.log('Location detection failed');
				});
            }
