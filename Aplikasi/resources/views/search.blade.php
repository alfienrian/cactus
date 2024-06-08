<x-app-layout title="Cari" sidebar>
    <form action="{{ request()->url() }}" method="get">
        <x-text-input rounded class="mb-4 w-full" placeholder="Cari" name="q"
            value="{{ $query }}" />
    </form>

    <div class="grid grid-cols-2 border-b border-b-neutral-600 w-full text-white text-center pb-2">
        <a href="{{ route('search.show', ['show' => 'questions', 'q' => $query]) }}">Pertanyaan</a>
        <a href="{{ route('search.show', ['show' => 'users', 'q' => $query]) }}">Pengguna</a>
    </div>

    <div class="flex flex-col gap-4 mt-4">
        @if ($query)
            @if ($results->count() !== 0)
                @foreach ($results as $q)
                    @if ($show === 'questions')
                        <x-cactus-post :name="$q['user']['name']" :username="$q['user']['username']" :avatar="$q['user']['profile_img']"
                            :date="$q['updated_at']" :text="$q['text']" :repliesCount="$q->answers->count()" :id="$q['id']"
                            type="question" :image="$q['image']" />
                    @elseif ($show === 'users')
                        <x-user-list :name="$q['name']" :username="$q['username']" :avatar="$q['profile_img']" />
                    @endif
                @endforeach
            @else
                @php
                    $category = $show === 'questions' ? 'pertanyaan' : 'pengguna';
                @endphp
                <div class="flex flex-col items-center gap-4 text-white mx-8 break-all">
                    @svg('heroicon-o-question-mark-circle', ['class' => 'size-28'])
                    <h1 class="text-3xl">Pencarian tidak ditemukan</h1>
                    <p class="text-base">Maaf kami tidak menemukan {{ $category }} dengan kata
                        kunci
                        :
                    </p>
                    <p>"{{ $query }}"</p>
                </div>
            @endif
        @else
            <div class="flex flex-col items-center gap-4 text-white mx-8 break-all">
                @svg('heroicon-o-magnifying-glass', ['class' => 'size-20'])
                <p class="text-base">Masukkan kata kunci untuk melakukan pencarian</p>
        @endif
    </div>
</x-app-layout>
