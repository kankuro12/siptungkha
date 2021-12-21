@extends('back.app')
@section('title','Committee edtion')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Committee Edit</h3></p>
</div>
 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Committee Name</label>
                        <input type="text"  name="name" placeholder="Enter committee name" value="{{$committe->name}}"/>
                    </div>

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="text" id="nepali-calendar" name="startdate" value="{{$committe->startdate}}"/>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="text" id="nepali-patro"  name="enddate" value="{{$committe->enddate}}"/>
                    </div>

                    <div class="form-group">
                      
                        <input type="checkbox" onchange="userStatus(this);"  
                        data-role="checkbox" 
                        @if($committe->active==1)
                            checked
                        @endif
                        > Active Status
                        <input type="hidden" name="active" id="active" value="{{$committe->active}}">
                    </div>

                    
                    <div class="form-group">
                        <button class="button success">Submit data</button>
                        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/committe/list/'">
                    </div>
            </form>

        </div>

    </div>
 </section>
 
@endsection
@section('script')
<script>
    function userStatus(ele){
        if(ele.checked){
           document.getElementById('active').value=1;
        }else{
            document.getElementById('active').value=0;
             }
    }
    $(document).ready(function () {
        $('#nepali-calendar').nepaliDatePicker();
    });
    $(document).ready(function () {
        $('#nepali-patro').nepaliDatePicker();
    });
</script>
@endsection

