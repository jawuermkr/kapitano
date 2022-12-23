<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Kapitano</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 mt-3">

        <h2>Registro del capitán</h2>
        <p><small>Crea tus diferentes medios de transporte y registra cada viaje para tener control de tu tiempo sobre ruedas/vuelo.</small></p>

        <audio controls class="form-control">
          <source src="audio/capitan.mp3" type="audio/mpeg"></source>
        </audio>
        <audio controls class="form-control">
          <source src="audio/capitana.mp3" type="audio/mpeg"></source>
        </audio>
        
        <form method="post" action="dashboard.php">
          <div class="row">
            <div class="col-sm-4">
              <label><small>Máquina</small></label>
              <select class="form-control" type="text" name="maquina">
                <option>Auto</option>
                <option>Moto</option>
                <option>Bicicleta</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label><small>Lista de chequeo</small></label>
              <input class="form-control" type="text" name="listaChequeo"/>
            </div>
            <div class="col-sm-4">
              <label><small>Fecha</small></label>
              <input class="form-control" type="date" name="fecha" value="<?php echo date("Y-m-d")?>"/>
            </div>
            
            <div class="col-sm-6">
              <label><small>Lugar de partida</small></label>
              <input class="form-control" type="text" name="lugarPartida"/>
            </div>
            <div class="col-sm-6">
              <label><small>Lugar de arribo</small></label>
              <input class="form-control" type="text" name="lugarArribo"/>
            </div>
            
            <div class="col-sm-6">
              <label><small>Hora de partida</small></label>
              <input class="form-control" type="time" name="horaPartida" value="<?php echo date("H:i:s")?>"/>
            </div>
            <div class="col-sm-6">
              <label><small>Hora de arribo</small></label>
              <input class="form-control" type="time" name="horaArribo"/>
            </div>
            
            <div class="col-sm-6">
              <label><small>Kl recorridos</small></label>
              <input class="form-control" type="number" name="klRecorridos"/>
            </div>
            <div class="col-sm-6">
              <label><small>Tiempo total</small></label>
              <input class="form-control" type="time" name="tiempoTotal"/>
            </div>

            <div class="col-sm-12">
              <label><small>Anotaciones sobe el viaje</small></label>
              <textarea class="form-control" type="text" name="notas"></textarea>
            </div>

            <div class="col-sm-12 mt-3">
              <input class="form-control btn btn-success" type="submit" name="btnReg" value="Registrar"/>
            </div>
          </div>
        </form>

        <?php
        if(isset($_POST['btnReg'])){

        $maquina = $_POST['maquina'];
        $listaChequeo = $_POST['listaChequeo'];
        $fecha = $_POST['fecha'];
        $lugarPartida = $_POST['lugarPartida'];
        $lugarArribo = $_POST['lugarArribo'];
        $horaPartida = $_POST['horaPartida'];
        $horaArribo = $_POST['horaArribo'];
        $klRecorridos = $_POST['klRecorridos'];
        $tiempoTotal = $_POST['tiempoTotal'];
        $notas = $_POST['notas'];


        include("conexion.php");
        
        $sql = "INSERT INTO registros (maquina, listaChequeo, fecha, lugarPartida, lugarArribo, horaPartida, horaArribo, klRecorridos, tiempoTotal, notas) VALUES ('$maquina', '$listaChequeo', '$fecha', '$lugarPartida', '$lugarArribo', '$horaPartida', '$horaArribo', '$klRecorridos', '$tiempoTotal', '$notas')";

        if(!$sql){
          echo '<script>
          swal("Error", "El registro no se puede cargar.", "error");
          </script>';
        } else {
          $conexion->query($sql);
        }
        include("desconexion.php");
        }
        ?>

      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</body>
</html>

<!--
CREATE TABLE registros (
    id int PRIMARY KEY AUTO_INCREMENT,
    
    maquina varchar(30),
    listaChequeo varchar(10),
    fecha varchar(20),
    lugarPartida varchar(100),
    lugarArribo varchar(100),
    horaPartida varchar(20),
    horaArribo varchar(20),
    klRecorridos varchar(10),
    tiempoTotal varchar(20),
    notas varchar(1000)
    );
-->