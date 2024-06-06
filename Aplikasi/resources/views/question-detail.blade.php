@php
    $answers = $question->answers;
@endphp

<x-app-layout title="Pertanyaan" class="relative">
    <div class="text-white border-b border-b-gray-600 !px-0">
        <p class="text-lg ">{{ $question->text }}</p>
        <p class="text-base my-1">{{ $answers->count() }} balasan</p>
        @if ($question->image)
            <div class="w-full h-[320px] bg-gray-800 my-2 rounded-sm">
                <a href="{{ $question->image }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ $question->image }}" class="w-full h-full object-contain">
                </a>
            </div>
        @endif
    </div>

    <div class="py-2">
        <p class="text-neutral-400">Semua balasan yang terkait</p>
    </div>

    <div class="flex flex-col gap-8 mt-4 pb-[120px]">
        @foreach ($answers as $answer)
            <x-cactus-post 
                :name="$answer['user']['name']" 
                :username="$answer['user']['username']" 
                :avatar="$answer['user']['profile_img']" 
                :date="$answer['created_at']"
                :text="$answer['text']" 
                :id="$answer['id']"
                type="answer"
                />
        @endforeach
    </div>

    <div class="fixed bottom-8 w-[800px]">
        <x-input-error :messages="$errors->get('answer')" class="mb-2 ml-[65px]" />
        <form action="{{ Request::url() }}" method="POST" class="flex items-center gap-4">
            @csrf

            <x-user-avatar :avatar="Auth::user()->profile_img" class="!size-12" />
            <input type="hidden" name="user_id" value="{{ $question->user->id }}" />
            <x-text-input rounded name="answer" placeholder="Tambahkan balasan..."
                class="flex-1" />
            <x-primary-button rounded>Kirim Balasan</x-primary-button>
        </form>
    </div>

</x-app-layout>
