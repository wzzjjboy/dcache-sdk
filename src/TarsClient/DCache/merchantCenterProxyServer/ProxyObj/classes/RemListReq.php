<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class RemListReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const ATHEAD = 3;
	const COUNT = 4;


	public $moduleName; 
	public $mainKey; 
	public $atHead= true; 
	public $count; 


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
		self::COUNT => array(
			'name'=>'count',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_RemListReq', self::$_fields);
	}
}
