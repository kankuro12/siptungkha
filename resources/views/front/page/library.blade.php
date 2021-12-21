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
                <style>
                    .file{
                        text-decoration: none; font-size:16px;color:#1e1e1e; font-weight: 700;
                    }
                    .file:hover{
                        color: #ec9831;
                    }
                </style>
                <div class="col-md-12 col-12">
                    @foreach ($library as $li)
                    <div class="news-date">
                        &#128197; {{ $li->date }}
                    </div>

                    <div class="mt-3" style="border: 1px #ccc solid; padding:10px; background: #f7f7f7;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="25" height="25"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><defs><linearGradient x1="102.65892" y1="55.00775" x2="120.22442" y2="37.44225" gradientUnits="userSpaceOnUse" id="color-1_LmcGmjPSQXSa_gr1"><stop offset="0" stop-color="#f44f5a"></stop><stop offset="0.337" stop-color="#f34c57"></stop><stop offset="0.595" stop-color="#f0424f"></stop><stop offset="0.825" stop-color="#eb3240"></stop><stop offset="1" stop-color="#e52030"></stop></linearGradient></defs><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M139.75,57.33333v89.58333c0,3.95958 -3.20708,7.16667 -7.16667,7.16667h-93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667v-121.83333c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667h60.91667z" fill="#ffadc8"></path><path d="M100.33333,17.91667v32.25c0,3.95958 3.20708,7.16667 7.16667,7.16667h32.25z" fill="url(#color-1_LmcGmjPSQXSa_gr1)"></path><path d="M57.33333,136.16667c-1.43333,0 -2.50833,-0.35833 -3.58333,-0.71667c-3.94167,-2.15 -4.3,-5.375 -3.58333,-7.88333c1.43333,-4.3 9.31667,-9.675 19.70833,-14.33333v0c4.65833,-8.6 8.24167,-17.55833 10.39167,-25.08333c-3.58333,-6.80833 -5.375,-13.25833 -5.375,-17.91667c0,-2.50833 0.71667,-4.65833 1.79167,-6.45c1.43333,-1.79167 3.58333,-2.86667 6.45,-2.86667c3.225,0 5.73333,1.79167 6.80833,5.01667c1.79167,4.3 0.71667,12.18333 -1.79167,21.14167c3.58333,6.09167 7.88333,11.825 12.54167,16.125c6.80833,-1.43333 12.9,-2.15 16.84167,-1.43333c6.80833,1.075 7.88333,5.73333 7.88333,7.525c0,7.525 -7.88333,7.525 -10.75,7.525c-5.375,0 -10.75,-2.15 -15.40833,-6.09167v0c-8.6,2.15 -17.2,5.01667 -24.00833,8.24167c-3.58333,6.09167 -7.16667,11.10833 -10.39167,13.975c-3.225,2.50833 -5.73333,3.225 -7.525,3.225zM61.63333,125.775c-1.79167,1.075 -3.225,2.15 -3.94167,3.225c0.71667,-0.35833 2.15,-1.075 3.94167,-3.225zM110.36667,108.93333c1.43333,0.35833 2.86667,0.71667 4.3,0.71667c2.15,0 3.225,-0.35833 3.58333,-0.35833v0c-0.35833,-0.35833 -2.86667,-1.075 -7.88333,-0.35833zM85.28333,96.03333c-1.43333,4.3 -3.58333,8.95833 -5.375,13.25833c4.3,-1.43333 8.6,-2.86667 12.9,-3.94167c-2.86667,-2.86667 -5.375,-6.09167 -7.525,-9.31667zM83.13333,68.08333c-0.35833,0 -0.35833,0 -0.35833,0c-0.35833,0.35833 -0.71667,2.86667 0.71667,8.24167c0.35833,-4.3 0.35833,-7.525 -0.35833,-8.24167z" fill="#e52030"></path></g></g></svg>
                         <a href="{{ asset($li->file)}}" class="file">{{ $li->title }}</a>
                    </div>

                    <div class="mt-3 mb-4">
                        {!! $li->detail !!}
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
      </div>
</div>

@endsection
