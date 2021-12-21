@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});">
    <div class="breadcrumb-overlay">
    <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                <div class="col-md-8 col-12 mb-md-3">
                 @include('back.alert')

                    <h5 class="widget-text">Send A Message</h5>
                    <form action="{{ route('message')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="name">Name (Required)</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 mt-3">
                                <div class="form-group">
                                    <label for="email">Email (Required)</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="Tele">Telephone (Required)</label>
                                    <input type="number" min="0" class="form-control" name="phone" id="subject" placeholder="Your number" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="name">Message (Required)</label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-3 ">
                                <button class="btn btn-primary mt-30 d-none d-md-inline-block" type="submit">Send</button>
                                <button class="btn btn-primary mt-30 d-inline-block d-md-none w-100" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="col-md-4 col-12">
                        <hr class="d-block d-md-none">
						<h4 class="widget-text">Contact Information</h4>
						{{-- <p><strong>Nepal Association of Tour &amp; Travel Agents (NATTA)</strong><br>
						P.O Box: 362<br>                        Gairidhara, Naxal, Kathmandu, Nepal<br><br>
                        <strong>Tel:</strong>+977-1-4418661, 4419409<br>						<strong>Fax:</strong>+977-1-4418684 <br><br>
						<strong>EMAILS <br>Admin: </strong>nattaadmn@gmail.com <br>						<strong>CEO: </strong>ceo@natta.org.np<br>						<strong>Information &amp; Communication: </strong>info@natta.org.np<br>						<strong>Finance: </strong>finance@natta.org.np</p> --}}

                        <p><strong>Siptungkha Search and Research committee.</strong><br>
                            phidim -7 Panchthar, Nepal<br>
                            <strong>Tel:</strong> +977-9842767749,9852078275<br>

                            <strong>Email:</strong>siptungkha.org.np@gmail.com

                        </p>
                    </div>
            </div>
        </div>
      </div>
</div>

@endsection
