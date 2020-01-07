<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MainKeyReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const IDCSPECIFIED = 3;


	public $moduleName; 
	public $mainKey; 
	public $idcSpecified= ""; 


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
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MainKeyReq', self::$_fields);
	}
}
