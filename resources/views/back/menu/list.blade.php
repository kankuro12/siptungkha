@extends('back.app')
@section('title','New listing')
@section('content')


<datalist id="default-urls">
    <option value="{{ route('member.list')}}">{{ route('member.list')}}</option>
    <option value="{{ route('member.board')}}">{{ route('member.board')}}</option>
    <option value="{{ route('about')}}">{{ route('about')}}</option>
    <option value="{{ route('gallery')}}">{{ route('gallery')}}</option>
    <option value="{{ route('videos')}}">{{ route('videos')}}</option>
    <option value="{{ route('download')}}">{{ route('download')}}</option>
    <option value="{{ route('news.list')}}">{{ route('news.list')}}</option>
    <option value="{{ route('event.list')}}">{{ route('event.list')}}</option>
    <option value="{{ route('contact')}}">{{ route('contact')}}</option>
</datalist>
<div class="header"  style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
    <center><p style="padding:20px; font-size:18px; font-family:"> Menu Listing</h3></p>
</div>
<section class="container">
    <div class="row" style=" padding:2rem;" >
           <div class="cell-md-8" >
            @include('back.alert')

               <form action="{{ route('admin.menu.store') }}" method="POST">
                   @csrf
                   <div class="form-group">
                        <label for="title"> Menu Title <span style="color:red;">*</span></label>
                        <input type="text" name="title" placeholder="Enter Menu Title" class="form-control" required>
                        {{-- <input type="hidden" name="parent_id" value="0"> --}}
                   </div>

                   <div class="form-group">
                       <label for="title"> Parent Menu </label>
                       <select name="parent_id" class="form-control">
                           <option value="0">==== Select Parent Menu ====</option>
                            @foreach ($menu as $item)
                                <option value="{{ $item->id }}">{{ $item->getName() }}</option>
                            @endforeach
                       </select>
                    </div>

                    <div class="form-group">
                        <label for="title"> Page Display </label>
                        <select name="type" class="form-control">
                            <option >==== Select Page Type ====</option>
                            <option value="1">For Simple</option>
                            <option value="2">For Pdf file upload</option>
                            <option value="3">For Leadership Member</option>
                            <option value="4">Heading</option>
                            <option value="5">link</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="link"> Menu link </label>
                        <input type="text" name="link" list="default-urls" placeholder="Enter Menu link" class="form-control" >
                        {{-- <input type="hidden" name="parent_id" value="0"> --}}
                   </div>
                  <div class="form-group">
                       <button class="button success">Submit data</button>
                       <input type="button" class="button" value="Cancel" onclick="window.location.href='{{ route('admin.menu.index')}}'">
                  </div>
               </form>
           </div>
       </div>

       <div>

        <div class="row" style=" padding:2rem;" >
            <div class="cell-md-8" >
                <table class="table table-border cell-border">
                    <tr>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                    @foreach(App\Models\Menu::with('submenu')->where('parent_id',0)->get() as $attr)
                    <tr>
                        <td>
                            {{ $attr->title }}
                                @if (count($attr->submenu))
                                    @foreach ($attr->submenu as $item)
                                        <ul>
                                            <li>{{ $item->title }}
                                                    @if(! ($item->hasmembers() || $item->haslibrary()))
                                                     <a href="{{ route('admin.menu.delete',$item->id)}}" class="button danger" onclick="return confirm('Are You Sure?');">Del</a>
                                                    @endif
                                                    @if($item->type==5)
                                                        <form action="{{route('admin.menu.update.link',['id'=>$item->id])}}" method="post">
                                                            @csrf
                                                            <input type="text" name="link" list="default-urls" id="link-{{$item->id}}" class="form-control" value="{{$item->link}}">
                                                            <button class="btn">Update Link</button>

                                                        </form>
                                                    @else
                                                    <a href="{{ route('admin.menu.manage',$item->id)}}" class="button success" target="_blank">Manage</a>
                                                    @endif
                                            </li>
                                            @if (count($item->submenu))
                                                @foreach ($item->submenu as $item1)
                                                    <ul>
                                                        <li>{{ $item1->title }}

                                                          <a href="{{ route('admin.menu.delete',$item1->id)}}" class="button danger" onclick="return confirm('Are You Sure?');">Del</a>
                                                          <a href="{{ route('admin.menu.manage',$item1->id)}}" class="button success" target="_blank">Manage</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </ul>
                                    @endforeach
                                @endif
                        </td>
                        <td>
                            @if ( $attr->type!=4 && $attr->submenu->count()<=0)
                            @if($item->type==5)
                                <form action="{{route('admin.menu.update.link',['id'=>$attr->id])}}" method="post">
                                    @csrf
                                    <input type="text" name="link" list="default-urls" id="link-{{$attr->id}}" class="form-control" value="{{$attr->link}}">
                                    <button class="btn ">Update Link</button>

                                </form>
                            @else
                                <a href="{{ route('admin.menu.manage',$attr->id)}}" class="button success" target="_blank">Manage</a>
                            @endif
                                {{-- <a href="{{ route('admin.menu.manage',$attr->id)}}" class="button success" target="_blank">Manage</a> --}}

                            @endif
                            @if(! ($attr->hasmembers() || $attr->haslibrary() || count($attr->submenu)>0))
                                <a href="{{ route('admin.menu.delete',$attr->id)}}" class="button danger" onclick="return confirm('Are You Sure?');">Del</a>
                            @endif
                               {{-- <a href="{{ route('admin.menu.manage',$attr->id)}}" class="button success" >Manage</a> --}}

                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
       </div>
   </section>

@endsection
