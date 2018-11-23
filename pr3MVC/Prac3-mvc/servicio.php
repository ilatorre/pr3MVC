
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo MVC con PHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
	<?php

	class Service {
		
		private $servicio;
		private $db;

		public function __construct() {
			$this->servicio = array();
			$this->db = new PDO('mysql:host=localhost;dbname=ejemplo_mvc', "root", "");
		}

		private function setNames() {
			return $this->db->query("SET NAMES 'utf8'");
		}

		public function getServicios() {

			self::setNames();
			$sql = "SELECT id, nombre, precio FROM servicio";
			foreach ($this->db->query($sql) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->db = null;
		}

		public function setServicio($nombre, $precio) {

			self::setNames();
			$sql = "INSERT INTO servicio(nombre, precio) VALUES ('" . $nombre . "', '" . $precio . "')";
			$result = $this->db->query($sql);

			if ($result) {
				return true;
			} else {
				return false;
			}
		}
	}
	?>

    <body>
		<div class="container">
            <header class="text-center">
                <h1>Ejemplo MVC con PHP</h1>
                <hr/>
                <p class="lead">Creamos una base de datos de los servicios <br/>
                    que podría realizar un taller y <br/>
                    operamos con ella utilizando el paradigma MVC</p>
            </header>
            <div class="col-lg-6 text-center">
                <hr/>
                <h3>Listado de servicios</h3>
                <table class="table">
                    <tr>
                        <td><strong>SERVICIO</strong></td>
                        <td><strong>PRECIO</strong></td>
                    </tr>
                    <?php
					$services = new Service();
					$datos = $services->getServicios();
                    for ($i = 0; $i < count($datos); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $datos[$i]["nombre"]; ?></td>
                            <td><?php echo $datos[$i]["precio"]; ?> €</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <a href="index.php"> <i class="fa fa-arrow-circle-left"></i> Volver a la página principal</a>
                <hr/>
            </div> 
            <footer class="col-lg-12 text-center">
                MVC - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>


