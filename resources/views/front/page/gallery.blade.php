@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Gallery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <div class="row">
        @foreach($galleries as $gallery)
         <div class="col-md-4 col-sm-12 mb-4">
            <div class="card">
                <a href="{{ route('gallery.detail',$gallery->id)}}">
                    <img class="card-img-top w-100" style="height: 180px;" src="{{ asset($gallery->image)}}" alt="">
                </a>
                <div class="card-body">
                  <h5 class="card-title text-center">{{$gallery->name}}</h5>
                </div>
            </div>
         </div>
        @endforeach
    </div>

</div>
@endsection

