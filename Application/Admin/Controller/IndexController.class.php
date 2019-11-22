<?php
namespace Admin\Controller;
use Admin\Controller\PublicController;
class IndexController extends PublicController
{
	public function index()
	{
		if(session('?user')){
			if(session('user')['isadmin']==1){
				$this->display();
			}else {
				$this->error("该用户不是管理员","/HouseR/Home/index");
			}
		}else {
			$this->error("请先登录","/HouseR/Admin/index");
		}
	}
	
	public function login(){
        if(session('user')!=""){
            echo "<script>window.location.href='/HouseR/Admin/index'</script>";
        }
        $this->display();
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
        	// print_r($result);exit();
        	if($result['isadmin']!="1"){
	            $this->assign('msg', "该用户不是管理员");
	            $this->display("login");
        	}else{
	            session('user',$result);
	            $this->success("登录成功，自动卖萌中","/HouseR/Admin/index",3);
        	}
        }else{
            $this->assign('msg', "用户名或密码错误");
            $this->display("login");
        }
    }

	// 用户登出
    public function logout(){
            // 删除用户的登录凭证
        session('user', null);
        $this->success('你已经成功退出。', "/HouseR/Home/index", 3);exit; 
    }

	public function get_city(){
		$l=M("city");
		$city_id=$_GET['city_id'];
		$data=$l->where("pid=$city_id")->select();
		if(count($data)>0){
    		$select_location['msg']=0;
    		$select_location['data']=$data;
		}else{
    		$select_location['msg']=-1;
		}
        // $this->assign("select_location",json_encode($select_location,JSON_UNESCAPED_UNICODE));
        echo json_encode($select_location,JSON_UNESCAPED_UNICODE);
	}

	public function house_add()
	{
		$l=M("city");
        $select_city=$l->where("type=2")->select();
        $this->assign("select_city",json_encode($select_city,JSON_UNESCAPED_UNICODE));
        $select_location=$l->where("type=3")->select();
        $this->assign("select_location",json_encode($select_location,JSON_UNESCAPED_UNICODE));
        if(!empty($_POST)){
        	$c=M('house');
        }

		$this->display();
	}

	public function add_houseImpl(){
		// var_dump($_POST);
		// var_dump($_FILES);
		$house=$_POST;
		date_default_timezone_set("Asia/Shanghai");
		$house['add_time']=date("Y-m-d");
		$h=M('house');
		$r=$h->data($house)->add();
		// echo $h->_sql();
		if($r){
	        $insertId = $data;
	        $image=$_FILES;
	        $path = $this->upload_img();
	        if($path['code']>0){
	        	$image=$path['data'];
	        	$p=[];
	        	for($i=0;$i<count($image);$i++){
	        		if($i==0) $d['top']=1;
	        		else $d['top']=0;
	        		$d['house_id']=$r;
	        		$d['path']=$image[$i];
	        		array_push($p, $d);
	        	}
	        	$h=M('image');
	        	$h->addAll($p);
	        }
	        echo "<script>alert('添加成功',window.location.href='/HouseR/Admin/index/house_add')</script>";
   		}
	}

	public function upload_img(){
    	$upload = new \Think\Upload(); // 实例化上传类
    	$upload->maxSize = 3145728;
    	$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath = './images/'; // 设置附件上传根目录
		$upload->savePath = 'house/'; // 设置附件上传子目录
		$info = $upload->upload();
		if(!$info){
			$this->error($upload->getError());
		}else{
			$path=[];
			foreach($info as $file){
				$data["code"]=count($info);
				array_push($path, '/HouseR/images/'.$file['savepath'] . $file['savename']);
			}
			$data['data']=$path;
			return $data;
		}
	}

	public function house_detail(){
    	$id=$_GET['house_id'];
        if(!isset($id)) $id=-1;
    	$db=M('house');
    	$hd=$db
            ->join("INNER JOIN city INNER JOIN city c ON city.`id`=house.`city` AND c.`id`=house.`location` INNER JOIN user a ON a.`id`=house.`host_id`")
            ->where("house.id=$id")
            ->field('house.*,city.cityname,c.cityname AS locationName,a.username AS a_username,a.phone AS a_phone,a.id AS a_user_id')
            ->find();
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
    	$this->display();
	}

	public function get_house(){
    	$id=$_GET['house_id'];
        if(!isset($id)) $id=-1;
    	$db=M('house');
    	$hd=$db
            ->join("INNER JOIN city INNER JOIN city c ON city.`id`=house.`city` AND c.`id`=house.`location` INNER JOIN user a ON a.`id`=house.`host_id`")
            ->where("house.id=$id")
            ->field('house.*,city.cityname,c.cityname AS locationName,a.username AS a_username,a.phone AS a_phone')
            ->select();
    	if(count($hd)>0){
    		$house_detail['msg']=1;
    		$house_detail['data']=$hd;
    	}else $house_detail['msg']=-1;
    	echo json_encode($house_detail,JSON_UNESCAPED_UNICODE);
	}

	public function get_verify_house(){
		$d=M('house');
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
		$r=$d
			->join("INNER JOIN user INNER JOIN city INNER JOIN city c ON user.id = house.host_id AND city.id=house.city AND c.id=house.location")
			->where('status=0')
			->count();
		$data['msg']=$r;
		$r=$d
			->join("INNER JOIN user INNER JOIN city INNER JOIN city c ON user.id = house.host_id AND city.id=house.city AND c.id=house.location")
			->where('status=0')
            ->limit($start,$limit)
			->field("house.*,city.cityname AS cityname,c.cityname AS locationname,user.username")
			->select();
		$data['data']=$r;
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
	}

	public function verify_house(){
		$d=M('house');
		$data['status']=1;
		$data['id']=$_GET['house_id'];
		$r['msg']=$d->data($data)->save();
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		$this->send_message();
	}

	public function send_message(){
		$d=M('message');
		$r_id=$_GET['r_id'];
		$content=$_GET['content'];
		$message['r_id']=$r_id;
		$message['content']=$content;
		date_default_timezone_set("Asia/Shanghai");
		$message['add_time']=date("Y-m-d H:i:s");
		$message['s_id']=session('user')['id'];
		$d->data($message)->add();
	}

	public function reject_house(){
		$d=M('house');
		$data['status']=-1;
		$data['id']=$_GET['house_id'];
		$r['msg']=$d->data($data)->save();
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
		$this->send_message();
	}

	public function get_verify_rent(){
		$d=M('rent');
        $start = (I('page')-1)*I('limit');
        $limit = I('limit');
		$r=$d
			->join('INNER JOIN user a INNER JOIN user b INNER JOIN house ON house.id=rent.house_id AND a.id=rent.u_a_id AND b.id=rent.u_b_id')
			->where('rent.rent_status=0')
			->count();
		$data['msg']=$r;
		$r=$d
			->join('INNER JOIN user a INNER JOIN user b INNER JOIN house ON house.id=rent.house_id AND a.id=rent.u_a_id AND b.id=rent.u_b_id')
			->where('rent.rent_status=0')
            ->limit($start,$limit)
			->field('rent.*,house.status AS house_status,a.username AS a_username,a.phone AS a_phone,b.username AS b_username,b.phone AS b_phone')
			->select();
		$data['data']=$r;
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
		// echo $d->_sql();
	}

	
    public function getHouse_detail($id=-1){
        $db=M('house');
        $hd=$db
            ->join("INNER JOIN city INNER JOIN city c ON city.`id`=house.`city` AND c.`id`=house.`location` INNER JOIN user a ON a.`id`=house.`host_id`")
            ->where("house.id=$id")
            ->field('house.*,city.cityname,c.cityname AS locationName,a.username AS a_username,a.phone AS a_phone,a.id AS a_user_id')
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
            ->join("INNER JOIN user INNER JOIN user b ON user.id=rent.u_A_id AND b.id=rent.u_B_id")
            ->where("rent.id=$contractid")
            ->field("rent.*,user.username AS a_username,b.username AS b_username,user.phone AS a_phone,user.id AS a_id,b.phone AS b_phone,b.id AS b_id")
            ->find();//利用租约id查询租约信息
        if(count($hd)>0){
            $contract_detail['msg']=0;
            $contract_detail['data']=$hd;
        }else $contract_detail['msg']=-1;
        $this->assign("contract_detail",json_encode($contract_detail,JSON_UNESCAPED_UNICODE));
        // echo json_encode($contract_detail,JSON_UNESCAPED_UNICODE);
        // echo json_encode($house_image,JSON_UNESCAPED_UNICODE);
    }

    public function rent_detail(){
        $id=$_GET['house_id'];//拿到房子id
        $contractid=$_GET['rent_id'];//拿到租约id
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

	public function verify_rent(){
		$house_id=$_GET['house_id'];
		$d=M('house');
		$r=$d->where("id=$house_id")->field("status")->find();
		if($r['status']==1){
			$d=M('rent');
			date_default_timezone_set("Asia/Shanghai");
			$data['time']=date("Y-m-d H:i:s");
			$data['rent_status']=1;
			$data['id']=$_GET['rent_id'];
			$re['msg']=$d->data($data)->save();
			echo json_encode($re,JSON_UNESCAPED_UNICODE);
			$d=M('house');
			$u['status']=2;
			$u['id']=$house_id;
			$r=$d->data($u)->save();
			echo 1;
		}else{ echo -1;}
		// $this->send_message();
	}


	public function reject_rent(){
		$d=M('rent');
		date_default_timezone_set("Asia/Shanghai");
		$data['time']=date("Y-m-d H:i:s");
		$data['rent_status']=-1;
		$data['id']=$_GET['rent_id'];
		$re['msg']=$d->data($data)->save();
		echo json_encode($re,JSON_UNESCAPED_UNICODE);
		$d=M('house');
		$u['status']=2;
		$u['id']=$house_id;
		$r=$d->data($u)->save();
		$this->send_message();
	}

	public function delete_house(){
    	$id=$_GET['house_id'];
        if(!isset($id)) $id=-1;
    	$db=M('house');
    	$hd=$db
            ->join("INNER JOIN city INNER JOIN city c ON city.`id`=house.`city` AND c.`id`=house.`location` INNER JOIN user a ON a.`id`=house.`host_id`")
            ->where("house.id=$id")
            ->field('house.*,city.cityname,c.cityname AS locationName,a.username AS a_username,a.phone AS a_phone')
            ->find();
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
    	$this->display("house_del");
	}

	public function delete_houseImpl(){
    	$id=$_GET['house_id'];
		$d=M('house');
		$r=$d->where("id=$id")->delete();
		echo $r;
	}

	public function get_house_num($status=-1){
		$d=M('house');
		if($status==-1){
			$data=$d->count();
		}else $data=$d->where("status=$status")->count();
		$r['msg']=$data;
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
	}

	public function get_rent_num($status=-1){
		$d=M('rent');
		if($status==-1){
			$data=$d->count();
		}else $data=$d->where("rent_status=$status")->count();
		$r['msg']=$data;
		echo json_encode($r,JSON_UNESCAPED_UNICODE);
	}
	
}