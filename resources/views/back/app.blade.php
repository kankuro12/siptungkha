<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('back/css/metro-all.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/nepali.datepicker.v2.2.min.css') }}">

</head>
<body>



<div data-role="navview">
    <div class="navview-pane" style="background:#3A448B; color:#ffffff;" >
    @include('back.menu')
    </div>

    <div class="navview-content" style="min-height:100vh;">

    @yield('content')
    </div>
</div>


<script src="{{ asset('common/js/jquery.js') }}"></script>
<script src="{{ asset('back/js/metro.js') }}"></script>
<script type="text/javascript" src="{{ asset('back/js/nepali.datepicker.v2.2.min.js') }}"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn"></script>
<script src="{{ asset('common/js/axios.js') }}"></script>
  <script>
    tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table paste imagetools wordcount"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});
  </script>
@yield('script')
</body>
</html>
