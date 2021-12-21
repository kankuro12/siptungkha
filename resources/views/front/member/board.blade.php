@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >

        <div class="breadcrumb-overlay">
            <div class="container h-100 ">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2>Board Member List</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Board</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Members</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="container mb-5">
        @php
        $members=$board->boardmember;

        @endphp
    <div class="row m-5 " >
        {{-- @for($i=0;$i<2;$i++)
            justify-content-center
                @php
                    $secretary=$members[$i];
                @endphp
                <div class="col-lg-3">
                    <div class="member text-center">
                        <div class="square-img">
                            <img src="{{ asset($secretary->member->image) }}" alt="" class="w-100">
                        </div>
                        <div class="name ">
                            {{$secretary->member->name}}
                        </div>
                        <div class="desig">
                            ( {{$secretary->designation}})
                        </div>
                    </div>
                </div>
            @endfor
            <div class="row m-3" >
                @for ($i=2;$i<$members->count();$i++)
                    @php
                        $secretary=$members[$i];
                    @endphp
                        <div class="col-lg-3">
                            <div class="member text-center">
                                <div class="square-img">
                                    <img src="{{ asset($secretary->member->image) }}" alt="" class="w-100">
                                </div>
                                <div class="name ">
                                    {{$secretary->member->name}}
                                </div>
                                <div class="desig">
                                    ( {{$secretary->designation}})
                                </div>
                            </div>
                        </div>
                @endfor
            </div> --}}
        @foreach ($members as $member)
            <div class="col-lg-2 col-md-4 col-sm-2 mb-3">
                <div class="member text-center h-100">
                    <div class="square-img">
                        <img src="{{ asset($member->member->image) }}" alt="" class="w-100">
                    </div>
                    <div class="name ">
                        {{$member->member->name}}
                    </div>
                    <div class="desig">
                         {{$member->designation}}
                    </div>
                    <div class="desig">
                         {{$member->member->phone}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
