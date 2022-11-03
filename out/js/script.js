
var map;

//Se lee el archivo que recibe las coordenadas del gps
function init(data)
{
    team1Data = data[1].toString().split("_");
      if (typeof(map) === "undefined") {
        //Función para inicializar el mapa
        initialize();
      }
      
}

function initialize() 
{
	var mapOptions = {
		zoom: 5,//zoom mapa
		center: new google.maps.LatLng(23.4294846, -100.1749132), //centro del mapa
		streetViewControl: false,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
  
    map = new google.maps.Map(document.getElementById('mapcanvas'),mapOptions);//creamos un nuevo objeto de las librerias

	var marker1; 
			
	//creamos las variables para las posiciones del mapa
	var pos1 = new google.maps.LatLng(team1Data[2],team1Data[3]);

		icono = {
			path: google.maps.SymbolPath.CIRCLE,
			strokeColor: '#000000',
			fillColor: '#22F904',
			fillOpacity: .9,
			strokeWeight: 2,
			scale: 6,
		};

	var marker1= new google.maps.Marker({
			position: pos1,
			icon: icono,
			title: "GPS1",
			map: map 
		});////region
}
   