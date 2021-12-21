@extends('back.app')
@section('title','Downloads')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:">Download</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-11" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.download.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" placeholder="Enter name of the title" />
                    </div>
                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Photo</p>
                        <img src="" style="height: 200px;" id="photo"/>
                        <input type="file" name="file" data-role="file" onchange="readURL(this);" data-button-title="..." >
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
                <th>Title</th>
                <th>Action</th>
            </tr>
            @foreach ($download as $adv)
            <tr>
                <td>
                   <a target="_blank" href="{{ asset($adv->file) }}">Click to download</a>
                </td>
                <td>{{ $adv->title }}</td>
                <td>
                    <a href="{{ route('admin.download.delete',$adv->id)}}">Delete</a>
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
