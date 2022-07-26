
        @extends('layout')

        @section('content')
        
        <h1 data-page="top-page">Help these cuties find a new home</h1>
        <div class="splide" role="group" aria-label="Splide Basic HTML Example">
          <div class="splide__track">
                <ul class="splide__list">
                   
                    {{-- With this setup you cannot random more than 6 images, because for each page you pull only 6 for your pagination (This should probably get fixed if I rewrite my route to include whole model, which should allow me to access the whole thing and do it like below)     
                    Model::select('column')
                        ->where('column','value')
                        ->inRandomOrder()
                        ->limit(2) // here is yours limit
                        ->get();

                    Neko::select('img')
                        ->where('img', '')
                        ->inRandomOrder()
                        ->limit(6)
                        ->get()
                    --}}
                    @foreach ($randImgs as $randImg)
                        <li class="splide__slide"><img class="splide__img" src="{{secure_asset('/storage/'.$randImg['img'])}}" alt="Cat Carousel Image"></li>
                    @endforeach
                    {{-- Ideal static output in case you want it
                        <li class="splide__slide"><img class="splide__img" src="/img/alvan-nee-ZCHj_2lJP00-unsplash.jpg" alt=""></li>
                        <li class="splide__slide"><img class="splide__img" src="/img/daria-shatova-46TvM-BVrRI-unsplash.jpg" alt=""></li>
                        <li class="splide__slide"><img class="splide__img" src="/img/jae-park-7GX5aICb5i4-unsplash.jpg" alt=""></li>
                        <li class="splide__slide"><img class="splide__img" src="/img/karina-vorozheeva-rW-I87aPY5Y-unsplash.jpg" alt=""></li>
                        <li class="splide__slide"><img class="splide__img" src="/img/lloyd-henneman-mBRfYA0dYYE-unsplash.jpg" alt=""></li>
                        <li class="splide__slide"><img class="splide__img" src="/img/modcatshop-pdALzg0yN-8-unsplash.jpg" alt=""></li>
                        <li class="splide__slide"><img class="splide__img" src="/img/tran-mau-tri-tam-FbhNdD1ow2g-unsplash.jpg" alt=""></li> --}}
                </ul>
          </div>
        </div>
        <section>
            <div>
                <img class="splide__img" src="storage/nekoimg/tran-mau-tri-tam-FbhNdD1ow2g-unsplash.jpg" alt="">
            </div>
        </section>
        <section id="searchbar-wrapper">
            @include('partials._search')
        </section>
        <section>
            <h1>Neko Cards</h1>
            <div class="neko-card-wrapper">
                @foreach ($nekos as $neko)
                    <x-neko-card :neko="$neko"/>
                @endforeach
            </div>
            <div class="pagination">
                {{$nekos->links()}}
            </div>
        </section>
        {{-- <section>
            <h1>Add my kittie</h1>
        </section> --}}
@endsection