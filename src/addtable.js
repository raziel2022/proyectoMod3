var list = document.getElementById('table');


export var addTable= function(ip,latitude,longitude,isp){//Con los parametros que se paaron construimos la tabla
        var tablaContent = `
          <tr>
            <td>${ip}</td>
            <td>${latitude}</td>
            <td>${longitude}</td>
            <td>${isp}</td>
          </tr>
        `
      //Finalmente añadimos el contenido a la tabla
      list.innerHTML += tablaContent//imprimos la tabla
}