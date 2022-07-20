@extends('layout')

@section('content')

<h1>Edit Neko {{$Neko['name']}}</h1>

<form id="neko-touroku" method="POST" action="/neko/{{$Neko['id']}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- Stops people from creating a form that targets my db and submitting BS data --}}
    {{-- <div id="post-cat-wrapper">
    </div> --}}
    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="name">
            Cat Name
        </label>
        <input type="text" name="name" placeholder="Pawner" value="{{$Neko['name']}}">

        @error('name')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>
    
    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="tags">
            Defining Features
        </label>
        <input type="text" name="tags" placeholder="Fluffy, Muffy, Duffy" value="{{str_replace(array('[', ']', '&quot;', '"'), '', $Neko['tags'])}}">

        @error('tags')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="dob">
            Birthday
        </label>
        <input type="date" name="dob" placeholder="Mar 23 2018" value="{{$Neko['dob']}}">
        
        @error('dob')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="desc">
            Description
        </label>
        <textarea type="text" name="desc" placeholder="Flufferson is looking for a family that enjoys fluffy times">{{$Neko['desc']}}</textarea>

        @error('desc')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="img">
            Photo
        </label>
        <input type="file" name="img" placeholder="One image of your Neko" accept=".jpg, .jpeg, .png, .pdf, .bmp">

        @error('img')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <fieldset>
            <legend class="neko-touroku-label-lg">Favorite Treat?</legend>
            <input type="checkbox" id="fish" name="palate[]" value="Fish" @if( is_array(old('palate')) && in_array('Fish', old('palate')) or str_contains($Neko['palate'], 'Fish')) checked @endif >
            <label for="palate">
                Fish
            </label>
            <input type="checkbox" id="meat" name="palate[]" value="Meat" @if( is_array(old('palate')) && in_array('Meat', old('palate')) or str_contains($Neko['palate'], 'Meat')) checked @endif >
            <label for="palate">
                Meat
            </label>
        </fieldset>

        @error('palate')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <fieldset>
            <legend class="neko-touroku-label-lg">Vaccinated?</legend>
                <label for="vaccines">Yes</label>
                <input type="radio" name="vaccines" value="1" {{ $Neko['vaccines'] == '1' ? 'checked' : ''}}>
           
           
                <label for="vaccines">No</label>
                <input type="radio" name="vaccines" value="0" {{ $Neko['vaccines'] == '0' ? 'checked' : ''}}>
        </fieldset>

        @error('vaccines')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="location">
            Where does he/she live?
        </label>
        <input type="text" name="location" placeholder="94950 Schmitt Dale Apt. 272 West Jalenborough, AL 74513" value="{{$Neko['location']}}">
    
        @error('location')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>


    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="breed">
                Breed?
        </label>
        <p>Pro Tip: select the dropdown and type the first letters of the breed to make your life easier</p>
        <select name="breed" id="breed">
            <option value="">--Please choose a breed--</option>
            {{-- Ternary? <option value="male" {{ old('name',$name)=='male' ? 'selected' : ''  }}>male</option>  --}}
            <option @if(old('breed', $Neko['breed']) === 'Ragdoll')selected @endif value="Ragdoll">Ragdoll</option>
            <option @if(old('breed', $Neko['breed']) === 'Maine Coon')selected @endif value="Maine Coon">Maine Coon</option>
            <option @if(old('breed', $Neko['breed']) === 'Persian')selected @endif value="Persian">Persian</option>
            <option @if(old('breed', $Neko['breed']) === 'American Shorthair')selected @endif value="American Shorthair">American Shorthair</option>
            <option @if(old('breed', $Neko['breed']) === 'British Shorthair')selected @endif value="British Shorthair">British Shorthair</option>
            <option @if(old('breed', $Neko['breed']) === 'Sphynx Cat')selected @endif value="Sphynx Cat">Sphynx</option>
            <option @if(old('breed', $Neko['breed']) === 'Abyssinian')selected @endif value="Abyssinian">Abyssinian</option>
            <option @if(old('breed', $Neko['breed']) === 'Bengal')selected @endif value="Bengal">Bengal</option>
            <option @if(old('breed', $Neko['breed']) === 'Siamese')selected @endif value="Siamese">Siamese</option>
            <option @if(old('breed', $Neko['breed']) === 'Scottish Fold')selected @endif value="Scottish Fold">Scottish Fold</option>
            <option @if(old('breed', $Neko['breed']) === 'Devon Rex')selected @endif value="Devon Rex">Devon Rex</option>
            <option @if(old('breed', $Neko['breed']) === 'Russian Blue')selected @endif value="Russian Blue">Russian Blue</option>
            <option @if(old('breed', $Neko['breed']) === 'Birman')selected @endif value="Birman">Birman</option>
            <option @if(old('breed', $Neko['breed']) === 'Himalayan')selected @endif value="Himalayan">Himalayan</option>
            <option @if(old('breed', $Neko['breed']) === 'Ocicat')selected @endif value="Ocicat">Ocicat</option>
            <option @if(old('breed', $Neko['breed']) === 'Siberian')selected @endif value="Siberian">Siberian</option>
            <option @if(old('breed', $Neko['breed']) === 'Egyptian Mau')selected @endif value="Egyptian Mau">Egyptian Mau</option>
            <option @if(old('breed', $Neko['breed']) === 'Japanese Bobtail')selected @endif value="Japanese Bobtail">Japanese Bobtail</option>
            <option @if(old('breed', $Neko['breed']) === 'Turkish Van')selected @endif value="Turkish Van">Turkish Van</option>
            <option @if(old('breed', $Neko['breed']) === 'Balinese')selected @endif value="Balinese">Balinese</option>
            <option @if(old('breed', $Neko['breed']) === 'Havana Brown')selected @endif value="Havana Brown">Havana Brown</option>
            <option @if(old('breed', $Neko['breed']) === 'Napoleon')selected @endif value="Napoleon">Napoleon</option>
        </select>

        @error('breed')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>


    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="purrsound">
            Purring Sound
        </label>
        <input type="file" name="purrsound" accept=".mp3, .aac, .flac, .ape, .wave, .wav" value="{{$Neko['purrsound']}}">

        @error('purrsound')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="neko-touroku-btn">Update Neko Card</button>

</form>

@endsection