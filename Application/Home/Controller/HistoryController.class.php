<?php
namespace Home\Controller;

use Think\Controller;

class HistoryController extends Controller
{
    public function getHistory()
    {
        if(isset($_POST)){
            $user_id=$_GET['user_id'];
            $d=M('history');
            $data=$d->where("user_id=$user_id")->select();
            if(count($data)>0){
                $r['msg']=0;
                $r['data']=$data;
            }else $r['msg']=-1;
            echo json_encode($r,JSON_UNESCAPED_UNICODE);
        }
    }

    public function addHistory()
    {
        if(isset($_POST)){
            $q['user_id']=$_POST['user_id'];
            $q['house_id']=$_POST['house_id'];
            $q['add_time']=date("Y-m-d H:i:s");
            $d=M('history');
            $r['msg']=$d->add($q);
            echo json_encode($r,JSON_UNESCAPED_UNICODE);
        }
    }
}