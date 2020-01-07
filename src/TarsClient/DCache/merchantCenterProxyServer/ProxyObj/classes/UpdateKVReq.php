<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateKVReq extends \TARS_Struct {
	const MODULENAME = 1;
	const DATA = 2;
	const OPTION = 3;


	public $moduleName; 
	public $data; 
	public $option; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::OPTION => array(
			'name'=>'option',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateKVReq', self::$_fields);
		$this->data = new SSetKeyValue();
	}
}
