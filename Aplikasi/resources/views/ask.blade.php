<x-app-layout title="Tanya">
    <div class="flex gap-6 mt-12 ml-8 text-white">
        <x-user-avatar :avatar="Auth::user()->profile_img" />
        <form action="/ask" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="relative">
                <p class="text-lg text-white mb-2 ml-1">{{ Auth::user()->name }}</p>
                <textarea x-data @keyup.ctrl.enter="$event.target.form.submit()" class="bg-transparent rounded-md" name="question"
                    cols="45" rows="8" placeholder="Tulis Pertanyaanmu Disini..."></textarea>
                <label for="ask-attachment" class="flex items-center gap-2 absolute bottom-4 left-4">
                    <div class="relative w-max cursor-pointer flex items-center gap-2">
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
