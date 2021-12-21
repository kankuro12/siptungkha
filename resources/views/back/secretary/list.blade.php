@extends('back.app')
@section('title','Secretary listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Secretary Listing</h3></p>
</div>


<div class="container" >
               <div style=" padding:2rem 0 0 2rem;">
                        <a class="button primary" href="/admin/secretary/add/">Add Secretary</a>  
                </div>
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-12" >    
            <table class="table table-border cell-border" data-role="table"  data-pagination-short-mode="true">
                <thead >
                <tr>
                    <th class="">Image</th>
                    <th class="sortable-column sort-asc">Name</th>
                    <th class="sortable-column sort-asc">Designation</th>
                    <th class="sortable-column sort-asc">Address</th>
                    <th class="sortable-column sort-asc">Telephone</th>
                    <th class="sortable-column sort-asc">Email</th>
                    <!-- <th class="sortable-column sort-asc">Education</th>
                    <th class="sortable-column sort-asc">Activity</th>
                    <th class="sortable-column sort-asc">Description</th> -->
                    <th class="">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($secretaries as $member)
                <tr>
                    <td><img src="/{{$member->image}}" alt="" style="height:100px;width:100px;"></td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->designation}}</td>
                    <td>{{$member->address}}</td>
                    <td>{{$member->phone}}</td>
                    <td>{{$member->email}}</td>
                    <!-- <td>{{$member->education}}</td>
                    <td>{{$member->activity}}</td>
                    <td>{{$member->descr}}</td> -->
                    <td><a class="button link" href="/admin/secretary/edit/{{$member->id}}/">Edit</a> || 
                        <a class="button link" href="/admin/secretary/del/{{$member->id}}/">Delete</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection