<x-app-layout title="Beranda" sidebar>
    <div class="flex flex-col gap-8">
        @foreach ($questions as $q)
            <x-cactus-post 
                :text="$q->text" 
                :name="$q->user->name" 
                :username="$q->user->username"
                :date="$q->updated_at" 
                :image="$q->image"
                :repliesCount="$q->answers_count"
                :avatar="$q->user->profile_img"
                :id="$q->id"
                type="question"
            />
        @endforeach
    </div>
</x-app-layout>
