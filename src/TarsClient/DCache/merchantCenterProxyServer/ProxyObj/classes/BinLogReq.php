<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class BinLogReq extends \TARS_Struct {
	const LOGFILE = 1;
	const SEEK = 2;
	const LINECOUNT = 3;
	const LOGSIZE = 4;


	public $logfile; 
	public $seek; 
	public $lineCount; 
	public $logSize; 


	protected static $_fields = array(
		self::LOGFILE => array(
			'name'=>'logfile',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::SEEK => array(
			'name'=>'seek',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::LINECOUNT => array(
			'name'=>'lineCount',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::LOGSIZE => array(
			'name'=>'logSize',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_BinLogReq', self::$_fields);
	}
}
