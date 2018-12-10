<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'model/workbookModel.class.php';
require_once 'dal/dalWorkbook.class.php';
require_once 'config/configs.class.php';
class workbookController{
	/**
	 * 获得课程习题集列表
	 */
	public function getWorkbookAction()
    {
        //实例化模型，取出数据
        $uid = $_POST['user_id'];
        $c_id = $_POST['c_id'];

        $dal = dalUser::getInstance();
        $bValid = $dal->checkUserValid($uid);
        $resp = null;
        if($bValid == false)
        {
            $resp = array ("ret" => Configs::$error_code['user_invalid']);
        }
        else
        {
            $work=dalWorkbook::getInstance();
            $result=$work->getworkbookByCourseId($c_id);
            $resp = array ("ret" => Configs::$error_code['success'],"data" =>$result);
        }
        echo json_encode($resp);
    }
}
