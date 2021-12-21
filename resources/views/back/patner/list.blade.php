@extends('back.app')
@section('title','Patners')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Patners</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-11" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.patner.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                    <p>Photo</p>
                    <img src="" style="height: 200px;" id="photo"/>
                    <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                </div>
                    <div class="form-group">
                        <label>Link (Optional)</label>
                        <input type="text"  name="link" placeholder="Enter name of the place" />
                    </div>

                    <div class="form-group">
                        <button class="button success">Submit data</button>
                    </div>
            </form>

        </div>



    </div>

    <div style="margin-top: 1rem;">
        <table class="table table-border cell-border">
            <tr>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($patner as $adv)
            <tr>
                <td>
                    <img src="{{asset($adv->image) }}" alt="" style="height: 100px;">
                </td>
                <td>
                    <a href="{{ route('admin.patner.delete',$adv->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
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
