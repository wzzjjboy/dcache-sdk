<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class BatchEntry extends \TARS_Struct {
	const ENTRIES = 1;


	public $entries; 


	protected static $_fields = array(
		self::ENTRIES => array(
			'name'=>'entries',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_BatchEntry', self::$_fields);
		$this->entries = new \TARS_Vector(new \TARS_Map(\TARS::STRING,\TARS::STRING));
	}
}
