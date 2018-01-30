<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Work;
use App\User;
use App\Album;

class WorkController extends Controller
{
   
    public function upShow()
    {
        $work = new Work;
    	return view('admin.upload',
    		['typelist' => $work->typeList
    	]);
    }

    public function upload(Request $request)
    {
 
        $img = Image::make($request->file('file'));
        // 生成唯一文件名
        $filename = md5(uniqid(rand())). '.jpg';
        // 存储原图
        $img->save('album/'.$filename);
        // 裁剪合适大小-缩略图resizeCanva
        $img->fit(500,350);
        // 存储缩略图
        $img->save('thumb/album/'.$filename);
        return 'album/'.$filename;
    }

    public function sendWork(Request $request)
    {	
        // 判断是否上传图片
    	if ($request->filled('images')) { 

		    $work = Work::create([
		    	'user_id'	=> Auth::id(),
	    		'customer'	=> $request->customer,
	    		'describe'	=> $request->describe,
	    		'type'		=> $request->type,
                'count'     => '0',
    		]);

    		if($work){

                $images = $request->images;        

                foreach($images as $key => $value){
                    $album = Album::create([
                        'work_id'   => $work->id,
                        'path'      => $value,
                        'rank'      => $key,
                    ]);
                }

    			return redirect('work');
    		}

		}else{
			return redirect('upload');
		}	

    }


    public function workList()
    {
        $work = new Work;
    	$list = $work->orderBy('created_at','desc')->get();
    	foreach($list as $value) {

    		$value['user_id'] = User::find($value['user_id'])->name;
    		$value['type'] = $work->typeList[$value['type']];
    	}
    	

    	return view('admin.work',[
            'lists' => $list,
        ]);
    }

    public function editShow($id)
    {

        $work = new Work;
        $info = $work->find($id);
        $album = Album::where('work_id',$id)->get();

        return view('admin.upload',[
            'typelist' => $work->typeList,
            'info'  => $info,
            'album' => $album,
        ]);
    }

    public function editWork(Request $request,$id)
    {

        $res = Work::where('id',$id)->update([
            'customer'  => $request->customer,
            'describe'  => $request->describe,
            'type'      => $request->type,
        ]);


        if($request->filled('images')){
            // 保存图片
            $images = $request->images; 

            $rank = Album::where('work_id',$id)->orderBy('rank','desc')->first();
            $rankMax = $rank->rank;
            foreach($images as $value){
                $album = Album::create([
                    'work_id'   => $id,
                    'path'      => $value,
                    'rank'      => ++$rankMax,
                ]);
            }

            if($res){
                return redirect('work');
            }else{
                return redirect('editW/'.$id);
            }
        }
    }

    public function delImg($id,$work)
    {
        Album::where('id',$id)->delete();

        return redirect('editW/'.$work);
    }

    public function destroyWork(Work $work)
    {
        $work->delete();
        // 删除作品相关图片
        $album = new Album;
        $album->where('work_id',$work->id)->delete();
        return redirect()->back();
    }

}
