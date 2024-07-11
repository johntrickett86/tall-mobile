@extends('layouts.app')

@section('content')
    <x-partials.headers.mobile-header-page :scroll-hide="false" title="Settings" />

    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-light-50/50 dark:bg-gradient-to-b dark:from-light-950 dark:to-light-900 min-h-screen">
        <div class="max-w-lg mx-auto" x-data="{
            themeModalOpen: false,
            currentTheme: localStorage.getItem('theme') || 'system',
            currentThemeLabel: '',
            notificationsEnabled: false,
            setTheme(theme) {
                if (theme === 'system') {
                    localStorage.removeItem('theme');
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                } else {
                    localStorage.setItem('theme', theme);
                    if (theme === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
                this.updateThemeLabel(theme);
            },
            updateThemeLabel(theme) {
                switch (theme) {
                    case 'light':
                        this.currentThemeLabel = 'Light';
                        break;
                    case 'dark':
                        this.currentThemeLabel = 'Dark';
                        break;
                    default:
                        this.currentThemeLabel = 'System Default';
                        break;
                }
            },
            init() {
                this.setTheme(this.currentTheme);
            }
        }" x-init="init()">

            @auth
                <div class="p-4 mb-6 flex items-center space-x-4 rounded-md">
                    <img src="{{ Auth::user()->avatar_url ?? asset('img/avatar-placeholder.png') }}" alt="{{ Auth::user()->name }}" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="text-lg font-medium text-light-900 dark:text-light-100">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-light-500 dark:text-light-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            @endauth

            <div class="p-4 rounded-md">
                <h2 class="text-sm text-light-900 dark:text-light-100">Display</h2>
                <div class="mt-4 space-y-4">
                    <button @click="themeModalOpen = true" class="w-full flex justify-between items-center p-4 bg-white dark:bg-light-800/50 rounded-md focus:outline-none h-20">
                        <div class="flex items-center">
                            <x-tabler-sun-high class="w-6 h-6 text-light-900 dark:text-light-100" />
                            <div class="ml-4 text-left">
                                <span class="text-sm font-medium text-light-900 dark:text-light-100">Theme</span>
                                <p class="text-xs text-light-600 dark:text-light-400" x-text="currentThemeLabel"></p>
                            </div>
                        </div>
                        <x-tabler-chevron-right class="w-6 h-6 text-light-600 dark:text-light-400" />
                    </button>
                    <div @click="notificationsEnabled = !notificationsEnabled" class="w-full flex justify-between items-center p-4 bg-white dark:bg-light-800/50 rounded-md cursor-pointer h-20">
                        <div class="flex items-center">
                            <x-tabler-notification class="w-6 h-6 text-light-900 dark:text-light-100" />
                            <div class="ml-4 text-left">
                                <span class="text-sm font-medium text-light-900 dark:text-light-100">Another Setting</span>
                                <p class="text-xs text-light-600 dark:text-light-400">with a description here</p>
                            </div>
                        </div>
                        <div @click.stop class="flex items-center justify-center space-x-2">
                            <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="notificationsEnabled">
                            <button
                                    x-ref="switchButton"
                                    type="button"
                                    @click="notificationsEnabled = !notificationsEnabled"
                                    :class="notificationsEnabled ? 'bg-primary-600 dark:bg-primary-600' : 'bg-light-200 dark:bg-light-700'"
                                    class="relative inline-flex h-6 py-0.5 focus:outline-none rounded-full w-10">
                                <span :class="notificationsEnabled ? 'translate-x-[18px]' : 'translate-x-0.5'" class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <x-modals.theme-modal />

            <script>
                function setTheme(theme) {
                    if (theme === 'system') {
                        localStorage.removeItem('theme');
                        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    } else {
                        localStorage.setItem('theme', theme);
                        if (theme === 'dark') {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    }
                }
            </script>
        </div>
    </div>
    <x-partials.mobile-toolbar
            :scroll-hide="true"
            :fab="false"
    />
@endsection
