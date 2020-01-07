<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class ReplaceListReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const DATA = 3;
	const INDEX = 4;
	const EXPIRETIME = 5;


	public $moduleName; 
	public $mainKey; 
	public $data; 
	public $index; 
	public $expireTime; 


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
			'type'=>\TARS::MAP,
			),
		self::INDEX => array(
			'name'=>'index',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::EXPIRETIME => array(
			'name'=>'expireTime',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_ReplaceListReq', self::$_fields);
		$this->data = new \TARS_Map(\TARS::STRING,new UpdateValue());
	}
}
