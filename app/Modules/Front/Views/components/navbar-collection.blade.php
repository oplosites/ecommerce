<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Collection</span></a>
  <ul class="dropdown-menu">
      @foreach ($collections as $collection)
      <li><a href="/reine/{{ $collection->id }}">{{ $collection->title }}</a></li>
      @endforeach
  </ul>
</li>
