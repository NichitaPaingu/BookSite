<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'comment'=>'required',
            'image'=>'nullable|image'
        ]);
        
        if($request->hasFile('image')){
            $file=$request->file('image')->getClientOriginalName();
            $image_name_without_extension=pathinfo($file,PATHINFO_FILENAME);
            $ext=$request->file('image')->getClientOriginalExtension();
            $image=$image_name_without_extension.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/img/articles',$image);
        }else{
            $image="noimage.jpg";
        }
        $article=new Article;
        $article->title=$request->input('title');
        $article->author=$request->input('author');
        $article->comment=$request->input('comment');
        $article->user_id=auth()->user()->id;
        $article->image=$image;
        $article->save();
        return redirect('/')->with('success','Статья успешно добавленна');
    }
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with(['article'=>$article]);
    }
    public function edit($id)
    {
        $article=Article::find($id);
        if(auth()->user()->id!=$article->user_id){
            return redirect('/')->with('error','Это не ваша статья для изменения');
        }
        return view('articles.edit')->with('article',$article);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'comment'=>'required',
            'image'=>'nullable|image'
        ]);
        $article=Article::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image')->getClientOriginalName();
            $img_name_without_extension=pathinfo($file,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $image=$img_name_without_extension."_".time()."_".$extension;
            $request->file('image')->storeAs('public/img/articles',$image);

            if($article->image!="noimage.jpg"){
                Storage::delete('public/img/articles/'.$article->image);
            }
            $article->image = $image;
        } 
        
        
        $article->title=$request->input('title');
        $article->author=$request->input('author');
        $article->comment=$request->input('comment');
        $article->save();
        return redirect('/')->with('success',"Ваша статья успешно обновлена");
    }
    public function destroy($id)
    {
        $article=Article::find($id);
        if(auth()->user()->id!=$article->user_id){
            return redirect('/')->with('error',"Это не ваша статья");
        }
        if($article->image!="noimage.jpg"){
            Storage::delete('public/img/articles/'.$article->image);
        }
        if($article){
            $article->delete();
            return redirect('/')->with('success','Статья была удалена');
        }else{
            return redirect('/')->with('error','Статья не была найдена');
        }
    }
}
