<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/themeModel.class.php';
class dalTheme extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "theme_type";
		parent::init();
	}

	public function initCache()
	{
		$lenCache = $this->m_redisCache->hLen($this->m_tableName);
		if($lenCache > 0)return;
		$sql = "select * from ".$this->m_tableName;
		$dbInst =  DBInterface::getInstance()->getDBInstance();
		$dataArray = $dbInst->fetchAll($sql);
		foreach ($dataArray as $mInstance) {
			$theme = new themeModel();
			$theme->id = $mInstance['id'];
			$theme->theme_name =$mInstance['theme_name'];
			$this->m_redisCache->hSet($this->m_tableName,$theme->id,serialize($theme));
		}
	}


	function getAllTheme(){
		$theme_all=$this->getAll();
		foreach($theme_all as $theme){
			$themearr[]=unserialize($theme);
		}
		return $themearr;
	}

	function getTheme($key){
		$themes=$this->getAll();
		foreach($themes as $theme){
			$detail=unserialize($theme);
			if($detail->theme_name==$key){
			    return $detail;
            }
		}
		return 0;
	}

}
