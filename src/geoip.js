import { addTable } from "./addtable.js";
import { fetchIpInfo } from "./fetchipinfo.js";


const $results = document.querySelector('#results');

export async function geoIP(value,$submit){//funcion asincrona que recibe como parameto la ip en formato string
    $submit.setAttribute('disabled', '') //el button mientras se esta realizando la búsqueda deshablita el boton
    $submit.setAttribute('aria-busy', 'true')//mientras realiza la búsqueda realiza el efecto de busy
    
    const ipInfo = await fetchIpInfo(value); //ipInf recibe el valor respuesta del fetch un objeto
    console.log(typeof(ipInfo)); 
    console.log(ipInfo);
   
    if(ipInfo){//si existe ipInfo realizamos lo siguiente
  
      $submit.setAttribute('aria-busy', 'false'); //Cambiamos los atributos del button submit
      $submit.removeAttribute('disabled');//le retiramos el attributo de disable para poder ejecuar otras consultas
      $results.innerText =JSON.stringify(ipInfo, null, 2); // Con el metodo stringify convertimos un valor de js a JSON string
    
      addTable(ipInfo.ip,ipInfo.latitude,ipInfo.longitude,ipInfo.isp);//llamamos a la funcion addTable y le pasamos los parametros que nos interesan que son IP, Latitud, Longitud e ISP
    }
  } 