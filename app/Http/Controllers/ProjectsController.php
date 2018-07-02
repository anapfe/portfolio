<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use \App\Tag;
use \App\Image;

class ProjectsController extends Controller
{

  // buscar proyectos
  public function searchProjects(Request $request) {
    $projects = Project::where('title', 'like', '%' . $request->input('search') . '%')->get();
    $param = [
      'projects' => $projects,

    ];
    return view('projects.list', $param);
  }

  // lista proyectos
  public function listProjects() {
    $projects = Project::orderBy('created_at', 'desc')->get();
    $param = [
      'projects' => $projects,
    ];
    return view('projects.list', $param);
  }

  // proyectos por año
  public function listProjectsByYear()
  {
    $projects = Project::orderBy('year', 'desc')->get();
    $param = [
      "projects" => $projects
    ];
    return view('projects.list', $param);
  }

  // proyectos por cliente
  public function listProjectsByClient()
  {
    $projects = Project::orderBy('client', 'asc')->get();
    $param = [
      "projects" => $projects
    ];
    return view('projects.list', $param);
  }

  // proyectos por titulo
  public function listProjectsByTitle()
  {
    $projects = Project::orderBy('title', 'asc')->get();
    $param = [
      "projects" => $projects
    ];
    return view('projects.list', $param);
  }

  // proyectos por tag
  public function listProjectsByTag($tagName)
  {
    $tag = Tag::where("name", "=", $tagName)->first();
    $tags = Tag::orderBy('name', 'asc')->get();

    $param = [
      'tag' => $tag,
      'tags' => $tags,
      'projects' => $tag->projects
    ];
    return view('index', $param);
  }

  // descripcion de proyecto para index
  public function projectDescription($id) {
    $project = Project::find($id);
    if ($project == null) {
      return redirect('/error');
    }
    $project->etiquetas = "";
    foreach ($project->tags as $key => $tag) {
      if ( $key === 0 ) {
        $project->etiquetas .= $tag->name;
      } else {
        $project->etiquetas .= ", " . $tag->name;
      }
    }

    $param = [
      'project' => $project
    ];
    return view('projects.show', $param);
  }

  // crear proyecto
  public function createProject() {
    $tags = Tag::orderBy('name', 'asc')->get();
    $param = [
      'tags' => $tags
    ];
    return view('projects.create', $param);
  }

  // subida de multiphoto
  public function multiPhoto(Request $request, $project) {
    $images = $request->file('altImg');
    foreach($images as $key => $value) {
      $image = $this->uploadPhoto($value, $project);
    }
  }
  public function uploadPhoto($image, $project) {
    $extension = $image->getClientOriginalExtension();
    $path = $image->storeAs("/project_img", uniqid() . "."  . $extension, 'public');
    $image = Image::create([
      'path' => $path
    ]);

    $image->project()->associate($project);
    $image->save();

    return $image;
  }

  // guardar proyecto
  public function storeProject(Request $request) {
    $rules = [
      "title" => "required",
      "year" => "required|numeric",
      "client" => "required",
      "tags" => 'required',
      "description" => 'required',
      "primary_img" => 'required'
    ];
    $messages = [
      "required" => "El campo es requerido",
      "numeric" => "El campo debe ser un número"
    ];

    $request->validate($rules, $messages);

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs("/project_img", uniqid() . "."  . $extension, 'public');
    } else {
      $path = "";
    }

    $project = Project::create([
      "title" => $request->input('title'),
      "description" => $request->input('description'),
      "year" => $request->input("year"),
      "client" => $request->input("client"),
      "primary_img" => $path
    ]);

    if (count($request->file('altImg')) > 0) {
      $this->multiPhoto($request, $project);
    }

    $project->tags()->sync($request->input('tags'));
    $project->save();
    return redirect('/proyectos');
  }

  // editar proyect
  public function editProject($id)
  {
    $project = Project::find($id);
    $tags = Tag::all();
    $etiquetas = $project->tags;
    $param = [
      'project' => $project,
      'tags' => $tags,
      'etiquetas' => $etiquetas
    ];
    return view('projects.edit', $param);
  }

  public function updateProject(Request $request, $id)
  {
    $project = Project::find($id);

    $project->title = $request->input('title');
    $project->description = $request->input('description');
    $project->year = $request->input('year');
    $project->client = $request->input('client');

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs('/project_img', uniqid() . "."  . $extension, 'public');
      $project->primary_img = $path;
    } else {
      $project->primary_img = $project->primary_img;
    }

    if (count($request->file('altImg')) > 0) {
      $this->multiPhoto($request, $id);
    }

    $project->tags()->sync($request->input('tags'));
    $project->save();

    return redirect('/proyectos');
  }

  public function destroyProject($id)
  {
    $project = Project::find($id);
    $project->tags()->sync([]);
    foreach($project->images as $image) {
      // $image->project()->dissociate();
      $image->project_id = null;
      $image->save();
    }
    $project->delete();
    // return redirect('/admin/proyectos');
    // return response()->json(['success'=>"Producto eliminado correctamente"]);
  }

  public function error404() {
    return view('projects.error404');
  }
}
