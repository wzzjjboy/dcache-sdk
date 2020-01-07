<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class BinLogCompPartRsp extends \TARS_Struct {
	const DATA = 1;
	const ISPART = 2;
	const PARTNUM = 3;
	const ISEND = 4;


	public $data; 
	public $isPart; 
	public $partNum; 
	public $isEnd; 


	protected static $_fields = array(
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::ISPART => array(
			'name'=>'isPart',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::PARTNUM => array(
			'name'=>'partNum',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::ISEND => array(
			'name'=>'isEnd',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_BinLogCompPartRsp', self::$_fields);
		$this->data = new BinLogRsp();
	}
}
