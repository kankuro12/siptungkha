@extends('back.app')
@section('title','Member Edit')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Member Edit </h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.other.member.update',$member->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Member Name</label>
                        <input type="text"  name="name" value="{{ $member->name }}" placeholder="Enter name" required/>
                    </div>

                    <div class="form-group">
                        <label>Occupation</label>
                        <input type="text"  name="company" value="{{ $member->company }}" placeholder="Enter Occupation" />
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  name="address" value="{{ $member->addresss }}" placeholder="Enter Address" required/>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number"  name="phone" value="{{ $member->phone }}" placeholder="Enter Phone Number" required/>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email"  name="email" value="{{ $member->gmail }}" placeholder="Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>Member ID</label>
                        <input type="text"  name="memberid" value="{{ $member->memberid }}" placeholder="Enter Member ID" />
                    </div>
                    {{-- <div class="row" style="margin-top:10px;">
                        <div class="cell-md-6">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text"  name="designation" value="{{ $member->designation }}" placeholder="Enter designation" required/>
                            </div>
                        </div>
                        <div class="cell-md-6">
                            <div class="form-group">
                                <label>Natta Member Id</label>
                                <input type="text"  name="memberid" value="{{ $member->memberid }}" placeholder="Enter memberid" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:10px;">
                        <label>Website</label>
                        <input type="text" value="{{ $member->website }}" name="website" placeholder="Enter website url" required/>
                    </div> --}}

                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Photo</p>
                        <img src="{{ asset($member->image)}}" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='{{ route('admin.other.member.index')}}'">
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
