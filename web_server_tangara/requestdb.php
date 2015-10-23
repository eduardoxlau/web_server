<?

class functions{

	public static function municipios(){
		include('config.php'); 
		$sql = "SELECT idmunicipio,nombreMunicipio FROM municipio";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$municipios = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['idmunicipio'];
		    $nombre=$row['nombreMunicipio'];
		    $municipios[] = array('id'=> $id,'nombre'=>$nombre, 'provedor'=>1);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($municipios);
		return $json_string;
	}
	//generamos la consulta
	public static function categories(){
		include('config.php'); 
		$sql = "SELECT id_dimension,Descripcion FROM dimension";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$category = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id_dimension'];
		    $descripcion=$row['Descripcion'];
		    $category[] = array('id'=> $id, 'name'=>$descripcion, 'descripcion'=>$descripcion,'provedor'=>1);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($category);
		return $json_string;
	}
	public static function tematicas(){
		include('config.php'); 
		$sql = "SELECT id_tematica,Descripcion,fk_Dimension FROM tematica";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$tematicas = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id_tematica'];
		    $descripcion=$row['Descripcion'];
		    $categoria=$row['fk_Dimension'];
		    $tematicas[] = array('id'=> $id,'name'=>$descripcion,  'descripcion'=>$descripcion,'categoria'=>$categoria, 'provedor'=>1);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($tematicas);
		return $json_string;
	}
	public static function tematicasxcategoria($categoria){
		include('config.php'); 
		$sql = "SELECT id_tematica as id,Descripcion,fk_Dimension FROM tematica WHERE  fk_Dimension=$categoria";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$tematicas = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id'];
		    $descripcion=$row['Descripcion'];
		    $categoria=$row['fk_Dimension'];
		    $tematicas[] = array('id'=> $id,'name'=>$descripcion,  'descripcion'=>$descripcion,'categoria'=>$categoria, 'provedor'=>1);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($tematicas);
		return $json_string;
	}
	public static function indicadores(){
		include('config.php'); 
		$sql = "SELECT datos.id_datos as id ,indicadores.nombre as descripcion ,tipo_dato as medida,indicadores.descripcion as objetivo,datos.id_variable as variable,variables.descripcion as etiqueta,valor
		FROM datos,variables,indicadores where datos.id_variable=variables.id_variable and indicadores.id_indicadores=variables.id_indicador";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$indicador = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id'];
		    $descripcion=$row['descripcion'];
		    $medida=$row['medida'];
		    $objetivo=$row['objetivo'];
		    $variable=$row['variable'];
		    $etiqueta=$row['etiqueta'];
		    $valor=$row['valor'];
		    $indicador[] = array('id'=> $id, 'descripcion'=> $descripcion,'medida'=>$medida,'objetivo'=>$objetivo, 'variable'=> $variable,'etiqueta'=>$etiqueta,'valor'=>$valor,'provedor'=>1);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($indicador);
		return $json_string;
	}



	
}
?>