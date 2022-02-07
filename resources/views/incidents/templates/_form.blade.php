
{{-- // #インシデント：部分テンプレート：フォーム --}}

<div class="card">
    <div class="card-header">{{ __('インシデント新規登録') }}</div>

    <div class="card-body">

        {{-- // #インシデント：投稿フォーム --}}
        <form method="POST" action="{{ route('incidents.store') }}">
            @csrf
            

            {{-- 電話発信者名 --}}
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('電話発信者名') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                    <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('free_space') }}" required autofocus></textarea>

                    {{-- @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}

                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">

                    
                    
                    <button Type="submit" class="btn btn-primary">
                        {{ __('登録') }}
                    </button>
                   

                    {{-- // #インシデント：非同期(Ajax) --}}
                    {{-- incident_btnを指定し、jQueryで呼べるようにしている。 --}}
                    {{-- submitされないように　btnではなく、divを使用する。 --}}
                    {{-- <div class="btn btn-primary incident_btn">
                        {{ __('登録') }}
                    </div> --}}
                </div>
            </div>

        </form>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
