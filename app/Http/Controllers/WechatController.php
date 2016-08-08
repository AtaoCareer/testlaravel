<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WechatController extends Controller
{
//
    
	protected $appID = 'wx0ac62c581571bc61';
	protected $appsecret = 'bf10f1132d778eeaaf50877536330768';
	//protected $redirect_uri = 'http://yjy.vip.natapp.cn/testLaravel/public/callback';
	//管理员的openID
	protected $adminID = 'oeWFLxBsk-mfavbET8mzfBXl6l1A';
	//protected $adminID = 'oeeeeee';
    public function index($id)
    {
    	
    	session(['id'=> $id]);
    	//判断是不是微信扫码的
    	//如果是微信扫码的
    	//判断是用户还是管理员，管理员固定必须用微信端扫码
    	if ($this->is_weixin())
    	{
    		//$this->getCode();
    		//为了自动填写地址使用Request
    		return redirect('getCode');
    	}
    	//不是微信扫码的话直接进用户界面
    	else 
    	{
    		return redirect('user_index');
    	}
    }
    /*
     * 判断是不是微信浏览器的函数
     */
    public function is_weixin()
    {
    	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false)
    	{
    		return true;
    	}else {
    		return false;
    	}
    }
    /*
     * 通过微信api获取code参数
     */
    public function getCode(Request $request)
    {
		//echo $request->url();
    	$appid = $this->appID;
    	$redirect_uri = $request->url().'/callback';
    	$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_base&state=1#wechat_redirect';
    	header('location:'.$url);
    	exit();
    }
    /*
     * 回调处理函数通过获取的code去换取access_token(未使用)和openid(用来判断是否管理员)
     */
    public function callback()
    {
    	$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appID.
			'&secret='.$this->appsecret.
			'&code='.$_GET['code'].
			'&grant_type=authorization_code';
    	$res  = $this->myCurl($url);
    	$info = json_decode($res, true);
    	$uid = $info['openid']; 
		if($uid == $this->adminID)
    	{
    		return redirect('admin_index');
    	}
    	else{
    		return redirect('user_index');
    	}
    }
    public function myCurl($url, $type="GET", $data = null)
    {
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	if ($type != 'GET'){
    		curl_setopt($curl, CURLOPT_POST, 1);
    		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    	}
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    	curl_setopt($curl, CURLOPT_ENCODING, 'gzip, deflate');
    	$res = curl_exec($curl);
    	curl_close($curl);
    	return $res;
    }
}
