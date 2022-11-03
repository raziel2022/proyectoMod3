<?php
$IDMap=2;//ID del Mapa correspondiente
session_start();
require_once 'PasswordHash.Class.php';
require ("funct.php");
$link = Conectarse();
//Para redireccionar si es que no se cumple
//el logeo
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
				$uri = 'https://';
			}else{
				$uri = 'http://';
			}
		   $uri .= $_SERVER['HTTP_HOST'];

 if(!empty($_SESSION['INGRESO'])){
  if(count($_SESSION['INGRESO'])>0){
	  	  //Recuperamos datos del arreglo
	  	  $IDusr		=$_SESSION['INGRESO']["Id"];
	  	  $Ipusr		=$_SESSION['INGRESO']["Ip"];
	  	  $Claveusr   =$_SESSION['INGRESO']["Clave"];
	  	  $Nombreusr  =$_SESSION['INGRESO']["Nombre"];
	  	  $HorSesion  =$_SESSION['INGRESO']["hora"];
	      //instancia de la clase PHpass
	      $Contrasena = new PasswordHash(8, FALSE);
	      //se uni los datos para verificar
	      $Ccontrase=$IDusr.$Ipusr.$Nombreusr.$HorSesion;
	      if($Contrasena->CheckPassword($Ccontrase, $Claveusr)){
              
              
              
            //Control de Permisos para los mapas  
	         mysql_select_db('logeo') or die('No se pudo seleccionar la base de datos');
            
            $result = mysql_query("SELECT * FROM `permisos` WHERE `IdMAp` = '$IDMap' and IdUsuario='$IDusr';", $link);
            $row = mysql_fetch_array($result);
            if($row['Permiso']==0 or $row==null){
?>

            <script language="JavasScript" type="text/javascript">
                alert("No Tienes permisos para acceder");
                history.back()
            </script>  

<?php
            }
              else{
                
?>
     <!-- ingrese  aquifunciones y diseño de tu pagina de seccion de administracion-->

<!DOCTYPE html>
<html lang="es">
<head>
    
<title>Tracker</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
<script src="http://openlayers.org/api/OpenLayers.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script language="javascript" src="js/fancywebsocket.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAPDrBOdymOdKjQf4e0N-b8Qv-TlCa4kqY&sensor=true"></script>

    
<script>

var map;
var lstMarkers= [];
var lstMarkers1= [];
//Se lee el archivo que recibe las coordenadas del gps
function init()
{
    screen = new Ajax.PeriodicalUpdater('', 'reader_gps.php', { method: 'get', frequency: 60.0,onSuccess: function(t) {

        var data = t.responseText.evalJSON();
			team1Data = data[1].toString().split("_");
			team2Data = data[2].toString().split("_");
			team3Data = data[3].toString().split("_");
			team4Data = data[4].toString().split("_");
			team5Data = data[5].toString().split("_");
			team6Data = data[6].toString().split("_");
			team7Data = data[7].toString().split("_");
			team8Data = data[8].toString().split("_");
			team9Data = data[9].toString().split("_");
			team10Data = data[10].toString().split("_");
			team11Data = data[11].toString().split("_");
			team12Data = data[12].toString().split("_");
			team13Data = data[13].toString().split("_");
			team14Data = data[14].toString().split("_");
			team15Data = data[15].toString().split("_");
			team16Data = data[16].toString().split("_");
			team17Data = data[17].toString().split("_");
			team18Data = data[18].toString().split("_");
			team19Data = data[19].toString().split("_");
			team20Data = data[20].toString().split("_");
			team21Data = data[21].toString().split("_");
			team22Data = data[22].toString().split("_");
			team23Data = data[23].toString().split("_");
			team24Data = data[24].toString().split("_");
			team25Data = data[25].toString().split("_");
			team26Data = data[26].toString().split("_");
			team27Data = data[27].toString().split("_");
			team28Data = data[28].toString().split("_");
			team29Data = data[29].toString().split("_");
			team30Data = data[30].toString().split("_");
			team31Data = data[31].toString().split("_");
			team32Data = data[32].toString().split("_");
			team33Data = data[33].toString().split("_");
			team34Data = data[34].toString().split("_");
			team35Data = data[35].toString().split("_");
			team36Data = data[36].toString().split("_");
			team37Data = data[37].toString().split("_");
			team38Data = data[38].toString().split("_");
			team39Data = data[39].toString().split("_");
			team40Data = data[40].toString().split("_");
			team41Data = data[41].toString().split("_");
			team42Data = data[42].toString().split("_");
			team43Data = data[43].toString().split("_");
			team44Data = data[44].toString().split("_");
			team45Data = data[45].toString().split("_");
			team46Data = data[46].toString().split("_");
			team47Data = data[47].toString().split("_");
			team48Data = data[48].toString().split("_");
			team49Data = data[49].toString().split("_");
			team50Data = data[50].toString().split("_");
			team51Data = data[51].toString().split("_");
			team52Data = data[52].toString().split("_");
			team53Data = data[53].toString().split("_");
			team54Data = data[54].toString().split("_");
			team55Data = data[55].toString().split("_");
			team56Data = data[56].toString().split("_");
			team57Data = data[57].toString().split("_");
			team58Data = data[58].toString().split("_");
			team59Data = data[59].toString().split("_");
			team60Data = data[60].toString().split("_");
			team61Data = data[61].toString().split("_");
			team62Data = data[62].toString().split("_");
			team63Data = data[63].toString().split("_");
			team64Data = data[64].toString().split("_");
			team65Data = data[65].toString().split("_");
			team66Data = data[66].toString().split("_");
			team67Data = data[67].toString().split("_");
			team68Data = data[68].toString().split("_");
			team69Data = data[69].toString().split("_");
			team70Data = data[70].toString().split("_");
			team71Data = data[71].toString().split("_");
			team72Data = data[72].toString().split("_");
			team73Data = data[73].toString().split("_");
			team74Data = data[74].toString().split("_");
			team75Data = data[75].toString().split("_");
			team76Data = data[76].toString().split("_");
			team77Data = data[77].toString().split("_");
			team78Data = data[78].toString().split("_");
			team79Data = data[79].toString().split("_");
			team80Data = data[80].toString().split("_");
			team81Data = data[81].toString().split("_");
			team82Data = data[82].toString().split("_");
			team83Data = data[83].toString().split("_");
			team84Data = data[84].toString().split("_");
			team85Data = data[85].toString().split("_");
			team86Data = data[86].toString().split("_");
			team87Data = data[87].toString().split("_");
			team88Data = data[88].toString().split("_");
			team89Data = data[89].toString().split("_");
			team90Data = data[90].toString().split("_");
			team91Data = data[91].toString().split("_");
			team92Data = data[92].toString().split("_");
			team93Data = data[93].toString().split("_");
			team94Data = data[94].toString().split("_");
			team95Data = data[95].toString().split("_");
			team96Data = data[96].toString().split("_");
			team97Data = data[97].toString().split("_");
			team98Data = data[98].toString().split("_");
			team99Data = data[99].toString().split("_");
			team100Data = data[100].toString().split("_");
			team101Data = data[101].toString().split("_");
			team102Data = data[102].toString().split("_");
			team103Data = data[103].toString().split("_");
			team104Data = data[104].toString().split("_");
			team105Data = data[105].toString().split("_");
			team106Data = data[106].toString().split("_");
			team107Data = data[107].toString().split("_");
			team108Data = data[108].toString().split("_");
			team109Data = data[109].toString().split("_");
			team110Data = data[110].toString().split("_");
			team111Data = data[111].toString().split("_");
			team112Data = data[112].toString().split("_");
			team113Data = data[113].toString().split("_");
			team114Data = data[114].toString().split("_");
			team115Data = data[115].toString().split("_");
			team116Data = data[116].toString().split("_");
			team117Data = data[117].toString().split("_");
			team118Data = data[118].toString().split("_");
			team119Data = data[119].toString().split("_");
			team120Data = data[120].toString().split("_");
			team121Data = data[121].toString().split("_");
			team122Data = data[122].toString().split("_");
			team123Data = data[123].toString().split("_");
			team124Data = data[124].toString().split("_");
			team125Data = data[125].toString().split("_");
			team126Data = data[126].toString().split("_");
			team127Data = data[127].toString().split("_");
			team128Data = data[128].toString().split("_");
			team129Data = data[129].toString().split("_");
			team130Data = data[130].toString().split("_");
			team131Data = data[131].toString().split("_");
			team132Data = data[132].toString().split("_");
			team133Data = data[133].toString().split("_");
			team134Data = data[134].toString().split("_");
			team135Data = data[135].toString().split("_");
			team136Data = data[136].toString().split("_");
			team137Data = data[137].toString().split("_");
			team138Data = data[138].toString().split("_");
			team139Data = data[139].toString().split("_");
			team140Data = data[140].toString().split("_");
			team141Data = data[141].toString().split("_");
			team142Data = data[142].toString().split("_");
			team143Data = data[143].toString().split("_");
			team144Data = data[144].toString().split("_");
			team145Data = data[145].toString().split("_");
			team146Data = data[146].toString().split("_");
			team147Data = data[147].toString().split("_");
			team148Data = data[148].toString().split("_");
			team149Data = data[149].toString().split("_");
			team150Data = data[150].toString().split("_");
			team151Data = data[151].toString().split("_");
			team152Data = data[152].toString().split("_");
			team153Data = data[153].toString().split("_");
			team154Data = data[154].toString().split("_");
			team155Data = data[155].toString().split("_");
			team156Data = data[156].toString().split("_");
			team157Data = data[157].toString().split("_");
			team158Data = data[158].toString().split("_");
			team159Data = data[159].toString().split("_");
			team160Data = data[160].toString().split("_");
			team161Data = data[161].toString().split("_");
			team162Data = data[162].toString().split("_");
			team163Data = data[163].toString().split("_");
			team164Data = data[164].toString().split("_");
			team165Data = data[165].toString().split("_");
			team166Data = data[166].toString().split("_");
			team167Data = data[167].toString().split("_");
			team168Data = data[168].toString().split("_");
			team169Data = data[169].toString().split("_");
			team170Data = data[170].toString().split("_");
			team171Data = data[171].toString().split("_");
			team172Data = data[172].toString().split("_");
			team173Data = data[173].toString().split("_");
			team174Data = data[174].toString().split("_");
			team175Data = data[175].toString().split("_");
			team176Data = data[176].toString().split("_");
			team177Data = data[177].toString().split("_");
			team178Data = data[178].toString().split("_");
			team179Data = data[179].toString().split("_");
			team180Data = data[180].toString().split("_");
			team181Data = data[181].toString().split("_");
			team182Data = data[182].toString().split("_");
			team183Data = data[183].toString().split("_");
			team184Data = data[184].toString().split("_");
			team185Data = data[185].toString().split("_");
			team186Data = data[186].toString().split("_");
			team187Data = data[187].toString().split("_");
			team188Data = data[188].toString().split("_");
			team189Data = data[189].toString().split("_");
			team190Data = data[190].toString().split("_");
			team191Data = data[191].toString().split("_");
			team192Data = data[192].toString().split("_");
			team193Data = data[193].toString().split("_");
			team194Data = data[194].toString().split("_");
			team195Data = data[195].toString().split("_");
			team196Data = data[196].toString().split("_");
			team197Data = data[197].toString().split("_");
			team198Data = data[198].toString().split("_");
			team199Data = data[199].toString().split("_");
			team200Data = data[200].toString().split("_");
			team201Data = data[201].toString().split("_");
			team202Data = data[202].toString().split("_");
			team203Data = data[203].toString().split("_");
			team204Data = data[204].toString().split("_");
			team205Data = data[205].toString().split("_");
			team206Data = data[206].toString().split("_");
			team207Data = data[207].toString().split("_");
			team208Data = data[208].toString().split("_");
			team209Data = data[209].toString().split("_");
			team210Data = data[210].toString().split("_");
			team211Data = data[211].toString().split("_");
			team212Data = data[212].toString().split("_");
			team213Data = data[213].toString().split("_");
			team214Data = data[214].toString().split("_");
			team215Data = data[215].toString().split("_");
			team216Data = data[216].toString().split("_");
			team217Data = data[217].toString().split("_");
			team218Data = data[218].toString().split("_");
			team219Data = data[219].toString().split("_");
			team220Data = data[220].toString().split("_");
			team221Data = data[221].toString().split("_");
			team222Data = data[222].toString().split("_");
			team223Data = data[223].toString().split("_");
			team224Data = data[224].toString().split("_");
			team225Data = data[225].toString().split("_");
			team226Data = data[226].toString().split("_");
			team227Data = data[227].toString().split("_");
			team228Data = data[228].toString().split("_");
			team229Data = data[229].toString().split("_");
			team230Data = data[230].toString().split("_");
			team231Data = data[231].toString().split("_");
			team232Data = data[232].toString().split("_");
			team233Data = data[233].toString().split("_");
			team234Data = data[234].toString().split("_");
			team235Data = data[235].toString().split("_");
			team236Data = data[236].toString().split("_");
			team237Data = data[237].toString().split("_");
			team238Data = data[238].toString().split("_");
			team239Data = data[239].toString().split("_");
			team240Data = data[240].toString().split("_");
			team241Data = data[241].toString().split("_");
			team242Data = data[242].toString().split("_");
			team243Data = data[243].toString().split("_");
			team244Data = data[244].toString().split("_");
			team245Data = data[245].toString().split("_");
			team246Data = data[246].toString().split("_");
			team247Data = data[247].toString().split("_");
			team248Data = data[248].toString().split("_");
			team249Data = data[249].toString().split("_");
			team250Data = data[250].toString().split("_");
			team251Data = data[251].toString().split("_");
			team252Data = data[252].toString().split("_");
			team253Data = data[253].toString().split("_");
			team254Data = data[254].toString().split("_");
			team255Data = data[255].toString().split("_");
			team256Data = data[256].toString().split("_");
			team257Data = data[257].toString().split("_");
			team258Data = data[258].toString().split("_");
			team259Data = data[259].toString().split("_");
			team260Data = data[260].toString().split("_");
			team261Data = data[261].toString().split("_");
			team262Data = data[262].toString().split("_");
			team263Data = data[263].toString().split("_");
			team264Data = data[264].toString().split("_");
			team265Data = data[265].toString().split("_");
			team266Data = data[266].toString().split("_");
			team267Data = data[267].toString().split("_");
			team268Data = data[268].toString().split("_");
			team269Data = data[269].toString().split("_");
			team270Data = data[270].toString().split("_");
			team271Data = data[271].toString().split("_");
			team272Data = data[272].toString().split("_");
			team273Data = data[273].toString().split("_");
			team274Data = data[274].toString().split("_");
			team275Data = data[275].toString().split("_");
			team276Data = data[276].toString().split("_");
			team277Data = data[277].toString().split("_");
			team278Data = data[278].toString().split("_");
			team279Data = data[279].toString().split("_");
			team280Data = data[280].toString().split("_");
			team281Data = data[281].toString().split("_");
			team282Data = data[282].toString().split("_");
			team283Data = data[283].toString().split("_");
			team284Data = data[284].toString().split("_");
			team285Data = data[285].toString().split("_");

			
			

	if (typeof(map) === "undefined") {
			    //Función para inicializar el mapa
			    initialize();

			}
        
        //Funcion para animar los marcadores
        animar();
    }});
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

    
    
}
 

//Marcadores para posicion del estado de Fuerza
    var marcadoresF = [
        ["'<img src='img/efuerza/AGU.png'>", 21.8762944, -102.2520916],
        ["'<img src='img/efuerza/BJN.png'>", 32.542047, -116.992736],
        ["'<img src='img/efuerza/BJS.png'>", 24.128977, -110.346481],
        ["'<img src='img/efuerza/CAM.png'>", 19.831120, -90.559193],
        ["'<img src='img/efuerza/CDMX.png'>", 19.3703083,-99.060552],
        ["'<img src='img/efuerza/CHH.png'>", 28.699138, -106.1219388],
        ["'<img src='img/efuerza/CHI.png'>", 16.724456, -93.033017],
        ["'<img src='img/efuerza/COAH.png'>", 25.764670, -103.100785],
        ["'<img src='img/efuerza/COL.png'>", 19.0866007, -104.3091576],
        ["'<img src='img/efuerza/DGO.png'>", 24.091393, -104.577935],
        ["'<img src='img/efuerza/EMEX.png'>", 19.4534, -99.229419],
        ["'<img src='img/efuerza/GRO.png'>", 17.543333, -99.509444],
        ["'<img src='img/efuerza/GUA.png'>", 20.667372, -101.321786],
        ["'<img src='img/efuerza/HID.png'>", 20.0830555, -98.7795833],
        ["'<img src='img/efuerza/JAL.png'>", 20.7398055, -103.4494611],
        ["'<img src='img/efuerza/MICH.png'>", 19.71245373,-101.22851305],
        ["'<img src='img/efuerza/MOR.png'>", 18.921408,-99.202219],
        ["'<img src='img/efuerza/NAY.png'>", 21.43540048,-104.87328638],
        ["'<img src='img/efuerza/NL.png'>", 25.856388, -100.258333],
        ["'<img src='img/efuerza/OAX.png'>", 17.075694, -96.697508],
        ["'<img src='img/efuerza/PUE.png'>", 19.025055, -98.166916],
        ["'<img src='img/efuerza/QRRO.png'>", 21.223353,-86.922072],
        ["'<img src='img/efuerza/QTO.png'>", 20.57933297,-100.3630397],
        ["'<img src='img/efuerza/SIN.png'>", 24.780333, -107.500194],
        ["'<img src='img/efuerza/SLP.png'>", 22.102861, -100.889853],
        ["'<img src='img/efuerza/SON.png'>", 29.095053, -111.005728],
        ["'<img src='img/efuerza/TAB.png'>", 17.985555, -92.9397222],
        ["'<img src='img/efuerza/TAM.png'>", 23.770849, -99.137888],
        ["'<img src='img/efuerza/TLAX.png'>", 19.33593606,-98.19925084],
        ["'<img src='img/efuerza/VER.png'>", 19.1407694, -96.149877],
        ["'<img src='img/efuerza/YUC.png'>", 20.946653, -89.654292],
        ["'<img src='img/efuerza/ZAC.png'>", 22.76820, -102.58209]
        
      ];
      
      var infowindow = new google.maps.InfoWindow();
      var MANDOS, i;
       
    
      for (i = 0; i < marcadoresF.length; i++) { 
        MANDOS = new google.maps.Marker({
          position: new google.maps.LatLng(marcadoresF[i][1], marcadoresF[i][2]),
          icon: 'img/icons/icono3.png',
          map: map
        });
        lstMarkers.push(MANDOS);  
        google.maps.event.addListener(MANDOS, 'click', (function(MANDOS, i) {
          return function() {
            infowindow.setContent(marcadoresF[i][0]);
            infowindow.open(map, MANDOS);
          }
        })(MANDOS, i));
       
        
      }
    
    
    //Marcadores para posicion de los ceferesos
    
    var marcadoresEdo = [
        ["'<img src='img/ceferesos/c11.png'>", 28.9685, -111.2861],
        ["'<img src='img/ceferesos/c9.png'>", 31.49278, -106.4566],
        ["'<img src='img/ceferesos/c8.png'>", 25.5259, -108.5312],
        ["'<img src='img/ceferesos/c14.png'>", 25.8284, -103.5415],
        ["'<img src='img/ceferesos/c7.png'>", 24.4319, -104.1682],
        ["'<img src='img/ceferesos/c18.png'>", 25.8431, -100.9732],
        ["'<img src='img/ceferesos/c4.png'>", 21.6013, -104.9362],
        ["'<img src='img/ceferesos/c12.png'>", 21.7819, -101.4670],
        ["'<img src='img/ceferesos/c2.png'>", 20.5548, -103.1921],
        ["'<img src='img/ceferesos/c17.png'>", 19.2440, -102.6718],
        ["'<img src='img/ceferesos/c1.png'>", 19.4242, -99.7494],
        ["'<img src='img/ceferesos/c16.png'>", 18.6829, -99.4435],
        ["'<img src='img/ceferesos/cPSI.png'>", 18.7342222, -98.8525833],
        ["'<img src='img/ceferesos/c13.png'>", 16.3838, -96.5883],
        ["'<img src='img/ceferesos/c6.png'>", 17.6562, -93.4932],
        ["'<img src='img/ceferesos/c15.png'>", 15.2484, -92.5933],
        ["'<img src='img/ceferesos/c5.png'>", 19.6249, -97.2203]
        
      ];
      
      var infowindow1 = new google.maps.InfoWindow();
      var CEFERESOS, i;
       
    
      for (i = 0; i < marcadoresEdo.length; i++) { 
        CEFERESOS = new google.maps.Marker({
          position: new google.maps.LatLng(marcadoresEdo[i][1], marcadoresEdo[i][2]),
          icon: 'img/icons/icono4.png',
          map: map
        });
        lstMarkers1.push(CEFERESOS);  
        google.maps.event.addListener(CEFERESOS, 'click', (function(CEFERESOS, i) {
          return function() {
            infowindow1.setContent(marcadoresEdo[i][0]);
            infowindow1.open(map, CEFERESOS);
          }
        })(CEFERESOS, i));
       
        
      }
    
    


function animar()//Crea un nuevo marcador en el mapa
{
	var marker1; 
	var marker2;
	var marker3;
	var marker4;
	var marker5;
	var marker6;
	var marker7;
	var marker8;
	var marker9;
	var marker10;
	var marker11;
	var marker12;
	var marker13;
	var marker14;
	var marker15;
	var marker16;
	var marker17;
	var marker18;
	var marker19;
	var marker20;
	var marker21;
	var marker22;
	var marker23;
	var marker24;
	var marker25;
	var marker26;
	var marker27;
	var marker28;
	var marker29;
	var marker30;
	var marker31;
	var marker32;
	var marker33;
	var marker34;
	var marker35;
	var marker36;
	var marker37;
	var marker38;
	var marker39;
	var marker40;
	var marker41;
	var marker42;
	var marker43;
	var marker44;
	var marker45;
	var marker46;
	var marker47;
	var marker48;
	var marker49;
	var marker50;
	var marker51;
	var marker52;
	var marker53;
	var marker54;
	var marker55;
	var marker56;
	var marker57;
	var marker58;
	var marker59;
	var marker60;
	var marker61;
	var marker62;
	var marker63;
	var marker64;
	var marker65;
	var marker66;
	var marker67;
	var marker68;
	var marker69;
	var marker70;
	var marker71;
	var marker72;
	var marker73;
	var marker74;
	var marker75;
	var marker76;
	var marker77;
	var marker78;
	var marker79;
	var marker80;
	var marker81;
	var marker82;
	var marker83;
	var marker84;
	var marker85;
	var marker86;
	var marker87;
	var marker88;
	var marker89;
	var marker90;
	var marker91;
	var marker92;
	var marker93;
	var marker94;
	var marker95;
	var marker96;
	var marker97;
	var marker98;
	var marker99;
	var marker100;
	var marker101 ;
	var marker102 ;
	var marker103 ;
	var marker104 ;
	var marker105 ;
	var marker106 ;
	var marker107 ;
	var marker108 ;
	var marker109 ;
	var marker110 ;
	var marker111 ;
	var marker112 ;
	var marker113 ;
	var marker114 ;
	var marker115 ;
	var marker116 ;
	var marker117 ;
	var marker118 ;
	var marker119 ;
	var marker120 ;
	var marker121 ;
	var marker122 ;
	var marker123 ;
	var marker124 ;
	var marker125 ;
	var marker126 ;
	var marker127 ;
	var marker128 ;
	var marker129 ;
	var marker130 ;
	var marker131 ;
	var marker132 ;
	var marker133 ;
	var marker134 ;
	var marker135 ;
	var marker136 ;
	var marker137 ;
	var marker138 ;
	var marker139 ;
	var marker140 ;
	var marker141 ;
	var marker142 ;
	var marker143 ;
	var marker144 ;
	var marker145 ;
	var marker146 ;
	var marker147 ;
	var marker148 ;
	var marker149 ;
	var marker150 ;
	var marker151 ;
	var marker152 ;
	var marker153 ;
	var marker154 ;
	var marker155 ;
	var marker156 ;
	var marker157 ;
	var marker158 ;
	var marker159 ;
	var marker160 ;
	var marker161 ;
	var marker162 ;
	var marker163 ;
	var marker164 ;
	var marker165 ;
	var marker166 ;
	var marker167 ;
	var marker168 ;
	var marker169 ;
	var marker170 ;
	var marker171 ;
	var marker172 ;
	var marker173 ;
	var marker174 ;
	var marker175 ;
	var marker176 ;
	var marker177 ;
	var marker178 ;
	var marker179 ;
	var marker180 ;
	var marker181 ;
	var marker182 ;
	var marker183 ;
	var marker184 ;
	var marker185 ;
	var marker186 ;
	var marker187 ;
	var marker188 ;
	var marker189 ;
	var marker190 ;
	var marker191 ;
	var marker192 ;
	var marker193 ;
	var marker194 ;
	var marker195 ;
	var marker196 ;
	var marker197 ;
	var marker198 ;
	var marker199 ;
	var marker200 ;
	var marker201 ;
	var marker202 ;
	var marker203 ;
	var marker204 ;
	var marker205 ;
	var marker206 ;
	var marker207 ;
	var marker208 ;
	var marker209 ;
	var marker210 ;
	var marker211 ;
	var marker212 ;
	var marker213 ;
	var marker214 ;
	var marker215 ;
	var marker216 ;
	var marker217 ;
	var marker218 ;
	var marker219 ;
	var marker220 ;
	var marker221 ;
	var marker222 ;
	var marker223 ;
	var marker224 ;
	var marker225 ;
	var marker226 ;
	var marker227 ;
	var marker228 ;
	var marker229 ;
	var marker230 ;
	var marker231 ;
	var marker232 ;
	var marker233 ;
	var marker234 ;
	var marker235 ;
	var marker236 ;
	var marker237 ;
	var marker238 ;
	var marker239 ;
	var marker240 ;
	var marker241 ;
	var marker242 ;
	var marker243 ;
	var marker244 ;
	var marker245 ;
	var marker246 ;
	var marker247 ;
	var marker248 ;
	var marker249 ;
	var marker250 ;
	var marker251 ;
	var marker252 ;
	var marker253 ;
	var marker254 ;
	var marker255 ;
	var marker256 ;
	var marker257 ;
	var marker258 ;
	var marker259 ;
	var marker260 ;
	var marker261 ;
	var marker262 ;
	var marker263 ;
	var marker264 ;
	var marker265 ;
	var marker266 ;
	var marker267 ;
	var marker268 ;
	var marker269 ;
	var marker270 ;
	var marker271 ;
	var marker272 ;
	var marker273 ;
	var marker274 ;
	var marker275 ;
	var marker276 ;
	var marker277 ;
	var marker278 ;
	var marker279 ;
	var marker280 ;
	var marker281 ;
	var marker282 ;
	var marker283 ;
	var marker284 ;
	var marker285 ;


	
	
    	//creamos las variables para las posiciones del mapa
   	var pos1 = new google.maps.LatLng(team1Data[2],team1Data[3]);
	var pos2 = new google.maps.LatLng(team2Data[2],team2Data[3]);
	var pos3 = new google.maps.LatLng(team3Data[2],team3Data[3]);
	var pos4 = new google.maps.LatLng(team4Data[2],team4Data[3]);
	var pos5 = new google.maps.LatLng(team5Data[2],team5Data[3]);
	var pos6 = new google.maps.LatLng(team6Data[2],team6Data[3]);
	var pos7 = new google.maps.LatLng(team7Data[2],team7Data[3]);
	var pos8 = new google.maps.LatLng(team8Data[2],team8Data[3]);
	var pos9 = new google.maps.LatLng(team9Data[2],team9Data[3]);
	var pos10 = new google.maps.LatLng(team10Data[2],team10Data[3]);
	var pos11 = new google.maps.LatLng(team11Data[2],team11Data[3]);
	var pos12 = new google.maps.LatLng(team12Data[2],team12Data[3]);
	var pos13 = new google.maps.LatLng(team13Data[2],team13Data[3]);
	var pos14 = new google.maps.LatLng(team14Data[2],team14Data[3]);
	var pos15 = new google.maps.LatLng(team15Data[2],team15Data[3]);
	var pos16 = new google.maps.LatLng(team16Data[2],team16Data[3]);
	var pos17 = new google.maps.LatLng(team17Data[2],team17Data[3]);
	var pos18 = new google.maps.LatLng(team18Data[2],team18Data[3]);
	var pos19 = new google.maps.LatLng(team19Data[2],team19Data[3]);
	var pos20 = new google.maps.LatLng(team20Data[2],team20Data[3]);
	var pos21 = new google.maps.LatLng(team21Data[2],team21Data[3]);
	var pos22 = new google.maps.LatLng(team22Data[2],team22Data[3]);
	var pos23 = new google.maps.LatLng(team23Data[2],team23Data[3]);
	var pos24 = new google.maps.LatLng(team24Data[2],team24Data[3]);
	var pos25 = new google.maps.LatLng(team25Data[2],team25Data[3]);
	var pos26 = new google.maps.LatLng(team26Data[2],team26Data[3]);
	var pos27 = new google.maps.LatLng(team27Data[2],team27Data[3]);
	var pos28 = new google.maps.LatLng(team28Data[2],team28Data[3]);
	var pos29 = new google.maps.LatLng(team29Data[2],team29Data[3]);
	var pos30 = new google.maps.LatLng(team30Data[2],team30Data[3]);
	var pos31 = new google.maps.LatLng(team31Data[2],team31Data[3]);
	var pos32 = new google.maps.LatLng(team32Data[2],team32Data[3]);
	var pos33 = new google.maps.LatLng(team33Data[2],team33Data[3]);
	var pos34 = new google.maps.LatLng(team34Data[2],team34Data[3]);
	var pos35 = new google.maps.LatLng(team35Data[2],team35Data[3]);
	var pos36 = new google.maps.LatLng(team36Data[2],team36Data[3]);
	var pos37 = new google.maps.LatLng(team37Data[2],team37Data[3]);
	var pos38 = new google.maps.LatLng(team38Data[2],team38Data[3]);
	var pos39 = new google.maps.LatLng(team39Data[2],team39Data[3]);
	var pos40 = new google.maps.LatLng(team40Data[2],team40Data[3]);
	var pos41 = new google.maps.LatLng(team41Data[2],team41Data[3]);
	var pos42 = new google.maps.LatLng(team42Data[2],team42Data[3]);
	var pos43 = new google.maps.LatLng(team43Data[2],team43Data[3]);
	var pos44 = new google.maps.LatLng(team44Data[2],team44Data[3]);
	var pos45 = new google.maps.LatLng(team45Data[2],team45Data[3]);
	var pos46 = new google.maps.LatLng(team46Data[2],team46Data[3]);
	var pos47 = new google.maps.LatLng(team47Data[2],team47Data[3]);
	var pos48 = new google.maps.LatLng(team48Data[2],team48Data[3]);
	var pos49 = new google.maps.LatLng(team49Data[2],team49Data[3]);
	var pos50 = new google.maps.LatLng(team50Data[2],team50Data[3]);
	var pos51 = new google.maps.LatLng(team51Data[2],team51Data[3]);
	var pos52 = new google.maps.LatLng(team52Data[2],team52Data[3]);
	var pos53 = new google.maps.LatLng(team53Data[2],team53Data[3]);
	var pos54 = new google.maps.LatLng(team54Data[2],team54Data[3]);
	var pos55 = new google.maps.LatLng(team55Data[2],team55Data[3]);
	var pos56 = new google.maps.LatLng(team56Data[2],team56Data[3]);
	var pos57 = new google.maps.LatLng(team57Data[2],team57Data[3]);
	var pos58 = new google.maps.LatLng(team58Data[2],team58Data[3]);
	var pos59 = new google.maps.LatLng(team59Data[2],team59Data[3]);
	var pos60 = new google.maps.LatLng(team60Data[2],team60Data[3]);
	var pos61 = new google.maps.LatLng(team61Data[2],team61Data[3]);
	var pos62 = new google.maps.LatLng(team62Data[2],team62Data[3]);
	var pos63 = new google.maps.LatLng(team63Data[2],team63Data[3]);
	var pos64 = new google.maps.LatLng(team64Data[2],team64Data[3]);
	var pos65 = new google.maps.LatLng(team65Data[2],team65Data[3]);
	var pos66 = new google.maps.LatLng(team66Data[2],team66Data[3]);
	var pos67 = new google.maps.LatLng(team67Data[2],team67Data[3]);
	var pos68 = new google.maps.LatLng(team68Data[2],team68Data[3]);
	var pos69 = new google.maps.LatLng(team69Data[2],team69Data[3]);
	var pos70 = new google.maps.LatLng(team70Data[2],team70Data[3]);
	var pos71 = new google.maps.LatLng(team71Data[2],team71Data[3]);
	var pos72 = new google.maps.LatLng(team72Data[2],team72Data[3]);
	var pos73 = new google.maps.LatLng(team73Data[2],team73Data[3]);
	var pos74 = new google.maps.LatLng(team74Data[2],team74Data[3]);
	var pos75 = new google.maps.LatLng(team75Data[2],team75Data[3]);
	var pos76 = new google.maps.LatLng(team76Data[2],team76Data[3]);
	var pos77 = new google.maps.LatLng(team77Data[2],team77Data[3]);
	var pos78 = new google.maps.LatLng(team78Data[2],team78Data[3]);
	var pos79 = new google.maps.LatLng(team79Data[2],team79Data[3]);
	var pos80 = new google.maps.LatLng(team80Data[2],team80Data[3]);
	var pos81 = new google.maps.LatLng(team81Data[2],team81Data[3]);
	var pos82 = new google.maps.LatLng(team82Data[2],team82Data[3]);
	var pos83 = new google.maps.LatLng(team83Data[2],team83Data[3]);
	var pos84 = new google.maps.LatLng(team84Data[2],team84Data[3]);
	var pos85 = new google.maps.LatLng(team85Data[2],team85Data[3]);
	var pos86 = new google.maps.LatLng(team86Data[2],team86Data[3]);
	var pos87 = new google.maps.LatLng(team87Data[2],team87Data[3]);
	var pos88 = new google.maps.LatLng(team88Data[2],team88Data[3]);
	var pos89 = new google.maps.LatLng(team89Data[2],team89Data[3]);
	var pos90 = new google.maps.LatLng(team90Data[2],team90Data[3]);
	var pos91 = new google.maps.LatLng(team91Data[2],team91Data[3]);
	var pos92 = new google.maps.LatLng(team92Data[2],team92Data[3]);
	var pos93 = new google.maps.LatLng(team93Data[2],team93Data[3]);
	var pos94 = new google.maps.LatLng(team94Data[2],team94Data[3]);
	var pos95 = new google.maps.LatLng(team95Data[2],team95Data[3]);
	var pos96 = new google.maps.LatLng(team96Data[2],team96Data[3]);
	var pos97 = new google.maps.LatLng(team97Data[2],team97Data[3]);
	var pos98 = new google.maps.LatLng(team98Data[2],team98Data[3]);
	var pos99 = new google.maps.LatLng(team99Data[2],team99Data[3]);
	var pos100 = new google.maps.LatLng(team100Data[2],team100Data[3]);
	var pos101 = new google.maps.LatLng(team101Data[2],team101Data[3]);
	var pos102 = new google.maps.LatLng(team102Data[2],team102Data[3]);
	var pos103 = new google.maps.LatLng(team103Data[2],team103Data[3]);
	var pos104 = new google.maps.LatLng(team104Data[2],team104Data[3]);
	var pos105 = new google.maps.LatLng(team105Data[2],team105Data[3]);
	var pos106 = new google.maps.LatLng(team106Data[2],team106Data[3]);
	var pos107 = new google.maps.LatLng(team107Data[2],team107Data[3]);
	var pos108 = new google.maps.LatLng(team108Data[2],team108Data[3]);
	var pos109 = new google.maps.LatLng(team109Data[2],team109Data[3]);
	var pos110 = new google.maps.LatLng(team110Data[2],team110Data[3]);
	var pos111 = new google.maps.LatLng(team111Data[2],team111Data[3]);
	var pos112 = new google.maps.LatLng(team112Data[2],team112Data[3]);
	var pos113 = new google.maps.LatLng(team113Data[2],team113Data[3]);
	var pos114 = new google.maps.LatLng(team114Data[2],team114Data[3]);
	var pos115 = new google.maps.LatLng(team115Data[2],team115Data[3]);
	var pos116 = new google.maps.LatLng(team116Data[2],team116Data[3]);
	var pos117 = new google.maps.LatLng(team117Data[2],team117Data[3]);
	var pos118 = new google.maps.LatLng(team118Data[2],team118Data[3]);
	var pos119 = new google.maps.LatLng(team119Data[2],team119Data[3]);
	var pos120 = new google.maps.LatLng(team120Data[2],team120Data[3]);
	var pos121 = new google.maps.LatLng(team121Data[2],team121Data[3]);
	var pos122 = new google.maps.LatLng(team122Data[2],team122Data[3]);
	var pos123 = new google.maps.LatLng(team123Data[2],team123Data[3]);
	var pos124 = new google.maps.LatLng(team124Data[2],team124Data[3]);
	var pos125 = new google.maps.LatLng(team125Data[2],team125Data[3]);
	var pos126 = new google.maps.LatLng(team126Data[2],team126Data[3]);
	var pos127 = new google.maps.LatLng(team127Data[2],team127Data[3]);
	var pos128 = new google.maps.LatLng(team128Data[2],team128Data[3]);
	var pos129 = new google.maps.LatLng(team129Data[2],team129Data[3]);
	var pos130 = new google.maps.LatLng(team130Data[2],team130Data[3]);
	var pos131 = new google.maps.LatLng(team131Data[2],team131Data[3]);
	var pos132 = new google.maps.LatLng(team132Data[2],team132Data[3]);
	var pos133 = new google.maps.LatLng(team133Data[2],team133Data[3]);
	var pos134 = new google.maps.LatLng(team134Data[2],team134Data[3]);
	var pos135 = new google.maps.LatLng(team135Data[2],team135Data[3]);
	var pos136 = new google.maps.LatLng(team136Data[2],team136Data[3]);
	var pos137 = new google.maps.LatLng(team137Data[2],team137Data[3]);
	var pos138 = new google.maps.LatLng(team138Data[2],team138Data[3]);
	var pos139 = new google.maps.LatLng(team139Data[2],team139Data[3]);
	var pos140 = new google.maps.LatLng(team140Data[2],team140Data[3]);
	var pos141 = new google.maps.LatLng(team141Data[2],team141Data[3]);
	var pos142 = new google.maps.LatLng(team142Data[2],team142Data[3]);
	var pos143 = new google.maps.LatLng(team143Data[2],team143Data[3]);
	var pos144 = new google.maps.LatLng(team144Data[2],team144Data[3]);
	var pos145 = new google.maps.LatLng(team145Data[2],team145Data[3]);
	var pos146 = new google.maps.LatLng(team146Data[2],team146Data[3]);
	var pos147 = new google.maps.LatLng(team147Data[2],team147Data[3]);
	var pos148 = new google.maps.LatLng(team148Data[2],team148Data[3]);
	var pos149 = new google.maps.LatLng(team149Data[2],team149Data[3]);
	var pos150 = new google.maps.LatLng(team150Data[2],team150Data[3]);
	var pos151 = new google.maps.LatLng(team151Data[2],team151Data[3]);
	var pos152 = new google.maps.LatLng(team152Data[2],team152Data[3]);
	var pos153 = new google.maps.LatLng(team153Data[2],team153Data[3]);
	var pos154 = new google.maps.LatLng(team154Data[2],team154Data[3]);
	var pos155 = new google.maps.LatLng(team155Data[2],team155Data[3]);
	var pos156 = new google.maps.LatLng(team156Data[2],team156Data[3]);
	var pos157 = new google.maps.LatLng(team157Data[2],team157Data[3]);
	var pos158 = new google.maps.LatLng(team158Data[2],team158Data[3]);
	var pos159 = new google.maps.LatLng(team159Data[2],team159Data[3]);
	var pos160 = new google.maps.LatLng(team160Data[2],team160Data[3]);
	var pos161 = new google.maps.LatLng(team161Data[2],team161Data[3]);
	var pos162 = new google.maps.LatLng(team162Data[2],team162Data[3]);
	var pos163 = new google.maps.LatLng(team163Data[2],team163Data[3]);
	var pos164 = new google.maps.LatLng(team164Data[2],team164Data[3]);
	var pos165 = new google.maps.LatLng(team165Data[2],team165Data[3]);
	var pos166 = new google.maps.LatLng(team166Data[2],team166Data[3]);
	var pos167 = new google.maps.LatLng(team167Data[2],team167Data[3]);
	var pos168 = new google.maps.LatLng(team168Data[2],team168Data[3]);
	var pos169 = new google.maps.LatLng(team169Data[2],team169Data[3]);
	var pos170 = new google.maps.LatLng(team170Data[2],team170Data[3]);
	var pos171 = new google.maps.LatLng(team171Data[2],team171Data[3]);
	var pos172 = new google.maps.LatLng(team172Data[2],team172Data[3]);
	var pos173 = new google.maps.LatLng(team173Data[2],team173Data[3]);
	var pos174 = new google.maps.LatLng(team174Data[2],team174Data[3]);
	var pos175 = new google.maps.LatLng(team175Data[2],team175Data[3]);
	var pos176 = new google.maps.LatLng(team176Data[2],team176Data[3]);
	var pos177 = new google.maps.LatLng(team177Data[2],team177Data[3]);
	var pos178 = new google.maps.LatLng(team178Data[2],team178Data[3]);
	var pos179 = new google.maps.LatLng(team179Data[2],team179Data[3]);
	var pos180 = new google.maps.LatLng(team180Data[2],team180Data[3]);
	var pos181 = new google.maps.LatLng(team181Data[2],team181Data[3]);
	var pos182 = new google.maps.LatLng(team182Data[2],team182Data[3]);
	var pos183 = new google.maps.LatLng(team183Data[2],team183Data[3]);
	var pos184 = new google.maps.LatLng(team184Data[2],team184Data[3]);
	var pos185 = new google.maps.LatLng(team185Data[2],team185Data[3]);
	var pos186 = new google.maps.LatLng(team186Data[2],team186Data[3]);
	var pos187 = new google.maps.LatLng(team187Data[2],team187Data[3]);
	var pos188 = new google.maps.LatLng(team188Data[2],team188Data[3]);
	var pos189 = new google.maps.LatLng(team189Data[2],team189Data[3]);
	var pos190 = new google.maps.LatLng(team190Data[2],team190Data[3]);
	var pos191 = new google.maps.LatLng(team191Data[2],team191Data[3]);
	var pos192 = new google.maps.LatLng(team192Data[2],team192Data[3]);
	var pos193 = new google.maps.LatLng(team193Data[2],team193Data[3]);
	var pos194 = new google.maps.LatLng(team194Data[2],team194Data[3]);
	var pos195 = new google.maps.LatLng(team195Data[2],team195Data[3]);
	var pos196 = new google.maps.LatLng(team196Data[2],team196Data[3]);
	var pos197 = new google.maps.LatLng(team197Data[2],team197Data[3]);
	var pos198 = new google.maps.LatLng(team198Data[2],team198Data[3]);
	var pos199 = new google.maps.LatLng(team199Data[2],team199Data[3]);
	var pos200 = new google.maps.LatLng(team200Data[2],team200Data[3]);
	var pos201 = new google.maps.LatLng(team201Data[2],team201Data[3]);
	var pos202 = new google.maps.LatLng(team202Data[2],team202Data[3]);
	var pos203 = new google.maps.LatLng(team203Data[2],team203Data[3]);
	var pos204 = new google.maps.LatLng(team204Data[2],team204Data[3]);
	var pos205 = new google.maps.LatLng(team205Data[2],team205Data[3]);
	var pos206 = new google.maps.LatLng(team206Data[2],team206Data[3]);
	var pos207 = new google.maps.LatLng(team207Data[2],team207Data[3]);
	var pos208 = new google.maps.LatLng(team208Data[2],team208Data[3]);
	var pos209 = new google.maps.LatLng(team209Data[2],team209Data[3]);
	var pos210 = new google.maps.LatLng(team210Data[2],team210Data[3]);
	var pos211 = new google.maps.LatLng(team211Data[2],team211Data[3]);
	var pos212 = new google.maps.LatLng(team212Data[2],team212Data[3]);
	var pos213 = new google.maps.LatLng(team213Data[2],team213Data[3]);
	var pos214 = new google.maps.LatLng(team214Data[2],team214Data[3]);
	var pos215 = new google.maps.LatLng(team215Data[2],team215Data[3]);
	var pos216 = new google.maps.LatLng(team216Data[2],team216Data[3]);
	var pos217 = new google.maps.LatLng(team217Data[2],team217Data[3]);
	var pos218 = new google.maps.LatLng(team218Data[2],team218Data[3]);
	var pos219 = new google.maps.LatLng(team219Data[2],team219Data[3]);
	var pos220 = new google.maps.LatLng(team220Data[2],team220Data[3]);
	var pos221 = new google.maps.LatLng(team221Data[2],team221Data[3]);
	var pos222 = new google.maps.LatLng(team222Data[2],team222Data[3]);
	var pos223 = new google.maps.LatLng(team223Data[2],team223Data[3]);
	var pos224 = new google.maps.LatLng(team224Data[2],team224Data[3]);
	var pos225 = new google.maps.LatLng(team225Data[2],team225Data[3]);
	var pos226 = new google.maps.LatLng(team226Data[2],team226Data[3]);
	var pos227 = new google.maps.LatLng(team227Data[2],team227Data[3]);
	var pos228 = new google.maps.LatLng(team228Data[2],team228Data[3]);
	var pos229 = new google.maps.LatLng(team229Data[2],team229Data[3]);
	var pos230 = new google.maps.LatLng(team230Data[2],team230Data[3]);
	var pos231 = new google.maps.LatLng(team231Data[2],team231Data[3]);
	var pos232 = new google.maps.LatLng(team232Data[2],team232Data[3]);
	var pos233 = new google.maps.LatLng(team233Data[2],team233Data[3]);
	var pos234 = new google.maps.LatLng(team234Data[2],team234Data[3]);
	var pos235 = new google.maps.LatLng(team235Data[2],team235Data[3]);
	var pos236 = new google.maps.LatLng(team236Data[2],team236Data[3]);
	var pos237 = new google.maps.LatLng(team237Data[2],team237Data[3]);
	var pos238 = new google.maps.LatLng(team238Data[2],team238Data[3]);
	var pos239 = new google.maps.LatLng(team239Data[2],team239Data[3]);
	var pos240 = new google.maps.LatLng(team240Data[2],team240Data[3]);
	var pos241 = new google.maps.LatLng(team241Data[2],team241Data[3]);
	var pos242 = new google.maps.LatLng(team242Data[2],team242Data[3]);
	var pos243 = new google.maps.LatLng(team243Data[2],team243Data[3]);
	var pos244 = new google.maps.LatLng(team244Data[2],team244Data[3]);
	var pos245 = new google.maps.LatLng(team245Data[2],team245Data[3]);
	var pos246 = new google.maps.LatLng(team246Data[2],team246Data[3]);
	var pos247 = new google.maps.LatLng(team247Data[2],team247Data[3]);
	var pos248 = new google.maps.LatLng(team248Data[2],team248Data[3]);
	var pos249 = new google.maps.LatLng(team249Data[2],team249Data[3]);
	var pos250 = new google.maps.LatLng(team250Data[2],team250Data[3]);
	var pos251 = new google.maps.LatLng(team251Data[2],team251Data[3]);
	var pos252 = new google.maps.LatLng(team252Data[2],team252Data[3]);
	var pos253 = new google.maps.LatLng(team253Data[2],team253Data[3]);
	var pos254 = new google.maps.LatLng(team254Data[2],team254Data[3]);
	var pos255 = new google.maps.LatLng(team255Data[2],team255Data[3]);
	var pos256 = new google.maps.LatLng(team256Data[2],team256Data[3]);
	var pos257 = new google.maps.LatLng(team257Data[2],team257Data[3]);
	var pos258 = new google.maps.LatLng(team258Data[2],team258Data[3]);
	var pos259 = new google.maps.LatLng(team259Data[2],team259Data[3]);
	var pos260 = new google.maps.LatLng(team260Data[2],team260Data[3]);
	var pos261 = new google.maps.LatLng(team261Data[2],team261Data[3]);
	var pos262 = new google.maps.LatLng(team262Data[2],team262Data[3]);
	var pos263 = new google.maps.LatLng(team263Data[2],team263Data[3]);
	var pos264 = new google.maps.LatLng(team264Data[2],team264Data[3]);
	var pos265 = new google.maps.LatLng(team265Data[2],team265Data[3]);
	var pos266 = new google.maps.LatLng(team266Data[2],team266Data[3]);
	var pos267 = new google.maps.LatLng(team267Data[2],team267Data[3]);
	var pos268 = new google.maps.LatLng(team268Data[2],team268Data[3]);
	var pos269 = new google.maps.LatLng(team269Data[2],team269Data[3]);
	var pos270 = new google.maps.LatLng(team270Data[2],team270Data[3]);
	var pos271 = new google.maps.LatLng(team271Data[2],team271Data[3]);
	var pos272 = new google.maps.LatLng(team272Data[2],team272Data[3]);
	var pos273 = new google.maps.LatLng(team273Data[2],team273Data[3]);
	var pos274 = new google.maps.LatLng(team274Data[2],team274Data[3]);
	var pos275 = new google.maps.LatLng(team275Data[2],team275Data[3]);
	var pos276 = new google.maps.LatLng(team276Data[2],team276Data[3]);
	var pos277 = new google.maps.LatLng(team277Data[2],team277Data[3]);
	var pos278 = new google.maps.LatLng(team278Data[2],team278Data[3]);
	var pos279 = new google.maps.LatLng(team279Data[2],team279Data[3]);
	var pos280 = new google.maps.LatLng(team280Data[2],team280Data[3]);
	var pos281 = new google.maps.LatLng(team281Data[2],team281Data[3]);
	var pos282 = new google.maps.LatLng(team282Data[2],team282Data[3]);
	var pos283 = new google.maps.LatLng(team283Data[2],team283Data[3]);
	var pos284 = new google.maps.LatLng(team284Data[2],team284Data[3]);
	var pos285 = new google.maps.LatLng(team285Data[2],team285Data[3]);

	
	

	// se pasan las coordenadas para el auto zoom
	var marcadores = [
		[team1Data[2],team1Data[3]],
		[team2Data[2],team2Data[3]],
		[team3Data[2],team3Data[3]],
		[team4Data[2],team4Data[3]],
		[team5Data[2],team5Data[3]],
		[team6Data[2],team6Data[3]],
		[team7Data[2],team7Data[3]],
		[team8Data[2],team8Data[3]],
		[team9Data[2],team9Data[3]],
		[team10Data[2],team10Data[3]],
		[team11Data[2],team11Data[3]],
		[team12Data[2],team12Data[3]],
		[team13Data[2],team13Data[3]],
		[team14Data[2],team14Data[3]],
		[team15Data[2],team15Data[3]],
		[team16Data[2],team16Data[3]],
		[team17Data[2],team17Data[3]],
		[team18Data[2],team18Data[3]],
		[team19Data[2],team19Data[3]],
		[team20Data[2],team20Data[3]],
		[team21Data[2],team21Data[3]],
		[team22Data[2],team22Data[3]],
		[team23Data[2],team23Data[3]],
		[team24Data[2],team24Data[3]],
		[team25Data[2],team25Data[3]],
		[team26Data[2],team26Data[3]],
		[team27Data[2],team27Data[3]],
		[team28Data[2],team28Data[3]],
		[team29Data[2],team29Data[3]],
		[team30Data[2],team30Data[3]],
		[team31Data[2],team31Data[3]],
		[team32Data[2],team32Data[3]],
		[team33Data[2],team33Data[3]],
		[team34Data[2],team34Data[3]],
		[team35Data[2],team35Data[3]],
		[team36Data[2],team36Data[3]],
		[team37Data[2],team37Data[3]],
		[team38Data[2],team38Data[3]],
		[team39Data[2],team39Data[3]],
		[team40Data[2],team40Data[3]],
		[team41Data[2],team41Data[3]],
		[team42Data[2],team42Data[3]],
		[team43Data[2],team43Data[3]],
		[team44Data[2],team44Data[3]],
		[team45Data[2],team45Data[3]],
		[team46Data[2],team46Data[3]],
		[team47Data[2],team47Data[3]],
		[team48Data[2],team48Data[3]],
		[team49Data[2],team49Data[3]],
		[team50Data[2],team50Data[3]],
		[team51Data[2],team51Data[3]],
		[team52Data[2],team52Data[3]],
		[team53Data[2],team53Data[3]],
		[team54Data[2],team54Data[3]],
		[team55Data[2],team55Data[3]],
		[team56Data[2],team56Data[3]],
		[team57Data[2],team57Data[3]],
		[team58Data[2],team58Data[3]],
		[team59Data[2],team59Data[3]],
		[team60Data[2],team60Data[3]],
		[team61Data[2],team61Data[3]],
		[team62Data[2],team62Data[3]],
		[team63Data[2],team63Data[3]],
		[team64Data[2],team64Data[3]],
		[team65Data[2],team65Data[3]],
		[team66Data[2],team66Data[3]],
		[team67Data[2],team67Data[3]],
		[team68Data[2],team68Data[3]],
		[team69Data[2],team69Data[3]],
		[team70Data[2],team70Data[3]],
		[team71Data[2],team71Data[3]],
		[team72Data[2],team72Data[3]],
		[team73Data[2],team73Data[3]],
		[team74Data[2],team74Data[3]],
		[team75Data[2],team75Data[3]],
		[team76Data[2],team76Data[3]],
		[team77Data[2],team77Data[3]],
		[team78Data[2],team78Data[3]],
		[team79Data[2],team79Data[3]],
		[team80Data[2],team80Data[3]],
		[team81Data[2],team81Data[3]],
		[team82Data[2],team82Data[3]],
		[team83Data[2],team83Data[3]],
		[team84Data[2],team84Data[3]],
		[team85Data[2],team85Data[3]],
		[team86Data[2],team86Data[3]],
		[team87Data[2],team87Data[3]],
		[team88Data[2],team88Data[3]],
		[team89Data[2],team89Data[3]],
		[team90Data[2],team90Data[3]],
		[team91Data[2],team91Data[3]],
		[team92Data[2],team92Data[3]],
		[team93Data[2],team93Data[3]],
		[team94Data[2],team94Data[3]],
		[team95Data[2],team95Data[3]],
		[team96Data[2],team96Data[3]],
		[team97Data[2],team97Data[3]],
		[team98Data[2],team98Data[3]],
		[team99Data[2],team99Data[3]],
		[team100Data[2],team100Data[3]],
		[team101Data[2],team101Data[3]],
		[team102Data[2],team102Data[3]],
		[team103Data[2],team103Data[3]],
		[team104Data[2],team104Data[3]],
		[team105Data[2],team105Data[3]],
		[team106Data[2],team106Data[3]],
		[team107Data[2],team107Data[3]],
		[team108Data[2],team108Data[3]],
		[team109Data[2],team109Data[3]],
		[team110Data[2],team110Data[3]],
		[team111Data[2],team111Data[3]],
		[team112Data[2],team112Data[3]],
		[team113Data[2],team113Data[3]],
		[team114Data[2],team114Data[3]],
		[team115Data[2],team115Data[3]],
		[team116Data[2],team116Data[3]],
		[team117Data[2],team117Data[3]],
		[team118Data[2],team118Data[3]],
		[team119Data[2],team119Data[3]],
		[team120Data[2],team120Data[3]],
		[team121Data[2],team121Data[3]],
		[team122Data[2],team122Data[3]],
		[team123Data[2],team123Data[3]],
		[team124Data[2],team124Data[3]],
		[team125Data[2],team125Data[3]],
		[team126Data[2],team126Data[3]],
		[team127Data[2],team127Data[3]],
		[team128Data[2],team128Data[3]],
		[team129Data[2],team129Data[3]],
		[team130Data[2],team130Data[3]],
		[team131Data[2],team131Data[3]],
		[team132Data[2],team132Data[3]],
		[team133Data[2],team133Data[3]],
		[team134Data[2],team134Data[3]],
		[team135Data[2],team135Data[3]],
		[team136Data[2],team136Data[3]],
		[team137Data[2],team137Data[3]],
		[team138Data[2],team138Data[3]],
		[team139Data[2],team139Data[3]],
		[team140Data[2],team140Data[3]],
		[team141Data[2],team141Data[3]],
		[team142Data[2],team142Data[3]],
		[team143Data[2],team143Data[3]],
		[team144Data[2],team144Data[3]],
		[team145Data[2],team145Data[3]],
		[team146Data[2],team146Data[3]],
		[team147Data[2],team147Data[3]],
		[team148Data[2],team148Data[3]],
		[team149Data[2],team149Data[3]],
		[team150Data[2],team150Data[3]],
		[team151Data[2],team151Data[3]],
		[team152Data[2],team152Data[3]],
		[team153Data[2],team153Data[3]],
		[team154Data[2],team154Data[3]],
		[team155Data[2],team155Data[3]],
		[team156Data[2],team156Data[3]],
		[team157Data[2],team157Data[3]],
		[team158Data[2],team158Data[3]],
		[team159Data[2],team159Data[3]],
		[team160Data[2],team160Data[3]],
		[team161Data[2],team161Data[3]],
		[team162Data[2],team162Data[3]],
		[team163Data[2],team163Data[3]],
		[team164Data[2],team164Data[3]],
		[team165Data[2],team165Data[3]],
		[team166Data[2],team166Data[3]],
		[team167Data[2],team167Data[3]],
		[team168Data[2],team168Data[3]],
		[team169Data[2],team169Data[3]],
		[team170Data[2],team170Data[3]],
		[team171Data[2],team171Data[3]],
		[team172Data[2],team172Data[3]],
		[team173Data[2],team173Data[3]],
		[team174Data[2],team174Data[3]],
		[team175Data[2],team175Data[3]],
		[team176Data[2],team176Data[3]],
		[team177Data[2],team177Data[3]],
		[team178Data[2],team178Data[3]],
		[team179Data[2],team179Data[3]],
		[team180Data[2],team180Data[3]],
		[team181Data[2],team181Data[3]],
		[team182Data[2],team182Data[3]],
		[team183Data[2],team183Data[3]],
		[team184Data[2],team184Data[3]],
		[team185Data[2],team185Data[3]],
		[team186Data[2],team186Data[3]],
		[team187Data[2],team187Data[3]],
		[team188Data[2],team188Data[3]],
		[team189Data[2],team189Data[3]],
		[team190Data[2],team190Data[3]],
		[team191Data[2],team191Data[3]],
		[team192Data[2],team192Data[3]],
		[team193Data[2],team193Data[3]],
		[team194Data[2],team194Data[3]],
		[team195Data[2],team195Data[3]],
		[team196Data[2],team196Data[3]],
		[team197Data[2],team197Data[3]],
		[team198Data[2],team198Data[3]],
		[team199Data[2],team199Data[3]],
		[team200Data[2],team200Data[3]],
		[team201Data[2],team201Data[3]],
		[team202Data[2],team202Data[3]],
		[team203Data[2],team203Data[3]],
		[team204Data[2],team204Data[3]],
		[team205Data[2],team205Data[3]],
		[team206Data[2],team206Data[3]],
		[team207Data[2],team207Data[3]],
		[team208Data[2],team208Data[3]],
		[team209Data[2],team209Data[3]],
		[team210Data[2],team210Data[3]],
		[team211Data[2],team211Data[3]],
		[team212Data[2],team212Data[3]],
		[team213Data[2],team213Data[3]],
		[team214Data[2],team214Data[3]],
		[team215Data[2],team215Data[3]],
		[team216Data[2],team216Data[3]],
		[team217Data[2],team217Data[3]],
		[team218Data[2],team218Data[3]],
		[team219Data[2],team219Data[3]],
		[team220Data[2],team220Data[3]],
		[team221Data[2],team221Data[3]],
		[team222Data[2],team222Data[3]],
		[team223Data[2],team223Data[3]],
		[team224Data[2],team224Data[3]],
		[team225Data[2],team225Data[3]],
		[team226Data[2],team226Data[3]],
		[team227Data[2],team227Data[3]],
		[team228Data[2],team228Data[3]],
		[team229Data[2],team229Data[3]],
		[team230Data[2],team230Data[3]],
		[team231Data[2],team231Data[3]],
		[team232Data[2],team232Data[3]],
		[team233Data[2],team233Data[3]],
		[team234Data[2],team234Data[3]],
		[team235Data[2],team235Data[3]],
		[team236Data[2],team236Data[3]],
		[team237Data[2],team237Data[3]],
		[team238Data[2],team238Data[3]],
		[team239Data[2],team239Data[3]],
		[team240Data[2],team240Data[3]],
		[team241Data[2],team241Data[3]],
		[team242Data[2],team242Data[3]],
		[team243Data[2],team243Data[3]],
		[team244Data[2],team244Data[3]],
		[team245Data[2],team245Data[3]],
		[team246Data[2],team246Data[3]],
		[team247Data[2],team247Data[3]],
		[team248Data[2],team248Data[3]],
		[team249Data[2],team249Data[3]],
		[team250Data[2],team250Data[3]],
		[team251Data[2],team251Data[3]],
		[team252Data[2],team252Data[3]],
		[team253Data[2],team253Data[3]],
		[team254Data[2],team254Data[3]],
		[team255Data[2],team255Data[3]],
		[team256Data[2],team256Data[3]],
		[team257Data[2],team257Data[3]],
		[team258Data[2],team258Data[3]],
		[team259Data[2],team259Data[3]],
		[team260Data[2],team260Data[3]],
		[team261Data[2],team261Data[3]],
		[team262Data[2],team262Data[3]],
		[team263Data[2],team263Data[3]],
		[team264Data[2],team264Data[3]],
		[team265Data[2],team265Data[3]],
		[team266Data[2],team266Data[3]],
		[team267Data[2],team267Data[3]],
		[team268Data[2],team268Data[3]],
		[team269Data[2],team269Data[3]],
		[team270Data[2],team270Data[3]],
		[team271Data[2],team271Data[3]],
		[team272Data[2],team272Data[3]],
		[team273Data[2],team273Data[3]],
		[team274Data[2],team274Data[3]],
		[team275Data[2],team275Data[3]],
		[team276Data[2],team276Data[3]],
		[team277Data[2],team277Data[3]],
		[team278Data[2],team278Data[3]],
		[team279Data[2],team279Data[3]],
		[team280Data[2],team280Data[3]],
		[team281Data[2],team281Data[3]],
		[team282Data[2],team282Data[3]],
		[team283Data[2],team283Data[3]],
		[team284Data[2],team284Data[3]],
		[team285Data[2],team285Data[3]]

		
		
	];
	
	var icono= [];
	
	var hgps1 = team1Data[1].split(':');
	var hgps2 = team2Data[1].split(':');
	var hgps3 = team3Data[1].split(':');
	var hgps4 = team4Data[1].split(':');
	var hgps5 = team5Data[1].split(':');
	var hgps6 = team6Data[1].split(':');
	var hgps7 = team7Data[1].split(':');
	var hgps8 = team8Data[1].split(':');
	var hgps9 = team9Data[1].split(':');
	var hgps10 = team10Data[1].split(':');
	var hgps11 = team11Data[1].split(':');
	var hgps12 = team12Data[1].split(':');
	var hgps13 = team13Data[1].split(':');
	var hgps14 = team14Data[1].split(':');
	var hgps15 = team15Data[1].split(':');
	var hgps16 = team16Data[1].split(':');
	var hgps17 = team17Data[1].split(':');
	var hgps18 = team18Data[1].split(':');
	var hgps19 = team19Data[1].split(':');
	var hgps20 = team20Data[1].split(':');
	var hgps21 = team21Data[1].split(':');
	var hgps22 = team22Data[1].split(':');
	var hgps23 = team23Data[1].split(':');
	var hgps24 = team24Data[1].split(':');
	var hgps25 = team25Data[1].split(':');
	var hgps26 = team26Data[1].split(':');
	var hgps27 = team27Data[1].split(':');
	var hgps28 = team28Data[1].split(':');
	var hgps29 = team29Data[1].split(':');
	var hgps30 = team30Data[1].split(':');
	var hgps31 = team31Data[1].split(':');
	var hgps32 = team32Data[1].split(':');
	var hgps33 = team33Data[1].split(':');
	var hgps34 = team34Data[1].split(':');
	var hgps35 = team35Data[1].split(':');
	var hgps36 = team36Data[1].split(':');
	var hgps37 = team37Data[1].split(':');
	var hgps38 = team38Data[1].split(':');
	var hgps39 = team39Data[1].split(':');
	var hgps40 = team40Data[1].split(':');
	var hgps41 = team41Data[1].split(':');
	var hgps42 = team42Data[1].split(':');
	var hgps43 = team43Data[1].split(':');
	var hgps44 = team44Data[1].split(':');
	var hgps45 = team45Data[1].split(':');
	var hgps46 = team46Data[1].split(':');
	var hgps47 = team47Data[1].split(':');
	var hgps48 = team48Data[1].split(':');
	var hgps49 = team49Data[1].split(':');
	var hgps50 = team50Data[1].split(':');
	var hgps51 = team51Data[1].split(':');
	var hgps52 = team52Data[1].split(':');
	var hgps53 = team53Data[1].split(':');
	var hgps54 = team54Data[1].split(':');
	var hgps55 = team55Data[1].split(':');
	var hgps56 = team56Data[1].split(':');
	var hgps57 = team57Data[1].split(':');
	var hgps58 = team58Data[1].split(':');
	var hgps59 = team59Data[1].split(':');
	var hgps60 = team60Data[1].split(':');
	var hgps61 = team61Data[1].split(':');
	var hgps62 = team62Data[1].split(':');
	var hgps63 = team63Data[1].split(':');
	var hgps64 = team64Data[1].split(':');
	var hgps65 = team65Data[1].split(':');
	var hgps66 = team66Data[1].split(':');
	var hgps67 = team67Data[1].split(':');
	var hgps68 = team68Data[1].split(':');
	var hgps69 = team69Data[1].split(':');
	var hgps70 = team70Data[1].split(':');
	var hgps71 = team71Data[1].split(':');
	var hgps72 = team72Data[1].split(':');
	var hgps73 = team73Data[1].split(':');
	var hgps74 = team74Data[1].split(':');
	var hgps75 = team75Data[1].split(':');
	var hgps76 = team76Data[1].split(':');
	var hgps77 = team77Data[1].split(':');
	var hgps78 = team78Data[1].split(':');
	var hgps79 = team79Data[1].split(':');
	var hgps80 = team80Data[1].split(':');
	var hgps81 = team81Data[1].split(':');
	var hgps82 = team82Data[1].split(':');
	var hgps83 = team83Data[1].split(':');
	var hgps84 = team84Data[1].split(':');
	var hgps85 = team85Data[1].split(':');
	var hgps86 = team86Data[1].split(':');
	var hgps87 = team87Data[1].split(':');
	var hgps88 = team88Data[1].split(':');
	var hgps89 = team89Data[1].split(':');
	var hgps90 = team90Data[1].split(':');
	var hgps91 = team91Data[1].split(':');
	var hgps92 = team92Data[1].split(':');
	var hgps93 = team93Data[1].split(':');
	var hgps94 = team94Data[1].split(':');
	var hgps95 = team95Data[1].split(':');
	var hgps96 = team96Data[1].split(':');
	var hgps97 = team97Data[1].split(':');
	var hgps98 = team98Data[1].split(':');
	var hgps99 = team99Data[1].split(':');
	var hgps100 = team100Data[1].split(':');
	var hgps101 = team101Data[1].split(':');
	var hgps102 = team102Data[1].split(':');
	var hgps103 = team103Data[1].split(':');
	var hgps104 = team104Data[1].split(':');
	var hgps105 = team105Data[1].split(':');
	var hgps106 = team106Data[1].split(':');
	var hgps107 = team107Data[1].split(':');
	var hgps108 = team108Data[1].split(':');
	var hgps109 = team109Data[1].split(':');
	var hgps110 = team110Data[1].split(':');
	var hgps111 = team111Data[1].split(':');
	var hgps112 = team112Data[1].split(':');
	var hgps113 = team113Data[1].split(':');
	var hgps114 = team114Data[1].split(':');
	var hgps115 = team115Data[1].split(':');
	var hgps116 = team116Data[1].split(':');
	var hgps117 = team117Data[1].split(':');
	var hgps118 = team118Data[1].split(':');
	var hgps119 = team119Data[1].split(':');
	var hgps120 = team120Data[1].split(':');
	var hgps121 = team121Data[1].split(':');
	var hgps122 = team122Data[1].split(':');
	var hgps123 = team123Data[1].split(':');
	var hgps124 = team124Data[1].split(':');
	var hgps125 = team125Data[1].split(':');
	var hgps126 = team126Data[1].split(':');
	var hgps127 = team127Data[1].split(':');
	var hgps128 = team128Data[1].split(':');
	var hgps129 = team129Data[1].split(':');
	var hgps130 = team130Data[1].split(':');
	var hgps131 = team131Data[1].split(':');
	var hgps132 = team132Data[1].split(':');
	var hgps133 = team133Data[1].split(':');
	var hgps134 = team134Data[1].split(':');
	var hgps135 = team135Data[1].split(':');
	var hgps136 = team136Data[1].split(':');
	var hgps137 = team137Data[1].split(':');
	var hgps138 = team138Data[1].split(':');
	var hgps139 = team139Data[1].split(':');
	var hgps140 = team140Data[1].split(':');
	var hgps141 = team141Data[1].split(':');
	var hgps142 = team142Data[1].split(':');
	var hgps143 = team143Data[1].split(':');
	var hgps144 = team144Data[1].split(':');
	var hgps145 = team145Data[1].split(':');
	var hgps146 = team146Data[1].split(':');
	var hgps147 = team147Data[1].split(':');
	var hgps148 = team148Data[1].split(':');
	var hgps149 = team149Data[1].split(':');
	var hgps150 = team150Data[1].split(':');
	var hgps151 = team151Data[1].split(':');
	var hgps152 = team152Data[1].split(':');
	var hgps153 = team153Data[1].split(':');
	var hgps154 = team154Data[1].split(':');
	var hgps155 = team155Data[1].split(':');
	var hgps156 = team156Data[1].split(':');
	var hgps157 = team157Data[1].split(':');
	var hgps158 = team158Data[1].split(':');
	var hgps159 = team159Data[1].split(':');
	var hgps160 = team160Data[1].split(':');
	var hgps161 = team161Data[1].split(':');
	var hgps162 = team162Data[1].split(':');
	var hgps163 = team163Data[1].split(':');
	var hgps164 = team164Data[1].split(':');
	var hgps165 = team165Data[1].split(':');
	var hgps166 = team166Data[1].split(':');
	var hgps167 = team167Data[1].split(':');
	var hgps168 = team168Data[1].split(':');
	var hgps169 = team169Data[1].split(':');
	var hgps170 = team170Data[1].split(':');
	var hgps171 = team171Data[1].split(':');
	var hgps172 = team172Data[1].split(':');
	var hgps173 = team173Data[1].split(':');
	var hgps174 = team174Data[1].split(':');
	var hgps175 = team175Data[1].split(':');
	var hgps176 = team176Data[1].split(':');
	var hgps177 = team177Data[1].split(':');
	var hgps178 = team178Data[1].split(':');
	var hgps179 = team179Data[1].split(':');
	var hgps180 = team180Data[1].split(':');
	var hgps181 = team181Data[1].split(':');
	var hgps182 = team182Data[1].split(':');
	var hgps183 = team183Data[1].split(':');
	var hgps184 = team184Data[1].split(':');
	var hgps185 = team185Data[1].split(':');
	var hgps186 = team186Data[1].split(':');
	var hgps187 = team187Data[1].split(':');
	var hgps188 = team188Data[1].split(':');
	var hgps189 = team189Data[1].split(':');
	var hgps190 = team190Data[1].split(':');
	var hgps191 = team191Data[1].split(':');
	var hgps192 = team192Data[1].split(':');
	var hgps193 = team193Data[1].split(':');
	var hgps194 = team194Data[1].split(':');
	var hgps195 = team195Data[1].split(':');
	var hgps196 = team196Data[1].split(':');
	var hgps197 = team197Data[1].split(':');
	var hgps198 = team198Data[1].split(':');
	var hgps199 = team199Data[1].split(':');
	var hgps200 = team200Data[1].split(':');
	var hgps201 = team201Data[1].split(':');
	var hgps202 = team202Data[1].split(':');
	var hgps203 = team203Data[1].split(':');
	var hgps204 = team204Data[1].split(':');
	var hgps205 = team205Data[1].split(':');
	var hgps206 = team206Data[1].split(':');
	var hgps207 = team207Data[1].split(':');
	var hgps208 = team208Data[1].split(':');
	var hgps209 = team209Data[1].split(':');
	var hgps210 = team210Data[1].split(':');
	var hgps211 = team211Data[1].split(':');
	var hgps212 = team212Data[1].split(':');
	var hgps213 = team213Data[1].split(':');
	var hgps214 = team214Data[1].split(':');
	var hgps215 = team215Data[1].split(':');
	var hgps216 = team216Data[1].split(':');
	var hgps217 = team217Data[1].split(':');
	var hgps218 = team218Data[1].split(':');
	var hgps219 = team219Data[1].split(':');
	var hgps220 = team220Data[1].split(':');
	var hgps221 = team221Data[1].split(':');
	var hgps222 = team222Data[1].split(':');
	var hgps223 = team223Data[1].split(':');
	var hgps224 = team224Data[1].split(':');
	var hgps225 = team225Data[1].split(':');
	var hgps226 = team226Data[1].split(':');
	var hgps227 = team227Data[1].split(':');
	var hgps228 = team228Data[1].split(':');
	var hgps229 = team229Data[1].split(':');
	var hgps230 = team230Data[1].split(':');
	var hgps231 = team231Data[1].split(':');
	var hgps232 = team232Data[1].split(':');
	var hgps233 = team233Data[1].split(':');
	var hgps234 = team234Data[1].split(':');
	var hgps235 = team235Data[1].split(':');
	var hgps236 = team236Data[1].split(':');
	var hgps237 = team237Data[1].split(':');
	var hgps238 = team238Data[1].split(':');
	var hgps239 = team239Data[1].split(':');
	var hgps240 = team240Data[1].split(':');
	var hgps241 = team241Data[1].split(':');
	var hgps242 = team242Data[1].split(':');
	var hgps243 = team243Data[1].split(':');
	var hgps244 = team244Data[1].split(':');
	var hgps245 = team245Data[1].split(':');
	var hgps246 = team246Data[1].split(':');
	var hgps247 = team247Data[1].split(':');
	var hgps248 = team248Data[1].split(':');
	var hgps249 = team249Data[1].split(':');
	var hgps250 = team250Data[1].split(':');
	var hgps251 = team251Data[1].split(':');
	var hgps252 = team252Data[1].split(':');
	var hgps253 = team253Data[1].split(':');
	var hgps254 = team254Data[1].split(':');
	var hgps255 = team255Data[1].split(':');
	var hgps256 = team256Data[1].split(':');
	var hgps257 = team257Data[1].split(':');
	var hgps258 = team258Data[1].split(':');
	var hgps259 = team259Data[1].split(':');
	var hgps260 = team260Data[1].split(':');
	var hgps261 = team261Data[1].split(':');
	var hgps262 = team262Data[1].split(':');
	var hgps263 = team263Data[1].split(':');
	var hgps264 = team264Data[1].split(':');
	var hgps265 = team265Data[1].split(':');
	var hgps266 = team266Data[1].split(':');
	var hgps267 = team267Data[1].split(':');
	var hgps268 = team268Data[1].split(':');
	var hgps269 = team269Data[1].split(':');
	var hgps270 = team270Data[1].split(':');
	var hgps271 = team271Data[1].split(':');
	var hgps272 = team272Data[1].split(':');
	var hgps273 = team273Data[1].split(':');
	var hgps274 = team274Data[1].split(':');
	var hgps275 = team275Data[1].split(':');
	var hgps276 = team276Data[1].split(':');
	var hgps277 = team277Data[1].split(':');
	var hgps278 = team278Data[1].split(':');
	var hgps279 = team279Data[1].split(':');
	var hgps280 = team280Data[1].split(':');
	var hgps281 = team281Data[1].split(':');
	var hgps282 = team282Data[1].split(':');
	var hgps283 = team283Data[1].split(':');
	var hgps284 = team284Data[1].split(':');
	var hgps285 = team285Data[1].split(':');

	var Fecha = team1Data[0].split('-');
	
	var d = new Date();
	var year = d.getFullYear();
	var mes = d.getMonth();
	var dia = d.getDate();
    var h = d.getHours();
    var m = d.getMinutes();
	var s = d.getSeconds();
	
	var gpsyear=Fecha[0];
	var gpsmes=parseInt(Fecha[1]);
	var gpsday=Fecha[2];
	
	var dh = [
		[parseInt(hgps1[0])],
		[parseInt(hgps2[0])],
		[parseInt(hgps3[0])],
		[parseInt(hgps4[0])],
		[parseInt(hgps5[0])],
		[parseInt(hgps6[0])],
		[parseInt(hgps7[0])],
		[parseInt(hgps8[0])],
		[parseInt(hgps9[0])],
		[parseInt(hgps10[0])],
		[parseInt(hgps11[0])],
		[parseInt(hgps12[0])],
		[parseInt(hgps13[0])],
		[parseInt(hgps14[0])],
		[parseInt(hgps15[0])],
		[parseInt(hgps16[0])],
		[parseInt(hgps17[0])],
		[parseInt(hgps18[0])],
		[parseInt(hgps19[0])],
		[parseInt(hgps20[0])],
		[parseInt(hgps21[0])],
		[parseInt(hgps22[0])],
		[parseInt(hgps23[0])],
		[parseInt(hgps24[0])],
		[parseInt(hgps25[0])],
		[parseInt(hgps26[0])],
		[parseInt(hgps27[0])],
		[parseInt(hgps28[0])],
		[parseInt(hgps29[0])],
		[parseInt(hgps30[0])],
		[parseInt(hgps31[0])],
		[parseInt(hgps32[0])],
		[parseInt(hgps33[0])],
		[parseInt(hgps34[0])],
		[parseInt(hgps35[0])],
		[parseInt(hgps36[0])],
		[parseInt(hgps37[0])],
		[parseInt(hgps38[0])],
		[parseInt(hgps39[0])],
		[parseInt(hgps40[0])],
		[parseInt(hgps41[0])],
		[parseInt(hgps42[0])],
		[parseInt(hgps43[0])],
		[parseInt(hgps44[0])],
		[parseInt(hgps45[0])],
		[parseInt(hgps46[0])],
		[parseInt(hgps47[0])],
		[parseInt(hgps48[0])],
		[parseInt(hgps49[0])],
		[parseInt(hgps50[0])],
		[parseInt(hgps51[0])],
		[parseInt(hgps52[0])],
		[parseInt(hgps53[0])],
		[parseInt(hgps54[0])],
		[parseInt(hgps55[0])],
		[parseInt(hgps56[0])],
		[parseInt(hgps57[0])],
		[parseInt(hgps58[0])],
		[parseInt(hgps59[0])],
		[parseInt(hgps60[0])],
		[parseInt(hgps61[0])],
		[parseInt(hgps62[0])],
		[parseInt(hgps63[0])],
		[parseInt(hgps64[0])],
		[parseInt(hgps65[0])],
		[parseInt(hgps66[0])],
		[parseInt(hgps67[0])],
		[parseInt(hgps68[0])],
		[parseInt(hgps69[0])],
		[parseInt(hgps70[0])],
		[parseInt(hgps71[0])],
		[parseInt(hgps72[0])],
		[parseInt(hgps73[0])],
		[parseInt(hgps74[0])],
		[parseInt(hgps75[0])],
		[parseInt(hgps76[0])],
		[parseInt(hgps77[0])],
		[parseInt(hgps78[0])],
		[parseInt(hgps79[0])],
		[parseInt(hgps80[0])],
		[parseInt(hgps81[0])],
		[parseInt(hgps82[0])],
		[parseInt(hgps83[0])],
		[parseInt(hgps84[0])],
		[parseInt(hgps85[0])],
		[parseInt(hgps86[0])],
		[parseInt(hgps87[0])],
		[parseInt(hgps88[0])],
		[parseInt(hgps89[0])],
		[parseInt(hgps90[0])],
		[parseInt(hgps91[0])],
		[parseInt(hgps92[0])],
		[parseInt(hgps93[0])],
		[parseInt(hgps94[0])],
		[parseInt(hgps95[0])],
		[parseInt(hgps96[0])],
		[parseInt(hgps97[0])],
		[parseInt(hgps98[0])],
		[parseInt(hgps99[0])],
		[parseInt(hgps100[0])],
		[parseInt(hgps101[0])],
		[parseInt(hgps102[0])],
		[parseInt(hgps103[0])],
		[parseInt(hgps104[0])],
		[parseInt(hgps105[0])],
		[parseInt(hgps106[0])],
		[parseInt(hgps107[0])],
		[parseInt(hgps108[0])],
		[parseInt(hgps109[0])],
		[parseInt(hgps110[0])],
		[parseInt(hgps111[0])],
		[parseInt(hgps112[0])],
		[parseInt(hgps113[0])],
		[parseInt(hgps114[0])],
		[parseInt(hgps115[0])],
		[parseInt(hgps116[0])],
		[parseInt(hgps117[0])],
		[parseInt(hgps118[0])],
		[parseInt(hgps119[0])],
		[parseInt(hgps120[0])],
		[parseInt(hgps121[0])],
		[parseInt(hgps122[0])],
		[parseInt(hgps123[0])],
		[parseInt(hgps124[0])],
		[parseInt(hgps125[0])],
		[parseInt(hgps126[0])],
		[parseInt(hgps127[0])],
		[parseInt(hgps128[0])],
		[parseInt(hgps129[0])],
		[parseInt(hgps130[0])],
		[parseInt(hgps131[0])],
		[parseInt(hgps132[0])],
		[parseInt(hgps133[0])],
		[parseInt(hgps134[0])],
		[parseInt(hgps135[0])],
		[parseInt(hgps136[0])],
		[parseInt(hgps137[0])],
		[parseInt(hgps138[0])],
		[parseInt(hgps139[0])],
		[parseInt(hgps140[0])],
		[parseInt(hgps141[0])],
		[parseInt(hgps142[0])],
		[parseInt(hgps143[0])],
		[parseInt(hgps144[0])],
		[parseInt(hgps145[0])],
		[parseInt(hgps146[0])],
		[parseInt(hgps147[0])],
		[parseInt(hgps148[0])],
		[parseInt(hgps149[0])],
		[parseInt(hgps150[0])],
		[parseInt(hgps151[0])],
		[parseInt(hgps152[0])],
		[parseInt(hgps153[0])],
		[parseInt(hgps154[0])],
		[parseInt(hgps155[0])],
		[parseInt(hgps156[0])],
		[parseInt(hgps157[0])],
		[parseInt(hgps158[0])],
		[parseInt(hgps159[0])],
		[parseInt(hgps160[0])],
		[parseInt(hgps161[0])],
		[parseInt(hgps162[0])],
		[parseInt(hgps163[0])],
		[parseInt(hgps164[0])],
		[parseInt(hgps165[0])],
		[parseInt(hgps166[0])],
		[parseInt(hgps167[0])],
		[parseInt(hgps168[0])],
		[parseInt(hgps169[0])],
		[parseInt(hgps170[0])],
		[parseInt(hgps171[0])],
		[parseInt(hgps172[0])],
		[parseInt(hgps173[0])],
		[parseInt(hgps174[0])],
		[parseInt(hgps175[0])],
		[parseInt(hgps176[0])],
		[parseInt(hgps177[0])],
		[parseInt(hgps178[0])],
		[parseInt(hgps179[0])],
		[parseInt(hgps180[0])],
		[parseInt(hgps181[0])],
		[parseInt(hgps182[0])],
		[parseInt(hgps183[0])],
		[parseInt(hgps184[0])],
		[parseInt(hgps185[0])],
		[parseInt(hgps186[0])],
		[parseInt(hgps187[0])],
		[parseInt(hgps188[0])],
		[parseInt(hgps189[0])],
		[parseInt(hgps190[0])],
		[parseInt(hgps191[0])],
		[parseInt(hgps192[0])],
		[parseInt(hgps193[0])],
		[parseInt(hgps194[0])],
		[parseInt(hgps195[0])],
		[parseInt(hgps196[0])],
		[parseInt(hgps197[0])],
		[parseInt(hgps198[0])],
		[parseInt(hgps199[0])],
		[parseInt(hgps200[0])],
		[parseInt(hgps201[0])],
		[parseInt(hgps202[0])],
		[parseInt(hgps203[0])],
		[parseInt(hgps204[0])],
		[parseInt(hgps205[0])],
		[parseInt(hgps206[0])],
		[parseInt(hgps207[0])],
		[parseInt(hgps208[0])],
		[parseInt(hgps209[0])],
		[parseInt(hgps210[0])],
		[parseInt(hgps211[0])],
		[parseInt(hgps212[0])],
		[parseInt(hgps213[0])],
		[parseInt(hgps214[0])],
		[parseInt(hgps215[0])],
		[parseInt(hgps216[0])],
		[parseInt(hgps217[0])],
		[parseInt(hgps218[0])],
		[parseInt(hgps219[0])],
		[parseInt(hgps220[0])],
		[parseInt(hgps221[0])],
		[parseInt(hgps222[0])],
		[parseInt(hgps223[0])],
		[parseInt(hgps224[0])],
		[parseInt(hgps225[0])],
		[parseInt(hgps226[0])],
		[parseInt(hgps227[0])],
		[parseInt(hgps228[0])],
		[parseInt(hgps229[0])],
		[parseInt(hgps230[0])],
		[parseInt(hgps231[0])],
		[parseInt(hgps232[0])],
		[parseInt(hgps233[0])],
		[parseInt(hgps234[0])],
		[parseInt(hgps235[0])],
		[parseInt(hgps236[0])],
		[parseInt(hgps237[0])],
		[parseInt(hgps238[0])],
		[parseInt(hgps239[0])],
		[parseInt(hgps240[0])],
		[parseInt(hgps241[0])],
		[parseInt(hgps242[0])],
		[parseInt(hgps243[0])],
		[parseInt(hgps244[0])],
		[parseInt(hgps245[0])],
		[parseInt(hgps246[0])],
		[parseInt(hgps247[0])],
		[parseInt(hgps248[0])],
		[parseInt(hgps249[0])],
		[parseInt(hgps250[0])],
		[parseInt(hgps251[0])],
		[parseInt(hgps252[0])],
		[parseInt(hgps253[0])],
		[parseInt(hgps254[0])],
		[parseInt(hgps255[0])],
		[parseInt(hgps256[0])],
		[parseInt(hgps257[0])],
		[parseInt(hgps258[0])],
		[parseInt(hgps259[0])],
		[parseInt(hgps260[0])],
		[parseInt(hgps261[0])],
		[parseInt(hgps262[0])],
		[parseInt(hgps263[0])],
		[parseInt(hgps264[0])],
		[parseInt(hgps265[0])],
		[parseInt(hgps266[0])],
		[parseInt(hgps267[0])],
		[parseInt(hgps268[0])],
		[parseInt(hgps269[0])],
		[parseInt(hgps270[0])],
		[parseInt(hgps271[0])],
		[parseInt(hgps272[0])],
		[parseInt(hgps273[0])],
		[parseInt(hgps274[0])],
		[parseInt(hgps275[0])],
		[parseInt(hgps276[0])],
		[parseInt(hgps277[0])],
		[parseInt(hgps278[0])],
		[parseInt(hgps279[0])],
		[parseInt(hgps280[0])],
		[parseInt(hgps281[0])],
		[parseInt(hgps282[0])],
		[parseInt(hgps283[0])],
		[parseInt(hgps284[0])],
		[parseInt(hgps285[0])]

	];
	
    var em = [
		[parseInt(hgps1[1])],
		[parseInt(hgps2[1])],
		[parseInt(hgps3[1])],
		[parseInt(hgps4[1])],
		[parseInt(hgps5[1])],
		[parseInt(hgps6[1])],
		[parseInt(hgps7[1])],
		[parseInt(hgps8[1])],
		[parseInt(hgps9[1])],
		[parseInt(hgps10[1])],
		[parseInt(hgps11[1])],
		[parseInt(hgps12[1])],
		[parseInt(hgps13[1])],
		[parseInt(hgps14[1])],
		[parseInt(hgps15[1])],
		[parseInt(hgps16[1])],
		[parseInt(hgps17[1])],
		[parseInt(hgps18[1])],
		[parseInt(hgps19[1])],
		[parseInt(hgps20[1])],
		[parseInt(hgps21[1])],
		[parseInt(hgps22[1])],
		[parseInt(hgps23[1])],
		[parseInt(hgps24[1])],
		[parseInt(hgps25[1])],
		[parseInt(hgps26[1])],
		[parseInt(hgps27[1])],
		[parseInt(hgps28[1])],
		[parseInt(hgps29[1])],
		[parseInt(hgps30[1])],
		[parseInt(hgps31[1])],
		[parseInt(hgps32[1])],

		[parseInt(hgps33[1])],
		[parseInt(hgps34[1])],
		[parseInt(hgps35[1])],
		[parseInt(hgps36[1])],
		[parseInt(hgps37[1])],
		[parseInt(hgps38[1])],
		[parseInt(hgps39[1])],
		[parseInt(hgps40[1])],
		[parseInt(hgps41[1])],
		[parseInt(hgps42[1])],
		[parseInt(hgps43[1])],
		[parseInt(hgps44[1])],
		[parseInt(hgps45[1])],
		[parseInt(hgps46[1])],
		[parseInt(hgps47[1])],
		[parseInt(hgps48[1])],
		[parseInt(hgps49[1])],
		[parseInt(hgps50[1])],
		[parseInt(hgps51[1])],
		[parseInt(hgps52[1])],
		[parseInt(hgps53[1])],
		[parseInt(hgps54[1])],
		[parseInt(hgps55[1])],
		[parseInt(hgps56[1])],
		[parseInt(hgps57[1])],
		[parseInt(hgps58[1])],
		[parseInt(hgps59[1])],
		[parseInt(hgps60[1])],
		[parseInt(hgps61[1])],
		[parseInt(hgps62[1])],
		[parseInt(hgps63[1])],
		[parseInt(hgps64[1])],
		[parseInt(hgps65[1])],
		[parseInt(hgps66[1])],
		[parseInt(hgps67[1])],
		[parseInt(hgps68[1])],
		[parseInt(hgps69[1])],
		[parseInt(hgps70[1])],
		[parseInt(hgps71[1])],
		[parseInt(hgps72[1])],
		[parseInt(hgps73[1])],
		[parseInt(hgps74[1])],
		[parseInt(hgps75[1])],
		[parseInt(hgps76[1])],
		[parseInt(hgps77[1])],
		[parseInt(hgps78[1])],
		[parseInt(hgps79[1])],
		[parseInt(hgps80[1])],
		[parseInt(hgps81[1])],
		[parseInt(hgps82[1])],
		[parseInt(hgps83[1])],
		[parseInt(hgps84[1])],
		[parseInt(hgps85[1])],
		[parseInt(hgps86[1])],
		[parseInt(hgps87[1])],
		[parseInt(hgps88[1])],
		[parseInt(hgps89[1])],
		[parseInt(hgps90[1])],
		[parseInt(hgps91[1])],
		[parseInt(hgps92[1])],
		[parseInt(hgps93[1])],
		[parseInt(hgps94[1])],
		[parseInt(hgps95[1])],
		[parseInt(hgps96[1])],
		[parseInt(hgps97[1])],
		[parseInt(hgps98[1])],
		[parseInt(hgps99[1])],
		[parseInt(hgps100[1])],
		[parseInt(hgps101[1])],
		[parseInt(hgps102[1])],
		[parseInt(hgps103[1])],
		[parseInt(hgps104[1])],
		[parseInt(hgps105[1])],
		[parseInt(hgps106[1])],
		[parseInt(hgps107[1])],
		[parseInt(hgps108[1])],
		[parseInt(hgps109[1])],
		[parseInt(hgps110[1])],
		[parseInt(hgps111[1])],
		[parseInt(hgps112[1])],
		[parseInt(hgps113[1])],
		[parseInt(hgps114[1])],
		[parseInt(hgps115[1])],
		[parseInt(hgps116[1])],
		[parseInt(hgps117[1])],
		[parseInt(hgps118[1])],
		[parseInt(hgps119[1])],
		[parseInt(hgps120[1])],
		[parseInt(hgps121[1])],
		[parseInt(hgps122[1])],
		[parseInt(hgps123[1])],
		[parseInt(hgps124[1])],
		[parseInt(hgps125[1])],
		[parseInt(hgps126[1])],
		[parseInt(hgps127[1])],
		[parseInt(hgps128[1])],
		[parseInt(hgps129[1])],
		[parseInt(hgps130[1])],
		[parseInt(hgps131[1])],
		[parseInt(hgps132[1])],
		[parseInt(hgps133[1])],
		[parseInt(hgps134[1])],
		[parseInt(hgps135[1])],
		[parseInt(hgps136[1])],
		[parseInt(hgps137[1])],
		[parseInt(hgps138[1])],
		[parseInt(hgps139[1])],
		[parseInt(hgps140[1])],
		[parseInt(hgps141[1])],
		[parseInt(hgps142[1])],
		[parseInt(hgps143[1])],
		[parseInt(hgps144[1])],
		[parseInt(hgps145[1])],
		[parseInt(hgps146[1])],
		[parseInt(hgps147[1])],
		[parseInt(hgps148[1])],
		[parseInt(hgps149[1])],
		[parseInt(hgps150[1])],
		[parseInt(hgps151[1])],
		[parseInt(hgps152[1])],
		[parseInt(hgps153[1])],
		[parseInt(hgps154[1])],
		[parseInt(hgps155[1])],
		[parseInt(hgps156[1])],
		[parseInt(hgps157[1])],
		[parseInt(hgps158[1])],
		[parseInt(hgps159[1])],
		[parseInt(hgps160[1])],
		[parseInt(hgps161[1])],
		[parseInt(hgps162[1])],
		[parseInt(hgps163[1])],
		[parseInt(hgps164[1])],
		[parseInt(hgps165[1])],
		[parseInt(hgps166[1])],
		[parseInt(hgps167[1])],
		[parseInt(hgps168[1])],
		[parseInt(hgps169[1])],
		[parseInt(hgps170[1])],
		[parseInt(hgps171[1])],
		[parseInt(hgps172[1])],
		[parseInt(hgps173[1])],
		[parseInt(hgps174[1])],
		[parseInt(hgps175[1])],
		[parseInt(hgps176[1])],
		[parseInt(hgps177[1])],
		[parseInt(hgps178[1])],
		[parseInt(hgps179[1])],
		[parseInt(hgps180[1])],
		[parseInt(hgps181[1])],
		[parseInt(hgps182[1])],
		[parseInt(hgps183[1])],
		[parseInt(hgps184[1])],
		[parseInt(hgps185[1])],
		[parseInt(hgps186[1])],
		[parseInt(hgps187[1])],
		[parseInt(hgps188[1])],
		[parseInt(hgps189[1])],
		[parseInt(hgps190[1])],
		[parseInt(hgps191[1])],
		[parseInt(hgps192[1])],
		[parseInt(hgps193[1])],
		[parseInt(hgps194[1])],
		[parseInt(hgps195[1])],
		[parseInt(hgps196[1])],
		[parseInt(hgps197[1])],
		[parseInt(hgps198[1])],
		[parseInt(hgps199[1])],
		[parseInt(hgps200[1])],
		[parseInt(hgps201[1])],
		[parseInt(hgps202[1])],
		[parseInt(hgps203[1])],
		[parseInt(hgps204[1])],
		[parseInt(hgps205[1])],
		[parseInt(hgps206[1])],
		[parseInt(hgps207[1])],
		[parseInt(hgps208[1])],
		[parseInt(hgps209[1])],
		[parseInt(hgps210[1])],
		[parseInt(hgps211[1])],
		[parseInt(hgps212[1])],
		[parseInt(hgps213[1])],
		[parseInt(hgps214[1])],
		[parseInt(hgps215[1])],
		[parseInt(hgps216[1])],
		[parseInt(hgps217[1])],
		[parseInt(hgps218[1])],
		[parseInt(hgps219[1])],
		[parseInt(hgps220[1])],
		[parseInt(hgps221[1])],
		[parseInt(hgps222[1])],
		[parseInt(hgps223[1])],
		[parseInt(hgps224[1])],
		[parseInt(hgps225[1])],
		[parseInt(hgps226[1])],
		[parseInt(hgps227[1])],
		[parseInt(hgps228[1])],
		[parseInt(hgps229[1])],
		[parseInt(hgps230[1])],
		[parseInt(hgps231[1])],
		[parseInt(hgps232[1])],
		[parseInt(hgps233[1])],
		[parseInt(hgps234[1])],
		[parseInt(hgps235[1])],
		[parseInt(hgps236[1])],
		[parseInt(hgps237[1])],
		[parseInt(hgps238[1])],
		[parseInt(hgps239[1])],
		[parseInt(hgps240[1])],
		[parseInt(hgps241[1])],
		[parseInt(hgps242[1])],
		[parseInt(hgps243[1])],
		[parseInt(hgps244[1])],
		[parseInt(hgps245[1])],
		[parseInt(hgps246[1])],
		[parseInt(hgps247[1])],
		[parseInt(hgps248[1])],
		[parseInt(hgps249[1])],
		[parseInt(hgps250[1])],
		[parseInt(hgps251[1])],
		[parseInt(hgps252[1])],
		[parseInt(hgps253[1])],
		[parseInt(hgps254[1])],
		[parseInt(hgps255[1])],
		[parseInt(hgps256[1])],
		[parseInt(hgps257[1])],
		[parseInt(hgps258[1])],
		[parseInt(hgps259[1])],
		[parseInt(hgps260[1])],
		[parseInt(hgps261[1])],
		[parseInt(hgps262[1])],
		[parseInt(hgps263[1])],
		[parseInt(hgps264[1])],
		[parseInt(hgps265[1])],
		[parseInt(hgps266[1])],
		[parseInt(hgps267[1])],
		[parseInt(hgps268[1])],
		[parseInt(hgps269[1])],
		[parseInt(hgps270[1])],
		[parseInt(hgps271[1])],
		[parseInt(hgps272[1])],
		[parseInt(hgps273[1])],
		[parseInt(hgps274[1])],
		[parseInt(hgps275[1])],
		[parseInt(hgps276[1])],
		[parseInt(hgps277[1])],
		[parseInt(hgps278[1])],
		[parseInt(hgps279[1])],
		[parseInt(hgps280[1])],
		[parseInt(hgps281[1])],
		[parseInt(hgps282[1])],
		[parseInt(hgps283[1])],
		[parseInt(hgps284[1])],
		[parseInt(hgps285[1])]

	]; 
	

				
				
				
				for (var i = 0; i < dh.length; i++) {
					if(h==dh[i]){
						if(em[i]<m){
							if((m-em[i])<=5){
									icono[i] = {
										path: google.maps.SymbolPath.CIRCLE,
										strokeColor: '#000000',
										fillColor: '#22F904',
										fillOpacity: .9,
										strokeWeight: 2,
										scale: 6,
									};
							}
							else{
								icono[i] = {
									path: google.maps.SymbolPath.CIRCLE,
									strokeColor: '#E62D05',
									fillColor: '#E62D05',
									fillOpacity: .6,
									strokeWeight: 1,
									scale: 6,
								};
							}
						}else if(em[i]==m){
									icono[i] = {
										path: google.maps.SymbolPath.CIRCLE,
										strokeColor: '#000000',
										fillColor: '#22F904',
										fillOpacity: .9,
										strokeWeight: 2,
										scale: 6,
									};
						}else{
							icono[i] = {
								path: google.maps.SymbolPath.CIRCLE,
								strokeColor: '#E62D05',
								fillColor: '#E62D05',
								fillOpacity: .6,
								strokeWeight: 1,
								scale: 6,
							};
						}
					}
					else{
						icono[i] = {
							path: google.maps.SymbolPath.CIRCLE,
							strokeColor: '#E62D05',
							fillColor: '#E62D05',
							fillOpacity: .6,
							strokeWeight: 1,
							scale: 6,
						};
					}
				}
			
	
        var marker1= new google.maps.Marker({ position: pos1,icon: icono[0],title: "GPS1",map: map });////region
        var marker2= new google.maps.Marker({ position: pos2,icon: icono[1],title: "GPS2",map: map });////region
        var marker3= new google.maps.Marker({ position: pos3,icon: icono[2],title: "GPS3",map: map });////region
        var marker4= new google.maps.Marker({ position: pos4,icon: icono[3],title: "GPS4",map: map });////region
        var marker5= new google.maps.Marker({ position: pos5,icon: icono[4],title: "GPS5",map: map });////region
        var marker6= new google.maps.Marker({ position: pos6,icon: icono[5],title: "GPS6",map: map });////region
        var marker7= new google.maps.Marker({ position: pos7,icon: icono[6],title: "GPS7",map: map });////region
        var marker8= new google.maps.Marker({ position: pos8,icon: icono[7],title: "GPS8",map: map });////region
        var marker9= new google.maps.Marker({ position: pos9,icon: icono[8],title: "GPS9",map: map });////region
        var marker10= new google.maps.Marker({ position: pos10,icon: icono[9],title: "GPS10",map: map });////region
        var marker11= new google.maps.Marker({ position: pos11,icon: icono[10],title: "GPS11",map: map });////region
        var marker12= new google.maps.Marker({ position: pos12,icon: icono[11],title: "GPS12",map: map });////region
        var marker13= new google.maps.Marker({ position: pos13,icon: icono[12],title: "GPS13",map: map });////region
        var marker14= new google.maps.Marker({ position: pos14,icon: icono[13],title: "GPS14",map: map });////region
        var marker15= new google.maps.Marker({ position: pos15,icon: icono[14],title: "GPS15",map: map });////region
        var marker16= new google.maps.Marker({ position: pos16,icon: icono[15],title: "GPS16",map: map });////region
        var marker17= new google.maps.Marker({ position: pos17,icon: icono[16],title: "GPS17",map: map });////region
        var marker18= new google.maps.Marker({ position: pos18,icon: icono[17],title: "GPS18",map: map });////region
        var marker19= new google.maps.Marker({ position: pos19,icon: icono[18],title: "GPS19",map: map });////region
        var marker20= new google.maps.Marker({ position: pos20,icon: icono[19],title: "GPS20",map: map });////region
        var marker21= new google.maps.Marker({ position: pos21,icon: icono[20],title: "GPS21",map: map });////region
        var marker22= new google.maps.Marker({ position: pos22,icon: icono[21],title: "GPS22",map: map });////region
        var marker23= new google.maps.Marker({ position: pos23,icon: icono[22],title: "GPS23",map: map });////region
        var marker24= new google.maps.Marker({ position: pos24,icon: icono[23],title: "GPS24",map: map });////region
        var marker25= new google.maps.Marker({ position: pos25,icon: icono[24],title: "GPS25",map: map });////region
        var marker26= new google.maps.Marker({ position: pos26,icon: icono[25],title: "GPS26",map: map });////region
        var marker27= new google.maps.Marker({ position: pos27,icon: icono[26],title: "GPS27",map: map });////region
        var marker28= new google.maps.Marker({ position: pos28,icon: icono[27],title: "GPS28",map: map });////region
        var marker29= new google.maps.Marker({ position: pos29,icon: icono[28],title: "GPS29",map: map });////region
        var marker30= new google.maps.Marker({ position: pos30,icon: icono[29],title: "GPS30",map: map });////region
        var marker31= new google.maps.Marker({ position: pos31,icon: icono[30],title: "GPS31",map: map });////region
        var marker32= new google.maps.Marker({ position: pos32,icon: icono[31],title: "GPS32",map: map });////region
        var marker33= new google.maps.Marker({ position: pos33,icon: icono[32],title: "GPS33",map: map });
        var marker34= new google.maps.Marker({ position: pos34,icon: icono[33],title: "GPS34",map: map });
        var marker35= new google.maps.Marker({ position: pos35,icon: icono[34],title: "GPS35",map: map });
        var marker36= new google.maps.Marker({ position: pos36,icon: icono[35],title: "GPS36",map: map });
        var marker37= new google.maps.Marker({ position: pos37,icon: icono[36],title: "GPS37",map: map });
        var marker38= new google.maps.Marker({ position: pos38,icon: icono[37],title: "GPS38",map: map });
        var marker39= new google.maps.Marker({ position: pos39,icon: icono[38],title: "GPS39",map: map });
        var marker40= new google.maps.Marker({ position: pos40,icon: icono[39],title: "GPS40",map: map });
        var marker41= new google.maps.Marker({ position: pos41,icon: icono[40],title: "GPS41",map: map });
        var marker42= new google.maps.Marker({ position: pos42,icon: icono[41],title: "GPS42",map: map });
        var marker43= new google.maps.Marker({ position: pos43,icon: icono[42],title: "GPS43",map: map });
        var marker44= new google.maps.Marker({ position: pos44,icon: icono[43],title: "GPS44",map: map });
        var marker45= new google.maps.Marker({ position: pos45,icon: icono[44],title: "GPS45",map: map });
        var marker46= new google.maps.Marker({ position: pos46,icon: icono[45],title: "GPS46",map: map });
        var marker47= new google.maps.Marker({ position: pos47,icon: icono[46],title: "GPS47",map: map });
        var marker48= new google.maps.Marker({ position: pos48,icon: icono[47],title: "GPS48",map: map });
        var marker49= new google.maps.Marker({ position: pos49,icon: icono[48],title: "GPS49",map: map });
		var marker50= new google.maps.Marker({ position: pos50,icon: icono[49],title: "GPS50",map: map });
		var marker51= new google.maps.Marker({ position: pos51,icon: icono[50],title: "GPS51",map: map });
		var marker52= new google.maps.Marker({ position: pos52,icon: icono[51],title: "GPS52",map: map });
		var marker53= new google.maps.Marker({ position: pos53,icon: icono[52],title: "GPS53",map: map });
		var marker54= new google.maps.Marker({ position: pos54,icon: icono[53],title: "GPS54",map: map });
		var marker55= new google.maps.Marker({ position: pos55,icon: icono[54],title: "GPS55",map: map });
		var marker56= new google.maps.Marker({ position: pos56,icon: icono[55],title: "GPS56",map: map });
		var marker57= new google.maps.Marker({ position: pos57,icon: icono[56],title: "GPS57",map: map });
		var marker58= new google.maps.Marker({ position: pos58,icon: icono[57],title: "GPS58",map: map });
		var marker59= new google.maps.Marker({ position: pos59,icon: icono[58],title: "GPS59",map: map });
		var marker60= new google.maps.Marker({ position: pos60,icon: icono[59],title: "GPS60",map: map });
		var marker61= new google.maps.Marker({ position: pos61,icon: icono[60],title: "GPS61",map: map });
		var marker62= new google.maps.Marker({ position: pos62,icon: icono[61],title: "GPS62",map: map });
		var marker63= new google.maps.Marker({ position: pos63,icon: icono[62],title: "GPS63",map: map });
		var marker64= new google.maps.Marker({ position: pos64,icon: icono[63],title: "GPS64",map: map });
		var marker65= new google.maps.Marker({ position: pos65,icon: icono[64],title: "GPS65",map: map });
		var marker66= new google.maps.Marker({ position: pos66,icon: icono[65],title: "GPS66",map: map });
		var marker67= new google.maps.Marker({ position: pos67,icon: icono[66],title: "GPS67",map: map });
		var marker68= new google.maps.Marker({ position: pos68,icon: icono[67],title: "GPS68",map: map });
		var marker69= new google.maps.Marker({ position: pos69,icon: icono[68],title: "GPS69",map: map });
		var marker70= new google.maps.Marker({ position: pos70,icon: icono[69],title: "GPS70",map: map });
		var marker71= new google.maps.Marker({ position: pos71,icon: icono[70],title: "GPS71",map: map });
		var marker72= new google.maps.Marker({ position: pos72,icon: icono[71],title: "GPS72",map: map });
		var marker73= new google.maps.Marker({ position: pos73,icon: icono[72],title: "GPS73",map: map });
		var marker74= new google.maps.Marker({ position: pos74,icon: icono[73],title: "GPS74",map: map });
		var marker75= new google.maps.Marker({ position: pos75,icon: icono[74],title: "GPS75",map: map });
		var marker76= new google.maps.Marker({ position: pos76,icon: icono[75],title: "GPS76",map: map });
		var marker77= new google.maps.Marker({ position: pos77,icon: icono[76],title: "GPS77",map: map });
		var marker78= new google.maps.Marker({ position: pos78,icon: icono[77],title: "GPS78",map: map });
		var marker79= new google.maps.Marker({ position: pos79,icon: icono[78],title: "GPS79",map: map });
		var marker80= new google.maps.Marker({ position: pos80,icon: icono[79],title: "GPS80",map: map });
		var marker81= new google.maps.Marker({ position: pos81,icon: icono[80],title: "TI 1",map: map });////Mesa tics
		var marker82= new google.maps.Marker({ position: pos82,icon: icono[81],title: "TI 2",map: map });////Mesa tics
		var marker83= new google.maps.Marker({ position: pos83,icon: icono[82],title: "TI 3",map: map });////Mesa tics
		var marker84= new google.maps.Marker({ position: pos84,icon: icono[83],title: "TI 4",map: map });////Mesa tics
		var marker85= new google.maps.Marker({ position: pos85,icon: icono[84],title: "TI 5",map: map });////Mesa tics
		var marker86= new google.maps.Marker({ position: pos86,icon: icono[85],title: "TI 6",map: map });////Mesa tics
		var marker87= new google.maps.Marker({ position: pos87,icon: icono[86],title: "GPS87",map: map });
		var marker88= new google.maps.Marker({ position: pos88,icon: icono[87],title: "GPS88",map: map });
		var marker89= new google.maps.Marker({ position: pos89,icon: icono[88],title: "GPS89",map: map });
		var marker90= new google.maps.Marker({ position: pos90,icon: icono[89],title: "GPS90",map: map });
		var marker91= new google.maps.Marker({ position: pos91,icon: icono[90],title: "GPS91",map: map });///coronel
		var marker92= new google.maps.Marker({ position: pos92,icon: icono[91],title: "GPS92",map: map });///general
		var marker93= new google.maps.Marker({ position: pos93,icon: icono[92],title: "GPS93",map: map });
		var marker94= new google.maps.Marker({ position: pos94,icon: icono[93],title: "GPS94",map: map });
		var marker95= new google.maps.Marker({ position: pos95,icon: icono[94],title: "GPS95",map: map });

			
			
	
	
	setTimeout(function(){ 
	
		marker1.setMap(null);
        marker2.setMap(null);
        marker3.setMap(null);
        marker4.setMap(null);
        marker5.setMap(null);
        marker6.setMap(null);
        marker7.setMap(null);
        marker8.setMap(null);
        marker9.setMap(null);
        marker10.setMap(null);
        marker11.setMap(null);
        marker12.setMap(null);
        marker13.setMap(null);
        marker14.setMap(null);
        marker15.setMap(null);
        marker16.setMap(null);
        marker17.setMap(null);
        marker18.setMap(null);
        marker19.setMap(null);
        marker20.setMap(null);
        marker21.setMap(null);
        marker22.setMap(null);
        marker23.setMap(null);
        marker24.setMap(null);
        marker25.setMap(null);
        marker26.setMap(null);
        marker27.setMap(null);
        marker28.setMap(null);
        marker29.setMap(null);
        marker30.setMap(null);
        marker31.setMap(null);
        marker32.setMap(null);
        marker33.setMap(null);
        marker34.setMap(null);
        marker35.setMap(null);
        marker36.setMap(null);
        marker37.setMap(null);
        marker38.setMap(null);
        marker39.setMap(null);
        marker40.setMap(null);
        marker41.setMap(null);
        marker42.setMap(null);
        marker43.setMap(null);
        marker44.setMap(null);
        marker45.setMap(null);
        marker46.setMap(null);
        marker47.setMap(null);
        marker48.setMap(null);
        marker49.setMap(null);
        marker50.setMap(null);
		marker51.setMap(null);
		marker52.setMap(null);
		marker53.setMap(null);
		marker54.setMap(null);
		marker55.setMap(null);
		marker56.setMap(null);
		marker57.setMap(null);
		marker58.setMap(null);
		marker59.setMap(null);
		marker60.setMap(null);
		marker61.setMap(null);
		marker62.setMap(null);
		marker63.setMap(null);
		marker64.setMap(null);
		marker65.setMap(null);
		marker66.setMap(null);
		marker67.setMap(null);
		marker68.setMap(null);
		marker69.setMap(null);
		marker70.setMap(null);
		marker71.setMap(null);
		marker72.setMap(null);
		marker73.setMap(null);
		marker74.setMap(null);
		marker75.setMap(null);
		marker76.setMap(null);
		marker77.setMap(null);
		marker78.setMap(null);
		marker79.setMap(null);
		marker80.setMap(null);
		marker81.setMap(null);
		marker82.setMap(null);
		marker83.setMap(null);
		marker84.setMap(null);
		marker85.setMap(null);
		marker86.setMap(null);
		marker87.setMap(null);
		marker88.setMap(null);
		marker89.setMap(null);
		marker90.setMap(null);
		marker91.setMap(null);
		marker92.setMap(null);
		marker93.setMap(null);
		marker94.setMap(null);
		marker95.setMap(null)

	
	
	}, 59500);
	
	
}

   

//función que realiza la operacion de evaluar los markers y si estos se ocultaran o mostraran dependiendo el checkbox presionado
function jsMuestraOculta(tipoIcono){
	
	    //esta variable sirve para saber si mostraremos u ocultaremos los markers
		var muestra=false;
		
		//evaluamos si el checkbox presionado fue el rojo
		if(tipoIcono=="EDO"){
		
			//si el checkbox esta checado la variable muestra la ponemos como true
			if(document.getElementById("chkEdo").checked)
				muestra=true;
				
				//recorremos todos los markes de la lista
				for(i=0;i<lstMarkers.length;i++){
					//comparamos si el marker actual en el recorrido es EDO
					
						/*
						  Si el checkbox del tipo fue checado, mostramos el marker, en caso contrario lo ocultamos
						  El metodo setMap, es un metodo del API de google el cual recibe el mapa al que pertenece el marker
						     si a este metodo le damos null, el marker no pertenecera a ningun mapa, por lo cual desaparecera, 
							 en cambio si le damos el objeto mapa, se agregara al mapa nuevamente por lo cual s emostrara
						*/
						if(muestra)
							lstMarkers[i].setMap(map);
						else
							lstMarkers[i].setMap(null);
					
				}
		}
        if(tipoIcono=="Ceferesos"){
		
			//si el checkbox esta checado la variable muestra la ponemos como true
			if(document.getElementById("chkCefe").checked)
				muestra=true;
				
				//recorremos todos los markes de la lista
				for(i=0;i<lstMarkers1.length;i++){
					//comparamos si el marker actual en el recorrido es Ceferesos
					
						/*
						  Si el checkbox del tipo fue checado, mostramos el marker, en caso contrario lo ocultamos
						  El metodo setMap, es un metodo del API de google el cual recibe el mapa al que pertenece el marker
						     si a este metodo le damos null, el marker no pertenecera a ningun mapa, por lo cual desaparecera, 
							 en cambio si le damos el objeto mapa, se agregara al mapa nuevamente por lo cual s emostrara
						*/
						if(muestra)
							lstMarkers1[i].setMap(map);
						else
							lstMarkers1[i].setMap(null);
					
				}
		}
}
    
</script>
    
</head>
 
<body onLoad="init()">

<div id="demo">
 <input  onclick="jsMuestraOculta('EDO')" type="checkbox" id="chkEdo" /><label for="chkEdo">C.Estatales</label>
    <input onclick="jsMuestraOculta('Ceferesos')" type="checkbox" id="chkCefe"  /><label for="chkCefe">CEFERESOS</label>
</div>    
    
<div class="row"  align="center">
	<div class="col-lg-12">

	    <div id="mapcanvas" style="width: 100%; height: 800px" /> 
	</div>
</div>

</body>
</html>


<!-- Aqui terminan funciones y diseño de tu pagina de seccion de administracion-->

 <?php
                            

			  }
       }else{
     //Se redicciona si es que no se cumple
  	//Modificar como en la siguiete linea de codigo
  	//si es que esta en un subdirectorio
  	// header("location: ".$uri."/wp-admin"); 
    header("location: ".$uri."/gps");
       }
  }else{
  	//Se redicciona si es que no se cumple
  	//Modificar como en la siguiete linea de codigo
  	//si es que esta en un subdirectorio
  	// header("location: ".$uri."/wp-admin"); 
    header("location: ".$uri."/gps");
  }

 }else{
 	//redirecionado si no existe la variable global
 	//Modificar como en la siguiete linea de codigo
  	//si es que esta en un subdirectorio
  	// header("location: ".$uri."/wp-admin");
    header("location: ".$uri."/gps");
 }


 /**
 * Returna el IP de usuario
 * @return [string] [devuel la io del usuario]
 */
function IPuser() {
	$returnar ="";
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
     $returnar=$_SERVER['HTTP_X_FORWARDED_FOR'];}
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
     $returnar=$_SERVER['HTTP_CLIENT_IP'];}
if(!empty($_SERVER['REMOTE_ADDR'])){
	 $returnar=$_SERVER['REMOTE_ADDR'];}
return $returnar;
}
?>
