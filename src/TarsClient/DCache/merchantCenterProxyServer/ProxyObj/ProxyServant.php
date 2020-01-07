<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj;

use Tars\client\CommunicatorConfig;
use Tars\client\Communicator;
use Tars\client\RequestPacket;
use Tars\client\TUPAPIWrapper;

use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\CheckKeyReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\CheckKeyRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetKVRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetKVBatchRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetAllKeysReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetAllKeysRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\SetKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\SetKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\SetKVBatchRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateKVRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\RemoveKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\RemoveKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\RemoveKVBatchRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetMKVRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MUKBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MUKBatchRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchExReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchExRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MainKeyReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetListRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetRangeListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\BatchEntry;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetSetReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetZsetScoreReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetZsetPosReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetZsetByPosReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetZsetByScoreReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\InsertMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\InsertMKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchWriteRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateMKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateMKVAtomReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelMKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\PushListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\PopListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\PopListRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\ReplaceListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\TrimListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\RemListReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\AddSetReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelSetReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\AddZSetReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\IncZSetScoreReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelZSetReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelZSetByScoreReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateZSetReq;
class ProxyServant {
	protected $_communicator;
	protected $_iVersion;
	protected $_iTimeout;
	public $_servantName = "DCache.centerProxyServer.ProxyObj";

	public function __construct(CommunicatorConfig $config) {
		try {
			$this->_servantName = $config->getServantName();
			$this->_communicator = new Communicator($config);
			$this->_iVersion = $config->getIVersion();
			$this->_iTimeout = empty($config->getAsyncInvokeTimeout())?2:$config->getAsyncInvokeTimeout();
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function checkKey(CheckKeyReq $req,CheckKeyRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getKV(GetKVReq $req,GetKVRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getKVBatch(GetKVBatchReq $req,GetKVBatchRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getAllKeys(GetAllKeysReq $req,GetAllKeysRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function setKV(SetKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function setKVBatch(SetKVBatchReq $req,SetKVBatchRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function insertKV(SetKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function updateKV(UpdateKVReq $req,UpdateKVRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function eraseKV(RemoveKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function eraseKVBatch(RemoveKVBatchReq $req,RemoveKVBatchRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delKV(RemoveKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delKVBatch(RemoveKVBatchReq $req,RemoveKVBatchRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getMKV(GetMKVReq $req,GetMKVRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getMKVBatch(MKVBatchReq $req,MKVBatchRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getMUKBatch(MUKBatchReq $req,MUKBatchRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getMKVBatchEx(MKVBatchExReq $req,MKVBatchExRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getMainKeyCount(MainKeyReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getAllMainKey(GetAllKeysReq $req,GetAllKeysRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getList(GetListReq $req,GetListRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getRangeList(GetRangeListReq $req,BatchEntry &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getSet(GetSetReq $req,BatchEntry &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getZSetScore(GetZsetScoreReq $req,&$score) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$score = TUPAPIWrapper::getDouble("score",2,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getZSetPos(GetZsetPosReq $req,&$pos) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$pos = TUPAPIWrapper::getInt64("pos",2,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getZSetByPos(GetZsetByPosReq $req,BatchEntry &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function getZSetByScore(GetZsetByScoreReq $req,BatchEntry &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function insertMKV(InsertMKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function insertMKVBatch(InsertMKVBatchReq $req,MKVBatchWriteRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function updateMKVBatch(UpdateMKVBatchReq $req,MKVBatchWriteRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function updateMKV(UpdateMKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function updateMKVAtom(UpdateMKVAtomReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function eraseMKV(MainKeyReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delMKV(DelMKVReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delMKVBatch(DelMKVBatchReq $req,MKVBatchWriteRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function pushList(PushListReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function popList(PopListReq $req,PopListRsp &$rsp) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			$ret = TUPAPIWrapper::getStruct("rsp",2,$rsp,$sBuffer,$this->_iVersion);
			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function replaceList(ReplaceListReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function trimList(TrimListReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function remList(RemListReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function addSet(AddSetReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delSet(DelSetReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function addZSet(AddZSetReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function incScoreZSet(IncZSetScoreReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delZSet(DelZSetReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function delZSetByScore(DelZSetByScoreReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

	public function updateZSet(UpdateZSetReq $req) {
		try {
			$requestPacket = new RequestPacket();
			$requestPacket->_iVersion = $this->_iVersion;
			$requestPacket->_funcName = __FUNCTION__;
			$requestPacket->_servantName = $this->_servantName;
			$encodeBufs = [];

			$__buffer = TUPAPIWrapper::putStruct("req",1,$req,$this->_iVersion);
			$encodeBufs['req'] = $__buffer;
			$requestPacket->_encodeBufs = $encodeBufs;

			$sBuffer = $this->_communicator->invoke($requestPacket,$this->_iTimeout);

			return TUPAPIWrapper::getInt32("",0,$sBuffer,$this->_iVersion);

		}
		catch (\Exception $e) {
			throw $e;
		}
	}

}

