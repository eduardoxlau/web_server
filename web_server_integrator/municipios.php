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
	<h4> tematica :	<?echo $_GET['name']?></h4>
	<?
	require_once('lib/nusoap.php'); 
	$cliente= new nusoap_client('http://localhost/web_server/web_server_integrator/soap.php?wsdl',true);
	$resultado = $cliente->call('Municipios');
	
	$result= json_decode($resultado);
	$i=0;

	echo '<div class="collection">';
	foreach ($result as &$valor) {
		echo '<a href="http://localhost/web_server/web_server_integrator/indicador.php?tematica_id='.$_GET['tematica_id'].'&provedor=1&municipio_id='.$result[$i]->{'id'}.'" 
				class="collection-item">'.$result[$i]->{'nombre'}.'</a>';
		$i++;
	}
	?>
	</div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
</script>
</body>
</html>

        



