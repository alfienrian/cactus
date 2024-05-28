@props(['disabled' => false, 'rounded' => false, 'type' => 'text', ''])

@php
    $classes = $rounded ? 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-full shadow-sm pl-4'
    : 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm pl-4';
@endphp

@if ($type === 'textarea')
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => $classes]) !!}></textarea>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => $classes ]) !!}>
@endif
