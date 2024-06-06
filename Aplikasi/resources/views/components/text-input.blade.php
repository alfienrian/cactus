@props(['disabled' => false, 'rounded' => false, 'type' => 'text'])

@php
    $classes = $rounded
        ? 'border-gray-700 bg-gray-900 text-gray-300 focus:border-indigo-600 focus:ring-indigo-600 rounded-full shadow-sm pl-4'
        : 'border-gray-700 bg-gray-900 text-gray-300 focus:border-indigo-500 focus:border-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm pl-4';
@endphp

@if ($type === 'textarea')
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => $classes,
    ]) !!}></textarea>
@elseif ($type === 'password')
    <div x-data="{ show: false, toggle() { this.show = !this.show } }" class="relative">
        <input x-bind:type="show ? 'text' : 'password'" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' => $classes,
        ]) !!}>
        <x-heroicon-m-eye @click="toggle()" x-show="show"
            class="size-5 absolute right-3 top-3 text-slate-400" />
        <x-heroicon-m-eye-slash @click="toggle()" x-show="!show"
            class="size-5 absolute right-3 top-3 text-slate-400" />
        {{-- {{ $showPassword ? svg('heroicon-m-eye-slash', 'size-5 absolute right-3 top-3 text-slate-400') : svg('heroicon-m-eye', 'size-5 absolute right-3 top-3 text-slate-400') }} --}}
    </div>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => $classes,
        'type' => $type,
    ]) !!}>
@endif
