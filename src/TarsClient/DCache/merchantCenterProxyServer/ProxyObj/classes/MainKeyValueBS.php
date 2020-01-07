<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MainKeyValueBS extends \TARS_Struct {
	const MAINKEY = 1;
	const VALUE = 2;
	const RET = 3;


	public $mainKey; 
	public $value; 
	public $ret; 


	protected static $_fields = array(
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::RET => array(
			'name'=>'ret',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MainKeyValueBS', self::$_fields);
		$this->mainKey = new \TARS_Vector(\TARS::CHAR);
		$this->value = new \TARS_Vector(new \TARS_Map(\TARS::STRING,new \TARS_Vector(\TARS::CHAR)));
	}
}
