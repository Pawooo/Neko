@props(['tags']) 

<ul class="neko-tags">
    <x-fas-tags />
    @foreach($tags as $tag) 
        <li class="neko-tag"><a href="/?tag={{$tag}}">{{$tag}}</a></li>
    @endforeach
</ul>

