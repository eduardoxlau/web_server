
<?
require_once('lib/nusoap.php');
$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
#municipios
$municipios=$cliente->call('Municipios',array('provedor'=>1));
#categorias
$categorias=$cliente->call('Categories',array('provedor'=>1));
#all tematicas
$Tematicas=$cliente->call('Tematicas');
#tematicas  X categorias
$Tematicasxcategoria=$cliente->call('Tematicas',array('categoria_id'=>1));
#all indicadores
$indicadores=$cliente->call('Indicadores');


echo '<h1> municipios </h1> ';
echo $municipios;
echo '<h1> categorias </h1> ';
echo $categorias;

echo '<h1> Tematicas  </h1> ';
echo $Tematicas;

echo '<h1> Tematicas X categoria </h1> ';
echo $Tematicasxcategoria;
echo '<h1> indicadores  </h1> ';
var_dump($indicadores) 


?>