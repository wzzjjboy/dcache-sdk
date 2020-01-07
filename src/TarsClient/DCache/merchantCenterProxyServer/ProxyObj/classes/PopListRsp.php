<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class PopListRsp extends \TARS_Struct {
	const ENTRY = 1;


	public $entry; 


	protected static $_fields = array(
		self::ENTRY => array(
			'name'=>'entry',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_PopListRsp', self::$_fields);
		$this->entry = new Entry();
	}
}
