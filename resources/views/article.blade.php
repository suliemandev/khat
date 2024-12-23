<x-layout>
    <div class="aref-ruqaa-bold text-5xl leading-[60px] text-[#4a6049] px-2 py-2 pb-6">
        {{ $article->title }}
    </div>
    @if($article->image)
        <img class="w-full mb-3" src="/storage/{{ $article->image }}">
    @endif
    <div>
        {!! $article->content !!}
    </div>
</x-layout>

