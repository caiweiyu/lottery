<?php
include_once "test1.php";//链接数据库
// echo "<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>";//格式化编码
// include_once "phpother.php"; //获取物理设备编码
//session_start   ip存入会话每次访问都测试下
header('Access-Control-Allow-Origin:*'); //设置允许
//设置未访问的ip地址
function get_real_ip(){
        $ip = false;
        //客户端IP 或 NONE 
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"]; //REMOTE_ADDR匿名代理ip
        };
        //多重代理服务器下的客户端真实IP地址（可能伪造）,如果没有使用代理，此字段为空
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = false; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        };
        //客户端IP 或 (最后一个)代理服务器 IP 
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    };
    $ip = get_real_ip();
	session_start();
	if(isset($_SESSION['IP']) && $_SESSION['IP'] == $ip){
		die('unble to create!');
	}else{
		$_SESSION['IP'] = $ip;
		$prize_arr = array( 
		    '0' => array('id'=>1,'min'=>0,'max'=>36,'prize'=>'电影票一张','v'=>10),//弧度：0°-36°范围是：“电影票一张”奖， v=10是中奖率是10%
		    '1' => array('id'=>2,'min'=>37,'max'=>109,'prize'=>'可口可乐一杯','v'=>20),
		    '2' => array('id'=>3,'min'=>110,'max'=>360,'prize'=>'对不起,您抽不到!','v'=>70)
		);
		//获取中奖概率范围值
		function getRand($proArr) { 
		    $result = ' ';  
		    //概率数组的总概率精度 
		    $proSum = array_sum($proArr);  
		    //概率数组循环 
		    foreach ($proArr as $key => $proCur){ 
		        $randNum = mt_rand(1, $proSum); 
		        if ($randNum <= $proCur) { 
		            $result = $key; 
		            break; 
		        }else{ 
		            $proSum -= $proCur; 
		        }; 
		    };
		    unset ($proArr); 	 
		    return $result; 
		};
		foreach ($prize_arr as $key => $val) { 
		    $arr[$val['id']] = $val['v']; 
		}  
		$rid = getRand($arr); //根据概率获取奖项id 
		$res = $prize_arr[$rid-1]; //中奖项 
		$min = $res['min']; 
		$max = $res['max']; 
		$result['angle'] = mt_rand($min,$max); //随机生成一个角度
		$result['prize'] = $res['prize']; 
		echo json_encode($result);
	};
 