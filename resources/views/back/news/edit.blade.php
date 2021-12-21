@extends('back.app')
@section('title','News edition')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> News Edit</h3></p>
</div>


<section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.news.update',$news->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="title" placeholder="Enter Title" value="{{$news->title}}"/>
                    </div>
                    <div class="form-group">
                        <label>Published By</label>
                        <input type="text"  name="publisher" placeholder="Enter name" value="{{$news->publisher}}"/>
                    </div>

                    <div class="form-group">
                        <label>Published Date</label>
                        <input type="text" id="nepali-calendar"  name="published" value="{{$news->published}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea  name="descr" >{{$news->descr}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Related Gallery</label>
                        <select name="galary_id" id="galary_id" data-role="select" required>
                        <option value="">---Select Gallery---</option>
                            @foreach($galaries as $galary)
                               <option value="{{$galary->id}}"
                              @if($galary->id==$news->galary_id)
                                selected = "selected"
                              @endif
                               >{{$galary->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Feature Image</p>
                        <img src="/{{$news->image}}" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='{{ route('admin.news.index')}}'">
                    </div>
            </form>

        </div>

    </div>
 </section>

@endsection

@section('script')

 <script>
        function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#photo')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }
     $(document).ready(function () {
        $('#nepali-calendar').nepaliDatePicker();
    });
     </script>

@endsection
