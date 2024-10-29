
<x-layout>
    <div class="aref-ruqaa-bold text-5xl leading-[60px] text-[#4a6049] px-2 py-2 pb-6">
        {{ $category->title }}
    </div>

    <div class="flex flex-col gap-3">
        @foreach($articles as $article)
            <a href="/articles/{{ $article->slug }}" class="border p-4 flex gap-3">
                <!-- @if($article->image)
                    <img class="w-[200px]" src="/storage/{{ $article->image }}">
                @else
                    <div class="w-[200px]"></div>
                @endif -->

                <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
            </a>
        @endforeach
    </div>

    <div class="flex items-center">
        {{ $articles->links() }}
    </div>
</x-layout>

