<div class="">
    <div {{ $attributes->merge(['class' => 'flex items-center text-white gap-4 border-b border-b-neutral-600']) }}>
        <a href="{{ route('user', [Auth::user()->username, 'show' => 'questions']) }}"
            class="pb-2 border-b border-b-neutral-100">0 Pertanyaan</a>
        <a href="{{ route('user', [Auth::user()->username, 'show' => 'answers']) }}" class="pb-2">12 Jawaban</a>
    </div>
</div>
