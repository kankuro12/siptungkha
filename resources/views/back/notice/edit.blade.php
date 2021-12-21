@extends('back.app')
@section('title','Notice edition')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Notice Edit</h3></p>
</div>


<section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.notice.update',$notice->id)}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="title" placeholder="Enter Title" value="{{$notice->title}}"/>
                    </div>
                    <div class="form-group">
                        <label>Published By</label>
                        <input type="text"  name="publisher" placeholder="Enter name" value="{{$notice->publisher}}"/>
                    </div>

                    <div class="form-group">
                        <label>Published Date</label>
                        <input type="text" id="nepali-calendar"  name="published" value="{{$notice->published}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea data-role="textarea" name="desc" required>{{$notice->desc}}</textarea>
                    </div>
                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Feature Image</p>
                        <img src="/{{$notice->image}}" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/notice/list/'">
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
