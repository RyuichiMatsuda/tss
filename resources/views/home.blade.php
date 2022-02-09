@extends('layouts.app')

@section('content')
<main class=" ms-sm-auto col-lg-10">
    <div class="row">
        <div class="col-lg-5 p-0 second_border">
            <div class="card second_bar">
                {{-- インシデント：部分テンプレート：一覧--}}
                @include('incidents.templates.index', ['incidents'=>$incidents])
            </div>
            
            {{ $incidents->links('vendor.pagination.simple-default') }}

            <div class="">
                <div class="card" style="height: 16vh;">
                    <div class="card-body ms-4 mt-3 p-0">
                        <div class="btn-group " role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="btnCheck1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnCheck1">未対応</label>

                            <input type="checkbox" class="btn-check" id="btnCheck2" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnCheck2">対応中</label>

                            <input type="checkbox" class="btn-check" id="btnCheck3" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnCheck3">対応済み</label>
                        </div>
                        
                    </div>


                        @include('incidents.templates.search_bar')

                    
                </div>
            </div>
        </div>

        <div class="col-lg-7 p-0 third_bar">
            <div id="ajax_threads" class="ajax_threads">
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
            </div>


            {{-- ここに作る --}}

        </div>
    </div>
</main>
@endsection