<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SetKVBatchRsp extends \TARS_Struct {
	const KEYRESULT = 1;


	public $keyResult; 


	protected static $_fields = array(
		self::KEYRESULT => array(
			'name'=>'keyResult',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SetKVBatchRsp', self::$_fields);
		$this->keyResult = new \TARS_Map(\TARS::STRING,\TARS::INT32);
	}
}
