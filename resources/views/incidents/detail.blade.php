@extends('layouts.app')

@section('content')
<main class=" ms-sm-auto col-lg-10">
    <div class="row">
        <div class="col-lg-5 p-0 second_border">
            <div class="card second_bar">
                <div class="card-header">{{ __('インシデント詳細画面') }}</div>

                <div class="card-body">

                    <div class="row mb-3">
                        <p>{{ $incident->id }}</p>
                        <p>作成者：{{ $incident->user->name}}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 text-end">{{ __('電話発信者名') }}</label>

                        <div class="col-md-6">
                            {{ $incident->title }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 text-end">{{ __('概要') }}</label>

                        <div class="col-md-6">
                            {{  $incident->body  }}
                        </div>
                    </div>

                    <p>インシデントステータス:</p>

                    <p><a href="{{ route('home') }}">一覧ページへ</a></p>
                    {{-- <p><a href="{{ route('incidents.new') }}">新規インシデント登録へ</a></p> --}}
                    <p>
                    <form method="POST" action="{{ route('incidents.destroy') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$incident->id}}">
                        <input type="submit" value="削除" class="btn btn-danger post_del_btn"
                            onclick="return confirm('削除しますか ?');">
                    </form>
                    </p>


                    <p>{{ __('スレッド追加') }}</p>
                    <div>
                        {{-- // #インシデント：部分テンプレート：編集フォーム --}}
                        @include('threads.templates.form', ['incident'=>$incident, 'thread'=>$thread])
                    </div>
                    
                </div>

            </div>
        </div>


        <div class="col-lg-7 p-0 third_bar">
            <div class="card third_bar_card">

                @foreach ($incident->threads as $thread)
                <div class="card-header">
                    <div class="row">
                        <div class="col">作成者：{{ $thread->user->name??""}}</div>
                        <div class="alert-success col-md-2" role="alert">
                            {{ config('status')[$thread->status_id] }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $thread->title??""}}</h5>
                    <p class="card-text">
                        {{ $thread->body??""}}
                    </p>
                    <p class="">
                        {{ $incident->created_at }}
                    </p>


                    {{-- スレッド：リンク：編集 --}}
                    <a href="{{ route('threads.edit', ['id' => $thread->id]) }}">
                        編集
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection