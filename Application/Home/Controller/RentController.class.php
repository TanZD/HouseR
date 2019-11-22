<?php
namespace Home\Controller;

use Think\Controller;

class RentController extends Controller
{
  //   public function index()
  //   {
  //   	// 渲染模板
		// $this->display();
  //   }

    public function index($city=3,$location=-1,$condition=0){
    	// echo $location."<br>".$condition;
        $map=[];
        $map['price']=[];
        $map['area']=[];
        $map['rooms']=[];
        $map['decoration']=[];
        $map['floor']=[];
        $r=[];
        $r['city']=$city;
        if($location!=-1) $r['location']=$location;
        // 当前分页码
        $p = empty($_GET['p'])? 1: $_GET['p'];      
        if(isset($_GET['order'])){
            switch ($_GET['order']) {
                case '1':
                    $order="add_time DESC";
                    break;
                case '-1':
                    $order="add_time";
                    break;
                case '2':
                    $order="price DESC";
                    break;
                case '-2':
                    $order="price";
                    break;
                case '3':
                    $order="area DESC";
                    break;
                case '-3':
                    $order="area";
                    break;
                default:
                    $order="add_time DESC";
                    break;
            }
        }else $order="add_time DESC";

        if(isset($_GET['keyword'])){
        	$_GET['keyword']=urldecode($_GET['keyword']);
        	$r['title']=array('like',"%".$_GET['keyword']."%");
        }

        //获取条件
        $cur=explode("-",$condition);//切割参数
        for ($i=0;$i<count($cur);$i++) {
            // echo $cur[$i]."<br>";
            switch ($cur[$i]) {
                case 'p1':
                    array_push($map['price'],array('elt',500));
                    break;
                case 'p2':
                    array_push($map['price'],array(array('gt',500),array('elt',1000),'and'));
                    break;
                case 'p3':
                    array_push($map['price'],array(array('gt',1000),array('elt',1500),'and'));
                    break;
                case 'p4':
                    array_push($map['price'],array(array('gt',1500),array('elt',2000),'and'));
                    break;
                case 'p5':
                    array_push($map['price'],array(array('gt',2000),array('elt',2500),'and'));
                    break;
                case 'p6':
                    array_push($map['price'],array(array('gt',2500)));
                    break;
                case 'a1':
                    array_push($map['area'], array('elt',50));
                    break;
                case 'a2':
                    array_push($map['area'], array(array('gt',50),array('elt',70),'and'));
                    break;
                case 'a3':
                    array_push($map['area'], array(array('gt',70),array('elt',100),'and'));
                    break;
                case 'a4':
                    array_push($map['area'], array(array('gt',100),array('elt',130),'and'));
                    break;
                case 'a5':
                    array_push($map['area'], array(array('gt',130),array('elt',180),'and'));
                    break;
                case 'a6':
                    array_push($map['area'], array('gt',180));
                    break;
                case 'r1':
                    array_push($map['rooms'], 1);
                    break;
                case 'r2':
                    array_push($map['rooms'], 2);
                    break;
                case 'r3':
                    array_push($map['rooms'], 3);
                    break;
                case 'r4':
                    array_push($map['rooms'], 4);
                    break;
                case 'r5':
                    array_push($map['rooms'], array('gt',4));
                    break;
                case 'd1':
                    $r['decoration']=1;
                    break;
                case 'd2':
                    $r['decoration']=2;
                    break;
                case 'd3':
                    $r['decoration']=3;
                    break;
                case 'f1':
                    array_push($map['floor'], array('elt',6));
                    break;
                case 'f2':
                    array_push($map['floor'], array(array('gt',6),array('elt',12),'and'));
                    break;
                case 'f3':
                    array_push($map['floor'], array('gt',12));
                    break;
                case 'e1':
                    $r['bed']=1;
                    break;
                case 'e2':
                    $r['yg']=1;
                    break;
                case 'e3':
                    $r['czy']=1;
                    break;
                case 'e4':
                    $r['kt']=1;
                    break;
                case 'e5':
                    $r['tv']=1;
                    break;
                case 'e6':
                    $r['rsq']=1;
                    break;
                case 'e7':
                    $r['xyj']=1;
                    break;
                case 'e8':
                    $r['bx']=1;
                    break;
                case 'e9':
                    $r['kd']=1;
                    break;
                case 'e10':
                    $r['cyyj']=1;
                    break;
                case 'e11':
                    $r['wbl']=1;
                    break;
                case 'e12':
                    $r['trq']=1;
                    break;
                case 'e13':
                    $r['xdg']=1;
                    break;
                case 'e14':
                    $r['sf']=1;
                    break;
                default:
                    break;
            }
        }
        if(!empty($map['price'])){
            if(count($map['price'])>1) array_push($map['price'], 'or');
            $r['price']=$map['price'];
        }
        if(!empty($map['area'])){
            if(count($map['area'])>1) array_push($map['area'], 'or');
            $r['area']=$map['area'];
        }
        if(!empty($map['rooms'])){
            if(count($map['rooms'])>1) array_push($map['rooms'], 'or');
            $r['rooms']=$map['rooms'];
        }
        if(!empty($map['floor'])){
            if(count($map['floor'])>1) array_push($map['floor'], 'or');
            $r['floor']=$map['floor'];
        }
       	$r['status']=1;
        $house = M('house');
        $page_num = $house
                ->join("INNER JOIN image INNER JOIN city INNER JOIN city c ON image.`house_id`=house.`id` AND image.`top`=1 AND city.`id`=house.`city` AND c.`id`=house.`location`")
                ->where($r)
                ->count();
        $list = $house
                ->join("INNER JOIN image INNER JOIN city INNER JOIN city c ON image.`house_id`=house.`id` AND image.`top`=1 AND city.`id`=house.`city` AND c.`id`=house.`location`")
                ->where($r)
                ->page($p.",2")
                ->order($order)
                ->field('house.*,image.path,city.cityname,c.cityname AS locationName')
                ->select();
        // echo json_encode($list);
        $data=[];
        $data["num"]=count($list);
        $data["total_num"]=$page_num;
        $data["data"]=$list;
        $this->assign("data",json_encode($data,JSON_UNESCAPED_UNICODE));
        //根据城市获取区域
        $l=M("city");
        $location_city=$l->where("pid=$city")->select();
        $this->assign("location_city",json_encode($location_city,JSON_UNESCAPED_UNICODE));
        //根据城市获取区域
        $t_city=$l->where("type=2")->select();
        $this->assign("t_city",json_encode($t_city,JSON_UNESCAPED_UNICODE));
        // 渲染模板
        $this->display();
    }

