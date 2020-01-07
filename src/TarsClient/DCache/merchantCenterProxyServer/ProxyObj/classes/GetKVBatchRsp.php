<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetKVBatchRsp extends \TARS_Struct {
	const VALUES = 1;


	public $values; 


	protected static $_fields = array(
		self::VALUES => array(
			'name'=>'values',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetKVBatchRsp', self::$_fields);
		$this->values = new \TARS_Vector(new SKeyValue());
	}
}
