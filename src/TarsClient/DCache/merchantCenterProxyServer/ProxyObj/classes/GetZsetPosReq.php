<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetZsetPosReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const COND = 3;
	const POSITIVEORDER = 4;
	const IDCSPECIFIED = 5;


	public $moduleName; 
	public $mainKey; 
	public $cond; 
	public $positiveOrder= true; 
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
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::POSITIVEORDER => array(
			'name'=>'positiveOrder',
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetZsetPosReq', self::$_fields);
		$this->cond = new \TARS_Vector(new Condition());
	}
}
