@section('title', 'Sign in to your account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600 dark:text-primary-500" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-light-900 dark:text-white leading-9">
            Sign in to your account
        </h2>
        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-light-600 dark:text-light-400 leading-5 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium text-light-500 dark:text-light-400 hover:text-primary-500 dark:hover:text-primary-400 focus:outline-none focus:underline transition ease-in-out duration-150">
                    create a new account
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white dark:bg-light-800/50 shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-light-500 dark:text-light-400 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus
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
                    <label for="password" class="block text-sm font-medium text-light-500 dark:text-light-400 leading-5">
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

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-light-500 dark:text-light-400 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-light-900 dark:text-light-400 leading-5">
                            Remember
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-light-500 dark:text-light-400 hover:text-primary-500 dark:hover:text-primary-400 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary-600 dark:bg-primary-500 border border-transparent rounded-md hover:bg-primary-500 dark:hover:bg-primary-400 focus:outline-none focus:border-primary-700 dark:focus:border-primary-600 focus:ring-primary-500 active:bg-primary-700 dark:active:bg-primary-600 transition duration-150 ease-in-out">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
