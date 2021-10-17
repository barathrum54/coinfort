
<section class="mt-5 banner-wrap">
    @foreach ($ads1 as $ad)
        <div class="row banner-first-row">
            <div class="col text-center">
                <a href="{{$ad->url}}" style="width: fit-content">
                    <img src="{{ $ad->photo }}" class="banner-first" alt="">
                </a>
            </div>
        </div>

    @endforeach

</section>