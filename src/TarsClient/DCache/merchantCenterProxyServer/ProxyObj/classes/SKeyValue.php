<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SKeyValue extends \TARS_Struct {
	const KEYITEM = 1;
	const VALUE = 2;
	const RET = 3;
	const VER = 4;
	const EXPIRETIME = 5;


	public $keyItem; 
	public $value; 
	public $ret; 
	public $ver; 
	public $expireTime= 0; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::RET => array(
			'name'=>'ret',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::VER => array(
			'name'=>'ver',
			'required'=>true,
			'type'=>\TARS::CHAR,
			),
		self::EXPIRETIME => array(
			'name'=>'expireTime',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SKeyValue', self::$_fields);
	}
}
