<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SSetKeyValue extends \TARS_Struct {
	const KEYITEM = 1;
	const VALUE = 2;
	const VERSION = 3;
	const DIRTY = 4;
	const EXPIRETIMESECOND = 5;


	public $keyItem; 
	public $value; 
	public $version= 0; 
	public $dirty= true; 
	public $expireTimeSecond= 0; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VERSION => array(
			'name'=>'version',
			'required'=>true,
			'type'=>\TARS::CHAR,
			),
		self::DIRTY => array(
			'name'=>'dirty',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::EXPIRETIMESECOND => array(
			'name'=>'expireTimeSecond',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SSetKeyValue', self::$_fields);
	}
}
