<div class="bg-blue-100 rounded-lg p-4">
    <h3 class="font-blod text-xl mb-4">Following</h3>

    <ul>
        @foreach (current_user()->follows /* or friends */ as $user)
            <li class="mb-4">
                <div>
                    {{-- <a class="flex items-center text-sm"
                        href="{{ route('profiles', $user) }}"></a> --}}
                    <a class="flex items-center text-sm" href="{{ $user->path() }}">
                        <img class="rounded-full mr-2" src="{{ $user->avatar }}" alt="" width="40" height="40">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
