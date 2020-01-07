<?php


namespace alan\dcache_helper;

use Swoole\Coroutine as co;


class CoroutineHelper {

    private $container = [];

    public function add($task)
    {
        if (!is_callable($task)){
            throw new \Exception("无支持的任务类型");
        }
        if ($task instanceof CoroutineHelper){
            $this->container[] = $task->getContainer();
        } elseif(is_callable($task)) {
            $this->container[] = $task;
        }
    }

    public function run($container = null)
    {
        $start = microtime(true);
        if (is_null($container)){
            $container = $this->container;
        }
        $cLength = count($container);
        $chan = new co\Channel($cLength);
        foreach ($container as $item){
            go(function() use ($chan, $item){
                $res = call_user_func($item);
                $chan->push($res);
            });
        }

        $data = [];
        for ($i = 0; $i < $cLength; $i++){
            $data[] = $chan->pop();
        }
        $cost = microtime(true) - $start;
        echo "all coroutine cost {$cost} \n";
        return $data;
    }

    public function getContainer(){
        return  $this->container;
    }
}