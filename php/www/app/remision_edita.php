<?php
include ("conexion/conectar.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>SOLUCION SRL</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/funciones.js"></script>

<script type="text/javascript">
    var id_productos=[] ;
    var id_cantidad=[] ;
    var unidadMed=[] ;
    var punitario=[] ;
    var ptotal=[] ;
    var calculado=[] ;
    var descripcion=[] ;

    /* =============================================================================
   Proceso que busca la remision segun el numero ingresado por el usuario.
   si lo encuentra trae la cabecera y el detalle.
   ============================================================================= */
    function buscaremision(){
         id_productos=[] ;
         id_cantidad=[] ;
         unidadMed=[] ;
         punitario=[] ;
         ptotal=[] ;
         calculado=[] ;
         descripcion=[] ;

        var v_numero = document.getElementById('nroremision').value ;
        document.getElementById('msg').value = '' ;
        document.getElementById('msg').value = '' ;

       $.post('Consultar_remision.php', {numero: v_numero }).then( function (res){

            var datos=JSON.parse(res);

            if(datos.length==0){
                document.getElementById('msg').value = 'NO EXISTE REMISION cabecera....' ;
            }else{


                    var temp =  new Date(datos[0]);
            		console.log(datos[0]) ;
            		var v_mes =  temp.getMonth() + 1 ;
					var aux = datos[0].split('-');
            		var dia = aux[2];//temp.getDate()+1 ;
					v_mes= aux[1];
                    console.log(temp.getDate()+1 + " -" +v_mes + " - "+ temp.getFullYear());

                   // if(parseInt(dia) < 10){
                   //      dia='0'+dia ;
                    //}
                    //if(parseInt(v_mes) < 10){
                     //    v_mes='0' + v_mes;
                    //}

                    document.getElementById('fecha').value = dia+ "/" + v_mes + "/"+ aux[0] ;
                    document.getElementById('cliente').value = datos[1] ;



            }
        }) ;

        $.post('Consultar_remision_detalle.php', {numero: v_numero }).then( function (res){
             var datos = JSON.parse(res);

             if(datos.length==0){
                 document.getElementById('msg').value = 'NO EXISTE REMISION detalle....' ;
             }else{

                 // Obtener la referencia del elemento body

                 var tblBody = document.getElementById('cuerpo');
                 tblBody.innerHTML='' ;


                 // Crea las celdas
                     for (var i = 0; i < datos[0][4]; i++) {
                       // Crea las hileras de la tabla
                       var hilera = document.createElement("tr");

                       for (var j = 0; j < 3 ; j++) {
                         // Crea un elemento <td> y un nodo de texto, haz que el nodo de
                         // texto sea el contenido de <td>, ubica el elemento <td> al final
                         // de la hilera de la tabla
                         var celda = document.createElement("td");

                         var campo = document.createElement("input") ;
                         campo.setAttribute("type", "text");
                         campo.value = datos[i][j]  ;

                         if(j==0){
                             // id del codigo del producto
                             campo.id =  datos[i][j] ;
                             id_productos.push(  datos[i][j] ) ;
                              campo.setAttribute("type", "hidden");
                         }
                         if(j==1){
                             // id del codigo del producto
                             campo.style.width="500px" ;
                             descripcion.push(  datos[i][j] ) ;
                         }
                         if(j==2){
                             // id de la cantidad del producto
                             campo.id =  datos[i][3] ;
                             id_cantidad.push(  datos[i][3] ) ;
                             campo.style.width="60px" ;
                         }

                         if(j!=2){
                             // solo cantidad queda EDITABLE
                             campo.readOnly = "true";
                         }

                         celda.appendChild(campo);
                         hilera.appendChild(celda);

                       }

                       // agrega la hilera al final de la tabla (al final del elemento tblbody)
                       tblBody.appendChild(hilera);
                     }

                     // Agrega el resto de los valores necesarios.
                     for (var k = 0; k < datos.length; k++) {
                          unidadMed.push(datos[k][5]);
                          punitario.push(datos[k][6]);
                          ptotal.push(datos[k][7]);
                          calculado.push(datos[k][8]);
                     }


                } //   else
         }) ;


    }

    /* =============================================================================
   Proceso que elimina todo el detalle de la remision
   y luego lo vuelve a grabar con los nuevos valores.-
   Los valores cambiados son la cantidad.
   ============================================================================= */
    async function grabar_datos(){
        //console.log('*** REVISION DE DATOS****');

        var v_numero = document.getElementById('nroremision').value ;

       await   $.post('limpia_remision.php', {numero: v_numero }) ;

       var codigo_producto=[] ;
       var cantidad_producto=[] ;

       for (var i = 0; i < id_cantidad.length; i++) {

          codigo_producto.push(  document.getElementById(id_productos[i]).value ) ;
          cantidad_producto.push(  document.getElementById(id_cantidad[i]).value ) ;;
       }
       document.getElementById('msg').value = 'PROCESANDO.....!' ;

       await $.post('modifica_remision.php', {numero: v_numero , idproducto:codigo_producto , cantidad:cantidad_producto , unidad:unidadMed , unitario:punitario , total:ptotal , cal:calculado , descri:descripcion }).then( function (res){ console.log(res);} ) ;

        document.getElementById('msg').value = '' ;
        document.getElementById('fecha').value = '' ;
        document.getElementById('cliente').value = '' ;
        document.getElementById('nroremision').value = '' ;

        var tblBody = document.getElementById('cuerpo') ;
        tblBody.innerHTML='' ;

    }
function teclaGRAL (field, event) 
{

	switch (event.keyCode) {
			case 13 :
				buscaremision();	
						
			break;	
					
	}
}
</script>

</head>
<body>
    <form id="edita" name="edita">
        <br>
        <label for="">EDICION DE REMISIONES</label>
        <table>
            <tr>
                <td>Ingrese el NUMERO: </td>
                <td><input type="text" name="" id="nroremision" value="" onKeyUp="return teclaGRAL(this, event)"></td>
                <td> <input type="button" name="" value="BUSCAR" onclick="buscaremision()"> </td>
            </tr>
            <tr>
                <td>Fecha de remisión:</td>
                <td> <input type="text" name="" id="fecha" readonly value=""> </td>
            </tr>
            <tr>
                <td>Cliente: </td>
                <td colspan="2"> <input type="text" name="" style=" width:250px" id="cliente" readonly value=""> </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" >
                    <input type="text" name="" id="msg" readonly value="msg" style="color:red; width:350px;border:none" value="">
                </td>
                <td><input type="button" name="" value="GRABAR" onclick="grabar_datos()"></td>
                <td></td>

            </tr>
        </table>


    </form>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>ARTICULOS</th>
                <th>CANTIDAD</th>
            </tr>
        </thead>
        <tbody id="cuerpo">

        </tbody>
    </table>
</body>
</html>
