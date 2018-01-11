<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Work;

class Follow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'work_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public $typeList = [
    	1 => '喜欢',
    ];

    public function judge($user,$id,$type = 1)
    {
		$fol = Follow::where('user_id',$user)->where('work_id',$id)->where('type',$type)->value('id');
		if(!$fol){
			return false;
		}else{
			return $fol;
		}
    }

    // 判断用户是否注册
    public function implement($user,$id,$type = 1)
    {
    	$follow = $this->judge($user,$id);
    	// dd($follow);
    	if(!$follow){
    		$result = $this->storage($user,$id,$type);
    		return $result;
    	}else{
    		$result = $this->cancel($follow,$id);
    		return $result;
    	}
    }


    // 关注
    public function storage($user,$id,$type)
    {
    	$info = Follow::create([
    		'user_id' => $user,
    		'work_id' => $id,
    		'type'	  => $type,
    	]);

    	// 喜欢人数加1
    	Work::where('id',$id)->increment('count',1);

    	return $info;
    }

    // 取消删除记录
    public function cancel($follow,$id)
    {
    	$res = Follow::find($follow);
    	if($res->delete()){
    		// 喜欢的人数减1
    		Work::where('id',$id)->decrement('count',1);
    		return true;
    	}
    	
    }

    public function followCount($id,$type = 1)
    {
    	$list = Follow::where('work_id',$id)->where('type',$type)->get();
    	$num = $list->count();
    	return $num;
    }
}
