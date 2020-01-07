<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class AddZSetReq extends \TARS_Struct {
	const MODULENAME = 1;
	const VALUE = 2;
	const SCORE = 3;


	public $moduleName; 
	public $value; 
	public $score; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::SCORE => array(
			'name'=>'score',
			'required'=>true,
			'type'=>\TARS::DOUBLE,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_AddZSetReq', self::$_fields);
		$this->value = new AddSetKeyValue();
	}
}
