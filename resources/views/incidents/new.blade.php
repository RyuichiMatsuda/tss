@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <p>インシデント新規登録</p>

                    
                    <form method="POST" action="{{ route('incidents.store') }}">
                        @csrf

                        {{-- 電話発信者名 --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('電話発信者名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
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
                                <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('free_space') }}" required autofocus></textarea>

                                {{-- @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}

                            </div>
                        </div>

                        {{-- 対応社員登録 --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('顧客名') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="value_category" name="value_category_id" required>
                                    <option value="" hidden>▼価値観カテゴリー</option>
                                    @foreach($value_categories as $value_category)
                                        @if($company_value->value_category->id === $value_category->id )
                                            <option value="{{ $value_category->id }}" selected>{{ $value_category->title }}</option>
                                        @else
                                            <option value="{{ $value_category->id }}">{{ $value_category->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </form>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
