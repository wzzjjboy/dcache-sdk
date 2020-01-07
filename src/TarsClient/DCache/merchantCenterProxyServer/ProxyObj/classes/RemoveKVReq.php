<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class RemoveKVReq extends \TARS_Struct {
	const MODULENAME = 1;
	const KEYINFO = 2;


	public $moduleName; 
	public $keyInfo; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::KEYINFO => array(
			'name'=>'keyInfo',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_RemoveKVReq', self::$_fields);
		$this->keyInfo = new KeyInfo();
	}
}
