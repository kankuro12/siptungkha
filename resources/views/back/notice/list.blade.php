@extends('back.app')
@section('title','Notice listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Notice Listing</h3></p>
</div>

<div class="container" >
               <div style=" padding:2rem 0 0 2rem;">
                        <a class="button primary" href="/admin/notice/add/">Add Notice</a>  
                </div>
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-12" >    
            <table class="table table-border cell-border" data-role="table"  data-pagination-short-mode="true">
                <thead >
                <tr>
                    <th >Action</th>
                    <th >Image</th>
                    <th class="sortable-column sort-asc">Title</th>
                    <th class="sortable-column sort-asc">Published By</th>
                    <th class="sortable-column sort-asc">Published Date</th>
                    <!-- <th class="sortable-column sort-asc">Description</th> -->
                </tr>
                </thead>
                <tbody>
                @foreach($notices as $notice)
                   <tr>
                   <td><a class="button link" href="/admin/notice/edit/{{$notice->id}}/">Edit</a> || 
                        <a class="button link" href="/admin/notice/del/{{$notice->id}}/">Delete</a> </td>
                        <td><img src="/{{$notice->image}}" alt="" style="height:200px; width:200px;"></td>
                        <td>{{$notice->title}}</td>
                        <td>{{$notice->publisher}}</td>
                        <td>{{$notice->published}}</td>
                        <!-- <td>{{$notice->desc}}</td> -->
                       
                   </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection