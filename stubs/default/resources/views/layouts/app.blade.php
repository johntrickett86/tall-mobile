@extends('layouts.base')

@section('body')
    <div class="pt-16 pb-16 lg:pt-0 lg:pb-0 ">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
