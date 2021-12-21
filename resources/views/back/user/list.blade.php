@extends('back.app')
@section('title','User')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> User List</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
    <div class="cell-md-11" >
            @include('back.alert')
            <form method="post" action="{{ route('admin.user.store')}}" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text"  name="username" placeholder="Enter name of user" required/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  name="email" placeholder="Enter email of user" required/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"  name="password" required />
                    </div>

                    <div class="form-group">
                        <button class="button success">Submit data</button>
                    </div>
            </form>

        </div>


        <div style="margin-top: 1rem;">
            <table class="table table-border cell-border">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach ($user as $u)
                <tr>
                    <td>
                       {{ $u->username }}
                    </td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @if ($u->id != 1)
                            <a href="{{ route('admin.user.delete',$u->id)}}">Delete</a>
                        @endif
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
