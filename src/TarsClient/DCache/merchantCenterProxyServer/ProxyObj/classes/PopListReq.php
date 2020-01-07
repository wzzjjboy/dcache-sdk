<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class PopListReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const ATHEAD = 3;


	public $moduleName; 
	public $mainKey; 
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
		self::ATHEAD => array(
			'name'=>'atHead',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_PopListReq', self::$_fields);
	}
}
