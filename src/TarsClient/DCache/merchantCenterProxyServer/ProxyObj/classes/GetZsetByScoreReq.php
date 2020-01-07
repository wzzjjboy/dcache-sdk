<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetZsetByScoreReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const FIELD = 3;
	const MINSCORE = 4;
	const MAXSCORE = 5;
	const IDCSPECIFIED = 6;


	public $moduleName; 
	public $mainKey; 
	public $field; 
	public $minScore; 
	public $maxScore; 
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
		self::MINSCORE => array(
			'name'=>'minScore',
			'required'=>true,
			'type'=>\TARS::DOUBLE,
			),
		self::MAXSCORE => array(
			'name'=>'maxScore',
			'required'=>true,
			'type'=>\TARS::DOUBLE,
			),
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetZsetByScoreReq', self::$_fields);
	}
}
