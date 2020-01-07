<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class DelCondition extends \TARS_Struct {
	const MAINKEY = 1;
	const COND = 2;
	const VER = 3;


	public $mainKey; 
	public $cond; 
	public $ver= 0; 


	protected static $_fields = array(
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::COND => array(
			'name'=>'cond',
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_DelCondition', self::$_fields);
		$this->cond = new \TARS_Vector(new Condition());
	}
}
