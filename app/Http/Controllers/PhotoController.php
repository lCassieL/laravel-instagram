<?php

namespace App\Http\Controllers;

use Storage;

use Illuminate\Http\Request;

use App\Http\Requests;

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
  return view('photos.index');
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
}
