<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class CheckKeyReq extends \TARS_Struct {
	const MODULENAME = 1;
	const KEYS = 2;
	const IDCSPECIFIED = 3;


	public $moduleName; 
	public $keys; 
	public $idcSpecified= ""; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::KEYS => array(
			'name'=>'keys',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_CheckKeyReq', self::$_fields);
		$this->keys = new \TARS_Vector(\TARS::STRING);
	}
}
