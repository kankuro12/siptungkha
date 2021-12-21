@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{$gallery->name}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('gallery')}}"> Gallery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">


    <div class="gallery">
        <div class="row">
            @foreach($images as $i)
               <div class="col-md-4 col-sm-12 mb-4">
                    <a href="{{ asset($i->image->image)}}" class="big" rel="rel{{$i->image->id}}">
                        <img class="img-thumbnail w-100" style="height: 250px;" src="{{ asset($i->image->image)}}" alt="" >
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>


@endsection
@section('css')
 <link rel="stylesheet" href="{{ asset('front/gallery/dist/simple-lightbox.css')}}">
@endsection
@section('js')
<script src="{{ asset('front/gallery/dist/simple-lightbox.min.js')}}"></script>
{{-- <script src="{{ asset('front/gallery/dist/simple-lightbox.legacy.min.js')}}"></script> --}}
<script src="{{ asset('front/gallery/dist/simple-lightbox.jquery.min.js')}}"></script>

<script>

    var gallery = $('.gallery a').simpleLightbox({


    });

</script>
@endsection
