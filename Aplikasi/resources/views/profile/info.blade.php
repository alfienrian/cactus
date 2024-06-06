@php
    $questions = $user->questions;
    $answers = $user->answers;
    $query = request()->query('show');
@endphp

<x-app-layout title="Profil">
    <div class="flex gap-10 pt-2">
        <div class="flex-shrink-0">
            <x-user-avatar :avatar="$user['profile_img']"
                class="!size-40" />
            @if ($user['username'] === Auth::user()->username)
                <x-secondary-button href="{{ route('profile.edit') }}"
                    class="block w-max mx-auto">Edit
                    Profil</x-secondary-button>
            @endif
        </div>

        <div class="text-white pt-1 break-all">
            <h2 class="text-2xl">{{ $user['name'] }}</h2>
            <p class="text-base text-gray-400 mb-4">{{ $user['username'] }}</p>
            <p class="flex items-center gap-2 mb-4">
                @svg('heroicon-c-map-pin', ['class' => 'size-6'])
                {{ $user['location'] }}
            </p>
            <p>{{ $user['bio'] }}</p>
        </div>
    </div>

    <div class="flex items-center text-white gap-4 border-b border-b-neutral-600 sticky top-0 mt-12 bg-gray-950">
        <a href="{{ route('user', [$user['username'], 'show' => 'questions']) }}"
            class="pb-2">{{ $questions->count() }} Pertanyaan</a>
        <a href="{{ route('user', [$user['username'], 'show' => 'answers']) }}"
            class="pb-2">{{ $answers->count() }}
            Jawaban</a>
    </div>

    <div class="flex flex-col gap-4 mt-6">
        @if ($query === 'answers')
            @foreach ($answers as $a)
                <x-cactus-post :name="$user['name']"
                    :username="$user['username']"
                    :text="$a['text']"
                    :id="$a['id']"
                    :date="$a['updated_at']"
                    :avatar="$user['profile_img']"
                    :image="$a['image']"
                    size="small"
                    type="answer" />
            @endforeach
        @else
            @foreach ($questions as $q)
                <x-cactus-post :name="$user['name']"
                    :username="$user['username']"
                    :text="$q['text']"
                    :id="$q['id']"
                    :date="$q['updated_at']"
                    :avatar="$user['profile_img']"
                    :image="$q['image']"
                    :repliesCount="$q->answers->count()"
                    size="small"
                    type="question" />
            @endforeach
        @endif
    </div>
</x-app-layout>
