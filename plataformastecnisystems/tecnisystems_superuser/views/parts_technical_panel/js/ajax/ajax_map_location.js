function new_map(zoomLevel=13,markerFillColor = "#FF99F2",markerStrokeColor = "#555555"){
  var map = new ol.Map({
      target: 'mapSection',
      view: new ol.View({
        center: ol.proj.fromLonLat([-74.0617, 4.6493]),
        zoom: zoomLevel,
        maxZoom:20,
        minZoom:7,
        rotation:0,

      })
    });

  const openStreetMapStandar = new ol.layer.Tile({
    source: new ol.source.OSM(),
    visible:true,
    title:'OSMStandar'
  });

  const openStreetMapHumanitarian = new ol.layer.Tile({
    source: new ol.source.OSM({
      url: 'https://{a-c}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png'
    }),
    visible:false,
    title:'OSMHumanitarian'
  });

  const stamenTerrain = new ol.layer.Tile({
    source: new ol.source.XYZ({
      url: 'http://tile.stamen.com/terrain/{z}/{x}/{y}.png',
      attribution: 'Map tiles by <a href="http://stamen.com">stamen design</a>'
    }),
    visible:false,
    title:'StamenTerrain'
  });

  const stamenToner = new ol.layer.Tile({
    source: new ol.source.XYZ({
      url: 'https://stamen-tiles.a.ssl.fastly.net/toner/{z}/{x}/{y}.png',
      attribution: 'Map tiles by <a href="http://stamen.com">stamen design</a>'
    }),
    visible:false,
    title:'StamenToner'
  });

  map.on("click",function(e){
    console.log(e.coordinate);
  });

  const groupMaps = new ol.layer.Group({
    layers:[openStreetMapStandar,openStreetMapHumanitarian,stamenTerrain,stamenToner]
  });

  map.addLayer(groupMaps);

  let fillColorMarker = new ol.style.Fill({
    color: markerFillColor
  });
  let strokeColorMarker = new ol.style.Stroke({
    color: markerStrokeColor,
    width: 1.5
  });
  let imgColorMarker = new ol.style.Circle({
    fill: fillColorMarker,
    stroke: strokeColorMarker,
    radius: 10
  });

  const usersPoints = new ol.layer.VectorImage({
    source: new ol.source.Vector({
      url: './maps/vector_layer_data/map_info.geojson',
      format: new ol.format.GeoJSON()
    }),
    visible: true,
    title: "usersPointsInfo",
      style: (function() {
        var style = new ol.style.Style({
          image: imgColorMarker,
          text: new ol.style.Text({
            text: 'Hello',
            offsetY:25,
            scale: 1.3,
            fill: new ol.style.Fill({
              color: '#000000'
            }),
            stroke: new ol.style.Stroke({
              color: '#FFFF99',
              width: 3.5
            })
          })
        });

        var styles = [style];

        return function(feature, resolution) {
          style.getText().setText(feature.get("users")+" \n"+feature.get("ubicacion"));
          return styles;
        };
    })()
  });

  map.addLayer(usersPoints);

}
