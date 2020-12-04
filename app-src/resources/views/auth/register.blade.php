@component('components.app')
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="username"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Username') }}</label>


                        <input id="username" type="text"
                            class="border border-gray-400 p-2 w-full @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                            <p class="text-red-500 text-xs-mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Name') }}</label>


                        <input id="name" type="text"
                            class="border border-gray-400 p-2 w-full @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <p class="text-red-500 text-xs-mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email"
                            class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <p class="text-red-500 text-xs-mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Password') }}</label>


                        <input id="password" type="password"
                            class="border border-gray-400 p-2 w-full @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <p class="text-red-500 text-xs-mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="password-confirm"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="border border-gray-400 p-2 w-full"
                            name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <div>
                        <button type="submit" class="px-6 py-3 rounded text-sm uppercase bg-blue-600 text-white">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
