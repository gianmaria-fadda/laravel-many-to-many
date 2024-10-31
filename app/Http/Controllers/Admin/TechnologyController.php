<?php

namespace App\Http\Controllers\Admin;

use App\Models\technology;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class technologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologys = technology::all();

        return view('admin.technologys.index', compact('technologys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:3|max:255',
            'type_id' => 'nullable|exist:categories,id',
        ]);

        $data['slug'] = str()->slug($data['title']);

        $technology = technology::create($data);

        return redirect()->route('admin.technologys.show', ['technology' => $technology->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(technology $technology)
    {
        return view('admin.technologys.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(technology $technology)
    {
        return view('admin.technologys.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, technology $technology)
    {
        
        $data = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:3|max:255'
        ]);

        $data['slug'] = str()->slug($data['title']);

        $technology->update($data);

        return redirect()->route('admin.technologys.show', ['technology' => $technology->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologys.index');
    }
}
