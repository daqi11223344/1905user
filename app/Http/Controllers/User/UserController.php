<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CommonModel;

class UserController extends Controller
{
    public function form()
    {
        return view('index.form');
    } 
    public function logins()
    {
        return view('index.login');
    }
    public function login2()
    {
        return view('index.logins');
    }
    
    public function login3()
    {
        return view('index.logind');
    }
    public function token1()
    {
        return view('index.token');
    }
    
    public function index()
    {  
        // dd(213213213);
        /**
         *  注册
         */
        $url = "http://api.1905.com/user";
        $data = request()->except('_token');
        //初始化
        $ch = curl_init();
        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        //发起请求
        curl_exec($ch);
        //关闭回话
        curl_close($ch);
 
 
    }
 
 
    /**
     * 登录
     * Undocumented function
     *
     * @return void
     */
    public function index2()
    {
        $url = "http://api.1905.com/passport";
        $data = request()->except('_token');
        //初始化
        $ch = curl_init();
        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        //发起请求
        curl_exec($ch);
        //关闭回话
        curl_close($ch);
 
 
    }
 
 
  public function index5()
    {
        $url = "http://api.1905.com/passports";
        $data = request()->except('_token');
        //初始化
        $ch = curl_init();
        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        //发起请求
        curl_exec($ch);
        //关闭回话
        curl_close($ch);
 
 
    }
 
 
    public function index6()
    {
        $url = "http://api.1905.com/passportd";
        $data = request()->except('_token');
        //初始化
        $ch = curl_init();
        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        //发起请求
        curl_exec($ch);
        //关闭回话
        curl_close($ch);
 
 
    }
 
 
    public function index3()
    {
 
 
         $url = "http://api.1905.com/token";
         $name = request()->input('name');
         $token = request()->input('token');
         $data = [
             'token:'.$token,
             'name:'.$name
         ];
       
         //初始化
        $ch = curl_init();
        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$data);
        //发起请求
        curl_exec($ch);
        //关闭回话
        curl_close($ch);
    }

    /**
     * Undocumented function
     *APP注册
     * @return void
     */
    public function reg()
    {
        // echo '<pre>';print_r($_POST);echo '</pre>';
        // 请求api
        $url = 'http://api.1905.com/user';
        
        $response = CommonModel::curlPost($url,$_POST);
        return $response;
    }

    /**
     * APP登录
     */

    public function login1()
    {
        // 请求api
        $url = 'http://api.1905.com/passport';
        
        $response = CommonModel::curlPost($url,$_POST);
        echo '<pre>';print_r($response);echo '</pre>';
        return $response;
    }

    public function showData()
    {
        // 收到 token
        $id = $_SERVER['HTTP_ID'];
        $token = $_SERVER['HTTP_TOKEN'];

        
        echo 'ID: ' . $id;echo '<br>';
        echo 'TOKEN: ' . $token;echo '<br>';

        // 请求api鉴权
        $url = 'http://api.1905.com/auth'; //鉴权接口
        $response = CommonModel::curlPost($url,['id'=>$id,'token'=>$token]);
        // var_dump($response);die;
        $status = json_decode($response,true);
        // var_dump($status);die;
        // 处理鉴权结果
        
        // var_dump($response);
        echo '<pre>';print_r($response);echo '</pre>';
        echo date('Y-m-d H:i:s');
    }
    public function peest()
    {
        echo __METHOD__;
    }

    public function pest()
    {
        $data = [
            'user_name' => 'lisi',
            'email'     => 'lilsi@qq.com',
            'amount'    => 10000
        ];

        echo json_encode($data);
    }

    public function md5post()
    {
        $data = "659ad3fb044f7f4b2f7161890f1b6784";   //要发送的数据
        $key = '哒哒哒哒哒哒';  //计算签名的key 发送端与接收端拥有相同的key

        // 计算签名

        $signature = '59fd7aac57f6eaa3584eebcb472aa533';

        echo "待发送的数据：" . $data;echo '<br>';
        echo "签名：" . $signature;echo '<br>';

        // 发送数据
        $url = "http://api.1905.com/check?data=".$data . '&signature=' . $signature;
        echo $url;echo '<hr>';
        $response = file_get_contents($url);
        echo $response;
    }


}
