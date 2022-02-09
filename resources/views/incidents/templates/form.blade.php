{{-- // #インシデント：部分テンプレート：フォーム --}}

{{-- <div class="card"> --}}
    <div class="card-header">{{ __('インシデントフォーム') }}</div>

    {{-- <div class="card-body"> --}}
        {{-- {{dd($incident) }} --}}

        {{-- // #インシデント：投稿フォーム --}}
        <form method="POST" action="{{ route('incidents.store') }}">
            @csrf

            <input type="hidden" id="" name="id" value={{$incident->id}}>
            {{-- <input type="hidden" id="" name="incident_id" value={{$incident->id}}> --}}

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('タイトル') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title', $incident->title) }}" required>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('インシデント概要') }}</label>

                <div class="col-md-6">
                    <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body"
                        value="{{ old('body') }}" required>{{$incident->body}}</textarea>

                    {{-- @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror --}}

                </div>
            </div>

            {{-- // #インシデント：投稿フォーム：セレクト --}}
            <select required class="" id="status_id" name="status_id">
                {{-- <option value="" hidden>ステータス ▼</option> --}}
                @foreach(config('status') as $index => $name)
                @if($index === $incident->status_id)
                <option value="{{ $index }}" selected>{{ $name }}</option>
                @else
                <option value="{{ $index }}">{{ $name }}</option>
                @endif
                @endforeach
            </select>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">


                    <button Type="submit" class="btn btn-primary">
                        {{ __('送信') }}
                    </button>


                    {{-- // #インシデント：非同期(Ajax)：incident_btnを指定し、jQueryで呼べるようにしている。 --}}
                    {{-- <div class="btn btn-primary incident_btn">
                        {{ __('更新') }}
                    </div> --}}
                </div>
            </div>

        </form>
    </div>