@extends('back.app')
@section('title','Committee addition')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Committee Addition</h3></p>
</div>

 <section class="container">
 <div class="row" style=" padding:2rem;" >
        <div class="cell-md-8" >
            <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Committee Name</label>
                        <input type="text"  name="name" placeholder="Enter committee name" required/>
                    </div>

                    <!-- <div class="form-group">
                        <label>Committee Members</label>
                        <select data-role="select" name="member_id" id="member_id">
                        @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="text" id="nepali-calendar" name="startdate" required>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="text" id="nepali-patro"  name="enddate" required>
                    </div>

                    <div class="form-group">
                      
                        <input type="checkbox" onchange="userStatus(this);"  
                        data-role="checkbox" > Active Status
                        <input type="hidden" name="active" id="active" value="1">
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

