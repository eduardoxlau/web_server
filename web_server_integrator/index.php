<html>
<head>
<LINK REL=StyleSheet HREF='materialize/css/materialize.min.css' TYPE='text/css' MEDIA=screen>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<SCRIPT Language=Javascript SRC='materialize/js/jquery.min.js'></SCRIPT>
<SCRIPT Language=Javascript SRC='materialize/js/materialize.min.js'></SCRIPT>

	<title>Web Server</title>
 <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Categorias</a></li>
        <li><a href="tematicas.php">Tematicas</a></li>
        <li><a href="indicador.php">Indicadores</a></li>
      </ul>
    </div>
  </nav>
</head>
<body>
<div class="container ">
	<p class='title'>
		Categorias
	</p>
	<?
	require_once('lib/nusoap.php'); 
	$cliente= new nusoap_client('http://localhost/web_server/web_server_integrator/soap.php?wsdl',true);
	$resultado = $cliente->call('Categories');
	//echo ($resultado);
	$result= json_decode($resultado);
	$i=0;
	echo '<div class="row">';
	foreach ($result as &$valor) {
	echo '<div class="col s4">';
		  
	   
	   echo '<div class="card">
		    <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="images/office.jpg">
		    </div>
		    <div class="card-content">
		      <span class="card-title activator grey-text text-darken-4">';
		      echo ($result[$i]->{'name'});
		      echo'<i class="material-icons right">more_vert</i></span>
		      <p><a href="tematicas.php?categoria_id='.$result[$i]->{'id'}.'&provedor='.$result[$i]->{'provedor'}.'">Ver tematicas</a></p>
		    </div>
		    <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">Descripcion<i class="material-icons right">close</i></span>
		      <p>';
		      echo ($result[$i]->{'descripcion'});
		      echo'</p>
		    </div>
		  </div>
	  </div>';

		$i++;
	}
	echo '</div>';

	?>

</div>

</body>
</html>

        



