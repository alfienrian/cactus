<x-app-layout title="Tanya">
    <div class="flex gap-6 mt-12 ml-8 text-white">
        <x-user-avatar :avatar="Auth::user()->profile_img" class="flex-shrink-0" />
        <form action="/ask" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="relative">
                <p class="text-lg text-white mb-2 ml-1">{{ Auth::user()->name }}</p>
                <textarea x-data @keyup.ctrl.enter="$event.target.form.submit()" class="bg-transparent rounded-md pb-12" name="question"
                    cols="60" rows="10" placeholder="Tulis Pertanyaanmu Disini..."></textarea>
                <label for="ask-attachment" class="flex items-center gap-2 absolute bottom-2 left-2 bg-gray-950 w-[94%] py-3 pl-2">
                    <div class="cursor-pointer flex items-center gap-2">
                        @svg('heroicon-o-photo', ['class' => 'size-6'])
                        <span>Lampirkan gambar</span>
                    </div>
                    <input type="file" name="question_image" id="ask-attachment" hidden>
                </label>
            </div>
            <x-input-error :messages="$errors->get('question')" class="mt-2" />
            <x-input-error :messages="$errors->get('question_image')" class="mt-2" />
            <button type="submit" class="bg-slate-200 text-black rounded-full py-2 px-6 border mt-8">Posting!</button>
        </form>
    </div>
</x-app-layout>
