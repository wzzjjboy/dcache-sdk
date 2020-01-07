<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetZSetBatchReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEYS = 2;
	const FIELD = 3;
	const COND = 4;
	const IDCSPECIFIED = 5;


	public $moduleName; 
	public $mainKeys; 
	public $field; 
	public $cond; 
	public $idcSpecified= ""; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::MAINKEYS => array(
			'name'=>'mainKeys',
			'required'=>true,
			'type'=>\TARS::VECTOR,
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
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetZSetBatchReq', self::$_fields);
		$this->mainKeys = new \TARS_Vector(\TARS::STRING);
		$this->cond = new \TARS_Vector(new Condition());
	}
}
