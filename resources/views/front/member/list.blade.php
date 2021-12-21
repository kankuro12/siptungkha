@extends('front.layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('front/img/1.jpg')}});" >
    <div class="breadcrumb-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Member List</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Members</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .al-map{
        justify-content: center;flex-wrap:wrap;display:flex;
        padding:10px 0px;
        background:var(--primary-color);
        /* margin:0px -15px; */
    }
    .al-link{
        height:30px;
        width: 30px;
        color:white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="container">
    <div class="card shadow">
        <div class="p-4">
            <div>
                <div class="row m-0">
                    <div class="col-md-12">
                        <input type="text" id="search" class="search form-control  " placeholder="Search Member" oninput="searchMember(this)">
                    </div>
                </div>
            </div>
            <hr>
            <div class="al-map  mt-3">
                @foreach ($arr as $item)
                    <a class="al-link" href="#{{$item}}">{{$item}}</a>
                @endforeach
            </div>
            <hr>
            <div class="row mt-5 mb-5 m-0">
                @foreach ($sorted as $key=>$member)
                    <h4>
                        {{$key}}
                        <a name="{{strtoupper($key)}}"></a>
                    </h4>
                    @foreach ($member as $mem)
                        <div class="searchable" data-value="{{$mem->company}}" style="border:1px #ccc solid; background:rgb(231, 224, 224); border-radius: 10px;">
                            <div style="margin: 10px;"><a href="{{ route('member.single',$mem->id)}}" style="text-decoration: none">{{ $mem->company }} </a> [ Member ID: {{ $mem->memberid }} ]</div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script>
        function searchMember(ele){
            keyword=ele.value.toLowerCase();
            if(keyword.length==0){
                $('.searchable').removeClass('d-none');
            }else{
                $('.searchable').each(function(){
                    name=this.dataset.value.toLowerCase();
                    console.log(name);
                    if(name.startsWith(keyword)){
                        $('.searchable').removeClass('d-none');

                    }else{
                        $('.searchable').addClass('d-none');
                    }
                });
            }
        }
    </script>
@endsection
