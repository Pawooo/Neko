@props(['neko'])

<div class="neko-card">
    <div class="neko-img-mask"><img src="{{asset('/storage/'.$neko['img'])}}" alt="" class="neko-img">
        @auth
            <div data-edit-neko-btn>
                <a href="/neko/{{$neko['id']}}/edit">
                    <x-entypo-pencil />
                </a>
            </div>
        @endauth
    </div>
    <x-neko-tags :tags="json_decode($neko['tags'])"/>
    <h2 class="neko-name">{{$neko['name']}}</h2>
    <p class="neko-text">{{$neko['desc']}}</p>
    <a class="neko-browse" href="neko/{{$neko['id']}}">PURROFILE!</a>
</div>