    public function house(){
    	$id=$_GET['house_id'];
        if(!isset($id)) $id=-1;
    	$this->getHouse_detail($id);
    	$this->display();
    }

    public function getHouse_detail($id=-1){
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
    }

    public function rent_house(){
        $id=$_GET['house_id'];
        if(!isset($id)) $id=-1;
        $this->getHouse_detail($id);
        $this->display();
    }

    public function get_house(){
    }

    public function apply_rent(){
        if(!isset($_POST)) return;
        $data=$_POST;
        date_default_timezone_set("Asia/Shanghai");
        $data['add_time']=date("Y-m-d H:i:s");
        $data['stat']=0;
        $h=M('rent');
        $r=$h->add($data);
        if($r>0){
            $this->success('申请成功','/HouseR/Home/rent/index');
        }else{
            $this->error('申请失败！');
        }
    }

    public function apply(){
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

    public function apply_houseImpl(){
		// var_dump($_POST);
		// var_dump($_FILES);
		$house=$_POST;
		date_default_timezone_set("Asia/Shanghai");
		$house['add_time']=date("Y-m-d");
		$h=M('house');
		$r=$h->data($house)->add();
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
	        echo "<script>alert('申请成功',window.location.href='/HouseR/Home/rent/index')</script>";
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

    public function get_message(){
        $d=M('message');
        $u_id=session('user')['id'];
        $r=$d->where("r_id=$u_id AND isRead=0")->count();
        echo $r;
    }

    public function set_isread(){
        $d=M('message');
        $u_id=session('user')['id'];
        $data['isRead']=1;
        $d->where("r_id=$u_id")->save($data);
        echo $d->_sql();
    }
}