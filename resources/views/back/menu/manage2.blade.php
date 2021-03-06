@extends('back.app')
@section('title','Leadership Member')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Leadership Member</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-12" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.leadership.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group cell-4">
                            <label>Member Name</label>
                            <input type="text"  name="name" placeholder="Enter name" required/>
                        </div>
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="form-group cell-4">
                            <label>Address</label>
                            <input type="text"  name="address" placeholder="Enter Address" required/>
                        </div>
                        <div class="form-group cell-4" style="margin-top: 0px !important;">
                            <label>Phone No</label>
                            <input type="number"  name="phone" placeholder="Enter phone number" required/>
                        </div>
                        <div class="form-group cell-4">
                            <label>Email Address</label>
                            <input type="email"  name="email" placeholder="Enter email" />
                        </div>
                        <div class="cell-4">
                            <div class="row">
                                <div class="form-group cell-8">
                                    <label>Designation</label>
                                    <input type="text"  name="designation" placeholder="Enter Designation" />
                                </div>
                                <div class="form-group cell-4 " style="margin-top: 0px !important;">
                                    <label>Order</label>
                                    <input type="number"  name="sn" placeholder="Order" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group cell-4">
                            <label>Website</label>
                            <input type="text"  name="website" placeholder="Enter www.xyz.com"/>
                        </div>
                    </div>


                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;margin-top: 5px" >
                        <p>Photo</p>
                        <img src="" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." required>
                    </div>
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='{{ route('admin.member.index')}}'">
                    </div>
            </form>

        </div>

    </div>

    <div class="row" style=" padding:2rem;" >
        <div class="cell-md-12" >
            <table class="table table-border cell-border" >
                <tr>
                    <th>Image</th>
                    <th>Detail</th>
                    <th>Action</th>
                </tr>

                @foreach ($leaders as $li)
                    <tr>
                        <td><img src="{{ asset($li->image) }}" style="width: 100px; height: 100px;" alt=""></td>
                        <td>
                            <p>{{ $li->name }}</p>
                            <span>{{ $li->designation }}</span><br>
                            <span>{{ $li->addresss }}</span><br>
                            <span>{{ $li->phone }}</span>
                            <p>{{ $li->website }}</p>
                        </td>
                        <td>
                            <a href="{{ route('admin.leadership.delete',$li->id)}}">Delete</a>
                            <a href="{{ route('admin.leadership.edit',['leader'=>$li->id])}}">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </table>
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

