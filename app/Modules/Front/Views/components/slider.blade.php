<div class="row">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach ($data as $index => $item)
                    <div class="item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset ('Themes/reine/images/sliders/' . $item->filename) }}" alt="{{ $item->filename }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
