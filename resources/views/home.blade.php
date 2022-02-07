@extends('layouts.app')

@section('content')
<main class=" ms-sm-auto col-lg-10">
    <div class="row">
        <div class="col-lg-5 p-0 second_border">
            <div class="card second_bar">
                {{-- インシデント：一覧 S--}}
                <ul class="list-group list-group-flush nav">
                    @foreach ($incidents as $incident)
                        <li class="list-group-item">
                                <div class="row">
                                    {{-- インシデント：リンク：詳細 S--}}
                                    <div class="col">
                                        <a href="{{ route('incidents.detail', ['id' => $incident->id]) }}">
                                            {{ $incident->title }}
                                        </a>
                                    </div>
                                    <div class="alert-success col-md-4" role="alert">
                                        {{ config('status')[$incident->status_id] }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col small mt-3 pt-0">{{ $incident->user->name??"" }}</div>
                                    <div class="col-md-5 text-end small mt-3 pt-0">
                                        {{ $incident->created_at }}
                                    </div>
                                </div>
                        </li>
                    @endforeach
                </ul>
                {{-- インシデント：一覧 E--}}
            </div>
            <div class="text-end pe-3">
                << back next>>
            </div>
            <div class="">
                <div class="card" style="height: 16vh;">
                    <div class="card-body ms-4 mt-3 p-0">
                        <div class="btn-group " role="group"
                            aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="btnCheck1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnCheck1">未対応</label>

                            <input type="checkbox" class="btn-check" id="btnCheck2" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnCheck2">対応中</label>

                            <input type="checkbox" class="btn-check" id="btnCheck3" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnCheck3">対応済み</label>
                        </div>
                    </div>
                    <div class="input-group mb-3 ms-4" style="width: 90%;">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button"
                            id="button-addon2">検索</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 p-0 third_bar">
            <div class="card third_bar_card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">対応者</div>
                        <div class="alert-success col-md-2" role="alert">
                            対応済み
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">なんかタイトル的なやつ
                    </h5>
                    <p class="card-text">
                        インシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンtインシデンt
                    </p>
                </div>
            </div>
            <div class="card third_bar_card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">対応者</div>
                        <div class="alert-warning col-md-2" role="alert">
                            対応中
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card third_bar_card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">対応者</div>
                        <div class="alert-danger col-md-2" role="alert">
                            未対応
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card third_bar_card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card third_bar_card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="add_button">
                <span class="dli-plus"></span>
            </div>
        </div>
    </div>
</main>
@endsection
