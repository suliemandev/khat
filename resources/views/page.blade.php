<x-layout>
    <div class="aref-ruqaa-bold text-5xl leading-[60px] text-[#4a6049] px-2 py-2 pb-6">
        {{ $page->title }}
    </div>
    @if($page->image)
        <img class="w-full mb-3" src="/storage/{{ $page->image }}">
    @endif
    <div>
        {!! $page->content !!}
    </div>
</x-layout>

