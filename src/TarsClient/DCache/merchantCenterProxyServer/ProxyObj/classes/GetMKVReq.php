<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetMKVReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const FIELD = 3;
	const COND = 4;
	const RETENTRYCNT = 5;
	const IDCSPECIFIED = 6;


	public $moduleName; 
	public $mainKey; 
	public $field; 
	public $cond; 
	public $retEntryCnt= false; 
	public $idcSpecified= ""; 


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
		self::FIELD => array(
			'name'=>'field',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::RETENTRYCNT => array(
			'name'=>'retEntryCnt',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetMKVReq', self::$_fields);
		$this->cond = new \TARS_Vector(new Condition());
	}
}
