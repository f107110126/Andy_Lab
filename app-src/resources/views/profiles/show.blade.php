@component('components.app')
    <header class="mb-6 relative">
        <img src="{{ url('/images/banner-sample.jpg') }}" alt="" class="mb-2">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div>
                <a href="" class="rounded-full border border-gray-300 mr-2 py-2 px-4 text-black text-xs">Edit Profile</a>
                <a href="" class="bg-blue-500 rounded-full  shadow py-2 px-4 text-white">Follow Me</a>
            </div>
        </div>
        <p class="text-sm">
            The name's Bugs. Bugs Bunny. Don't wear it out. Bugs is an anthropomorphic gray and white rabbit or hare who
            is famous for his flippant, insouciant personality. He is also characterized by a Brooklyn accent, his
            portrayal as a trickster, and his catch phrase "Eh ... What's up, doc?"
        </p>
        <img src="https://i.pravatar.cc/150?u={{ $user->email }}" alt="" class="rounded-full absolute"
            style="top: 138px; width: 150px; left: calc(50% - 75px)">

    </header>
    @include('_timeline', ['tweets' => $user->tweets])
@endcomponent
