@if(Session::has('success'))
    <div style="padding: 10px; background: rgb(36, 224, 115); color:white; margin: 20px 0;">
       <p>{{Session::get('success')}}</p>
    </div>
@endif

@if(Session::has('warning'))
<div style="padding: 10px; background: rgb(228, 99, 25); color:white; margin: 20px 0;">
    <p>{{Session::get('warning')}}</p>
</div>
@endif
