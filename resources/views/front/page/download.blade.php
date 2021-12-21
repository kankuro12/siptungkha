@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Downloads</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Download</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>File</th>
            </tr>
            <tbody>
                @foreach ($download as $d)
                    <tr>
                        <td>{{ $d->title }}</td>
                        <td><a href="{{ asset($d->file) }}" target="_blank">Download</a></td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>

@endsection
