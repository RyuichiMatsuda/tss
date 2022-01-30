@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <p>マニュアル詳細画面</p>

                    @if($manual->image_file_name != null)
                        <div class="row mb-3">
                            <img class="detail_samune" src="/storage/manuals/{{$manual->image_file_name}}">
                        </div>   
                    @endif      

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('タイトル') }}</label>

                        <div class="col-md-6">
                            <p>{{ $manual->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('マニュアル概要') }}</label>

                        <div class="col-md-6">
                            <p>{{ $manual->body }}</p>
                        </div>
                    </div>

                    
                    <p><a href="{{ route('manuals.index') }}">一覧ページへ</a></p>
                    <p><a href="{{ route('manuals.new') }}">新規マニュアル登録へ</a></p>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
