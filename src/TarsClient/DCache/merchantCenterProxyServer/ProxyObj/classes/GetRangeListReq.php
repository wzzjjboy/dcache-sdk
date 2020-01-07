<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetRangeListReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const FIELD = 3;
	const STARTINDEX = 4;
	const ENDINDEX = 5;
	const IDCSPECIFIED = 6;


	public $moduleName; 
	public $mainKey; 
	public $field; 
	public $startIndex; 
	public $endIndex; 
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
		self::STARTINDEX => array(
			'name'=>'startIndex',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::ENDINDEX => array(
			'name'=>'endIndex',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetRangeListReq', self::$_fields);
	}
}
