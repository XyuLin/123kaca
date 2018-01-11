<?php

namespace App\Http\Controllers\Kaca;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Work;
use App\User;
use App\Album;
use App\Gallery;
use App\Follow;

class IndexController extends Controller
{
    //
    public function index()
    {
    	$work = new Work;
    	$workList = $work->workIndex();
        $hotList = $work->hotList();
    	return view('kaca.index',[
            'workList' => $workList,
            'hotList'  => $hotList,
        ]);
    }

    // 图库
    public function type()
    {	
    	$work = new Work;
    	$typeList = $work->typeList; 
    	return view('kaca.type',
			['typeList' => $typeList]
    	);
    }

    // type->food->info
    public function food(Request $request, $type)
    {
        $work = new Work;
        $typeName = $work->typeList[$type];
        $list = $work->workList($type);
        //dd($list);
        return view('kaca.food',
        ['list' => $list],
        ['typeName' => $typeName]
        );
    }

    // 所有图库
    public function works(Request $request,$type = null)
    {
        $work = new Work;
        $typeList = $work->typeList;

    	$album = new Album;
        if($type != null){

            $list = $work->where('type',$type)->pluck('id');
            $array = $album->whereIn('work_id',$list)->pluck('path');
        }else{
            $array = $album->pluck('path');
        }
    	
    	
    	return view('kaca.works',[
    		'all' => $array,
    		'typeList' => $typeList,	
    		]
    	);
    }

    // 作品详情
    public function workInfo(Request $request, Work $work)
    {
        $album = Album::where('work_id',$work->id)->get();
        $work = $work->getInfo($work->id);
        if($user = Auth::id()){
            $follow = new Follow;
            $judge = $follow->judge($user,$work->id);
            $work['judge'] = $judge;
        }
        return view('Kaca.work',[
            'work' => $work,
            'album'=> $album,
        ]);
    }

    // 图片素材
    public function gallery()
    {
        $list = Gallery::orderBy('created_at','desc')->paginate(3);

        return view('kaca.gallery',
            ['lists' => $list]
        );
    }

    // 素材详情
    public function gallerInfo(Request $request,Gallery $gallery)
    {
        $relate = Gallery::where([
            ['type', '=' ,$gallery->type],
            ['id', '<>' , $gallery->id]
        ])->get();
        
        $gallery->user_id = User::find($gallery->user_id)->name;
        $gallery->type = $gallery->typeList[$gallery->type];

        return view('kaca.galleryInfo',[
            'info'      => $gallery,
            'relate'    => $relate,
        ]);
    }

    // 点赞
    public function likes(Request $request,$id)
    {

        $user = Auth::id();
        // 用户未登录
        if(empty($user)){
            return redirect('work/'.$id);
        }
        $follow = new Follow;
        // $follow->followCount(1);
        // 执行用户点击
        $res = $follow->implement($user,$id);

        if($res){
            return redirect('work/'.$id);
        }
        
    }
}
