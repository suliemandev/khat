@php
    $aboutPage = \App\Models\Page::where('slug', 'about')->first();

    $categories = \App\Models\Category::where('featured', true)
                    ->with(['articles' => function ($query) {
                        $query->latest()->take(2);
                    }])->get();
@endphp

<x-layout>
    <div class="border border-stone-200 p-4 mb-4 relative">
        <div class="text-5xl font-bold text-[#4a6049] flex items-center gap-2 aref-ruqaa-bold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="w-[70px] flex-shrink-0 stroke-current" baseProfile="basic">
                <polygon fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="33.277,42.985 33.277,44.554 35.009,45.554 36.741,44.554 36.741,42.985 37.607,42.485 41.071,37.485 41.071,11.485 39.339,10.485 39.339,9.485 35.012,6.983 30.679,9.485 30.679,10.485 28.947,11.485 28.947,37.485 32.411,42.485"/><polygon fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="26.262,41.035 28.947,39.485 9.894,28.485 9.894,23.485 17.689,18.985 26.349,18.985 23.751,17.485 15.048,17.461 7.296,21.985 7.296,30.086"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="35.009,44.985 35.009,14.985 28.947,11.485 35.009,14.985 41.071,11.485"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="33.257,42.733 34.989,43.619 36.721,42.733"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="28.947,37.485 35.009,40.985 41.071,37.485"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="28.947,13.485 35.009,16.985 41.071,13.485"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="41.071,14.485 35.009,17.985 28.947,14.485"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="30.679,10.485 30.679,11.485 35.009,13.985 39.339,11.485 39.339,10.485"/><polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5" points="39.339,9.485 35.009,11.985 30.679,9.485"/><line x1="35.009" x2="35.009" y1="13.985" y2="11.985" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".5"/>
            </svg>
            خطنا
        </div>

        <div class="mt-4 flex flex-col gap-3 items-end">
            {{ $aboutPage->summary }}
            <a href="/about" class="bg-[#4a6049] hover:bg-[#4a6049]/80 text-white px-4 py-1">
                المزيد
            </a>
        </div>

        <div class="flex gap-3 p-4 absolute top-0 end-0 text-stone-700">
            <a href="#">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
            </a>

            <a href="#">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
            </a>

            <a href="#">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"/></svg>
            </a>
        </div>
    </div>

    @foreach($categories as $category)
        <a href="/categories/{{ $category->slug }}" class="text-[#4a6049] flex items-start gap-2 aref-ruqaa-bold p-4">
            {!! $category->icon !!}
            <div class="text-5xl mt-2 inline-flex px-2 py-0.5 aref-ruqaa-bold font-bold">
                {{ $category->title }}
            </div>
        </a>
        
        <div class="flex gap-4 items-start">
            @foreach($category->articles as $article)
                <a href="/articles/{{ $article->slug }}" class="border border-stone-200 mb-4 w-1/2">
                    <img class="h-[300px] w-full object-cover" src="/storage/{{ $article->image }}">
                    <div class="text-[#4a6049] flex flex-col items-start gap-2 aref-ruqaa-bold p-4">
                        <div class="text-5xl leading-[60px] text-white bg-[#4a6049] px-2 py-2 pb-6">
                            {{ str()->limit($article->title, 35) }}
                        </div>
                        {{-- <div class="inline-flex mt-2 inline-flex px-2 py-0.5 text-stone-100 text-sm font-vazirmatn-bold bg-[#4a6049]">
                            {{ $article->category->title }}
                        </div> --}}
                    </div>
                </a>
            @endforeach
        </div>
    @endforeach

    <div class="border border-stone-200 p-10 mb-4 relative items-center justify-center flex flex-col gap-6">
        <h3 class="aref-ruqaa-bold text-4xl">اكتبوا لنا</h3>
        <div class="flex gap-3">
            <input type="" name="" class="border border-stone h-9 w-full max-w-sm px-5" placeholder="email@email.com">
            <button class="bg-[#4a6049] text-white px-8 py-1">ارسل</button>
        </div>
    </div>
</x-layout>

