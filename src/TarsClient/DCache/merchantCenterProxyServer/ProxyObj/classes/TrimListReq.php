<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class TrimListReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const STARTINDEX = 3;
	const ENDINDEX = 4;


	public $moduleName; 
	public $mainKey; 
	public $startIndex; 
	public $endIndex; 


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
		self::STARTINDEX => array(
			'name'=>'startIndex',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::ENDINDEX => array(
			'name'=>'endIndex',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_TrimListReq', self::$_fields);
	}
}
