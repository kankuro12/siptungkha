@extends('back.app')
@section('title','Event edition')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Event Edit</h3></p>
</div>

<section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.event.update',$event->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="title" value="{{$event->title}}"/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  name="address" placeholder="Enter Address" value="{{$event->address}}"/>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input data-role="timepicker" data-seconds="false" name="eventtime" value="{{$event->eventtime}}">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" id="nepali-calendar"  name="eventdate" value="{{$event->eventdate}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea data-role="textarea" name="descr">{{$event->descr}}</textarea>
                    </div>
                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Photo</p>
                        <img src="/{{$event->image}}" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/event/list/'">
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
