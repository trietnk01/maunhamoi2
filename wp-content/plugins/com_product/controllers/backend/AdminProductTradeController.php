<?php
class AdminProductTradeController{
 	private $_prefix_name = 'zendvn-sp-zaproducttrade';	
	private $_prefix_id   = 'zendvn-sp-zaproducttrade-';	
	public function __construct(){		
		global $zController;		
		$model = $zController->getModel("/backend","AdminProductTradeModel");
		add_action('init',array($model,'create'));			
	}
	
 } 
?>