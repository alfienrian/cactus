@props(['user'])

@php
    $user = Auth::user();
@endphp

<aside class="w-[300px] max-h-screen sticky top-0 border-l-gray-800 border-s-2">
    <div class="rounded-lg m-4 p-8 border border-gray-600 dark:text-white text-center">
        <x-user-avatar :avatar="$user->profile_img" class="mb-2 mx-auto" />

        <h2 class="text-lg">{{ $user->name ?? "" }}</h2>
        <h3 class="flex items-center justify-center gap-1 mt-2">
            @svg('heroicon-c-map-pin', ['class' => 'size-6'])
            {{ $user->location ?? "" }}
        </h3>
    </div>
</aside>