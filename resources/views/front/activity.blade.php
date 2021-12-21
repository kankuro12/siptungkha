<div class="p-3">
    @foreach ($activity as $new)

    <div class="single-news">
        <div class="news-title">
            <a href="">{{ $new->name }}</a>
        </div>
        {{-- <div class="news-date">
            &#128197;
        </div> --}}
        <div>
            <div class="row">
                <div class="col-4 text-center">
                    <img src="{{ asset($new->image) }}" class="news-image w-100" alt="">
                </div>
                <div class="col-8 d-flex align-items-center">
                    <div class="news-text">
                         {!! $new->detail !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach



 </div>
