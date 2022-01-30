@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <p>ここはindexです。</p>

                    @if(false)
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                    @endif
                    
                </div>
            </div>

            <table class="table table-striped">
                <thead class="thead-dark">
                  <tr><th>名前</th><th>ステータス</th><th>作成日</th><th colspan="2">概要</th><th colspan="2"></th></tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $incident)
                        <tr>
                            <td>{{ $incident->name }}</td>
                            <td>{{ config('47pref')[$incident->status_id] }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td colspan="4">{{ $incident->strlength() }}</td>
                            
                            <td><a href="{{ route('incidents.detail', ['id' => $incident->id]) }}"　class="btn btn-outline-primary btn-sm">詳細</a></td>
                            {{-- 
                            <td><a class="btn btn-outline-primary btn-sm">編集</a></td>
                            <td>
                            <form th:action="@{/book/delete}" method="post">
                                <button class="delete-action btn btn-outline-danger btn-sm" type="submit">削除</button>
                                <input type="hidden" name="id">
                                <input type="hidden" name="version">
                            </form>
                            </td>
                             --}}
                        </tr>
                    @endforeach

                </tbody>
              </table>

              <p><a href="{{ route('incidents.new') }}">新規インシデント登録へ</a></p>

        </div>
    </div>
</div>
@endsection
