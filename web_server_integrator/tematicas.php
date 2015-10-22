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
	
    </ul>
	<p class='title'>
		Tematicas
	</p>
	<?

	require_once('lib/nusoap.php'); 
	$cliente= new nusoap_client('http://localhost/web_server/web_server_integrator/soap.php?wsdl',true);
	 if (isset($_GET['categoria_id']))
    {
        $resultado = $cliente->call('Tematicas',array('categoria_id'=>$_GET['categoria_id'],'provedor'=>$_GET['provedor']));
    }else{
		$resultado = $cliente->call('Tematicas');
    }
	//echo ($resultado);
	$result= json_decode($resultado);
	$i=0;

	echo '<div class="row">';
	foreach ($result as &$valor) {
	echo '<div class="col s12">';
	echo '<ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><span>'.$result[$i]->{'name'}.'</span></div>
      <div class="collapsible-body"><p><a HREF="indicador.php?tematica_id='.$result[$i]->{'id'}.'&provedor='.$result[$i]->{'provedor'}.'">'.$result[$i]->{'descripcion'}.'</a></p></div>
    </li>
    </ul>
    </div>';

		$i++;
	}
	echo '</div>';


	?>

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

        



