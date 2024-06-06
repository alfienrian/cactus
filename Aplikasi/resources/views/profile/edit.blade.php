@php
    $user = Auth::user();
@endphp

<x-app-layout title="Edit Profil">
    <form action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <label for="profile_img">
            <div class="text-gray-900 relative w-max cursor-pointer">
                <x-user-avatar :avatar="$user->profile_img" class="!size-24" />
                @svg('heroicon-o-camera', ['class' => 'size-8 p-1 bg-neutral-300 rounded-full absolute -bottom-2 -right-2'])
            </div>
            <input name="profile_img" id="profile_img" type="file" hidden />
        </label>
        <x-input-error :messages="$errors->get('profile_img')" class="mt-2" />

        <div class="mt-8">
            <x-input-label for="name" value="Nama" class="!text-base !text-gray-500" />
            <x-underline-text-input name="name" :value="$user->name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="username" value="Nama Pengguna" class="!text-base !text-gray-500" />
            <x-underline-text-input name="username" :value="$user->username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="location" value="Lokasi" class="!text-base !text-gray-500" />
            <x-underline-text-input name="location" :value="$user->location" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="bio" value="Bio" class="!text-base !text-gray-500" />
            <x-underline-text-input name="bio" :value="$user->bio" />
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="Email" class="!text-base !text-gray-500" />
            <x-underline-text-input name="email" type="email" :value="$user->email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="mt-6" rounded>Simpan</x-primary-button>
    </form>
</x-app-layout>

<script>
    function selectImage(event) {
        const file = event.target.files[0]
        const reader = new FileReader()

        // Skip jika tidak ada file gambar
        if (event.target.files.length < 1) return
        
        reader.readAsDataURL(file)
        reader.onload = () => (this.imageUrl = reader.result)
    }
</script>
