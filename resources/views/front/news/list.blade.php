@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>News List</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News</li>
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
        @foreach ($newss as $news)
            <div class="col-lg-4 col-12 mb-4">
                <img src="{{ asset($news->image )}}" class="w-100" alt="">
            </div>
            <div class="col-lg-8 col-12 mb-4">
                <h4><a href="{{ route('news.single',$news->id)}}"> {{ $news->title }} </a></h4>
                <div class="news-date">
                    &#128197; {{ $news->published}}
                </div>
                {!!
                    $news->descr
                !!}
            </div>
        @endforeach
    </div>
</div>

@endsection
