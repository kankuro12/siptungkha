@extends('back.app')
@section('title','Event listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; ">
    <center><p style="padding:20px; font-size:18px; font-family:"> Event Listing</h3></p>
</div>

<div class="container" >
               <div style=" padding:2rem 0 0 2rem;">
                        <a class="button primary" href="/admin/event/add/">Add Event</a>  
                </div>
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-12" >    
            <table class="table table-border cell-border" data-role="table"  data-pagination-short-mode="true">
                <thead >
                <tr>
                    <th class="sortable-column sort-asc ">#Id</th>
                    <th class="sortable-column sort-asc">Title</th>
                    <th class="sortable-column sort-asc">Address</th>
                    <th class="sortable-column sort-asc">Event Time</th>
                    <th class="sortable-column sort-asc">Event Date</th>
                    <!-- <th class="sortable-column sort-asc">Image</th>
                    <th class="sortable-column sort-asc">Description</th> -->
                    <th class="sortable-column sort-asc">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                   <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->address}}</td>
                        <td>{{$event->eventtime}}</td>
                        <td>{{$event->eventdate}}</td>
                        <!-- <td><img src="/{{$event->image}}" style="height: 100px; width:100px; alt="></td>
                        <td>{{$event->descr}}</td> -->
                        <td><a class="button link" href="/admin/event/edit/{{$event->id}}/">Edit</a> || 
                        <a class="button link" href="/admin/event/del/{{$event->id}}/">Delete</a> </td>
                   </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection