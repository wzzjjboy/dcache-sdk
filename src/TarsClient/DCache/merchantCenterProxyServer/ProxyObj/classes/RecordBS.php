<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class RecordBS extends \TARS_Struct {
	const MAINKEY = 1;
	const MPRECORD = 2;
	const RET = 3;


	public $mainKey; 
	public $mpRecord; 
	public $ret; 


	protected static $_fields = array(
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::MPRECORD => array(
			'name'=>'mpRecord',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
		self::RET => array(
			'name'=>'ret',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_RecordBS', self::$_fields);
		$this->mainKey = new \TARS_Vector(\TARS::CHAR);
		$this->mpRecord = new \TARS_Map(\TARS::STRING,new \TARS_Vector(\TARS::CHAR));
	}
}
