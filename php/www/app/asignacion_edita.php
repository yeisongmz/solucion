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
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script src="js/jquery-ui.js"></script>


<script type="text/javascript">
    var idRegistro=[] ;
    var id_cantidad=[] ;
    var descripcion=[] ;

    /* =============================================================================
   Proceso que busca la remision segun el numero ingresado por el usuario.
   si lo encuentra trae la cabecera y el detalle.
   ============================================================================= */
    function buscaremision(){
         idRegistro=[] ;
         id_cantidad=[] ;
         descripcion=[] ;

        var nombre_personal = document.getElementById('skills').value ;
        document.getElementById('msg').value = '' ;

        $.post('Consultar_asignacion_detalle.php', {nombre: nombre_personal }).then( function (res){
            console.log(res);
             var datos = JSON.parse(res);

             if(datos.length==0){
                 document.getElementById('msg').value = 'NO EXISTE ASIGNACION ....' ;
             }else{

                 // Obtener la referencia del elemento body
                 var tblBody = document.getElementById('cuerpo');
                 tblBody.innerHTML='' ;

                 // Crea las celdas
                     for ( var i = 0; i < datos[0][3]; i++ ) {
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
                             // id del registro
                             campo.id =  datos[i][j] ;
                             idRegistro.push(  datos[i][j] ) ;
                              campo.setAttribute("type", "hidden");
                         }
                         if(j==1){
                             // descripcion de equipo
                             campo.style.width="500px" ;
                             descripcion.push(  datos[i][j] ) ;
                         }
                         if(j==2){
                             // cantidad
                             campo.id =  datos[i][j] ;
                             id_cantidad.push(  datos[i][j] ) ;
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

        //var v_numero = document.getElementById('nroremision').value ;

      // await   $.post('limpia_remision.php', {numero: v_numero }) ;

       var id_registro=[] ;
       var cantidad_producto=[] ;

       for (var i = 0; i < id_cantidad.length; i++) {

          id_registro.push(  document.getElementById(idRegistro[i]).value ) ;
          cantidad_producto.push(  document.getElementById(id_cantidad[i]).value ) ;;
       }
       document.getElementById('msg').value = 'PROCESANDO.....!' ;

       await $.post('modifica_asignacion.php', { registro:id_registro , cantidad:cantidad_producto }).then( function (res){ console.log(res);} ) ;

        document.getElementById('msg').value        = '' ;
        document.getElementById('skills').value    = '' ;

        var tblBody = document.getElementById('cuerpo') ;
        tblBody.innerHTML='' ;

    }

    $(function() {
      $( "#skills" ).autocomplete({
          source:"original_search.php",
          autoFocus:true
      });
    });
</script>

</head>
<body>
    <form id="edita" name="edita">
        <br>
        <label style="color:black ; font-weight: bold" >QUITAR ASIGNACIONES</label> <br>
        <table>
            <tr>
                <td>Personal : </td>
                <td>  <input id="skills" placeholder="Ingrese Apellido o C.I a buscar..." size="37"  >
            </td>

                <td> <input type="button" name="" value="BUSCAR" onclick="buscaremision()"> </td>
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
                <br>
                <span style="color:red ; font-weight: bold" >* Poner valor = 0  en la columna cantidad y luego GRABAR, para quitar la asignacion.</span>

            </tr>
            <tr>
                <th></th>
                <th>EQUIPOS</th>
                <th>CANTIDAD</th>
            </tr>
        </thead>
        <tbody id="cuerpo">

        </tbody>
    </table>
</body>
</html>
