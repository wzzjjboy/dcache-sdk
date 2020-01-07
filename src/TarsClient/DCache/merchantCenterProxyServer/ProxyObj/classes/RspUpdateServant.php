<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class RspUpdateServant extends \TARS_Struct {
	const MPSERVANT = 1;
	const MPSERVANTKEY = 2;


	public $mpServant; 
	public $mpServantKey; 


	protected static $_fields = array(
		self::MPSERVANT => array(
			'name'=>'mpServant',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
		self::MPSERVANTKEY => array(
			'name'=>'mpServantKey',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_RspUpdateServant', self::$_fields);
		$this->mpServant = new \TARS_Map(\TARS::STRING,new \TARS_Vector(\TARS::INT32));
		$this->mpServantKey = new \TARS_Map(\TARS::STRING,new \TARS_Vector(\TARS::STRING));
	}
}
