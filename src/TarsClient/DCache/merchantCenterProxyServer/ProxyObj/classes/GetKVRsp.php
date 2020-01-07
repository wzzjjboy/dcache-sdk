<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetKVRsp extends \TARS_Struct {
	const VALUE = 1;
	const VER = 2;
	const EXPIRETIME = 3;


	public $value; 
	public $ver; 
	public $expireTime= 0; 


	protected static $_fields = array(
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRING,
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetKVRsp', self::$_fields);
	}
}
