@extends('layout')
@section('content')
    <h1 class="neko-big-name">{{$Neko['name']}}</h1>
    <div class="neko-card-wrapper">
        <div class="neko-big-img-wrapper"><img src="{{asset('/storage/'.$Neko['img'])}}" alt="" class="neko-big-img">
        <div class="neko-btn-block">
            <button data-edit-neko-btn>
                <a href="./{{$Neko['id']}}/edit">
                    <x-entypo-pencil />
                </a>
            </button>
            
            <form id="neko-card-delete-form" method="POST" action="/neko/{{$Neko['id']}}">
                @csrf
                @method('DELETE')
                <button data-delete-neko-btn>
                    {{-- <a href="./{{$Neko['id']}}/delete"> --}}
                        <x-bxs-trash-alt />
                    {{-- </a> --}}
                </button>
            </form>
        </div>
    </div>
        {{-- {{dd($Neko['img']);}} --}}
        <div class="neko-big-card">
            <div class="neko-details">
                <p>
                    <x-neko-tags :tags="json_decode($Neko['tags'])"/>
                </p>
                <p>
                    <x-fluentui-text-bullet-list-square-20 />
                    {{$Neko['desc']}}
                </p>
                <p>
                    <x-fas-syringe /> 
                    @if($Neko['vaccines'] = 1)
                        <x-fas-plus />
                    @else
                        <x-fas-minus />
                    @endif
                </p>
                @if($Neko['purrsound']) 
                <p>
                    <x-elusive-speaker />
                    <audio controls src="{{asset('/storage/'.$Neko['purrsound'])}}"></audio>
                    {{-- Purring Sound --}}
                </p>
                @endif
                @if($Neko['dob'])
                <p>
                    <x-heroicon-o-cake />
                    {{$Neko['dob']}}
                </p>
                @endif
                @if($Neko['location'])
                <p>
                    <x-fas-search-location />
                    {{$Neko['location']}}
                </p>
                @endif
                <p>
                    <x-phosphor-tree-structure />
                    {{$Neko['breed']}}
                </p>
                @if($Neko['palate'])
                <p>
                    <x-fluentui-food-apple-20 />
                    {{$Neko['palate'] = implode(', ', json_decode($Neko['palate']))}}
                </p>
                @endif
            </div>
            <a class="neko-browse" data-btn="rainbow" href="#">PURRFECT MATCH</a>
        </div>
    </div>
    <dialog id="cat-apply">
        <form method="dialog" action="/"> 
            @csrf
        {{-- method = "dialogue" --}}
            <div data-dialog-close>
                <x-vaadin-close />
            </div>
            <h2>Neko Application Form</h2>
            {{-- <x-css-close /> --}}
            <label for="Name">How should we call you?</label>
            <input name="Name" type="text">
            <label for="contact-info">How should we contact you?</label>
                <select name="contact-info" id="contact-info">
                    <option value="email">
                        e-mail
                    </option>    
                    <option value="phone">
                        Phone
                    </option>
                    <option value="fucks">
                        FAX
                    </option>
                    <option value="telegramID" name="telegramID">
                        Telegram ID
                    </option>
                </select>
                <input type="text" name="contact-info">
            <button value="applied" id="cat-apply-submit-btn" type="submit">
                Apply for adoption
            </button>
            {{-- <input type="text" name="telegramID">
            <input type="text" name="fucks">
            <input type="text" name="phone">
            <input type="email" name="email">     --}}
        </form>
    </dialog>

@endsection