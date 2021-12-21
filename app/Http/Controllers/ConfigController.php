<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageConfig;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /*
    image,
    text,
    desc,
    link,
    link_group
    */
    private $c=[
        'logo'=>[
            "name"=>"Logo",
            "type"=>"image",
        ],
        'banner_image'=>[
            "name"=>"Theme Image",
            'type'=>"image"
        ],

        'theme_video'=>[
            "name" =>"Theme Video",
            "type" => "desc"
        ],

        'about'=>[
            "name" =>"Short About For Home page",
            "type" => "desc"
        ],

        'footer_title_1'=>[
            "name"=>"Footer Title First",
            'type'=>"text"
        ],

        'footer_1_links'=>[
            "name"=>"Footer Title First links",
            'type'=>"link_group"
        ],

        'footer_title_2'=>[
            "name"=>"Footer Title Second",
            'type'=>"text"
        ],

        'footer_2_links'=>[
            "name"=>"Footer Title Second links",
            'type'=>"link_group"
        ],

        'footer_title_3'=>[
            "name"=>"Footer Title First",
            'type'=>"text"
        ],

        'footer_3_links'=>[
            "name"=>"Footer Title Third links",
            'type'=>"link_group"
        ],

        'theme_facebook'=>[
            "name" =>"Facebook page Theme",
            "type" => "desc"
        ],

        'copyright'=>[
            "name" =>"Coyright Section",
            "type" => "desc"
        ],

        // 'footer_social'=>[
        //     'name'=>"Footer Social Icons",
        //     'type'=>'link_image_group'
        // ]

    ];
    public function index(Request $request){
        $configs=PageConfig::all();
        $data=[];
        foreach ($configs as $config) {
            $data[$config->identifire]=$config->value;
            if($config->secondary_value!=null){
                $data[$config->identifire."_secondary"]=$config->secondary_value;
            }
        }
        $cs=$this->c;
        return view('config.index',compact('data','cs'));
    }

    public function store(Request $request){
        // dd($request->all());

        foreach ($this->c as $key => $config) {
            $con=PageConfig::where('identifire',$key)->first();
            if($con==null){
                $con=new PageConfig();
                $con->identifire=$key;
            }
            if(strtolower($config['type'])=="image"){
                if($request->hasFile('input_'.$key)){
                    $con->value=$request->file('input_'.$key)->store("uploads/config");
                }
            }elseif(strtolower($config['type'])=="desc"){
                    $con->value=$request->input('input_'.$key);
            }elseif(strtolower($config['type'])=="text"){
                $con->value=$request->input('input_'.$key);
            }elseif(strtolower($config['type'])=="link"){
                $con->value=$request->input('input_'.$key);
                $con->secondary_value=$request->input('input_secondary_'.$key);
            }elseif(strtolower($config['type'])=="link_group"){
               if($request->has('input_'.$key)){
                   $d=[];
                   foreach ($request->all()['input_'.$key] as $id) {
                       $d[$key."_".$id]=(object)[
                           'id'=>$id,
                           'text'=>$request->input("link_text_".$key.'_'.$id),
                           'link'=>$request->input("link_link_".$key.'_'.$id)
                       ];
                   }
                   $do=(object)($d);
                   $doj=json_encode($do);
                   $con->value=$doj;
               }
            }elseif(strtolower($config['type'])=="link_image"){
                if($request->hasFile('input_'.$key)){
                    $con->value=$request->file('input_'.$key)->store("uploads/config");
                }
                $con->secondary_value=$request->input('input_secondary_'.$key);
            }elseif(strtolower($config['type'])=="link_image_group"){
                if($request->has('input_'.$key)){
                    $d=[];
                    foreach ($request->all()['input_'.$key] as $id) {
                        if($request->hasFile("link_image_".$key.'_'.$id)){

                            $d[$key."_".$id]=(object)[
                                'id'=>$id,
                                'image'=>$request->file("link_image_".$key.'_'.$id)->store("uploads/config"),
                                'link'=>$request->input("link_link_".$key.'_'.$id)
                            ];
                        }else{
                            $d[$key."_".$id]=(object)[
                                'id'=>$id,
                                'image'=>$request->input("link_text_".$key.'_'.$id),
                                'link'=>$request->input("link_link_".$key.'_'.$id)
                            ];
                        }
                    }
                    $do=(object)($d);
                    $doj=json_encode($do);
                    $con->value=$doj;
                }
             }

            $con->save();
        }
        return redirect()->back();

    }
}
