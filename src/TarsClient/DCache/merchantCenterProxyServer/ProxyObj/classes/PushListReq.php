<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class PushListReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const DATA = 3;
	const ATHEAD = 4;


	public $moduleName; 
	public $mainKey; 
	public $data; 
	public $atHead= true; 


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
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::ATHEAD => array(
			'name'=>'atHead',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_PushListReq', self::$_fields);
		$this->data = new \TARS_Vector(new InsertKeyValue());
	}
}
