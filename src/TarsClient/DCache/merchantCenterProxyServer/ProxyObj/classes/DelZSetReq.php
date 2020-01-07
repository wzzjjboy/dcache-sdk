<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class DelZSetReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const COND = 3;


	public $moduleName; 
	public $mainKey; 
	public $cond; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_DelZSetReq', self::$_fields);
		$this->cond = new \TARS_Vector(new Condition());
	}
}
