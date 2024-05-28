@props([
    'text' => null,
    'name' => null,
    'username' => null,
    'date' => null,
    'avatar' => null,
    'questionId' => null,
])

<div {{ $attributes->merge(['class' => 'flex gap-6 px-4 py-2 border-b border-b-gray-400']) }}>
    <a href="{{ route('question.show', [$questionId]) }}">
        <div>
            <x-user-avatar :avatar="$avatar" class="flex-shrink-0" />
            <div class="text-white">
                <header class="flex items-center">
                    <p class="text-base">
                        <a href="{{ route('user', [$username]) }}"
                            class="text-gray-200 hover:underline">{{ $name }}</a>
                        mengomentari postingan anda
                    </p>
                </header>
                <p class="text-base">{{ $text }}</p>
            </div>
        </div>
    </a>
</div>
