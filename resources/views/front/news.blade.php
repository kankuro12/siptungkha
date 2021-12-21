<div class="p-3">
   @foreach ($newstab as $new)

   <div class="single-news">
       <div class="news-title">
           <a href="{{ route('news.single',$new->id)}}">{{ $new->title }}</a>
       </div>
       <div class="news-date">
           &#128197; {{ $new->published}}
       </div>
       <div>
           <div class="row">
               <div class="col-4 text-center">
                   <img src="{{ asset($new->image) }}" class="news-image w-100" alt="">
               </div>
               <div class="col-8 d-flex align-items-center">
                   <div class="news-text">
                        {!! $new->descr !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
   @endforeach



</div>
