<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SKey extends \TARS_Struct {
	const KEYITEM = 1;
	const HASH = 2;


	public $keyItem; 
	public $hash; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::HASH => array(
			'name'=>'hash',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SKey', self::$_fields);
	}
}
