<ul>
    <li><a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">Home</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="{{ url('/explore') }}">Explore</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="{{ current_user()->path() }}">Profile</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="#">More</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="submit" class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>
