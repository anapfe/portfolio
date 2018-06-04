<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tag;
use \App\Project;
use \App\Product;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    //$this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $tags = Tag::orderBy('name', 'asc')->get();
    $projects = Project::all();

    foreach ($projects as $project) {
      $project->etiquetas = "";
      foreach ($project->tags as $key => $tag) {
        if ( $key === 0 ) {
          $project->etiquetas .= $tag->name;
        } else {
          $project->etiquetas .= ", " . $tag->name;
        }
      }
    }
    $param = [
      'tags' => $tags,
      'projects' => $projects
    ];
    return view('index', $param);
  }
  public function indexAdmin()
  {
    return view('indexAdmin');
  }

  public function us() {
    return view('studio');
  }

  public function contactUs() {
    return view('contactUs');
  }

  public function store() {
    $products = Product::all();
    $param = [
      'products' => $products
    ];
    return view('store', $param);
  }
}
