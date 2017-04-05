<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use Image;

class AlbumsController extends Controller
{
    //
	public function store(Request $request){
		$this->validate($request,['name'=>'required|max:50',]);
		$album=ALbum::create([
			'name'=>$request->name,
			'intro'=>$request->intro,
			'password'=>$request->password,
		]);
		session()->flash('success','create successful');
		return back();	
	}
	public function show($id){
		$album = Album::findOrFail($id);
		$photos = $album->photos()->orderBy('created_at','desc')->paginate(20);
		return view('albums.show',compact(['album','photos']));	
	}
	    //??????
    	public function update(Request $request, $id)
    	{
        	//????
       	 	$this->validate($request, [
		    'name' => 'required|max:50',
		]);

		//????
		$album = Album::findOrFail($id);
		$album->update([
		 	'name' => $request->name,
		    	'intro' => $request->intro,
		]);
		
		//??????????????
        if($request->hasFile('cover')){
            //?????????????
            $cover_path = "img/covers/" . time() . ".jpg";
            Image::make($request->cover)->resize(355, 200)->save(public_path($cover_path));
            //??????
            $album->update([
                'cover' => "/" . $cover_path,
            ]);
        }

        //??????????????
        //...

        //??
        session()->flash('success', 'Edit successful');
        return back();				
    }

    //????
    public function destroy($id)
    {
        //??
        $album = Album::findOrFail($id);
        $album->delete();

        //??
        session()->flash('success','Delete Successful');
        return redirect()->route('home');

    }


}
