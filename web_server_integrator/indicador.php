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
	<h4>Indicadores Json</h4>
	<br>
	<br>
	<br>
   
	<?
	if (isset($_GET['tematica_id']))
    {
    	require_once('lib/nusoap.php'); 
    	$cliente= new nusoap_client('http://localhost/web_server/web_server_integrator/soap.php?wsdl',true);
        $resultado = $cliente->call('Indicadores',array('tematica_id'=>$_GET['tematica_id'],'provedor'=>$_GET['provedor']));
    	echo $resultado;
    }else{
    	require_once('lib/nusoap.php');
		$cliente= new nusoap_client('http://localhost/web_server/web_server_integrator/soap.php?wsdl',true);
		$resultado = $cliente->call('Indicadores',array('tematica_id'=>0,'provedor'=>0));
		echo $resultado;
    }
	
	
	
    ?>
    <br>
	<br>
	<br>

</div>

</body>
</html>

        



