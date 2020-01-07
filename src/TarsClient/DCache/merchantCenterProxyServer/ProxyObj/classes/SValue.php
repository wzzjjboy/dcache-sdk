<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SValue extends \TARS_Struct {
	const VALUE = 1;


	public $value; 


	protected static $_fields = array(
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SValue', self::$_fields);
	}
}
