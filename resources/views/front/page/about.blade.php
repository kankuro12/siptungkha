@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});">
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-5 mb-5">
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-12">
                    <h4 class="mb-50">Send a message</h4>
                    <hr>
                </div>
                <div class="col-md-4 col-12">
                    <h4 class="mb-50">Contact Information</h4>
                    <hr>
                </div>
            </div>
        </div>
      </div>
</div>

@endsection

