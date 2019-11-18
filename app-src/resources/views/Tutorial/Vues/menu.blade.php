@extends('Tutorial.Vues.layout')
@section('content')@if (isset($list) && $list->count() > 0)
    <ul class="list-group">
        @foreach($list as $item)
            <li class="list-group-item">
                <a href="{{ route('vue.section', $item->index) }}">Episode {{ $item->index }} - {{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
