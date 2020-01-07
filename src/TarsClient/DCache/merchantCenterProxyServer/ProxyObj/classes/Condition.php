<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class Condition extends \TARS_Struct {
	const FIELDNAME = 1;
	const OP = 2;
	const VALUE = 3;


	public $fieldName; 
	public $op; 
	public $value; 


	protected static $_fields = array(
		self::FIELDNAME => array(
			'name'=>'fieldName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
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
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_Condition', self::$_fields);
	}
}
