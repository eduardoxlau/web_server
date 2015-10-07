
<?
require_once('lib/nusoap.php');
$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
$resultado=$cliente->call('Indicadores',array('tematica_id'=>0));

echo $resultado;

?>