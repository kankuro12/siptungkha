@extends('back.app')
@section('title', 'Popups')
@section('content')
    <div class="header" style="background:#890E4F; color:#ffffff; height:55px; margin:0px;">
        <center>
            <p style="padding:20px; font-size:18px; font-family:"> Popups</h3>
            </p>
    </div>
    <section class="container">
        <div class="row" style=" padding:2rem;">
            <div class="cell-md-11">
                @include('back.alert')
                <datalist id="default-urls">
                    <option value="{{ route('member.list') }}">{{ route('member.list') }}</option>
                    <option value="{{ route('member.board') }}">{{ route('member.board') }}</option>
                    <option value="{{ route('about') }}">{{ route('about') }}</option>
                    <option value="{{ route('gallery') }}">{{ route('gallery') }}</option>
                    <option value="{{ route('videos') }}">{{ route('videos') }}</option>
                    <option value="{{ route('download') }}">{{ route('download') }}</option>
                    <option value="{{ route('news.list') }}">{{ route('news.list') }}</option>
                    <option value="{{ route('event.list') }}">{{ route('event.list') }}</option>
                    <option value="{{ route('contact') }}">{{ route('contact') }}</option>
                </datalist>
                <form method="post" action="{{ route('admin.popups.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group container" style="border: 1px rgb(206, 206, 206) solid; padding-bottom:5px;">
                        <strong>image</strong>
                        <img src="" style="height: 200px;" id="photo" />
                        <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..."
                            accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <strong>Link (Optional)</strong>
                        <input list="default-urls" type="url" name="link" placeholder="Enter Url To navigate" />
                    </div>

                    <div class="form-group">
                        <button class="button success">Submit data</button>
                    </div>
                </form>

            </div>



        </div>
        <hr>

        <div class="row">
            @foreach ($popups as $popup)

            <div class="cell-md-3">
                <div class="card shadow">
                    <img style="width:100%;" src="{{asset($popup->image)}}" alt="">
                    <div style="padding:10px;">
                        <div>
                            {{$popup->link}}
                        </div>
                        <hr>
                        <div>
                            <div class="row">
                                <div class="cell-6">
                                    <a href="{{route('admin.popups.del',['id'=>$popup->id])}}" class="button alert">Delete</a>
                                </div>
                                <div class="cell-6">
                                    @if ($popup->active==1)
                                    <a href="{{route('admin.popups.deactive',['id'=>$popup->id])}}" class="button warning">Deactivate</a>
                                    @else
                                    <a href="{{route('admin.popups.active',['id'=>$popup->id])}}" class="button success">Activate</a>
                                    @endif
                                </div>
                            </div>
                            <a href=""></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>


@endsection

@section('script')


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photo')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection
