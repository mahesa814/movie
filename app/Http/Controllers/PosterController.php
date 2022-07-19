<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosterRequest;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PosterController extends Controller
{
    public function show_data()
    {
        return view('home',[
            'posters' => Poster::paginate(4),
        ]);

    }
    public function edit($id)
    {
        return view('edit',[
            'poster' => Poster::find($id)
        ]);
    }
    public function store(PosterRequest $request)

    {

        $poster = Poster::create($request->all());
        if($request->hasFile('poster')){
            $request->file('poster')->move('image/' , $request->file('poster')->getClientOriginalName());
            $poster->poster = $request->file('poster')->getClientOriginalName();
            $poster->save();
        }
        return back()->with('toast_success','berhasi tambah data');

    }
    public function update(Request $request,$id)
    {

        $poster = Poster::find($id);
        $poster->title =$request->input('title');
        if($request->hasFile('poster')){
            $updatePoster = 'image/'.$poster->poster;
            if(File::exists($updatePoster)){
                File::delete($updatePoster);
            }
            $request->file('poster')->move('image/' , $request->file('poster')->getClientOriginalName());
            $poster->poster = $request->file('poster')->getClientOriginalName();
        }
        $poster->update();
        return back()->with('toast_success','berhasil update film');

    }
    public function destroy($id)

    {

        $poster  = Poster::find($id);
        $image_path = 'image/'.$poster->poster;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $poster->delete();
        return back()->with('toast_success','berhasil hapus film');
    }
}
