@component('components.app')
    <div class="grid grid-col-9 gap-6">
        @forelse ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
                <img class="mr-4 rounded" src="{{ $user->avatar }}" alt="{{ $user->name }}'s avatar'" width="60" height="60">
                <div>
                    <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                </div>
            </a>
        @empty
            no user found.
        @endforelse
        {{ $users->links() }}
    </div>
@endcomponent
