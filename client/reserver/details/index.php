<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$chaletid = $_GET['id'];
$_SESSION['reservationChaletId'] = $chaletid;
$chalet = new Chalet;
$chaletinfo = $chalet->details($chaletid);

?>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
<title>SnowRent - <?= $chaletinfo[0]['CHALETNom']?></title>
<body>

  <h1 class="text-center"><?=$chaletinfo[0]['CHALETNom'].' - '.$chaletinfo[0]['CHALETVille']?></h1>


  <div class="row mt-5 mb-5">
    <div class="col-12 col-md-6 col-sm-12">
      <img src="<?=ROOTDIR?>upload/chalets/<?=$chaletinfo[0]['CHALETId']?>.png" onerror="this.src='<?=ROOTDIR?>assets/404.png'" class="col-12 col-md"/>
    </div>

    <div class="col-12 col-md-6 col-sm-12 shadow-small rounded p-3">

      <h2 class="text-center"><?=$chaletinfo[0]['CHALETNom']?></h2>
      <h3 class="text-center text-primary"><?=$chaletinfo[1]['CATPrix']?>€ <span class="text-muted small">/ nuit</span></h3>
      <p class="mt-4 p-3"><?=$chaletinfo[0]['CHALETDescription']?></p>
    </div>
  </div>

  <div class="row mt-5 ml-md-5 mr-md-5 ml-3 mr-3 ">
    <div class="col-12 col-md-6">
      <h3>Détails de la location</h3>
      <label class="mt-3">Surface : <?= $chaletinfo[0]['CHALETSurface']?> m²</label></br>
      <label class="mt-3">Categorie : <?= $chaletinfo[1]['CATLibelle']?></label></br>
      <label class="mt-3">Description : <?=$chaletinfo[1]['CATDescription']?></label>
    </div>
    <div class="col-12 col-md-6">
      <h3>Adresse de la location</h3>
      <label class="mt-3">Station de ski : <?= $chaletinfo[0]['CHALETVille'] ?></label></br>

      <label>Code Postal : <?= $chaletinfo[0]['CHALETZip'] ?></label></br>
      <label>Adresse : <?= $chaletinfo[0]['CHALETAdresse'] ?></label></br>
    </div>
  </div>
  <div class="row justify-content-center mt-3">

    <div class=" col-10 ">
      <a href="../informations/" class="btn btn-secondary text-white  ml-auto mr-auto d-block ml-md mr-md mr-5 ml-5 p-2 ">Continuer la réservation <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>
  <div class="row mt-5">
    <div id='map' class="w-100 h-50"></div>
  </div>



</body>
<script>
var adresse = encodeURIComponent('<?=$chaletinfo[0]['CHALETVille']?> <?=$chaletinfo[0]['CHALETAdresse']?>');
 var url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'+adresse+'.json?access_token=pk.eyJ1IjoibWF0dGZpY2tlIiwiYSI6ImNqNnM2YmFoNzAwcTMzM214NTB1NHdwbnoifQ.Or19S7KmYPHW8YjRz82v6g&cachebuster=1554043397048&autocomplete=true';
 fetch(url)
 .then((resp) => resp.json())
 .then(function(data){
   mapboxgl.accessToken = 'pk.eyJ1IjoidmljdG9yZHJuZCIsImEiOiJjanR3eHhhY3oxNDUwNDNsemE1aG5peGl2In0.YeRJsFQXOp8GFHBiQsoHEQ';
   var map = new mapboxgl.Map({
     container: 'map',
     style: 'mapbox://styles/victordrnd/cjtzfnlg20mld1flwntaganwl',
     zoom: 17,
     center: data['features'][0]['center'],
     pitch: 45,
     bearing: -17.6,
     logo : false,
     attributionControl: false
   });
   map.on('load', function() {
     var layers = map.getStyle().layers;
     var labelLayerId;
     for (var i = 0; i < layers.length; i++) {
       if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
         labelLayerId = layers[i].id;
         break;
       }
     }
     map.loadImage('../../../assets/map/pin.png', function(error, image) {
       if (error) throw error;
       map.addImage('cat', image);
       map.addLayer({
         "id": "points",
         "type": "symbol",
         "source": {
           "type": "geojson",
           "data": {
             "type": "FeatureCollection",
             "features": [{
               "type": "Feature",
               "geometry": {
                 "type": "Point",
                 "coordinates": data['features'][0]['center']
               }
             }]
           }
         },
         "layout": {
           "icon-image": "cat",
           "icon-size": 0.25
         }
       });
       map.addLayer({
         'id': '3d-buildings',
         'source': 'composite',
         'source-layer': 'building',
         'filter': ['==', 'extrude', 'true'],
         'type': 'fill-extrusion',
         'minzoom': 15,
         'paint': {
           'fill-extrusion-color': '#007bff',
           // use an 'interpolate' expression to add a smooth transition effect to the
           // buildings as the user zooms in
           'fill-extrusion-height': [
             "interpolate", ["linear"], ["zoom"],
             15, 0,
             15.05, ["get", "height"]
           ],
           'fill-extrusion-base': [
             "interpolate", ["linear"], ["zoom"],
             15, 0,
             15.05, ["get", "min_height"]
           ],
           'fill-extrusion-opacity': 0.8
         }
       }, labelLayerId);

     });
   });
 })
 .catch(function(error){
   console.log(error);
 });

</script>
<?php
include $root.'/includes/footer/footer.php';
?>
