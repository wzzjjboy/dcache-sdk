<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class DelZSetByScoreReq extends \TARS_Struct {
	const MODULENAME = 1;
	const MAINKEY = 2;
	const MINSCORE = 3;
	const MAXSCORE = 4;


	public $moduleName; 
	public $mainKey; 
	public $minScore; 
	public $maxScore; 


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
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_DelZSetByScoreReq', self::$_fields);
	}
}
