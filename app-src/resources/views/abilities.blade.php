@extends('layout')

@section('header')
    <div id="header-featured">
        <div id="banner-wrapper">
            <div id="banner" class="container">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Abilities Check</h2>
                    <span class="byline">check your Abilities</span>
                </div>
                @auth
                    <ul>
                        @can('edit_forum')
                            <li><a href="#">Edit Forum</a></li>
                        @endcan
                        @can('edit_post')
                            <li><a href="#">Edit Post</a></li>
                        @endcan
                    </ul>
                @else
                    <a href="{{ route('login') }}" class="btn">Please Login</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
