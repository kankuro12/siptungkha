@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});">
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{ $member->company }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/members">Members</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
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
                        <div class="col-md-3 col-12 text-center mb-4">
                            <img src="{{ asset($member->image)}}" style="height: 133px; width:170px;" class="img-thumbnail" alt="">
                            <h6 style="color: #00a2de; font-weight: 500;" class="mt-2">{{ $member->name }}</h6>
                            <span style="color: #ec9831;">({{ $member->designation }})</span>

                        </div>
                        <div class="col-md-9 col-12" >

                                    <strong>Natta Member ID :</strong>  {{ $member->memberid }} <br><br>
                                    <strong>Company Name :</strong> {{ $member->company }} <br><br>
                                    <strong>Telephone :</strong> {{ $member->phone }} <br><br>
                                    <strong>Office Address :</strong> {{ $member->addresss }} <br><br>
                                    <strong>Email Address :</strong> {{ $member->gmail }} <br><br>
                                    <strong>Website :</strong> <a href="{{ $member->website }}">{{ $member->website }}</a>
                        </div>
                    </div>
        </div>
      </div>
</div>

@endsection
