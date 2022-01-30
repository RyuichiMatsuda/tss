@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マニュアル一覧') }}</div>
            

            <table class="table table-striped">
                <thead class="thead-dark">
                  <tr><th>名前</th><th>ステータス</th><th>作成日</th><th colspan="2">概要</th><th colspan="2"></th></tr>
                </thead>
                <tbody>
                    @foreach ($manuals as $manual)
                        <tr>
                            <td>{{ $manual->title }}</td>
                            <td>{{ $manual->created_at }}</td>
                            <td colspan="4">{{ $manual->strlength() }}</td>
                            
                            <td><a href="{{ route('manuals.detail', ['id' => $manual->id]) }}"　class="btn btn-outline-primary btn-sm">詳細</a></td>
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
</div>
@endsection
