<?
// ini_set ('soap.wsdl_cache_enabled',0);
require_once('lib/nusoap.php');

///////////////////configuration webserver nusoap//////////////////////////////
$namespace="urn:miserviciowsdl";
$server = new soap_server(); 
$server->configureWSDL('Integrador',$namespace); 
$server->schemaTargetNamespace=$namespace;
///////////////////////////////////////////////////////////////////////////////

////////////////////// registrer functions webserver nusoap////////////////////
$server->register('Categories',array('provedor' => 'xsd:int'),array('return' => 'xsd:string'),
$namespace);
$server->register('Tematicas',array('categoria_id' => 'xsd:int','provedor' => 'xsd:int'),array('return' => 'xsd:string'),
$namespace);
// Provedor 1 Tangara
// Provedor 2 Observatic

function Categories($provedor){ 
	if ($provedor==2){//si provedor es para observatic

		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado=$cliente->call('Categories');
		return $resultado;
	
	

	}
	else if($provedor==1){ //si provedor es para Tangara


	}
	else//all provedores
	{
		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado=$cliente->call('Categories');
		return $resultado;

	}
} 
function Tematicas($categoria_id,$provedor){
	
	if ($provedor==2){//si provedor es para observatic
		if ($categoria_id>1){ //si provedor es para observatic tiene categoria

			$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
			$resultado=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
			
			return $resultado;

		}else{//si provedor es para observatic no tiene categoria

			$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
			$resultado=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
			return $resultado;
		}
	}
	else if ($provedor==1) //si provedor es para Tangara
	{
		

	}
	else{ //all provedores
		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
		
		return $resultado;

	}
	
		 


} 



$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA); 

?>