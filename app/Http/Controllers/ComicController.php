<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $comics = Comic::where('title', 'LIKE', "%$search")->paginate(5);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:comics|max:255',
            'price' => 'required|numeric',
            'series' => 'required|min:3|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|min:3|max:255',
        ]);
        $data = $request->all();
        // $data=$request->all();
        // $comic= new Movie();
        // $comic->title = $data['title'];
        // $comic->overview = $data['overview'];
        // $comic->fill($data);
        // $comic = Str::slug($comic->title, '-');
        // $comic->slug=$comic;
        // $comic->save();
        // return redirect()->route('comics.show', $comic->id);
        $comic = Comic::create($data);
        return redirect()->route('comics.show', compact('comic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::findorfail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => ['required', Rule::unique('comics')->ignore($comic->id), 'max:255'],
            'price' => 'required|numeric',
            'series' => 'required|string|min:3|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|string|min:3|max:255',
        ]);
        $data = $request->all();
        $comic->update($data);
        return redirect()->route('comics.show', compact('comic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        // Comic::destroy($comic);
        $comic->delete();
        return redirect()->route('comics.index')->with('trash', $comic->title);
    }

    public function trash()
    {
        $comics = Comic::onlyTrashed()->get();
        return view('comics.trash', compact('comics'));
    }

    public function restore($id)
    {
        $comic = Comic::onlyTrashed()->find($id);
        $comic->restore();
        return redirect()->route('comics.index')->with('restore', $comic->title);
    }

    public function delete($id)
    {
        $comic = Comic::onlyTrashed()->find($id);
        $comic->forceDelete();
        return redirect()->route('comics.index')->with('delete', $comic->title);
    }
}
