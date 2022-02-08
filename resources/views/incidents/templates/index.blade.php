{{-- インシデント：一覧 S--}}
<ul class="list-group list-group-flush nav">
  {{-- // foreachのブロック変数を$incidentにすると、$incidentに値が残り、投稿フォームに最後のincidentが残る。 --}}
  @foreach ($incidents as $incident_object)
  <li class="list-group-item" incident_id="{{ $incident_object->id}}">
      <div class="row">
          {{-- インシデント：リンク：詳細 S--}}
          <div class="col">
              <a href="{{ route('incidents.detail', ['id' => $incident_object->id]) }}">
                  {{ $incident_object->title }}
              </a>
          </div>
          <div class="alert-success col-md-4" role="alert">
              {{ config('status')[$incident_object->status_id] }}
          </div>
      </div>
      <div class="row">
          <div class="col small mt-3 pt-0">{{ $incident_object->user->name??"" }}</div>
          <div class="col-md-5 text-end small mt-3 pt-0">
              {{ $incident_object->created_at }}
          </div>
      </div>
  </li>
  @endforeach
</ul>
{{-- インシデント：一覧 E--}}

{{-- #インシデント：ページネーション --}}
{{-- {{ $incidents->links('vendor.pagination.semantic-ui') }} --}}
{{ $incidents->links('vendor.pagination.simple-default') }}
{{-- {{ $incidents->links()}} --}}