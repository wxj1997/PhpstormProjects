<?php
/**
 * 基础类
 */
require_once 'dalBase.class.php';
class dalStudent extends dalBase {

	protected static $_instance = null;
	public function saveStudent($mInstance)
	{
	    $this->save($mInstance);
	}

	public function delStudent($pk)
	{
        $this->delete($pk);
	}

	public function update($pk,$dataArray)
	{

	}

	public function getStudent($key)
	{
       return   $this->get($key);
	}

    public function getAll()
    {

    }

    public function initCache()
    {

    }
}
