@extends('back.app')
@section('title','Committee listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Committee Listing</h3></p>
</div>

<div class="container" >
               <div style=" padding:2rem 0 0 2rem;">
                        <a class="button primary" href="/admin/committe/add/">Add Committee</a>  
                </div>
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-12" >    
            <table class="table table-border cell-border" data-role="table"  data-pagination-short-mode="true">
                <thead >
                <tr>
                    <th class="sortable-column sort-asc ">#Id</th>
                    <th class="sortable-column sort-asc">Committee Name</th>
                    <th class="sortable-column sort-asc">Start Date</th>
                    <th class="sortable-column sort-asc">End Date</th>
                    <th class="sortable-column sort-asc">Status</th>
                    <th class="">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($committes as $committe)
                   <tr>
                        <td>{{$committe->id}}</td>
                        <td>{{$committe->name}}</td>
                        <td>{{$committe->startdate}}</td>
                        <td>{{$committe->enddate}}</td>
                        <td>
                            @if($committe->active==1)
                               Active
                            @else
                               Deactive
                            @endif
                        </td>
                        <td><a class="button link " href="/admin/committe/edit/{{$committe->id}}/">Edit</a> ||   <a class="button link" href="/admin/committe/manage/{{$committe->id}}/">Manage</a> ||
                        <a class="button link" href="/admin/committe/del/{{$committe->id}}/">Delete</a> 
                      </td>
                   </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection