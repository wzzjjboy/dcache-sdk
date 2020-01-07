<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class IncZSetScoreReq extends \TARS_Struct {
	const MODULENAME = 1;
	const VALUE = 2;
	const SCOREDIFF = 3;


	public $moduleName; 
	public $value; 
	public $scoreDiff; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::VALUE => array(
			'name'=>'value',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::SCOREDIFF => array(
			'name'=>'scoreDiff',
			'required'=>true,
			'type'=>\TARS::DOUBLE,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_IncZSetScoreReq', self::$_fields);
		$this->value = new AddSetKeyValue();
	}
}
