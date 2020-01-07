<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SKeyValueBS extends \TARS_Struct {
	const KEYITEM = 1;
	const VALUE = 2;
	const RET = 3;
	const VER = 4;
	const EXPIRETIME = 5;


	public $keyItem; 
	public $value; 
	public $ret; 
	public $ver; 
	public $expireTime; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
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
			'required'=>false,
			'type'=>\TARS::INT32,
			),
		self::VER => array(
			'name'=>'ver',
			'required'=>false,
			'type'=>\TARS::CHAR,
			),
		self::EXPIRETIME => array(
			'name'=>'expireTime',
			'required'=>false,
			'type'=>\TARS::INT64,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SKeyValueBS', self::$_fields);
		$this->keyItem = new \TARS_Vector(\TARS::CHAR);
		$this->value = new \TARS_Vector(\TARS::CHAR);
	}
}
