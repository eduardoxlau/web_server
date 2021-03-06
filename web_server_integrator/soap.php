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
$server->register('Indicadores',array('tematica_id' => 'xsd:int','provedor' => 'xsd:int','municipio_id'=> 'xsd:int'),array('return' => 'xsd:string'),
$namespace);
$server->register('Municipios',array('provedor' => 'xsd:int'),array('return' => 'xsd:string'),$namespace);


// Provedor 1 Tangara
// Provedor 2 Observatic

function Categories($provedor){ 
	if ($provedor==2){//si provedor es para observatic

		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado=$cliente->call('Categories');
		return $resultado;
	
	

	}
	else if($provedor==1){ //si provedor es para Tangara
		$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
		$resultado=$cliente->call('Categories');
		return $resultado;

	}
	else//all provedores
	{
		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado1=$cliente->call('Categories');
		$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
		$resultado2=$cliente->call('Categories');
		$resultado =json_encode(array_merge(json_decode($resultado1, true),json_decode($resultado2, true)));
		return $resultado;


	}
} 
function Tematicas($categoria_id,$provedor){
	
	if ($provedor==2){//si provedor es para observatic
		if ($categoria_id>1){ //si provedor es para observatic tiene categoria

			$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
			$resultado=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
			
			return $resultado;
		}
	}
	else if ($provedor==1) //si provedor es para Tangara
	{
		$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
		$resultado=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
			
		return $resultado;

	}
	else{ //all provedores
		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado1=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
		$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
		$resultado2=$cliente->call('Tematicas',array('categoria_id'=>$categoria_id));
		$resultado =json_encode(array_merge(json_decode($resultado1, true),json_decode($resultado2, true)));
		
		return $resultado;

	}
}
function Indicadores($tematica_id,$provedor,$municipio_id){ 
	if ($provedor==2){//si provedor es para observatic

		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado=$cliente->call('Indicadores',array('tematica_id'=>$tematica_id));
		return $resultado;
	
	

	}
	else if($provedor==1){ //si provedor es para Tangara
		if($municipio_id>0){
			$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
			$resultado=$cliente->call('IndicadoresxMunicipioxTematica',array('municipio_id'=>$municipio_id,'tematica_id'=>$tematica_id));
			return $resultado;
		}


	}
	else//all provedores
	{
		$cliente = new nusoap_client('http://localhost/web_server/web_server_observatic/soap.php?wsdl',true);
		$resultado1=$cliente->call('Indicadores',array('tematica_id'=>0));
		$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
		$resultado2=$cliente->call('Indicadores');
		$resultado =json_encode(array_merge(json_decode($resultado1, true),json_decode($resultado2, true)));
		return $resultado;

	}
}  
function Municipios($provedor){

$cliente = new nusoap_client('http://localhost/web_server/web_server_tangara/soap.php?wsdl',true);
#municipios
$resultado=$cliente->call('Municipios',array('provedor'=>1));
return $resultado;

}



$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA); 

?>