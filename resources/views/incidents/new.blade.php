@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('インシデント新規登録') }}</label>

                    {{-- // #インシデント：投稿フォーム --}}
                    <form method="POST" action="{{ route('incidents.store') }}">
                        @csrf

                        {{-- 電話発信者名 --}}
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('電話発信者名') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        {{-- インシデント概要 --}}
                        <div class="row mb-3">
                            <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('インシデント概要') }}</label>

                            <div class="col-md-6">
                                <input id="body" type="text" class="form-control @error('body') is-invalid @enderror"
                                    name="body" value="{{ old('free_space') }}" required autofocus />

                                {{-- @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('スレッド新規登録') }}</label>
                        
                        <div class="row mb-3">
                            <label for="thread_title" class="col-md-4 col-form-label text-md-end">{{ __('タイトル') }}</label>
            
                            <div class="col-md-6">
                                <input id="thread_title" type="text" class="form-control @error('title') is-invalid @enderror" name="thread_title" value="{{ old('thread_title') }}" required >
            
                                @error('thread_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="thread_body" class="col-md-4 col-form-label text-md-end">{{ __('スレッド概要') }}</label>
            
                            <div class="col-md-6">
                                <textarea id="thread_body" type="text" class="form-control @error('thread_body') is-invalid @enderror" name="thread_body" value="{{ old('thread_body') }}" required ></textarea>
            
                                {{-- @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
            
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('ステータス') }}</label>
            
                            <div class="col-md-6">
                                <select required class="" id="status_id" name="status_id">
                                    {{-- <option value="" hidden>ステータス ▼</option> --}}
                                    @foreach(config('status') as $index => $name)
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('登録') }}
                                    </button>
                                </div>
                            </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection