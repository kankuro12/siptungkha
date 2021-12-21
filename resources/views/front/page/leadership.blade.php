@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});">
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{ $menu->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-5 mb-5">
    <div class="card" >
        <div class="card-body">
            <div class="row">
                @foreach ($leader as $li)
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <img src="{{ asset($li->image)}}" class="img-thumbnail w-100" alt="">
                        </div>

                        <div class="col-md-8 col-6">
                            <h5 style="color: #00a2de; font-weight: 600;">{{ $li->name }}</h5>
                           <span style="color: #ec9831;">({{ $li->designation }})</span>
                           <p>{{ $li->addresss }}</p>
                           <span>{{  $li->phone }}</span>
                           <h6><a href="{{$li->website}}" target="_blank" style="text-decoration: none;color:#ec9831;">{{$li->website}}</a></h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </div>
</div>

@endsection
