<?php
namespace Homepage\Controller;
use Think\Controller;
use Think\page;
class IndexController extends Controller {
    //个人中心页面
    public function index(){
        $value = session('user');
        $User = M('user');
        $user = $User
        ->field('username,image')
        ->where(['id' => $value['id']])
        ->find();
        $this->assign('user', $user);       
        $this->display();//模板渲染
    }

    public function MyMessage(){
        $this->display();//模板渲染
    }

    //查取数据方法
    public function apiMycontract(){
        // import('ORG.Util.Page');
        $Order = M('order');
        $limit = trim(I('get.limit'));
        $offset = trim(I('get.offset'));
        $page = floor($offset / $limit) + 1;
        $user_id=session('user')['id'];
        # 获取并且计算 页号 分页大小
        $list = $Order->where(['id'=>$user_id])->page($page,$limit)->select();
        # 查询相关数据
        $count = $Order->where(['id'=>$user_id])->count();
        # 查询数据条数
        $ret = [
            'total' => $list,
            'rows' => $count,
        ];
        # 构造返回数据类型
        // if(!empty($ret)){
        //     echo "123";exit;
        // }else{
        //     echo "bug";exit;
        // }
        $this->ajaxReturn($ret);
        # 返回JSON数据
        //$this->assign('order', $order);  
        //$this->display();
    }
    //我的租约
    public function Mycontract(){
        $this->display();
    }

    public function getHouse_detail($id=-1){
        $db=M('house');
        $hd=$db
            ->join("INNER JOIN city INNER JOIN city c ON city.`id`=house.`city` AND c.`id`=house.`location` INNER JOIN user a ON a.`id`=house.`host_id`")
            ->where("house.id=$id")
            ->field('house.*,city.cityname,c.cityname AS locationName,a.username AS a_username,a.phone AS a_phone')
            ->find();//利用房子id查询房屋信息
        $db=M('image');
        $hi=$db->where("house_id=$id")->select();
        if(count($hd)>0){
            $house_detail['msg']=0;
            $house_detail['data']=$hd;
        }else $house_detail['msg']=-1;
        if(count($hi)>0){
            $house_image['msg']=0;
            $house_image['data']=$hi;
        }else $house_image['msg']=-1;
        $this->assign("house_detail",json_encode($house_detail,JSON_UNESCAPED_UNICODE));
        $this->assign("house_image",json_encode($house_image,JSON_UNESCAPED_UNICODE));
        // echo json_encode($house_detail,JSON_UNESCAPED_UNICODE);
        // echo json_encode($house_image,JSON_UNESCAPED_UNICODE);
    }

    public function getContract_detail($contractid=-1){
        $db=M('rent');
        $hd=$db
            ->join("INNER JOIN user ON user.id=rent.u_A_id ")
            ->where("rent.id=$contractid")
            ->find();//利用租约id查询租约信息
        if(count($hd)>0){
            $contract_detail['msg']=0;
            $contract_detail['data']=$hd;
        }else $contract_detail['msg']=-1;
        $this->assign("contract_detail",json_encode($contract_detail,JSON_UNESCAPED_UNICODE));
        // echo json_encode($house_detail,JSON_UNESCAPED_UNICODE);
        // echo json_encode($house_image,JSON_UNESCAPED_UNICODE);
    }

    public function MycontractDetail(){
        $id=$_GET['house_id'];//拿到房子id
        $contractid=$_GET['id'];//拿到租约id
        if(!isset($id)){
         $id=-1;
        }
        $this->getHouse_detail($id);

        if(!isset($contractid)){
         $contractid=-1;
        }
        $this->getContract_detail($contractid);

        $this->display();
    }
    
    public function task_list1(){
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
        $user_id=session('user')['id'];
        $count = M('rent')->where("u_B_id=$user_id")->count();
        $list  = M('rent')
            ->join("INNER JOIN user a JOIN user b ON a.id=rent.u_A_id AND b.id=rent.u_B_id")
            ->where("u_B_id=$user_id AND u_A_id=$user_id")
            ->order('id ASC')
            ->limit($start,$limit)
            ->field("rent.*,a.username AS u_a_name,b.username AS u_b_name")
            ->select();
        // foreach($list as $k=>$v){
        //     $list[$k]['add_time'] = date('Y-m-d H:i:s',$list[$k]['add_time']);
        //     $list[$k]['stat'] = test($list[$k]['stat']);
        // }
        $p['count']=$count;
        $p['item']=$list;
        echo json_encode($p,JSON_UNESCAPED_UNICODE);
    }

