<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SKeyVersionBS extends \TARS_Struct {
	const KEYITEM = 1;
	const VER = 2;


	public $keyItem; 
	public $ver; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::VER => array(
			'name'=>'ver',
			'required'=>true,
			'type'=>\TARS::CHAR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SKeyVersionBS', self::$_fields);
		$this->keyItem = new \TARS_Vector(\TARS::CHAR);
	}
}
