@extends('layouts.app')

@section('content')
<main class=" ms-sm-auto col-lg-10">
    <div class="row">
        <div class="col-lg-5 p-0 second_border">
            <div class="card second_bar">
                <div class="card-header">{{ __('スレッド編集フォーム') }}</div>
                  {{-- // #スレッド：部分テンプレート：編集フォーム --}}
                @include('threads.templates.form', ['incident'=>$incident, 'thread'=>$thread])

                <form method="POST" action="{{ route('threads.destroy') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$thread->id}}">
                    <input type="submit" value="削除" class="btn btn-danger post_del_btn"
                        onclick="return confirm('削除しますか ?');">
                </form>
            </div>
        </div>

        <div class="col-lg-7 p-0 third_bar">
            <div class="card third_bar_card">
                

            </div>
        </div>
    </div>
</main>
@endsection