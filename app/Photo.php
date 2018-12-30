<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
   * Массово присваиваемые атрибуты.
   *
   * @var array
   */
  protected $fillable = ['name'];

  /**
   * Получить пользователя - владельца данного фото
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
