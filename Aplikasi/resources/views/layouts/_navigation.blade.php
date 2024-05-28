@php
    $currentUser = Auth::user()->username;
@endphp

<nav class="flex flex-col max-h-screen overflow-y-auto sticky top-0 w-[320px] border-r-2 border-gray-800 p-6">
    <div class="flex-grow">
        <x-cactus-logo />
        <x-nav-link :active="request()->routeIs('home')" icon="heroicon-c-home" :href="route('home')">Beranda</x-nav-link>
        <x-nav-link :active="request()->path() === 'user/' . $currentUser" icon="heroicon-s-user" :href="route('user', [$currentUser])">Profil</x-nav-link>
        <x-nav-link :active="request()->routeIs('notification')" icon="heroicon-s-bell" :href="route('notification')">Notifikasi</x-nav-link>
        <x-nav-link :active="request()->routeIs('ask')" icon="heroicon-s-chat-bubble-bottom-center-text"
            :href="route('ask')">Tanya</x-nav-link>
        <x-nav-link :active="request()->routeIs('search')" icon="heroicon-o-magnifying-glass" :href="route('search.index')">Cari</x-nav-link>
    </div>

    <form action="/logout" method="post">
        @csrf
        <x-nav-link class="w-full" icon="heroicon-o-arrow-left-on-rectangle" type="submit">Logout</x-nav-link>
    </form>
</nav>
