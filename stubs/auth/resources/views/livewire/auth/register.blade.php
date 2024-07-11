@section('title', 'Create a new account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600 dark:text-primary-500" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-light-900 dark:text-white leading-9">
            Create a new account
        </h2>

        <p class="mt-2 text-sm text-center text-light-600 dark:text-light-400 leading-5 max-w">
            Or
            <a href="{{ route('login') }}" class="font-medium text-light-500 dark:text-light-400 hover:text-primary-500 dark:hover:text-primary-400 focus:outline-none focus:underline transition ease-in-out duration-150">
                sign in to your account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white dark:bg-light-800/50 shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="name" class="block text-sm font-medium text-light-700 dark:text-light-400 leading-5">
                        Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" id="name" type="text" required autofocus
                                @class([
                                    'appearance-none block w-full px-3 py-2 border rounded-md placeholder-light-400 dark:placeholder-light-500 focus:outline-none focus:ring-primary-500 focus:border-primary-300 dark:focus:border-primary-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5',
                                    'border-light-300 dark:border-light-700' => !$errors->has('name'),
                                    'border-red-300 dark:border-red-500 text-red-900 dark:text-red-500 placeholder-red-300 dark:placeholder-red-500 focus:border-red-300 dark:focus:border-red-500 focus:ring-red' => $errors->has('name'),
                                ]) />
                    </div>

                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-light-700 dark:text-light-400 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required
                                @class([
                                    'appearance-none block w-full px-3 py-2 border rounded-md placeholder-light-400 dark:placeholder-light-500 focus:outline-none focus:ring-primary-500 focus:border-primary-300 dark:focus:border-primary-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5',
                                    'border-light-300 dark:border-light-700' => !$errors->has('email'),
                                    'border-red-300 dark:border-red-500 text-red-900 dark:text-red-500 placeholder-red-300 dark:placeholder-red-500 focus:border-red-300 dark:focus:border-red-500 focus:ring-red' => $errors->has('email'),
                                ]) />
                    </div>

                    @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-light-700 dark:text-light-400 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required
                                @class([
                                    'appearance-none block w-full px-3 py-2 border rounded-md placeholder-light-400 dark:placeholder-light-500 focus:outline-none focus:ring-primary-500 focus:border-primary-300 dark:focus:border-primary-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5',
                                    'border-light-300 dark:border-light-700' => !$errors->has('password'),
                                    'border-red-300 dark:border-red-500 text-red-900 dark:text-red-500 placeholder-red-300 dark:placeholder-red-500 focus:border-red-300 dark:focus:border-red-500 focus:ring-red' => $errors->has('password'),
                                ]) />
                    </div>

                    @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-light-700 dark:text-light-400 leading-5">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required
                               class="block w-full px-3 py-2 placeholder-light-400 dark:placeholder-light-500 border border-light-300 dark:border-light-700 appearance-none rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-300 dark:focus:border-primary-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary-600 dark:bg-primary-500 border border-transparent rounded-md hover:bg-primary-500 dark:hover:bg-primary-400 focus:outline-none focus:border-primary-700 dark:focus:border-primary-600 focus:ring-primary-500 active:bg-primary-700 dark:active:bg-primary-600 transition duration-150 ease-in-out">
                            Register
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
