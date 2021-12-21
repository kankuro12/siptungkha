@extends('back.app')
@section('title','Manage pages E-library')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Manage pages E-library </h3></p>
</div>
<section class="container">
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-8" >
            @include('back.alert')

            <form method="post" action="{{ route('admin.elibrary.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Published Date</label>
                        <input type="text" id="nepali-calendar"  name="date" required>
                    </div>
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" placeholder="Enter name of the title" required/>
                    </div>

                    <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
                        <p>File</p>
                        <input type="file" name="file" data-role="file" onchange="readURL(this);" data-button-title="..." required>
                    </div>

                    <div class="form-group">
                        <label>Details</label>
                        <textarea data-role="textarea" name="detail"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='{{ route('admin.menu.index')}}'">
                    </div>
            </form>

        </div>

    </div>

    <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            <table class="table table-border cell-border" >
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                @foreach($elibrary as $e)
                    <tr>
                        <td><a href="{{ asset($e->file)}}" target="_blank">{{ $e->title }} </a></td>
                        <td>{{ $e->date }}</td>
                        <td>
                            <a href="{{ route('admin.elibrary.delete',$e->id) }}" onclick="return confirm('Are you sure ?');">Delete</a>
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


     $(document).ready(function () {
        $('#nepali-calendar').nepaliDatePicker();
    });
     </script>

@endsection
