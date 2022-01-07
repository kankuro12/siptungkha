@extends('front.layouts.app')
@section('content')

  {{-- <div class="owl-carousel" style="z-index: 0 !important;">
        <div class="slider-item">
            <img class="w-100" src="{{ asset('front/img/slider.jpg') }}" alt="">
            <button class="slider-btn">
            view More
            </button>
        </div>
  </div> --}}

  <div class="container-custom">
      <div class="mt-2">
          <h2 class="widget-text">Welcome</h2>
          <img class="w-100" src="{{ asset(custom_config('banner_image')->value) }}" alt="">
      </div>
    <div class="row my-3">
        <div class="col-lg-5 h-350">
            <div class="text-center mb-3" style="background: rgb(230, 226, 226); padding:10px;">
                <h6> {!! custom_config('about')->value !!}</h6>
            </div>
        <div class="tabs" id="main-tab">
          <div class="tab-btn-bar" >
            <button class="tab-btn active" data-of="main-tab" data-for="news">News</button>
            <button class="tab-btn" data-of="main-tab" data-for="events">Events</button>
            <button class="tab-btn" data-of="main-tab" data-for="activity">Activities</button>
          </div>
          <div class="tab-container">
            <div class="tab-item active" id="news">@include('front.news')</div>
            <div class="tab-item " id="events">@include('front.event')</div>
            <div class="tab-item " id="activity">@include('front.activity')</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="updates h-350">
          <div class="updates-title">
            Updates
          </div>
          {{-- <marquee behavior="" onmouseover="this.stop();" onmouseout="this.start();" direction="up"> --}}
              <ul class="updates-list">
                @foreach ($notices as $item)
                    <li> <a href="{{ route('notice.single',$item->id)}}">{{ $item->title }}</a></li>
                @endforeach
              </ul>
          {{-- </marquee> --}}
        </div>

        <div class="theme-video mt-3">
            <div class="video">
                {!! custom_config('theme_video')->value !!}
            </div>
          {{-- <div class="about-title">
            <div>
                About NATTA
            </div>
            <div class="about-name">
                NEPAL ASSOCIATION OF TOUR AND TRAVEL AGENTS
            </div>

          </div> --}}
          {{-- <div class="quote">
            <span>
              &ldquo;
            </span>
            Fifty years have elapsed since NEPAL ASSOCIATION OF TOUR & TRAVEL AGENTS (NATTA) came into existence.

          </div>
          {!! custom_config('about')->value !!} --}}
        </div>
      </div>
      <div class="col-md-3 text-center">
         @if ($advs->count()>0)
            @foreach ($advs as $item)
            @if ($item->link != null)
                <div class="mb-3">
                    <a href="{{ $item->link }}}}"><img class="w-100" style="height: 150px;" src="{{ asset($item->image) }}" alt=""></a>
                </div>
            @else
                <div class="mb-3">
                    <img class="w-100" style="height: 150px;" src="{{ asset($item->image) }}" alt="">
                </div>
            @endif
            @endforeach
          @else
                <div style="height: 150px; width: 300px; background: rgb(120, 140, 196); margin-bottom: 10px;">
                    <div style="padding: 4rem; color:white;">
                        <strong>Advertise</strong>
                    </div>
                </div>
                <div style="height: 150px; width: 300px; background: rgb(120, 140, 196)">
                    <div style="padding: 4rem; color:white;">
                        <strong>Advertise</strong>
                    </div>
                </div>
                @endif
        </div>
      {{-- <div class="mt-3">
        @if ($adv->count()>0)
            <marquee behavior="" onmouseover="this.stop();" onmouseout="this.start();" direction="left">
                @foreach ($adv as $item)
                    @if ($item->link != null)
                    <span style="margin-right: 15px;">
                        <a href="{{ $item->link }}}}"><img  style="height:150px; width: 300px;" src="{{ asset($item->image) }}" alt=""></a>
                    </span>
                    @else
                        <span style="margin-right: 15px;">
                            <img style="height:150px; width: 300px;" src="{{ asset($item->image) }}" alt="">
                        </span>
                    @endif
                @endforeach
            </marquee>
        @endif
      </div> --}}
    </div>
  </div>
  {{-- <div class="partners">
    <div class="container-custom">

      <div class="title">
      ASSOCIATES
      </div>
      <div class="list">
          @foreach ($patner as $p)
          <div class="item">
              @if ($p->link != null)
                <a href="{{ $p->link }}">
                    <img src="{{ asset($p->image)}}" style="height: 100px;" class="w-100" alt="">
                </a>
              @else
                <img src="{{ asset($p->image)}}" style="height: 100px;" class="w-100" alt="">
              @endif
          </div>
          @endforeach
      </div>
    </div>
  </div> --}}
@endsection
