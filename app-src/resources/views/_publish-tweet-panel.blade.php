<div class="border border-blue-400 rounded-lg py-6 px-8 mb-8">
    <form method="POST" action="{{ url('/tweets') }}">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up doc?"></textarea>
        <hr class="mb-4">
        <footer class="flex justify-between">
            {{-- <img src="https://i.pravatar.cc/40?u={{ auth()->user()->email }}" alt=""
                class="rounded-full mr-2"> --}}
            <img src="{{ current_user()->avatar }}" alt="your avatar" class="rounded-full mr-2" width="50" height="50">
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Publish</button>
        </footer>
    </form>
    @error('body')
        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
