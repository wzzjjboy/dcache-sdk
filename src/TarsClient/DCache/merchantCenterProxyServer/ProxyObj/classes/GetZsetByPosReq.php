<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetZsetByPosReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const FIELD = 3;
	const START = 4;
	const END = 5;
	const POSITIVEORDER = 6;
	const IDCSPECIFIED = 7;


	public $moduleName; 
	public $mainKey; 
	public $field; 
	public $start; 
	public $end; 
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
		self::FIELD => array(
			'name'=>'field',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::START => array(
			'name'=>'start',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::END => array(
			'name'=>'end',
			'required'=>true,
			'type'=>\TARS::INT64,
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
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetZsetByPosReq', self::$_fields);
	}
}
