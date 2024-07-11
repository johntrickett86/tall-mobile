@props(['href', 'active' => false, 'icon', 'label'])

@php
    $baseClasses = 'inline-flex flex-col items-center justify-center px-5 group transition-all';
    $hoverClasses = 'hover:bg-light-50 dark:hover:bg-light-800';
    $iconBaseClasses = 'w-5 h-5 mb-2 ';
    $iconColorClasses = 'text-light-500 dark:text-light-300 group-hover:text-primary-600 dark:group-hover:text-primary-500';
    $textColorClasses = 'text-sm text-light-500 dark:text-light-300 group-hover:text-light-600 dark:group-hover:text-light-200';

    if ($active) {
        $baseClasses = 'inline-flex flex-col items-center justify-center px-5 group transition-all bg-light-50 dark:bg-light-800';
        $iconColorClasses = 'text-primary-600 dark:text-primary-500';
        $textColorClasses = 'text-sm text-light-600 dark:text-light-200';
    }
@endphp

<a href="{{ $href }}" class="{{ $baseClasses }}{{ $hoverClasses }}">
    <x-dynamic-component :component="'tabler-' . $icon" class="{{ $iconBaseClasses }}{{ $iconColorClasses }}" style="stroke-width: 1" />
    <span class="{{ $textColorClasses }}">{{ $label }}</span>
</a>
