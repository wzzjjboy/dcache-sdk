<?php


namespace alan\dcache_helper;


//use Swoft\App;
use Tars\client\CommunicatorConfig;


use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\Condition;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelCondition;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelMKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\DelMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\GetMKVRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\InsertKeyValue;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\InsertMKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\InsertMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\MKVBatchWriteRsp;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateFieldInfo;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateKeyValue;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateMKVAtomReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateMKVBatchReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateMKVReq;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes\UpdateValue;
use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\ProxyServant;
//use App\Lib\Tars\TarsRpcClientFactory as RpcFactory;
class DCacheHelper //implements IBasicDao
{
    /**
     * @var string
     */
    private $locator; //tars.tarsregistry.QueryObj@tcp -h 10.154.152.55 -p 17890
    protected $dcacheServant;// = 'DCache.merchantCenterProxyServer.ProxyObj';
    /**
     * @var string
     */
    protected $moduleName;

    public $connect;

    const OP_SET            = 0;
    const OP_ADD            = 1;
    const OP_SUB            = 2;
    const OP_EQ             = 3; // ==
    const OP_NE             = 4; // !=
    const OP_GT             = 5; // >
    const OP_LT             = 6; // <
    const OP_LE             = 7; // <=
    const OP_GE             = 8; // >=
    const OP_LIMIT          = 9;
    const OP_PREPEND        = 10;
    const OP_APPEND         = 11;
    const OP_ADD_INSERT     = 12; //记录不存在，则插入新纪录0，并在0的基础上进行ADD
    const OP_SUB_INSERT     = 13;
    protected static $instance;
    public function __construct(string $moduleName = null)
    {
//        $this->dcacheServant = $tarsDacacheProxy;
        if ($moduleName) {
            $this->moduleName = $moduleName;
        }
    }
    protected static function getInstance(){
        if (self::$instance==null){
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function module($moduleName){
        $instance = self::getInstance();
        $instance->setModuleName($moduleName);
        return $instance;
    }
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    /**
     * @return ProxyServant
     * @throws \Exception
     */
    public function getConnect()
    {
        return $this->connect;
    }

    public function insert($mainKey, array $data)
    {
        $insertMKVReq = new InsertMKVReq();
        $insertMKVReq->moduleName  = $this->moduleName;
        $insertMKVReq->data->mainKey = $mainKey;
        $this->updateValueIterator($data, function($field, UpdateValue $updateVale) use ($insertMKVReq){
            $insertMKVReq->data->mpValue->pushBack([$field => $updateVale]) ;
        });
        return $this->getConnect()->insertMKV($insertMKVReq);
    }

    public function batchInsert(array $data)
    {
        $mKVBatchWriteRsp = new MKVBatchWriteRsp();
        $insertMKVBatchReq = new InsertMKVBatchReq();
        $insertMKVBatchReq->moduleName  = $this->moduleName;
        foreach ($data as  $rows){
            list($mainKey, $row) = $rows;
            $InsertKeyValue = new InsertKeyValue();
            $InsertKeyValue->mainKey = $mainKey;
            $this->updateValueIterator($row, function($field, UpdateValue $updateVale) use ($InsertKeyValue){
                $InsertKeyValue->mpValue->pushBack([$field => $updateVale]) ;
            });
            $insertMKVBatchReq->data->pushBack($InsertKeyValue);
        }
        $this->getConnect()->insertMKVBatch($insertMKVBatchReq, $mKVBatchWriteRsp);
        return $mKVBatchWriteRsp->rspData;
    }

    public function update(string $mainKey, array $newValues, array $condition)
    {
        $updateMKVReq = new UpdateMKVReq();
        $updateMKVReq->moduleName  = $this->moduleName;
        $updateMKVReq->mainKey = $mainKey;

        $this->updateValueIterator($newValues, function($field, UpdateValue $updateVale) use ($updateMKVReq){
            $updateMKVReq->value->pushBack([$field => $updateVale]) ;
        });
        $this->conditionIterator($condition, function($condition) use ($updateMKVReq){
            $updateMKVReq->cond->pushBack($condition);
        });
        return $this->getConnect()->updateMKV($updateMKVReq);
    }

    /**
     * 注意：无条件更新，相当危险
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function batchUpdate(array $data)
    {
        $rsp = new MKVBatchWriteRsp();
        $updateMKVReq = new UpdateMKVBatchReq();
        $updateMKVReq->moduleName  = $this->moduleName;
        foreach ($data as $rom){
            $updateVale = new UpdateKeyValue();
            list($mainKey, $newValues) = $rom;
            foreach ($newValues as $field => $value){
                $updateVale->mainKey = $mainKey;
                $updateFieldInfo = new UpdateFieldInfo();
                $updateFieldInfo->upDateValue->op = self::OP_SET;
                $updateFieldInfo->upDateValue->value = $value;
                $updateVale->mpValue->pushBack([$field => $updateFieldInfo]);
            }
            $updateMKVReq->data->pushBack($updateVale);
        }
        $this->getConnect()->updateMKVBatch($updateMKVReq, $rsp);
        return $rsp->rspData;
    }

    /**
     * 功能：原子更新接口。适用于对数据做自增自减操作，多线程操作能保证数据原子更新。不能更新联合key字段。
     * @param $mainKey
     * @param $newValues
     * @param $condition
     * @return void ET_SERVER_TYPE_ERR CacheServer的状态不对，一般情况是请求发到SLAVE状态的server了
     *  ET_SERVER_TYPE_ERR CacheServer的状态不对，一般情况是请求发到SLAVE状态的server了
     *    ET_MODULE_NAME_INVALID 业务模块不匹配，传入的业务模块名和Cache服务的模块名不一致
     *    ET_KEY_AREA_ERR 传入的Key不在Cache服务范围内
     *    ET_FORBID_OPT 禁止操作，可能在做迁移
     *    ET_DATA_VER_MISMATCH 数据版本冲突
     *    ET_SYS_ERR 系统错误
     * @throws \Exception
     */
    public function updateAtom($mainKey, $newValues, $condition)
    {
       $updateMKVAtomReq = new UpdateMKVAtomReq();
       $updateMKVAtomReq->moduleName = $this->moduleName;
       $updateMKVAtomReq->mainKey = $mainKey;

        $this->updateValueIterator($newValues, function($field, UpdateValue $updateVale) use ($updateMKVAtomReq){
            $updateMKVAtomReq->value->pushBack([$field => $updateVale]) ;
        });

        $this->conditionIterator($condition, function ($condition) use($updateMKVAtomReq){
            $updateMKVAtomReq->cond->pushBack($condition);
        });
        return $this->getConnect()->updateMKVAtom($updateMKVAtomReq);
    }

    /**
     * @param $mainKey
     * @param array $condition
     * @return int
     * @throws \Exception
     */
    public function delete($mainKey, array $condition)
    {
        $mainKeyReq = new DelMKVReq();
        $mainKeyReq->moduleName = $this->moduleName;
        $mainKeyReq->mainKey = $mainKey;
        $this->conditionIterator($condition, function ($condition) use($mainKeyReq){
            $mainKeyReq->cond->pushBack($condition);
        });
        return $this->getConnect()->delMKV($mainKeyReq);
    }

    /**
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function batchDelete(array $data)
    {
        $rsp = new MKVBatchWriteRsp();
        $delMKVBatchReq = new DelMKVBatchReq();
        $delMKVBatchReq->moduleName = $this->moduleName;
        foreach ($data as $item){
            list($mainKey, $con) = $item;
            $delCondition = new DelCondition();
            $delCondition->mainKey = $mainKey;
            $this->conditionIterator($con, function ($condition) use ($delCondition){
                $delCondition->cond->pushBack($condition);
            });
            $delMKVBatchReq->data->pushBack($delCondition);
        }
        $this->getConnect()->delMKVBatch($delMKVBatchReq, $rsp);
        return $rsp->rspData;
    }

    /**
     * @param $mainKey
     * @param array $condition
     * @param int $limit
     * @param int $offset
     * @param string $field
     * @return \TARS_Vector
     * @throws \Exception
     */
    public function get($mainKey, array $condition = [], $limit = 20, $offset = 0, string $field = null)
    {
        if ($field === null){
            $field = '*';
        }
        $rsp = new GetMKVRsp();
        $getMKVReq = new GetMKVReq();
        $getMKVReq->moduleName = $this->moduleName;
        $getMKVReq->mainKey = $mainKey;
        $getMKVReq->field = $field;
        $this->conditionIterator($condition, function($condition)use($getMKVReq){
            $getMKVReq->cond->pushBack($condition);
        });
        $this->limitCondition($limit, $offset, function($condition)use($getMKVReq){
            $getMKVReq->cond->pushBack($condition);
        });

        $this->getConnect()->getMKV($getMKVReq, $rsp);
        return $rsp->data;
    }

    /**
     * @param $mainKeys
     * @param $field
     * @param array $where
     * @return MKVBatchRsp $rsp;
     * @throws \Exception
     */
    public function batchGet(array $mainKeys, $field, array $where)
    {
        $rsp = new MKVBatchRsp();
        $mKVBatchReq = new  MKVBatchReq();
        $mKVBatchReq->moduleName = $this->moduleName;
        $mKVBatchReq->field = $field;
        foreach ($mainKeys as $mainKey){
            $mKVBatchReq->mainKeys->pushBack($mainKey);
        }
        $this->conditionIterator($where, function($condition)use($mKVBatchReq){
            $mKVBatchReq->cond->pushBack($condition);
        });
        $this->getConnect()->getMKVBatch($mKVBatchReq, $rsp);
        return $rsp->data;
    }

    protected function conditionIterator(array $condition, \Closure $callback)
    {
        foreach ($condition as $cField => $cVal){
            if (is_array($cVal)){
                list($cField, $op, $cVal) = $cVal;
            } else {
                $op = self::OP_EQ;
            }
            $condition = new Condition();
            $condition->fieldName = $cField;
            $condition->value = $cVal;
            $condition->op = $op;
            call_user_func($callback, $condition);
        }
    }

    protected function limitCondition($limit, $offset, \Closure $callback)
    {
        $condition = new Condition();
        $condition->fieldName = "";
        $condition->value = "$offset:$limit";
        $condition->op = self::OP_LIMIT;
        call_user_func($callback, $condition);
    }

    protected function updateValueIterator(array $data, \Closure $callback)
    {
        foreach ($data as $field => $value){
            $updateVale = new UpdateValue();
            $updateVale->op = self::OP_SET;
            $updateVale->value = $value;
            call_user_func($callback, $field, $updateVale);
        }
    }
}