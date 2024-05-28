{{-- @php
    print_r($users);
    die()
@endphp --}}

<x-app-layout title="Cari" sidebar>
    <form action="{{ request()->url() }}"
        method="get">
        <x-text-input rounded
            class="mb-4 w-full"
            placeholder="Cari"
            name="q"
        />
    </form>

    <div class="grid grid-cols-2 border-b border-b-neutral-600 w-full text-white text-center pb-2">
        <a href="{{ route('search.show', ['show' => 'questions', 'q' => $query]) }}">Pertanyaan</a>
        <a href="{{ route('search.show', ['show' => 'users', 'q' => $query]) }}">Pengguna</a>
    </div>

    <div class="flex flex-col gap-2 mt-4">
        @if ($questions ?? null)
            @foreach ($questions as $q)
                <x-cactus-post :name="$q['user']['name']"
                    :username="$q['user']['username']"
                    :avatar="$q['user']['profile_img']"
                    :date="$q['updated_at']"
                    :text="$q['text']"
                    :repliesCount="$q->answers->count()"
                    :id="$q['id']" />
            @endforeach
        @elseif ($users ?? null)
            @foreach ($users as $u)
                <x-user-list
                    :name="$u['name']"
                    :username="$u['username']"
                    :avatar="$u['profile_img']"
                />
            @endforeach
        @endif
    </div>
</x-app-layout>
