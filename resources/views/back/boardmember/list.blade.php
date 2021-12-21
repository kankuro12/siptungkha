@extends('back.app')
@section('title','Board listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Board Listing</h3></p>
</div>

<div class="container" >
               <div style=" padding:2rem 0 0 2rem;">
                        <a class="button primary" href="/admin/board/add/">Add New Board </a>
                        <a class="button primary" href="{{ route('admin.member.index')}}">Manage Board Member</a>
                </div>
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-12" >
            <table class="table table-border cell-border" data-role="table"  data-pagination-short-mode="true">
                <thead >
                <tr>
                    <th class="sortable-column sort-asc ">#Id</th>
                    <th class="sortable-column sort-asc">Start Date</th>
                    <th class="sortable-column sort-asc">End Date</th>
                    <th class="sortable-column sort-asc">Status</th>
                    <th class="">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($boards as $board)
                   <tr>
                        <td>{{$board->id}}</td>
                        <td>{{$board->startdate}}</td>
                        <td>{{$board->enddate}}</td>
                        <td>
                            @if($board->active==1)
                               Active
                            @else
                               Deactive
                            @endif
                        </td>
                        <td><a class="button link " href="/admin/board/edit/{{$board->id}}/">Edit</a> ||   <a class="button link" href="/admin/board/manage/{{$board->id}}/">Manage</a> ||
                        <a class="button link" href="/admin/board/del/{{$board->id}}/">Delete</a>
                      </td>
                   </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
