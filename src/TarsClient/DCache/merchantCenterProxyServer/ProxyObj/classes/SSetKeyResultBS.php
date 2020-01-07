<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SSetKeyResultBS extends \TARS_Struct {
	const KEYITEM = 1;
	const RET = 2;


	public $keyItem; 
	public $ret; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SSetKeyResultBS', self::$_fields);
		$this->keyItem = new \TARS_Vector(\TARS::CHAR);
	}
}
