<?php
namespace Home\Controller;

use Think\Controller;

class CollectController extends Controller
{
    //查找收藏
    public function getCollect(){
        $user_id=session('user')['id'];
        $d=M('collect');
        $data=$d->where("user_id=$user_id")->select();
        if(count($data)>0){
            $r['msg']=0;
            $r['data']=$data;
        }else $r['msg']=-1;
        echo json_encode($r,JSON_UNESCAPED_UNICODE);
    }

    //是否收藏
    public function isCollect(){
        $house_id=$_POST['house_id'];
        $user_id=session('user')['id'];
        $d=M('collect');
        $r['msg']=$d->where("house_id=$house_id AND user_id=$user_id")->count();
        echo json_encode($r,JSON_UNESCAPED_UNICODE);
    }

    //取消收藏
    public function cancel_Collect(){
        $house_id=$_POST['house_id'];
        $user_id=session('user')['id'];
        $d=M('collect');
        $r['msg']=$d->where("house_id=$house_id AND user_id=$user_id")->delete();
        echo json_encode($r,JSON_UNESCAPED_UNICODE);
    }

    //添加收藏
    public function add_Collect(){
        date_default_timezone_set("Asia/Shanghai");
        $q['house_id']=$_POST['house_id'];
        $q['user_id']=session('user')['id'];
        $q['add_time']=date("Y-m-d");
        $d=M('collect');
        $r['msg']=$d->add($q);
        echo json_encode($r,JSON_UNESCAPED_UNICODE);
    }
}