    //个人信息编辑
    public function EditProfile(){
        $value = session('user');
        $User = M('user');

        if(!empty($_POST)){
            if(isset($_FILES["file"])){
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->rootPath = './images/'; // 设置附件上传根目录
                $upload->savePath = 'user/'; // 设置附件上传子目录
                $info = $upload->upload();
                $data;
                if(!$info){
                }else{
                    foreach($info as $file){
                        $data = '/HouseR/images/'.$file['savepath'] . $file['savename'];
                        $file_a=$data;
                        $User->image = $file_a;
                        $res = $User-> where(['id' => $value['id']])->setField('image',$file_a);
                    }
                }
            }
            $result = $User->where(['id' => $value['id']])->save($_POST);
            if(!empty($result) || !(empty($res))){
                // 更新可能的用户名 SESSION
                $_SESSION['user']['username'] = $_POST['username'];
                $this->username = $_POST['username'];
                echo '<script>alert("保存成功！");window.parent.location.reload();</script>';exit;
                // $this->success('保存成功！');exit;     
            }else{
                $this->error('保存失败');exit();
            }
        }
        // $result =  $User->where('id=1')->find();
        // $this->assign("aaaa",$result);
        $user = $User
        ->field('id, username,age,email,image,phone,realName')
        ->where(['id' => $value['id']])
        ->find();
        $this->assign('user', $user);       
        $this->display();//模板渲染
    }

    //更新密码
    public function change_password(){
        $User = M('user');
        if(!empty($_POST)){
            $d['password']=md5($_POST['password']);
            $result = $User->where(['id' => 1])->save($d);
             //$this->ajaxReturn($result); 
            if(!empty($result)){
                // 更新密码
                $_SESSION['user']['password'] = $_POST['password'];
                $this->password = $_POST['password'];
                // $this->success('保存成功！', U('Index/index'));exit;
                $this->success('保存成功！');exit;
            }
            else{
                $this->error('保存失败');exit;
                // $this->show('保存失败!');exit;
            }

        }
        $this->display();
    }

    public function logout(){
        session(null);//退出清空session
        return $this->success('退出成功',U('Index/index'));//跳转到登录页面
    }
    

    public function namecheck(){
        // echo "asdasd";
        if(isset($_GET['username'])){
           $user=M('user');
           $count=$user->where("username="."'$_GET[username]'")->count();
           echo $count;
       }
    }

    //浏览历史的数据接口
     public function apihistory(){
        
        $user_id = session('user')['id'];
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
        
        $house=M('history');
        $list=$house
                ->join("INNER JOIN user INNER JOIN house ON history.user_id = user.id AND house.id = history.house_id")
                ->where("user_id=$user_id")
                ->count();
        $ret['rows']=$list;
        $list=$house
                ->join("INNER JOIN user INNER JOIN house ON history.user_id = user.id AND house.id = history.house_id")
                ->where("user_id=$user_id")
                ->limit($start,$limit)
                ->order("add_time DESC")
                ->field("user.username,history.*,house.title,house_id AS house_id")
                ->select();
        

        $ret['total']=$list;
       
        echo json_encode($ret,JSON_UNESCAPED_UNICODE);
        
    }


    //收藏的数据接口
    public function apicollect(){
       
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
        $user_id = session('user')['id'];
        
        $house=M('collect');
        $list=$house
                ->join("INNER JOIN user INNER JOIN house ON collect.user_id = user.id AND house.id = collect.house_id")
                ->where("user_id=$user_id")
                ->count();
        $ret['rows']=$list;
        $list=$house
                ->join("INNER JOIN user INNER JOIN house ON collect.user_id = user.id AND house.id = collect.house_id")
                ->where("user_id=$user_id")
                ->limit($start,$limit)
                ->field("user.username,collect.*,house.title,house_id AS house_id")
                ->select();
        
        $ret['total']=$list;
        
        echo json_encode($ret,JSON_UNESCAPED_UNICODE);
        
    }

    public function apimessage(){
       
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
        $user_id = session('user')['id'];
        $house=M('message');
        $list=$house
                ->join("INNER JOIN user ON message.s_id = user.id ")
                ->where("r_id=$user_id")
                ->count();
        $ret['rows']=$list;
        $list=$house
                ->join("INNER JOIN user ON message.s_id = user.id ")
                ->where("r_id=$user_id")
                ->limit($start,$limit)
                ->field("message.*,user.username")
                ->select();
        
        $ret['total']=$list;
        
        echo json_encode($ret,JSON_UNESCAPED_UNICODE);
        
    }
    
    //信息状态接口
    public function apiread(){
        $id=$_GET['message_id'];
        $data['id']=$id;
        $data['isRead']=1;
        $d=M('message');
        $r=$d->data($data)->save();
        $re['msg']=$r;
        echo json_encode($re,JSON_UNESCAPED_UNICODE); 
    }

    //我的房源
    public function MyRent(){
        $this->display();
    }

    //我得房源方法
    public function apiMyRent(){
        $value = session('user')['id'];
        // print_r($value);
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
        $count = M('house')->where("host_id=$value")->count();
        $list  = M('house')
            ->join("INNER JOIN city INNER JOIN city c ON city.id=house.city AND c.id=house.location ")
            ->limit($start,$limit)
            ->where("host_id=$value")
            ->field("house.*,city.cityname AS cityname,c.cityname AS locationname")
            ->select();
        // foreach($list as $k=>$v){
        //     $list[$k]['add_time'] = date('Y-m-d H:i:s',$list[$k]['add_time']);
        //     $list[$k]['stat'] = test($list[$k]['stat']);
        // }
        $p['count']=$count;
        $p['item']=$list;
        echo json_encode($p,JSON_UNESCAPED_UNICODE);
        // concole.log($p);
    }
}
