<?php
/**
 * 单例类
 */

class Utils extends Singleton
{
    protected static $_instance = null;

    public function array_remove($arr, $key){
        if(!array_key_exists($key, $arr)){
            return $arr;
        }
        $keys = array_keys($arr);
        $index = array_search($key, $keys);
        if($index !== FALSE){
            array_splice($arr, $index, 1);
        }
        return $arr;

    }
}
