@if ($paginator->hasPages())
<div class="text-end pe-2 row">
    <div class="col-10">
        @if ($paginator->onFirstPage())
        <div class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></div>
        @else
        <div><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></div>
        @endif
    </div>
    <div class="col-2">
        @if ($paginator->hasMorePages())
        <div><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></div>
        @else
        <div class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></div>
        @endif
    </div>
</div>
@else

<div class="p-3">

</div>
@endif