<ul>
    <li><a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">Home</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="{{ url('/explore') }}">Explore</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="#">Notifications</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="#">Message</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="#">Bookmarks</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="#">Lists</a></li>
    {{-- <li><a class="font-bold text-lg mb-4 block"
            href="{{ route('profiles', auth()->user()) }}">Profile</a></li> --}}
    <li><a class="font-bold text-lg mb-4 block" href="{{ auth()->user()->path() }}">Profile</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="#">More</a></li>
</ul>
