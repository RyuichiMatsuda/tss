{{-- // #インシデント：検索 --}}
<form method="GET" action="{{ route('incidents.search') }}" class="p-5" enctype="multipart/form-data">
    @csrf

    <div class="search_frame search_form">
        <input id="title" type="text" placeholder="キーワードで検索" name="title">
    </div>

    <button type="submit" id="uploadBtn" class="btn btn-outline-secondary">
        検索
    </button>
</form>


                        

{{-- //エラーメッセージ --}}
@if ($errors->any())
    <ul class="border border-red-400 bg-red-100 px-4 py-3 text-red-700 mb-10 w-4/5 m-auto">
    @foreach ($errors->all() as $error)
        <li style="color: red; font-size: 14px">{{$error}}</li>
    @endforeach
    </ul>
@endif
