<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

use App\Http\Requests\ComicsFormRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
    
        return view('pages.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicsFormRequest $request)
    {
        $data = $request->all();

        $newComic = new Comic();

        $newComic ->titolo = $data['titolo'];
        $newComic ->casa_editrice = $data['casa_editrice'];
        $newComic ->genere = $data['genere'];
        $newComic ->data_pubblicazione = $data['data_pubblicazione'];
        $newComic ->prezzo = $data['prezzo'];

        $newComic -> save();

        return redirect() -> route('comic.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comics = Comic::find($id);

        return view('pages.show', compact('comics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comics = Comic::find($id);

        return view('pages.update', compact('comics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComicsFormRequest $request, $id)
    {
        $comic = Comic::find($id);

        $data = $request->all();

        $comic ->titolo = $data['titolo'];
        $comic ->casa_editrice = $data['casa_editrice'];
        $comic ->genere = $data['genere'];
        $comic ->data_pubblicazione = $data['data_pubblicazione'];
        $comic ->prezzo = $data['prezzo'];

        $comic -> save();

        return redirect() -> route('comic.index', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comics = Comic::find($id);

        $comics -> delete();

        return redirect() -> route('comic.index');

    }
}
