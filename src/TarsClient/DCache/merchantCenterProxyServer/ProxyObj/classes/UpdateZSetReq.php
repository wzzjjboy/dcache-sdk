<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateZSetReq extends \TARS_Struct {
	const MODULENAME = 1;
	const VALUE = 2;
	const COND = 3;


	public $moduleName; 
	public $value; 
	public $cond; 


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
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateZSetReq', self::$_fields);
		$this->value = new AddSetKeyValue();
		$this->cond = new \TARS_Vector(new Condition());
	}
}
