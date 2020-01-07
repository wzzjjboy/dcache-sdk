<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class AddSetKeyValue extends \TARS_Struct {
	const MAINKEY = 1;
	const DATA = 2;
	const EXPIRETIME = 3;
	const DIRTY = 4;


	public $mainKey; 
	public $data; 
	public $expireTime; 
	public $dirty= true; 


	protected static $_fields = array(
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
		self::EXPIRETIME => array(
			'name'=>'expireTime',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::DIRTY => array(
			'name'=>'dirty',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_AddSetKeyValue', self::$_fields);
		$this->data = new \TARS_Map(\TARS::STRING,new UpdateValue());
	}
}
