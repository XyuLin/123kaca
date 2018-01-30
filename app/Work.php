<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Follow;

class Work extends Model
{
    public $typeList = [
        '饮品小吃','西餐甜点','中餐糕点'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'customer', 'describe','type','image','count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function workIndex()
    {
        $list = Work::orderBy('created_at','desc')->take(6)->pluck('id');
        $array = [];
        foreach($list as $key => $value){
            $array[$key]  = $this->getInfo($value);
        }
        return $array;
    }

    public function workList($type = null)
    {
        if($type == null){
             $list = Work::pluck('id');
         }else{
            $list = Work::where('type',$type)->pluck('id');
         }
       
        $array = [];
        foreach($list as $key => $value){
            $array[$key]  = $this->getInfo($value);
        }
        return $array;
    }

    public function getInfo($id)
    {
        $info = Work::find($id);
        if($info){
            $info['typeName'] = $this->typeList[$info['type']];
            $user = User::find($info->user_id);
            $info['user_id'] = $user->name;
            $album = Album::orderBy('rank','asc')->where('work_id', $id)->first();
            $info['image'] = $album->path;
            $follow = new Follow;
            $info['num'] = $follow->followCount($id);
            return $info;
        }
    }

    public function hotList()
    {
        $list = Work::orderBy('count','desc')->orderBy('created_at','desc')->take(3)->pluck('id');

        foreach($list as $key => $id){
            $info[$key] = $this->getInfo($id);
        }
            return $info;
    }

}
