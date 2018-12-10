<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'model/videoModel.class.php';
require_once 'dal/dalVideo.class.php';
require_once 'config/configs.class.php';
class videoController{
	/**
	 * 新增学生
	 */
	public function getAllAction()
    {
        //实例化模型，取出数据
        $uid = $_POST['user_id'];
        $c_id=$_POST['c_id'];
        //检测请求用户是否合法
        $dal = dalUser::getInstance();
        $bValid = $dal->checkUserValid($uid);
        $resp = null;
        if($bValid == false)
        {
            $resp = array ("ret" => Configs::$error_code['user_invalid']);
        }
        else
        {
            $video=dalVideo::getInstance();
            $cVideo=$video->getVideoById($c_id);
            $resp = array ("ret" => Configs::$error_code['success'],"data" =>$cVideo);
        }
        echo json_encode($resp);
    }

    public function addVideoAction(){
	    $file=$_POST['file'];
        /*var_dump($title);
        exit;*/
        //设置预览目录,上传成功的路径
        $previewPath = "../video/";
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);//获取当前上传文件扩展名
        $arrExt = array('3gp','rmvb','flv','wmv','avi','mkv','mp4','mp3','wav',);

        if(!in_array($ext,$arrExt)) {
            exit(json_encode(-1,JSON_UNESCAPED_UNICODE));//视/音频或采用了不合适的扩展名！
        } else {
            //文件上传到预览目录
            $previewName = 'pre_'.md5(mt_rand(1000,9999)).time().'.'.$ext; //文件重命名
            $previewSrc = $previewPath.$previewName;

            if(move_uploaded_file($file['tmp_name'],$previewSrc)){//上传文件操作，上传失败的操作
                exit($previewName);
            } else {
                //上传成功的失败的操作
                exit(json_encode(0,JSON_UNESCAPED_UNICODE));
            }
        }
    }

}
