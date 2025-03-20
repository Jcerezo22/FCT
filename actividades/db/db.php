<?php
	/*Limpia los datos que se recogen del fomulario */
	function limpiarDatos($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	/******************************************Funciones para abrir y cerrar la base de datos*******************************************/
 	/*Abre la base de datos */
    function abrirBD()
    {
		try {
			
			$servername = "pruebas.maristaschamberi.com";
            $username = "root";
            $password = "Chamberi10$";
            $dbname = "actividades";

			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 	 	 	 	 	 	
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	 	 	
			
			return $conn;
		}
		catch (PDOException $ex) {
			echo $ex->getMessage(); 	 	 	 	 	 	
		}
	}

	/*Cierra la base de datos */
    function cerrarBD($conn)
    {
        $conn = null;
        return $conn;
    }
?>