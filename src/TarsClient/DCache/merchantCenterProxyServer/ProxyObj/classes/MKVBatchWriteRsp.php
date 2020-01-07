<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MKVBatchWriteRsp extends \TARS_Struct {
	const RSPDATA = 1;


	public $rspData; 


	protected static $_fields = array(
		self::RSPDATA => array(
			'name'=>'rspData',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MKVBatchWriteRsp', self::$_fields);
		$this->rspData = new \TARS_Map(\TARS::INT32,\TARS::INT32);
	}
}
