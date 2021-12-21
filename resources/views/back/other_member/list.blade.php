@extends('back.app')
@section('title','Other Members listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:">Members Listing</h3></p>
</div>


<div class="container" >
               <div style=" padding:2rem 0 0 2rem;">
                        <a class="button primary" href="{{ route('admin.other.member.create') }}">Add New Member</a>
                </div>
    <div class="row" style=" padding:2rem;">
        <div class="cell-md-12" >
            <table class="table table-border cell-border" data-role="table"  data-pagination-short-mode="true">
                <thead >
                <tr>
                    <th class="sortable-column sort-asc ">#Id</th>
                    <th class="">Image</th>
                    <th class="sortable-column ">Name</th>
                    <th class="sortable-column ">Address</th>
                    <th class="sortable-column ">Phone</th>
                    <th class="sortable-column ">Email</th>
                    <th class="sortable-column ">Occupation</th>
                    <th class="">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{$member->id}}</td>
                    <td><img src="/{{$member->image}}" alt="" style="height:100px;width:100px;"></td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->addresss}}</td>
                    <td>{{$member->phone}}</td>
                    <td>{{$member->gmail}}</td>
                    <td>{{$member->company}}</td>
                    <td><a class="button link" href="{{ route('admin.other.member.edit',$member->id)}}">Edit</a> ||
                        <a class="button link" href="{{ route('admin.other.member.delete',$member->id)}}">Delete</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
