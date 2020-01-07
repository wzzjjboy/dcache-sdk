<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class KeyInfo extends \TARS_Struct {
	const KEYITEM = 1;
	const VERSION = 2;


	public $keyItem; 
	public $version; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VERSION => array(
			'name'=>'version',
			'required'=>true,
			'type'=>\TARS::CHAR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_KeyInfo', self::$_fields);
	}
}
