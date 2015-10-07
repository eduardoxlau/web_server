<?
// ini_set ('soap.wsdl_cache_enabled',0);
require_once('lib/nusoap.php');

include('requestdb.php'); 
///////////////////configuration webserver nusoap//////////////////////////////
$namespace="urn:miserviciowsdl";
$server = new soap_server(); 
$server->configureWSDL('Observatic',$namespace); 
$server->schemaTargetNamespace=$namespace;
///////////////////////////////////////////////////////////////////////////////

////////////////////// registrer functions webserver nusoap////////////////////
$server->register('Categories',array('provedor' => 'xsd:int'),array('return' => 'xsd:string'),
$namespace);
$server->register('Tematicas',array('categoria_id' => 'xsd:int'),array('return' => 'xsd:string'),
$namespace);


function Categories($provedor){ 
	

	return  functions::categories();
	

} 
function Tematicas($categoria_id){
	
	
	if ($categoria_id>1){

		return  functions::tematicasxcategoria($categoria_id);
	}else{

		return  functions::tematicas();
	}
	
	
		 


} 



$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA); 

?>