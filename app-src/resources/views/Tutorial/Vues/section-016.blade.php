@extends('Tutorial.Vues.layout')
@section('content')
    <div id="app">
        <form action="{{ route('vue.api.delete', 3) }}" method="post"
              v-ajax complete="ok, the post has been deleted.">
            @csrf
            @method('delete')
            <button>Delete Post</button>
        </form>
    </div>
    @include('Tutorial.Vues.section-016-script')
    <!-- <form method="POST" action="/posts/3" v-ajax complete="Okay, the post has been deleted."> -->
    <!--     {{ method_field('DELETE') }} -->
    <!--     {{ csrf_field() }} -->

    <!--     <button type="submit">Delete Post</button> -->
    <!-- </form> -->


@endsection
