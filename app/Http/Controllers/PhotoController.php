<?php

namespace App\Http\Controllers;

use Storage;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Photo;

class PhotoController extends Controller
{
    /**
   * Создание нового экземпляра контроллера.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
 * Отображение списка всех фото пользователя.
 *
 * @param  Request  $request
 * @return Response
 */
public function index(Request $request)
{
  $photos = $request->user()->photos()->get();
  return view('photos.index', [
    'photos' => $photos,
  ]);
}

    /**
 * Создание нового фото.
 *
 * @param  Request  $request
 * @return Response
 */
public function store(Request $request)
{
  // $this->validate($request, [
  //   'name' => 'required',
  // ]);
	$file = $request->file('name');
	Storage::put('public/images/'.$file->getClientOriginalName(),file_get_contents($request->file('name')->getRealPath()));

  $request->user()->photos()->create([
    'name' => $file->getClientOriginalName(),
  ]);

  return redirect('/photos');
}

/**
 * Уничтожить заданную задачу.
 *
 * @param  Request  $request
* @param  Photo  $photo
* @return Response
*/
public function destroy(Request $request, Photo $photo)
{
  $this->authorize('destroy', $photo);
  // var_dump($photo->name);
  // exit();
  // unlink('public/images/'.$photo->name);
  Storage::delete('public/images/'.$photo->name);
  $photo->delete();
  return redirect('/photos');
}
}
