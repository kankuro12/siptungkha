@extends('back.app')
@section('title','New listing')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> News Listing</h3></p>
</div>

<div class="container" >
    <div style="padding:8px 0 0 0;">
        <a class="button primary" href="/admin/news/add/">Add News</a>
    </div>
    <hr>
    <div>

        <ul data-role="list"
            data-cls-list="unstyled-list row "
            data-show-search="true"
            data-sort-class="id"
            data-sort-dir="desc"
            data-cls-list-item="cell-sm-12 cell-md-12 card" style="margin-right:0px;">
            @foreach($news as $n)
                <li>
                        <div class="row" style="padding:5px ">
                            <div class="cell-12 p-0"><span class="id d-none">{{$n->id}}</span><h5 style="padding-bottom:10px;margin-bottom:10px;border-bottom:1px #f1f1f1 solid;">{{$n->title}}</h5></div>

                            <div class="cell-6 img-container thumbnail">
                                <img src="{{ asset($n->image) }}" style="width:100%;">
                            </div>
                            <div class="cell-6">
                                <p><a href="/admin/news/edit/{{$n->id}}/">Edit</a> | <a  href="/admin/news/del/{{$n->id}}/">Delete</a></p>
                                <hr>
                                <p>Published By : {{$n->publisher}}</p>
                                <p>Published Date : {{$n->published}}</p>
                            </div>
                        </div>
            @endforeach

                </li>
        </ul>

    </div>
</div>
@endsection
