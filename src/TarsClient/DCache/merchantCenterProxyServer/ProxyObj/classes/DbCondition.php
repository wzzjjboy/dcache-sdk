<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class DbCondition extends \TARS_Struct {
	const FIELDNAME = 1;
	const OP = 2;
	const VALUE = 3;
	const TYPE = 4;


	public $fieldName; 
	public $op; 
	public $value; 
	public $type; 


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
		self::TYPE => array(
			'name'=>'type',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_DbCondition', self::$_fields);
	}
}
