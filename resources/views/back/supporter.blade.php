@extends('back.app')
@section('title','Our Supporter')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Our Supporters</h3></p>
</div>
<div style="padding:1rem;">
        <table data-role="table" class="table table-border cell-border">
         <thead>
             <tr>
                 <th>S.N.</th>
                 <th>Email</th>
             </tr>
         </thead>
        
            <tbody>
                @foreach($supporters as $supporter)
                <tr>
                    <td>{{$supporter->id}}</td>
                    <td>{{$supporter->email}}</td>
                </tr>
                @endforeach
            </tbody>
        
        </table>
</div>

@endsection