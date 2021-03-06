<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MUKBatchRsp extends \TARS_Struct {
	const DATA = 1;


	public $data; 


	protected static $_fields = array(
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MUKBatchRsp', self::$_fields);
		$this->data = new \TARS_Vector(new Record());
	}
}
