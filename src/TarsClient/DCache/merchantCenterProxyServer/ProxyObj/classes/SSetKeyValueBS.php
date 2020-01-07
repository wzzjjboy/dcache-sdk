<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SSetKeyValueBS extends \TARS_Struct {
	const KEYITEM = 1;
	const VALUEITEM = 2;
	const VERSION = 3;
	const DIRTY = 4;
	const EXPIRETIMESECOND = 5;


	public $keyItem; 
	public $valueItem; 
	public $version= 0; 
	public $dirty= true; 
	public $expireTimeSecond= 0; 


	protected static $_fields = array(
		self::KEYITEM => array(
			'name'=>'keyItem',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::VALUEITEM => array(
			'name'=>'valueItem',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::VERSION => array(
			'name'=>'version',
			'required'=>false,
			'type'=>\TARS::CHAR,
			),
		self::DIRTY => array(
			'name'=>'dirty',
			'required'=>false,
			'type'=>\TARS::BOOL,
			),
		self::EXPIRETIMESECOND => array(
			'name'=>'expireTimeSecond',
			'required'=>false,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SSetKeyValueBS', self::$_fields);
		$this->keyItem = new \TARS_Vector(\TARS::CHAR);
		$this->valueItem = new \TARS_Vector(\TARS::CHAR);
	}
}
