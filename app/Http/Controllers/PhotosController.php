<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use Image;
class PhotosController extends Controller
{
    //
	public function store(Request $request){
		//????
		$this->validate($request,[
		    'photo' => 'required',
		]);

		//?????????
		$name = "photo".time();
		$src = "img/photos/". $name .".jpg";
		Image::make($request->photo)->save(public_path($src));

		//???????????????????????
		if($request->has('name')){
		    $name = $request->name;
		}

		//????
		$photo = Photo::create([
		    'album_id' => $request->album_id,
		    'name' => $name,
		    'intro' => $request->intro,
		    'src' => "/" . $src,
		]);
		//??
		session()->flash('success', 'Upload Successful');
		return back();
	}//??????
    public function update(Request $request, $id)
    {
	//??
	$photo = Photo::findOrFail($id);
	$photo->update([
	    'name' => $request->name,
	    'intro' => $request->intro,
	]);

	//??
	session()->flash('success', 'Edit Successful');
	return back();
    }

    //????
    public function destroy($id)
    {
	//??
	$photo = Photo::findOrFail($id);
	$photo->delete();

	//??
	session()->flash('success', 'Delete Successful');
	return back();
    }
	
	
}
