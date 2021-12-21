@extends('back.app')
@section('title','Board manage')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Board Member Manage</h3></p>
</div>
<section class="container">
 <div class="row" style=" padding-top:2rem;" >
        <div class="cell-md-12" >
            @include('back.alert')

            <form method="post" action=""  id="memberadd">
                @csrf
                    <div class="row">
                        <div class="cell-4">
                            <input type="hidden" name="board_id"  value="{{$board->id}}">
                            <select data-role="select" name="member_id" id="member_id">
                                <option value="-1">----Select A Member----</option>
                            @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="cell-4">
                            <input type="text" name="designation" placeholder="Enter member designation">
                        </div>
                        <div class="cell-4">
                            <span class="button success" onclick="addMember();">Submit data</span>
                        </div>
                    </div>

            </form>

        </div>
    </div>
 </section>

 <hr>
 <div class="container">
         <table class="table table-border cell-border" id="members" >
            <thead>
                <tr >
                    <th >#id</th>
                    <th >Member Name</th>
                    <th >Designation</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($board->boardmember as $brd)
                    <tr id="member-{{$brd->id}}">
                        <td>{{$brd->id}}</td>
                        <td>{{$brd->member->name}}</td>
                        <td id="memberdeg-{{$brd->id}}">{{$brd->designation}}</td>
                        <td><button  onclick="openModel({{$brd->id}});" class="button link" >Edit</button>||<button class="button link" onclick="del({{$brd->id}});" >Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
 </div>

 <!-- model box -->
<div class="dialog" id="demoDialog1" data-role="dialog">
    <div class="dialog-title"><center>Edit Designation</center></div>
    <hr>
    <div class="dialog-content">
            <form method="post" action="" id="memberedit">
                    <div class="row">
                        <div class="cell-12">
                            <input type="hidden" name="id" id="member" value="">
                            <input type="text" name="designation" id="designation" value="" placeholder="Enter member designation">
                        </div>
                    </div>
            </form>
    </div>
    <div class="dialog-actions text-right">
        <button class="button primary" onclick="update()">Save data</button>
        <span class="button alert js-dialog-close">Cancel</span>
    </div>
</div>
@endsection
@section('script')
<script>
       function addMember(){
            var formData=new FormData(document.getElementById('memberadd'))
            axios.post('{{ route('admin.board.manage.member')}}',formData)
             .then(function(response){
                data=response.data;
                console.log(data);
                var member=data.data.member;
                htmltext='<tr id="member-'+member.id+'"><td>'+member.id+'</td><td>'+member.membername+'</td><td id="memberdeg-'+member.id+'">'+member.designation+'</td><td><button  onclick="openModel('+member.id+');" class="button link" >Edit</button>||<button class="button link" onclick="del('+member.id+');" >Delete</button></td></tr>';
                $("#members").append(htmltext);
                document.getElementById('memberadd').reset();
             }).catch(function(error){
                console.log(error);
             })
        }
        function openModel(id){
             document.getElementById('member').value = id;
             var name = document.getElementById('memberdeg-'+id).innerText;
             document.getElementById('designation').value = name;
             Metro.dialog.open('#demoDialog1');

        }

        function update(){
            var formData=new FormData(document.getElementById('memberedit'))
            axios.post('{{ route('admin.board.manage.member.edit')}}',formData)
             .then(function(response){
                data=response.data;
                console.log(data);
                var member=data.data.member;
                document.getElementById('memberdeg-'+member.id).innerText=member.designation;
                Metro.dialog.close('#demoDialog1');
             }).catch(function(error){
                console.log(error);
             })
        }

        function del(id){
        axios.post('{{ route('admin.board.manage.member.del')}}',{
            'id':id,
        })
            .then(function(response){
                console.log(response);
                $('#member-'+id).remove();
            })
            .catch(function(error){

            });
    }


</script>
@endsection
