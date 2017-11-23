
      var siteurl = 'http://localhost/grimpe2/web/app_dev.php';
      var weburl = 'http://localhost/grimpe2/web';

      var pos = {lat: 43.3, lng: 5.3 };

      var customLabel = {
        falaise: {
          icon :  weburl + '/images/icons/climbing.png'
          //icon: 'images/icons/climbing.png'
        },
        salle: {
          label: 'S'
        }
      };

      // récupération de la date
      sortiedate = $('#sortiedate').val();

      // action sur bouton
      $('#boutondate').on('click', function() {
        //console.log('tada');
        sortiedate = $('#sortiedate').val();
        initMap();
      });


      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 45, lng: 5},
          zoom: 11,
          mapTypeId: 'roadmap',
          // roadmap, terrain, satellite, hybrid
          mapTypeControl: false,
          streetViewControl: false,
          rotateControl: false,
          //scaleControl: true
          styles: 
            [{"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"weight":2.5}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.arterial","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.local","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]}]

        }); // fin options map 

        // fenetre je suis la
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
  
          navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            //console.log(pos);

            //infoWindow.setPosition(pos);
            //infoWindow.setContent('Vous êtes ici.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        //var toc = { a: 3, b: 4};
        //var apiserver = 'http://localhost/grimpe/api/map.php?lat='+pos.lat +'&lon='+pos.lng
        
        //console.log(sortiedate);
        console.log(pos.lat);

        // +sortiedate
        downloadUrl( siteurl +'/api/map/'+pos.lat+'/'+pos.lng+'/'+sortiedate, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var nom = markerElem.getAttribute('nom');
              var siteid = markerElem.getAttribute('id');
              var type = markerElem.getAttribute('type');
              var distance = markerElem.getAttribute('distance');
              var sorties = markerElem.getAttribute('sorties');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              // fenêtre popup sur marker
              var infowincontent = document.createElement('div');
              var strong = document.createElement('a');
              strong.href = siteurl + '/site/'+siteid
              strong.textContent = nom
              // fenetre : titre
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              // fenetre : contenu
              var text = document.createElement('text');
              text.textContent = type
              infowincontent.appendChild(text);
              if( sorties > 0 ) {
                infowincontent.appendChild(document.createElement('br'));
                var text2 = document.createElement('text2');
                text2.textContent = sorties+' sorties'
                infowincontent.appendChild(text2);
              }
              

              // markers
              var icontype = type 
              if( type == 'falaise' && sorties > 0 ) {
                  icontype = 'falaiseok'
              }
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                //icon: 'design/images/icons/'+icontype+'.png'
                //icon: 'images/icons/number_'+sorties+'.png'
                icon: weburl + '/images/icons/number_'+sorties+'.png'
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });

      } // end iniMap()

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Erreur : la géolocalisation a loupé.' :
                              'Erreur : ton navigateur supporte pas la geolocalisation.');
      }


      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}