<div>
    {{-- The Master doesn't talk, he acts. --}}


    @section('title', 'Create a new account')

    <div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{ route('home') }}">
                <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
            </a>

            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                Update account
            </h2>
            <div>
                @if (session()->has('updated'))
                <div class="inline-flex items-center w-full px-6 py-5 mb-3 text-base text-green-700 bg-green-100 rounded-lg alert alert-dismissible fade show"
                    role="alert">
                    <strong class="mr-1">Success !!!</strong> Account has been updated.
                    <button type="button"
                        class="box-content w-4 h-4 p-1 ml-auto border-none rounded-none opacity-50 text-black-900 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black-900 hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>

        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                    Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">Log
                    in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>


        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form wire:submit.prevent="updateUser">
                    <div>
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                            Name
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="name" id="name" type="text" value="{{ $name }}" required autofocus
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            Email address
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="email" id="email" type="email" value="{{ $email }}" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700">
                                Update Account
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
