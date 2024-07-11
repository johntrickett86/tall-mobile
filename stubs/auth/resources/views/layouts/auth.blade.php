@extends('layouts.base')

@section('body')
    <div class="flex items-center justify-center min-h-screen py-4 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection
