@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});">
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{ $pageIitem->title }}</h2>
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
                <div class="col-md-12 col-12">
                    <h4 class="mb-50">{{ $pageIitem->title }}</h4>
                    <hr>
                    @if ($pageIitem->image != null)
                        <div class="img">
                            <img src="{{ asset($pageIitem->image)}}" class="w-100" alt="" style="height: 300px;">
                        </div>
                    @endif

                    <div class="detail">
                        <p>{!! $pageIitem->subdetail !!}</p>
                    </div>

                    <div class="detail">
                        <p>{!! $pageIitem->detail !!}</p>
                    </div>

                </div>
            </div>
        </div>
      </div>
</div>

@endsection
