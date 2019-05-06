<?php
class AdminUnitController{
	public function __construct(){
		global $zController;		
		$model = $zController->getModel("/backend","AdminUnitModel");
		add_action('init',array($model,'create'));				
	}
	
 } 
?>