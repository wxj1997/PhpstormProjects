<?php
/**
 * 基础类
 */
require_once 'utils/singleton.class.php';
require_once 'utils/redisCache.class.php';
require_once 'model/testModel.class.php';

class dalBase extends  Singleton{
	protected $m_redisCache; //缓存对象

	protected function init(){
		$this->m_redisCache = RedisCache::getInstance()->getRedisI();
	}

	public function save($mInstance)
	{
		$mInstance->save();
//        $testModel = new testModel();
//        $testModel->id = 1;
//        $testModel->name = "aaa";
//        $testModel = serialize($testModel);
        $mInstance = serialize($mInstance);
		$this->m_redisCache->set(1,$mInstance);
		#$this->m_redisCache->hSet('student',1,$mInstance);
	}

	public function delete($key)
	{
		$this->m_redisCache->del($key);
        $mInstance = new studentModel();
		$mInstance->delete($key);
	}

	public function update($key,$dataArray)
	{

	}

	public function get($key)
	{
        $mInstance =  $this->m_redisCache->get(1);
        $mInstance = unserialize($mInstance);
        #$mInstance =  $this->m_redisCache->hGet('student',1);
		return $mInstance;
	}

    public function getAll()
    {

    }

    public function initCache()
    {

    }
}
