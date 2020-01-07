<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class BinLogRsp extends \TARS_Struct {
	const LOGCONTENT = 1;
	const COMPLOG = 2;
	const CURLOGFILE = 3;
	const CURSEEK = 4;
	const SYNCTIME = 5;
	const LASTTIME = 6;


	public $logContent; 
	public $compLog; 
	public $curLogfile; 
	public $curSeek; 
	public $syncTime; 
	public $lastTime; 


	protected static $_fields = array(
		self::LOGCONTENT => array(
			'name'=>'logContent',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::COMPLOG => array(
			'name'=>'compLog',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::CURLOGFILE => array(
			'name'=>'curLogfile',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::CURSEEK => array(
			'name'=>'curSeek',
			'required'=>true,
			'type'=>\TARS::INT64,
			),
		self::SYNCTIME => array(
			'name'=>'syncTime',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::LASTTIME => array(
			'name'=>'lastTime',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_BinLogRsp', self::$_fields);
		$this->logContent = new \TARS_Vector(\TARS::STRING);
	}
}
