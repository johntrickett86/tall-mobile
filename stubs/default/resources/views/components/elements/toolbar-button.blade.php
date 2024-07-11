@props(['href', 'active' => false, 'icon', 'label'])

@php
    $baseClasses = 'inline-flex flex-col items-center justify-center px-5 hover:bg-light-50 dark:hover:bg-light-800 group transition-all';
    $activeClasses = 'bg-light-50 dark:bg-light-800';
    $iconBaseClasses = 'w-5 h-5 mb-2 text-light-500 dark:text-light-300 group-hover:text-primary-600 dark:group-hover:text-primary-500';
    $iconActiveClasses = 'text-primary-600 dark:text-primary-500';
    $labelClasses = 'text-sm text-light-500 dark:text-light-300 group-hover:text-light-600 dark:group-hover:text-light-200';

    $classes = $active ? "$baseClasses $activeClasses" : $baseClasses;
    $iconClasses = $active ? "$iconBaseClasses $iconActiveClasses" : $iconBaseClasses;
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    <x-dynamic-component :component="'tabler-' . $icon" class="{{ $iconClasses }}" />
    <span class="{{ $labelClasses }}">{{ $label }}</span>
</a>
