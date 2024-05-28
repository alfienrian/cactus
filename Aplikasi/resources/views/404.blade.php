@auth
    <x-app-layout sidebar>
        <div class="flex flex-col items-center gap-4 text-white">
            @svg('heroicon-o-question-mark-circle', ['class' => 'size-48'])
            <h1 class="text-3xl">404</h1>
            <h2 class="text-2xl">Halaman Tidak Ditemukan</h1>
                <p class="text-base">Maaf halaman yang kamu cari sepertinya tidak ada atau sudah hilang</p>
        </div>
    </x-app-layout>
@endauth

@guest
    <x-guest-layout>
        <div class="bg-neutral-900 grid place-content-center w-full">
            <div class="flex flex-col items-center gap-4 text-white">
                @svg('heroicon-o-question-mark-circle', ['class' => 'size-48'])
                <h1 class="text-3xl">404</h1>
                <h2 class="text-2xl">Halaman Tidak Ditemukan</h1>
                    <p class="text-base">Maaf halaman yang kamu cari sepertinya tidak ada atau sudah hilang</p>
            </div>
        </div>
    </x-guest-layout>
@endguest
