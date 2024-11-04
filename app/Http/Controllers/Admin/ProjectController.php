<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:3|max:255',
            'cover' => 'nullable|image|max:2048',
            'type_id' => 'nullable|exist:categories,id',
        ]);

        $data['slug'] = str()->slug($data['title']);

        if (isset($data['cover'])) {
            $coverPath = Storage::put('uploads', $data['cover']);
            $data['cover'] = $coverPath;
        }
        

        $project = Project::create($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        
        $data = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:3|max:255',
            'cover' => 'nullable|image|max:2048',
            'remove_cover' => 'nullable',
        ]);

        $data['slug'] = str()->slug($data['title']);

        if (isset($data['cover'])) {
            if ($project->cover) {
                Storage::delete($project->cover);
                $project->cover = null;
            }
            $coverPath = Storage::put('uploads', $data['cover']);
            $data['cover'] = $coverPath;
        }
        else if (isset($data['remove_cover']) && $project->cover) {
            Storage::delete($project->cover);
            $project->cover = null;
        }

        $project->update($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover) {
            Storage::delete($project->cover);
            $project->cover = null;
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
