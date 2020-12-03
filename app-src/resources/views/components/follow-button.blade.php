@if (auth()
        ->user()
        ->isNot($user))
    <form method="POST" action="{{ url("/profiles/{$user->name}/follow") }}">
        @csrf
        @if (auth()
        ->user()
        ->following($user))
            <button type="submit"
                class="flex items-center border border-blue-500 rounded-full shadow py-2 px-4 text-blue-500">Unfollow</button>
        @else
            <button type="submit" class="flex items-center bg-blue-500 rounded-full shadow py-2 px-4 text-white">Follow
                Me</button>
        @endif
    </form>
@endif
