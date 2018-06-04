<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tag;

class TagsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function listTags()
  {
    $tags = Tag::all();
    $param = [
      'tags' => $tags
    ];
    return view('tags.list', $param);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function createTag()
  {
    return view('tags.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function storeTag(Request $request)
  {
    $rules = [
      "name" => 'required',
    ];
    $messages = [
      "required" => 'el campo es requerido',
    ];
    $request->validate($rules, $messages);
    $tag = Tag::create([
      "name" => $request->input('name')
    ]);
    return redirect('/etiquetas');
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function editTag($id)
  {
    $tag = Tag::find($id);
    $param = [
      'tag' => $tag
    ];
    return view('tags.edit', $param);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function updateTag(Request $request, $id)
  {
    $tag = Tag::find($id);
    $tag->title = $request->input('name');
    $tag->save();
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroyTag($id)
  {
    $tag = Tag::find($id);
    $tag->project()->sync([]);
    $tag->delete();
    return redirect('/tags');
  }
}
