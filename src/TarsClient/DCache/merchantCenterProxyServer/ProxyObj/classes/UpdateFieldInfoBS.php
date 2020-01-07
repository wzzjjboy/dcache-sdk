<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateFieldInfoBS extends \TARS_Struct {
	const REPLACE = 1;
	const UPDATEVALUE = 2;


	public $replace= true; 
	public $upDateValue; 


	protected static $_fields = array(
		self::REPLACE => array(
			'name'=>'replace',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::UPDATEVALUE => array(
			'name'=>'upDateValue',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateFieldInfoBS', self::$_fields);
		$this->upDateValue = new UpdateValueBS();
	}
}
