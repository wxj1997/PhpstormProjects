<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/videoModel.class.php';
class dalVideo extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "video";
		parent::init();
	}

	public function saveUser($mInstance)
	{
	    $this->save($mInstance);
	}

	public function delUser($pk)
	{
        $this->delete($pk);
	}

	public function updateUser($pk,$dataArray)
	{
		$this->update($pk,$dataArray);
	}

	public function getUser($key)
	{
       return   $this->get($key);
	}

	public function initCache()
	{
		$lenCache = $this->m_redisCache->hLen($this->m_tableName);
		if($lenCache > 0)return;
		$sql = "select * from ".$this->m_tableName;
		$dbInst =  DBInterface::getInstance()->getDBInstance();
		$dataArray = $dbInst->fetchAll($sql);
		foreach ($dataArray as $mInstance) {
			$video = new videoModel();
			$video->id = $mInstance['id'];
            $video->c_id = $mInstance['c_id'];
			$video->name =$mInstance['name'];
			$video->url = $mInstance['url'];
			$this->m_redisCache->hSet($this->m_tableName,$video->id,serialize($video));
		}
	}

	//获取相应课程的视频
    public function getVideoById($c_id){
	    $videoall=$this->getAll();
	    foreach ($videoall as $video){
	        $record=unserialize($video);
	        if($record->c_id==$c_id){
	            $arr[]=$record;
            }
        }

        return $arr;
    }


}
