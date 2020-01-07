<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateValueBS extends \TARS_Struct {
	const OP = 1;
	const VALUE = 2;


	public $op; 
	public $value; 


	protected static $_fields = array(
		self::OP => array(
			'name'=>'op',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateValueBS', self::$_fields);
		$this->value = new \TARS_Vector(\TARS::CHAR);
	}
}
