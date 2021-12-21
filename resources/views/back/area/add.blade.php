@extends('back.app')
@section('title','Activites add')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Activity Add</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.activity.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="name" placeholder="Enter name of the title" required/>
                    </div>

                    <div class="form-group">
                        <label>Details</label>
                        <textarea data-role="textarea" name="detail"></textarea>
                    </div>

                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>Photo</p>
                        <img src="" style="height: 200px;" id="photo"/>
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
                    </div>

                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/area/list/'">
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
