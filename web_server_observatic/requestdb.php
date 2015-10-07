<?

class functions{

	
	//generamos la consulta
	public static function categories(){
		include('config.php'); 
		$sql = "SELECT id_categoria,nombre,descripcion FROM categorias";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$category = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id_categoria'];
		    $nombre=$row['nombre'];
		    $descripcion=$row['descripcion'];
		    $category[] = array('id'=> $id, 'name'=> $nombre,'descripcion'=>$descripcion,'provedor'=>2);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($category);
		return $json_string;
	}
	public static function tematicas(){

		include('config.php'); 
		$sql = "SELECT id_tematica,tematicas.nombre as nombre,tematicas.descripcion as descripcion,categorias.nombre as categoria FROM tematicas,categorias WHERE tematicas.id_categoria=categorias.id_categoria";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$tematicas = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id_tematica'];
		    $nombre=$row['nombre'];
		    $descripcion=$row['descripcion'];
		    $categoria=$row['categoria'];
		    $tematicas[] = array('id'=> $id, 'name'=> $nombre,'descripcion'=>$descripcion,'categoria'=>$categoria,'provedor'=>2);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($tematicas);
		return $json_string;
	}
	public static function tematicasxcategoria($category_id){

		include('config.php'); 
		$sql = "SELECT id_tematica,tematicas.nombre as nombre,tematicas.descripcion as descripcion,categorias.nombre as categoria FROM tematicas,categorias WHERE tematicas.id_categoria=categorias.id_categoria and categorias.id_categoria=$category_id";
		mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
		 
		if(!$result = mysqli_query($conexion, $sql)) die();
		 
		$tematicas = array(); //creamos un array
		 
		while($row = mysqli_fetch_array($result)) 
		{ 
		    $id=$row['id_tematica'];
		    $nombre=$row['nombre'];
		    $descripcion=$row['descripcion'];
		    $categoria=$row['categoria'];
		    $tematicas[] = array('id'=> $id, 'name'=> $nombre,'descripcion'=>$descripcion,'categoria'=>$categoria,'provedor'=>2);
		}
		$close = mysqli_close($conexion) 
		or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

		$json_string = json_encode($tematicas);
		return $json_string;
	}


}


?>