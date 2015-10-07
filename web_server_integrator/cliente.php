<?
require_once('lib/nusoap.php'); 
	$cliente = new nusoap_client('http://localhost/web_server/web_server_integrator/soap.php?wsdl',true);
	$resultado=$cliente->call('Tematicas',array('categoria_id'=>2,'provedor' => 2));
	
	echo ($resultado);

?>