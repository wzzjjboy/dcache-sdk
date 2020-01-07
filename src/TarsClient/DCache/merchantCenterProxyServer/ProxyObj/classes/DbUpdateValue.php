<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class DbUpdateValue extends \TARS_Struct {
	const OP = 1;
	const VALUE = 2;
	const TYPE = 3;


	public $op; 
	public $value; 
	public $type; 


	protected static $_fields = array(
		self::OP => array(
			'name'=>'op',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::TYPE => array(
			'name'=>'type',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_DbUpdateValue', self::$_fields);
	}
}
