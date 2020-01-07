<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class Entry extends \TARS_Struct {
	const DATA = 1;


	public $data; 


	protected static $_fields = array(
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_Entry', self::$_fields);
		$this->data = new \TARS_Map(\TARS::STRING,\TARS::STRING);
	}
}
