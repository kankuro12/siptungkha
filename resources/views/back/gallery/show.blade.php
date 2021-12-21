@extends('back.app')
@section('title','Gallery manage')
@section('content')
<style>
    ._card{
        border:1px solid #f1f1f1;padding:10px;margin:2px;border-radius:5px;color:blue;display:inline-block;background:white;cursor: pointer;
    }
    ._card:hover{
        color:white;
        background:blue;
        transform: scale(1.1);
    }
</style>
    <div style="margin-top:10px;">
        <button class="_card" onclick="selectGalary(-1)">
            All
        </button>
        @foreach($galleries as $gallery)
        <button class="_card" onclick="selectGalary({{$gallery->id}})">
            {{$gallery->name}}
        </button>
        @endforeach
    </div>
    <div class="row">
        @foreach($galleries as $gallery)
            @foreach($gallery->Galaryimages as $image)
            <div class="cell-3 imageHolder" data-galary="{{$gallery->id}}">
                <div  class=" img-container ">
                    <img src="{{$image->cdn}}" style="width:100%">
                </div>
            </div>
            @endforeach
        @endforeach
    </div>

@endsection
@section('script')
    <script>
        function selectGalary(id){
            var images=document.querySelectorAll('.imageHolder')
            console.log(images);
                images.forEach(image => {
                    console.log(image); 
                    if(id===-1){
                        image.style.display="block";
                        // image.style.disp
                    }else{
                        if(image.dataset.galary==id){
                            image.style.display="block";

                        }else{
                            image.style.display="none";

                        }
                    }
                });
            
        }
    </script>
@endsection