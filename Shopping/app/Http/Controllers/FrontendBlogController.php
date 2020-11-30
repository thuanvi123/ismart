<?php

namespace App\Http\Controllers;

use App\FrontedPostModel;
use App\FrontendProductModel;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    public function index()
    {
        $blog = FrontedPostModel::paginate(4);
        $selling_product = FrontendProductModel::where('total', '>', 7)->latest()->get();
        return view('frontend.post.index', compact('blog', 'selling_product'));
    }

    public function detail(Request $request)
    {
        $url=$request->segment(3);
        $url=preg_split('/(-)/i',$url);
        if ($id=array_pop($url))
        {
            $post = FrontedPostModel::find($id);
        }

      return view('frontend.post.detail',compact('post'));

    }
}
