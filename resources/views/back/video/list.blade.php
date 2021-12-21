@extends('back.app')
@section('title','videos')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Videos</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-11" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.video.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="title" placeholder="Enter name of the title" required/>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text"  name="link" placeholder="Enter name of the link" required/>
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
                <th>Action</th>
                <th>Image</th>
            </tr>
            @foreach ($video as $adv)
            <tr>
                <td>
                    <a href="{{ route('admin.video.delete',$adv->id)}}">Delete</a>
                </td>
                <td>
                    <h5> {{ $adv->title }} </h5>
                    <br>
                   {!! $adv->link !!}
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
