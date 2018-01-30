<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Gallery;
use App\User;

class GalleryController extends Controller
{
  
    public function galleryUp(Request $request)
    {
        $img = Image::make($request->file('file'));
        // 生成唯一文件名
        $filename = md5(uniqid(rand())). '.jpg';
        // 存储原图
        $img->save('gallery/'.$filename);
        // 裁剪合适大小-缩略图resizeCanvas
        $img->fit(40,30);
        // 存储缩略图
        $img->save('thumb/gallery/'.$filename);       
        return  'gallery/'.$filename;
    }

    public function sendInfo(Request $request)
    {
         // 判断是否上传图片
        if ($request->filled('image')) { 

            $work = Gallery::create([
                'user_id' => Auth::id(),
                'type'    => $request->type,
                'image'   => $request->image,
                'title'   => $request->title,
                'desc'    => $request->desc,
                'url'     => $request->url,
                'cipher'  => $request->cipher,
            ]);

            return redirect('galleryList');

        }else{
            return redirect('galleryUp');
        }   
    }

    public function galleryList()
    {
        $gallery = new Gallery;
        $list = $gallery->orderBy('created_at','desc')->get();
        foreach($list as $value) {

            $value['user_id'] = User::find($value['user_id'])->name;
            $value['type'] = $gallery->typeList[$value['type']];
        }
        
        return view('admin.galleryList',
            ['lists' => $list]);
    }
    
    public function galleryShow()
    {
        $gallery = new Gallery;
        $typeList = $gallery->typeList;
        return view('admin.gallery',[
            'typelist'  => $typeList,
        ]);
    }  

    public function editShow($id)
    {
        $gallery = new Gallery;
        $info = $gallery->find($id);
        return view('admin.gallery',[
            'typelist' => $gallery->typeList,
            'info'     =>  $info,
        ]);
    }

    public function delImage($id)
    {
        $gallery = Gallery::where('id',$id)->update([
                'image' => '',
        ]);
        return redirect('editG/'.$id);
    }

    public function editGallery(Request $request,$id)
    {
        if ($request->filled('image')) {
            $res = Gallery::where('id',$id)->update([
                'type'    => $request->type,
                'title'   => $request->title,
                'desc'    => $request->desc,
                'image'   => $request->image,
                'url'     => $request->url,
                'cipher'  => $request->cipher,
            ]);
        }else{
             $res = Gallery::where('id',$id)->update([
                'type'    => $request->type,
                'title'   => $request->title,
                'desc'    => $request->desc,
                'url'     => $request->url,
                'cipher'  => $request->cipher,
            ]);
        }
        if($res){
             return redirect('galleryList');
          }else{
             return redirect('editG/'.$id);
          }

    }
    public function destroyGallery(Gallery $Gallery)
    {
        $Gallery->delete();
        return redirect()->back();
    }
}   
