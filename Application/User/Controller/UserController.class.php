<?php
namespace User\Controller;
// use Think\Controller;
use User\Controller\PublicController;
class UserController extends PublicController {
    // public function index(){

    // }

    // 用户登录页面
    public function login(){
        if(session('user')!=""){
            // $this->display("main");
            echo "<script>window.location.href='/HouseR/Home/rent/index'</script>";
        }else 
        $this->display();       // 模板渲染;
    }

    // 用户登录的方法
    public function postLogin(){
        $phone=$_POST['login'];
        $username=$_POST['login'];
        $password=$_POST['password'];
        $User=M("user");
        $r["phone"]=$phone;
        $r["username"]=$username;
        $r["_logic"]='or';
        $where["password"]=md5($password);
        $where["_complex"]=$r;
        $result=$User
                ->where($where)
                ->field("username,phone,email,id,age,realName,gender,isAdmin")
                ->find();
        if(count($result)>0){
            session('user',$result);
            // var_dump(session('user'));
            // echo $User->_sql();
            $this->success("登录成功，自动卖萌中","/HouseR/Home/rent/index",3);
        }else{
            $this->assign('msg', "用户名或密码错误");
            $this->display("login");
        }

    }

    // 用户注册
    public function register(){
        if(!empty($_POST)){
                // var_dump($_POST);exit;
                // 实例化数据表操作对象
            $User = M('user');
                // 查找有没有重复的手机号
            $result= $User->where(['phone'=>$_POST['phone']] )->find();
            $p=M('user');
            $res= $p->where(['username'=>$_POST['name']] )->find();
            if(!empty($res) ){
                $this->error('用户名已经被使用了。请使用别的用户名进行注册');
                exit();
            }
            if(!empty($result) ){
                $this->error('手机号已经被使用了。请使用别的手机号码进行注册');
                exit();
            }
            $data=array();
                // 把用户数据插入到数据库
                // 1.1 把数据进行整理
            $data["username"]=$_POST["name"];
            $data["phone"]=$_POST["phone"];
            $data["email"]=$_POST["email"];
            $data["realName"]=$_POST["realName"];
            $data["age"]=$_POST["age"];
            $data["gender"]=$_POST["sex"];
            $data["password"]=md5($_POST["inputPassword3"]);
                // 1.2 把数据插入数据库
            $result = $User->add($data);

                // var_dump($result);exit;
            if(!empty($result)){
                $this->success('恭喜您，注册成功。现在为了跳转到登录页面。请登录后再进行操作。', U('User/login'), 3);exit;
            }else{
                $this->error('注册失败');
            }
        }
        $this->display();
    }


    // 用户信息修改
    public function update() {
            // var_dump($this->username);exit;
        $User = M('user');
        if(!empty($_POST)){
            $result = $User->where(['id' => $this->user_id])->save($_POST);

            if(!empty($result)){
                    // 更新可能的用户名
                $_SESSION['user']['username'] = $_POST['username'];
                $this->username = $_POST['username'];
                    // $this->success('保存成功！', U('Index/index'));exit;
                $this->show('保存成功！');exit;
            }else{
                    // $this->error('保存失败');exit;
                $this->show('保存失败');exit;
            }

        }
            // 通过用户id查询用户的信息

        $user = $User
        ->field('id, username, phone_number, email')
        ->where(['id' => $this->user_id])
        ->find();

            // var_dump($user);exit;

            // 把数据传入模板
        $this->assign('user', $user);

            // 渲染模板
        $this->display();
    }

    // 用户登出
    public function logOut(){
            // 删除用户的登录凭证
        session('user', null);

        $this->success('你已经成功退出。', "/HouseR/Home/rent/index", 3);exit; 
    }

    public function namecheck(){
            // echo "asdasd";
        if(isset($_GET['username'])){
            $name=$_GET['username'];
            $user=M('user');
            $count=$user->where("username='$name'")->count();
            echo $count;
       }
    }

    public function phonecheck(){
        if(isset($_GET['phone'])){
            $phone=$_GET['phone'];
            $user=M('user');
            $count=$user->where("phone='$phone'")->count();
            echo $count;
       }
    }

    public function islogin(){
        if(session('?user')){
            $data['msg']=1;
            $data['data']=session('user');
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }else{
            $data['msg']=-1;
            $data['data']="";
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
    }

}
