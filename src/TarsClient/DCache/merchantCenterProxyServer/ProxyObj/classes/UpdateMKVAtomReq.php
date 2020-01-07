<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateMKVAtomReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const VALUE = 3;
	const COND = 4;
	const DIRTY = 5;
	const EXPIRETIMESECOND = 6;


	public $moduleName; 
	public $mainKey; 
	public $value; 
	public $cond; 
	public $dirty= true; 
	public $expireTimeSecond= 0; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateMKVAtomReq', self::$_fields);
		$this->value = new \TARS_Map(\TARS::STRING,new UpdateValue());
		$this->cond = new \TARS_Vector(new Condition());
	}
}
