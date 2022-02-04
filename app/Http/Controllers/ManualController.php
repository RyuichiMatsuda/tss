<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// 画像保存に必要な記述
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
        // dd("ルートチェック");
        $manual = new Manual($request->all());

        dd($manual);
        //画像を取り扱う場合は以下の記述がいる
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

    # 画像アップロード関係
    private function saveImage(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();
        Image::make($file)->save($tempPath);

        $filePath = Storage::disk('public')
            ->putFile('manuals', new File($tempPath));

        return basename($filePath);
    }

    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }

}
