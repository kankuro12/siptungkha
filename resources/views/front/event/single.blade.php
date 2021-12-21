@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Event Detail</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Event</li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-4 col-12">
            <img src="{{ asset($event->image )}}" class="w-100" alt="">

        </div>
        <div class="col-lg-8 col-12">
            <h4>{{ $event->title }} ,{{ $event->address }}</h4>
            <div class="news-date">
                &#128197; {{ $event->eventdate }}, {{ $event->eventtime }}, {{ $event->address }}
            </div>
            {!!
                $event->descr
            !!}
        </div>
    </div>
</div>

@endsection
