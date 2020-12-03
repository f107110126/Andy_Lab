@component('components.app')
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{ url('/images/banner-sample.jpg') }}" alt="" class="mb-2">
            <img src="{{ $user->avatar }}" alt=""
                class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" width="150"
                style="left: 50%">
            {{-- style="left: 50%; transform:translateX(-50%) translateY(50%)"
            --}}
        </div>
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                {{--
                @if (current_user()->is($user))
                @endif
                --}}
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}"
                        class="flex items-center rounded-full border border-gray-300 mr-2 py-2 px-4 text-black text-xs">Edit
                        Profile</a>
                @endcan
                {{-- <x-follow-button :user="$user"></x-follow-button>
                --}}
                @component('components.follow-button', ['user' => $user])
                @endcomponent
            </div>
        </div>
        <p class="text-sm">
            The name's Bugs. Bugs Bunny. Don't wear it out. Bugs is an anthropomorphic gray and white rabbit or hare who
            is famous for his flippant, insouciant personality. He is also characterized by a Brooklyn accent, his
            portrayal as a trickster, and his catch phrase "Eh ... What's up, doc?"
        </p>

    </header>
    @include('_timeline', ['tweets' => $user->tweets])
@endcomponent
