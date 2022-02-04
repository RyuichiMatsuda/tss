<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// #マニュアル：画像保存
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ManualController extends Controller
{

    public function index()
    {
        $manuals = Manual::select()->latest()->paginate(12);

        return view('manuals.index', compact('manuals'));
    }

    public function detail($id)
    {
        $manual = Manual::find($id);

        return view('manuals.detail', compact('manual'));
    }

    public function new()
    {
        return view('manuals.new');
    }

    public function store(Request $request)
    {   
        // #マニュアル：バリデーション
        $this->validator($request);

        // #マニュアル：ホワイトリストを使用した保存
        $manual = new Manual($request->all());

        // #マニュアル：画像保存
        if($request->has('image_file')){
            $image_path = $this->saveImage($request->file('image_file')); 
            $manual->image_file_name = $image_path;
        }

        $manual->save();

        return redirect()->route('manuals.detail', ['id' => $manual->id]);
    }

    public function destroy(Request $request)
    {   
        $manual = Manual::find($request->id);
        $manual->delete();

        // return view('incidents.detail', compact('incident'));
        return redirect()->route('manuals.index');
    }

    // #マニュアル：画像保存
    private function saveImage(UploadedFile $file): string
    {
        // 画像名の作成
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp);
        $tempPath = $meta["uri"];

        Image::make($file)->save($tempPath);
        //fitのチェーンを追加して、画像のサイズを変更できる。
        //Image::make($file)->fit(300, 300)->save($tempPath);

        // storagelinkで紐付けたpublic配下のmanualsフォルダに保存
        $filePath = Storage::disk('public')
            ->putFile('manuals', new File($tempPath));

        return basename($filePath);
    }

    // #マニュアル：バリデーション
    public function validator(Request $request) {
        $request->validate([
            'title' => ['required', 'between:1,70'],
            'body' => ['required','min:87','max:50000'],

            // #マニュアル：画像保存
            'image_file_name' => ['file','mimes:jpeg,png,jpg,bmb','max:2048'],
        ],[

            //　以下はカスタムメッセージ
            'title.between' => 'タイトルは、70文字までです',
            'body.max' => '本文は、5000文字までです',
            'body.min' => '本文は必須です。',
        ]);
    }

}
