<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ASISTENCIA DE EVENTO</title>
    <link type="text/css" rel="stylesheet" href="../css/FrmAsistenciaEventoPdf.css">
  </head>
  <body>
        <?php
            require_once '../modelo/Evento.php';
            require_once '../modelo/AsistenciaEvento.php';
            
            $idEvento = $_REQUEST['idEvento'];
            
            $eventoE = new \entidad\Evento();
            $eventoM = new \modelo\Evento($eventoE);
            
            $asistentesE = new \entidad\AsistenteEvento();
            $asistentesM = new \modelo\AsistenteEvento($asistentesE, null);
            
            $eventoM->obtenerEvento($idEvento);
            $asistentesM->obtenerAsistentes($idEvento);     
        ?>
      <br><br>
      <div align="center">
          <img src="../img/LogoRegistrate.png">
      </div>
      <br<br><br><h1 align="center">ASISTENCIA DE EVENTO</h1>
      <br><br>
      <table align="center">
        <tr>
            <th id="encabezados">NOMBRE DEL EVENTO</th>
            <th id="encabezados">FECHA</th>
            <th id="encabezados">HORA INICIAL</th>
            <th id="encabezados">HORA FINAL</th>
        </tr> 
        <tr>
            <?php
                $contador = 0;
                if($fila = $eventoM->conexion->obtenerObjeto()){
            ?>
            <th><?php echo $fila->nombreEvento; ?></th>
            <th><?php echo $fila->fechaInicial; ?></th>
            <th><?php echo $fila->horaInicial; ?></th>
            <th><?php echo $fila->horaFinal; ?></th>
        </tr> 
        <?php
            $contador++;
                }
        ?>
    </table>
      <br><br><br>
    <table align="center">
        <tr>
            <th id="encabezados">NOMBRE</th>
            <th id="encabezados">PRIMER APELLIDO</th>
            <th id="encabezados">SEGUNDO APELLIDO</th>
            <th id="encabezados">TIPO DOCUMENTO</th>
            <th id="encabezados">NÚMERO DOCUMENTO</th>
            <th id="encabezados">ASISTENCIA</th>
        </tr> 
        
            <?php
                $contador1 = 0;
                while($fila = $asistentesM->conexion->obtenerObjeto()){
            ?>
        <tr>
            <th><?php echo $fila->nombre; ?></th>
            <th><?php echo $fila->apaterno; ?></th>
            <th><?php echo $fila->amaterno; ?></th>
            <th><?php echo $fila->tipoDocumento; ?></th>
            <th><?php echo $fila->numeroDocumento; ?></th>
            <th><?php echo $fila->estado; ?></th>
        </tr>
            <?php
                $contador1++;
                }
            ?>
    </table>
      <br><br><br>
      <table id="pie" align="center">
          <tr>
            <th>
                <h3 align="center">Proyecto Formativo Registr@-TE</h3><br>
                <h4 align="center">Tecnólogo en Análisis y Desarrollo de Sistemas de Información</h4><br>
                <h4 align="center">FICHA: 1116897</h4></th>
          </tr>
      </table>
  </body>
</html>
