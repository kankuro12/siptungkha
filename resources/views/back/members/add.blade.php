@extends('back.app')
@section('title','Board Member addition')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:">Board Member Addition</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.member.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Member Name</label>
                        <input type="text"  name="name" placeholder="Enter name" required/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  name="address" placeholder="Enter Address" required/>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="number"  name="phone" placeholder="Enter phone number" required/>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email"  name="email" placeholder="Enter email" />
                    </div>
                    {{-- <div class="form-group">
                        <label>Qualification</label>
                        <input type="text"  name="education" placeholder="Enter qualification" required/>
                    </div>
                    <div class="form-group">
                        <label>Activity</label>
                        <input type="text"  name="activity" placeholder="Enter related ativity with field" required/>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label>In Details</label>
                        <textarea data-role="textarea" name="descr"></textarea>
                    </div> --}}
                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Photo</p>
                        <img src="" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='{{ route('admin.member.index')}}'">
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
