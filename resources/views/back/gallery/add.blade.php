@extends('back.app')
@section('title','Gallery addition')
@section('content')
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Galleries</h3></p>
</div>

<div class="container">
    <div class="cell-md-6" style="padding-top:1.5rem;"  >
        @include('back.alert')
        <form method="post" class="inline-form" id="newgallery" enctype="multipart/form-data">
            @csrf
         <input type="text" name="name" placeholder="Enter gallery name" required>
         <div style="margin-top: 22px;">
             <input type="file" name="image" placeholder="Select theme image">
             <small style="margin-left: 5px;">Select theme image</small>
         </div>
         <span class="button success" onclick="addGallery(document.getElementById('newgallery'));">Add Gallery</span>
        </form>
    </div>
    <hr>
    <table class="table table-border cell-border" id="galaries">
        <thead>
            <tr style="text-align:left;">
                <th>Name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody id="gallerybody">
            @foreach($galleries as $gallery)
                <tr id="galary-{{$gallery->id}}">
                    <td><input id="galaryname-{{$gallery->id}}" type="text" style="width:100%;border:none;" value="{{$gallery->name}}"/></td>
                    <td>
                        <a class="button link" href="/admin/gallery/manage/{{$gallery->id}}/">
                            Manage
                        </a> |
                        <button class="button link" onclick="update({{$gallery->id}});">
                            Update
                        </button> |
                        <button class="button link" onclick="del({{$gallery->id}});">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
@section('script')
<script>
    function addGallery(ele){
        var formData=new FormData(ele);
        console.log(ele);
        axios.post('{{ route('admin.gallery.store')}}',formData)
            .then(function(response){
                console.log(response);
                $("#newgallery")[0].reset()
                var galary = response.data.data.gallery;
                console.log(galary);
                // var htmltext="asdfasd";
                var htmltext='<tr id="galary-'+galary.id+'"><td><input id="galaryname-'+galary.id+'" type="text" style="width:100%;border:none;" value="'+galary.name+'"/></td><td><a class="button link" href="/admin/gallery/manage/'+galary.id+'/">Manage</a> | <button class="button link" onclick="update('+galary.id+');"> Update </button> | <button class="button link" onclick="del('+galary.id+');"> Delete </button> </td> </tr>';
                console.log(htmltext);
                document.getElementById('gallerybody').innerHTML+=htmltext;
                // $('#galaries').append(htmltext);
            })
            .catch(function(error){

            });
    }

    function update(id){
        console.log($('#galaryname-'+id).val());
        axios.post('{{ route('admin.gallery.update')}}',{
            'id':id,
            'name':$('#galaryname-'+id).val()
        })
            .then(function(response){
                console.log(response);
            })
            .catch(function(error){

            });
    }

    function del(id){
        console.log($('#galary-'+id).val());
        axios.post('{{ route('admin.gallery.delete')}}',{
            'id':id,
        })
            .then(function(response){
                console.log(response);
                $('#galary-'+id).remove();
            })
            .catch(function(error){

            });
    }


</script>
@endsection
