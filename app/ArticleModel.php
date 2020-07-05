<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleModel extends Model
{
    protected $fillable = ["title", "content",'slug','tag','created_at','updated_at'];
    public static function getAll(){
        $articles = DB::table('articles')->paginate(5);

        return $articles;
    }

    public static function storeData($data){
        $data['slug'] = str::slug($data['title']);
        // $data['n_tag'] = explode(', ' ,$data->tag);
        $save = DB::table('articles')->insert([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $data['slug'],
            'tag' => ($data['tag']),
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'updated_at' => \Carbon\Carbon::now('Asia/Jakarta'),
        ]);
        return response()->json($save);
    }   

    public static function getById($id){
        $data = DB::table('articles')->where('id','=',$id)->get();

        return $data;
    }

    public static function updateData($request, $id){
        $update['slug'] = str::slug($request['title']);
        $update = DB::table('articles')->where('id','=',$id)->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'tag' => $request['tag'],
            'updated_at' => \Carbon\Carbon::now('Asia/Jakarta')
        ]);
        $return = DB::table('articles')->where('id','=',$id);
        return $return;
      }

      public static function destroyAll($id){
        $Answer = DB::table('articles')->where('id','=',$id)->delete();
        return $Answer;
      }

}
