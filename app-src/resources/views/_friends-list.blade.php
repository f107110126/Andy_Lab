<div class="bg-gray-200 border border-gray-300 runded-lg py-4 px-6">
    <h3 class="font-blod text-xl mb-4">Following</h3>

    <ul>
        @forelse (current_user()->follows /* or friends */ as $user)
            <li class="{{$loop->last ? '' : 'mb-4'}}">
                <div>
                    {{-- <a class="flex items-center text-sm"
                        href="{{ route('profiles', $user) }}"></a> --}}
                    <a class="flex items-center text-sm" href="{{ $user->path() }}">
                        <img class="rounded-full mr-2" src="{{ $user->avatar }}" alt="" width="40" height="40">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <li>No fiends yet.</li>
        @endforelse
    </ul>
</div>
