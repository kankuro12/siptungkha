<div class="footer" >
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-section">
                    @php
                        $links = [];
                        $links1 = [];
                        $links2 = [];
                        $data = custom_config('footer_1_links');
                        $data1 = custom_config('footer_2_links');
                        $data2 = custom_config('footer_2_links');
                        if($data!=null && $data->value!= null){
                            $links = json_decode(custom_config('footer_1_links')->value);
                        }
                        if($data1!=null && $data1->value!= null){
                            $links1 = json_decode(custom_config('footer_2_links')->value);
                        }
                        if($data2!=null && $data2->value!= null){
                            $links2 = json_decode(custom_config('footer_3_links')->value);
                        }
                    @endphp
                    <div class="title">
                       {{ custom_config('footer_title_1')->value}}
                    </div>
                    <ul>
                        @foreach ($links as $link)
                        <li><a href="{{ $link->link }}" style="font-size: 13px;">{{ $link->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-section">
                    <div class="title">
                        {{ custom_config('footer_title_2')->value}}
                    </div>
                    <ul>
                        @foreach ($links1 as $link)
                        <li><a href="{{ $link->link }}" style="font-size: 13px;">{{ $link->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-section">
                    <div class="title">
                        {{ custom_config('footer_title_3')->value}}
                    </div>
                    <ul>
                        @foreach ($links2 as $link)
                        <li><a href="{{ $link->link }}" style="font-size: 13px;">{{ $link->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                {!! custom_config('theme_facebook')->value !!}
            </div>
        </div>
        <hr>
        <div class="text-center m-2">
            <div class="row last-footer">
                <div class="container" style="font-size: 12px;">
                    {!! custom_config('copyright')->value !!}
                </div>
             </div>
        </div>
    </div>
</div>
