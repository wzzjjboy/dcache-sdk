<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateKeyValue extends \TARS_Struct {
	const MAINKEY = 1;
	const MPVALUE = 2;
	const VER = 3;
	const DIRTY = 4;
	const INSERT = 5;
	const EXPIRETIMESECOND = 6;


	public $mainKey; 
	public $mpValue; 
	public $ver= 0; 
	public $dirty= true; 
	public $insert= false; 
	public $expireTimeSecond= 0; 


	protected static $_fields = array(
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::MPVALUE => array(
			'name'=>'mpValue',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
		self::VER => array(
			'name'=>'ver',
			'required'=>true,
			'type'=>\TARS::CHAR,
			),
		self::DIRTY => array(
			'name'=>'dirty',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::INSERT => array(
			'name'=>'insert',
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateKeyValue', self::$_fields);
		$this->mpValue = new \TARS_Map(\TARS::STRING,new UpdateFieldInfo());
	}
}
