@extends('back.app')
@section('title','Secretary edit')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Secretary Edit</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Member Name</label>
                        <input type="text"  name="name" placeholder="Enter name" value="{{$secretary->name}}"/>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text"  name="designation" placeholder="Enter Address" value="{{$secretary->designation}}"/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  name="address" placeholder="Enter Address" value="{{$secretary->address}}"/>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="number"  name="phone" placeholder="Enter phone number" value="{{$secretary->phone}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email"  name="email" placeholder="Enter email" value="{{$secretary->email}}"/>
                    </div>

                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Photo</p>
                        <img src="/{{$secretary->image}}" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/secretary/list/'">
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
     </script>

@endsection
