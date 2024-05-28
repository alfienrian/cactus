<x-app-layout title="Notifikasi" class="!px-0 !max-w-full">
    <div class="flex items-center justify-between text-white border-b border-gray-400 pb-2 px-6">
        <h2 class="text-xl">Notifikasi</h2>
        <button class="bg-transparent border-0 hover:underline">Tandai semua sudah dibaca</button>
    </div>

    @foreach ($notifications as $n)
        <x-notification-post 
            :name="$n->answer->user->name" 
            :text="$n->answer->text" 
            :username="$n->answer->user->username" 
            :avatar="$n->answer->user->profile_img"
            :date="$n->answer->updated_at"
            :questionId="$n->answer->question_id"
        />
    @endforeach
</x-app-layout>
