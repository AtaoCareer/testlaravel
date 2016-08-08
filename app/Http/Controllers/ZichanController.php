<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Zichan;
use App\Zichannew;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Bumen;

class ZichanController extends Controller
{
    
	public function show()
    {
//     	$id = session('id');
//     	$result = Zichan::where('zichanNum', $id)->first();
//     	$bumen = $result->bumen;
//     	$keshi = $result->keshi;
//     	$user = $result->user;
//     	$roomNum = $result->roomNum;
//     	$description = $result->description;
//     	$serialNum = $result->serialNum;
    	
//     	return view('zichans.show', compact('id', 'bumen', 'keshi', 'user', 'roomNum', 'description', 'serialNum'));

    	//如果新表里已经有数据了，先显示新表里的数据
    	$id = session('id');

    if (Schema::hasTable('zichannews'))
    {
    	$result = Zichannew::where('zichanNum', $id)->first();
    	
    	//var_dump($result);
    	if(!empty($result))
    	{
    		return $this->findandReturn('zichans.show', 1);
    	}
    	//如果新表里还没有数据，就显示老表的数据
		else 
		{
			return $this->findandReturn('zichans.show', 0);
		}
    }

    else return $this->findandReturn('zichans.show', 0);

    }
    
    public function check()
    {
//     	$id = session('id');
//     	$result = Zichan::where('zichanNum', $id)->first();
//     	$bumen = $result->bumen;
//     	$keshi = $result->keshi;
//     	$user = $result->user;
//     	$roomNum = $result->roomNum;
//     	$description = trim($result->description);
//     	$serialNum = $result->serialNum;
//     	return view('zichans.check', compact('id', 'bumen', 'keshi', 'user', 'roomNum', 'description', 'serialNum'));
		
    	
    //如果新表里已经有数据了，先显示新表里的数据
    	$id = session('id');

    if (Schema::hasTable('zichannews'))
    {    
    	$result = Zichannew::where('zichanNum', $id)->first();
    	
    	if(!empty($result))
    	{
    		return $this->findandReturn('zichans.check', 1);
    	}
    	//如果新表里还没有数据，就显示老表的数据
		else 
		{
			return $this->findandReturn('zichans.check', 0);
		}
    }
    else 
        {
            return $this->findandReturn('zichans.check', 0);
        }
    }
    
    public function checkSave(Request $request)
    {
    	//验证表单
    	//TO DO 
    	//$this->validate($request, ['bumen' => 'required|max:255']);
    	
    	
    	//检查数据表是否存在
    	//如果存在直接使用
    	if (Schema::hasTable('zichannews'))
    	{
    		//检查新的数据表是否有数据，如果有数据的话直接更新
    		$id = session('id');
    		$zichan = Zichannew::where('zichanNum', $id)->first();
    		//如果没有数据就插入新数据
    		if (empty($zichan))
    		{
    			$zichan = new Zichannew;
    			$zichan->zichanNum = $request->get('zichanNum');
    			$zichan->bumen = $request->get('bumen');
    			$zichan->keshi = $request->get('keshi');
    			$zichan->user = $request->get('user');
    			$zichan->roomNum = $request->get('roomNum');
    			$zichan->description = $request->get('description');
    			$zichan->serialNum = $request->get('serialNum');
    		}
    		//如果有就更新数据
    		else {
    			$zichan->zichanNum = $request->get('zichanNum');
    			$zichan->bumen = $request->get('bumen');
    			$zichan->keshi = $request->get('keshi');
    			$zichan->user = $request->get('user');
    			$zichan->roomNum = $request->get('roomNum');
    			$zichan->description = $request->get('description');
    			$zichan->serialNum = $request->get('serialNum');
    		}
    	}
    	//如果不存在再新建一个数据表存储，然后填充数据
    	else {
    		Schema::create('zichannews', function (Blueprint $table){
    			$table->string('zichanNum', 10)->unique();
    			$table->string('bumen', 10);
    			$table->string('keshi', 20)->nullable();
    			$table->string('user', 20);
    			$table->string('roomNum',20);
    			$table->string('description', 20);
    			$table->string('serialNum', 20)->nullable;
    			$table->increments('id');
    			$table->timestamps();
    		});
    			
    			$zichan = new Zichannew;
    			$zichan->zichanNum = $request->get('zichanNum');
    			$zichan->bumen = $request->get('bumen');
    			$zichan->keshi = $request->get('keshi');
    			$zichan->user = $request->get('user');
    			$zichan->roomNum = $request->get('roomNum');
    			$zichan->description = $request->get('description');
    			$zichan->serialNum = $request->get('serialNum');
    		
    	}
    	
    	if ($zichan->save()){
    		//可以设置一个成功跳转的界面 然后静止几秒之后就返回主界面或者基本信息框
    		//return redirect('success');
    		return view('zichans.check_success');
    		
    	}
    	else{
    		return redirect()->back()->withInput()->withErrors('保存失败！'); 
    	}
    }
    /*
     * 从数据表中查找数据并返回相应界面
     */
    public function findandReturn($viewPage = 'zichans.show', $typeofSheet)
    {
    	$id = session('id');
    	
    	if ($typeofSheet == 0){
    		$result = Zichan::where('zichanNum', $id)->first();
    	}else if($typeofSheet == 1){
    		$result = Zichannew::where('zichanNum', $id)->first();
    	}
    	
    	$bumen = $result->bumen;
    	$keshi = $result->keshi;
    	$user = $result->user;
    	$roomNum = $result->roomNum;
    	$description = $result->description;
    	$serialNum = $result->serialNum;
    	//加上部门
    	//根据组织机构表来
    	//$bumens = DB::table('bumens')->select('bumen')->distinct()->get();
    	//根据资产盘点表来
    	$bumens = DB::table('zichans')->select('bumen')->distinct()->get();
    	//var_dump($bumens);
    	
    	return view ($viewPage, compact('id', 'bumen', 'keshi', 'user', 'roomNum', 'description', 'serialNum', 'bumens'));
    	 
    }
    
    public function success()
    {
    	return view('zichans.success');
    }
    
    public function findKeshi($bumen)
    {
    	//根据组织机构表来
//     	$results = Bumen::where('bumen', $bumen)->get();
    	//根据资产盘点表来
    	$results = Zichan::where('bumen', $bumen)->select('keshi')->distinct()->get();
    	$bumenString = "";
    	
    	foreach ($results as $result)
    	{
    		
    		$bumenString = $result->keshi."-".$bumenString;
    	}
    	
    	return $bumenString;
    }
    
    public function distribute()
    {
    	$id = session('id');
    	$bumens = DB::table('zichans')->select('bumen')->distinct()->get();
    	$bumen = "信息工程部";
    	$keshi = "IT运营科";
    	return view('zichans.distribute', compact('id','bumens'));
    }
    
    public function distributeSave(Request $request)
    {
    	$zichan = new Zichan;
    	$zichan->zichanNum = $request->get('zichanNum');
    	$zichan->bumen = $request->get('bumen');
    	$zichan->keshi = $request->get('keshi');
    	$zichan->user = $request->get('user');
    	$zichan->roomNum = $request->get('roomNum');
    	$zichan->description = $request->get('description');
    	$zichan->serialNum = $request->get('serialNum');
    	if ($zichan->save()){
    		//可以设置一个成功跳转的界面 然后静止几秒之后就返回主界面或者基本信息框
    		return view('zichans.dis_success');
    	
    	}
    	else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    	
    }
    public function recover()
    {
    	
    }
    
}
