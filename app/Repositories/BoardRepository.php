<?php

namespace App\Repositories;

use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoardRepository
{
  public static function getAllBoard()
  {
    $boards = Board::orderBy('id', 'desc')->paginate(10);
    return $boards;
  }

  public static function getAuthUser()
  {
    $user = Auth::user();

    return $user;
  }

  public static function postCreateBoard($request)
  {
    //手動のtransaction
    try {
      DB::beginTransaction();
      Board::create([
        'title' => $request->title,
        'user_id' => Auth::user()->id,
        'content' => $request->content,
      ]);

      DB::commit();
    } catch (\Throwable $e) {
      DB::rollBack();
    }
  }

  public static function getSingleBoard($id)
  {
    $board = Board::findOrFail($id);

    return $board;
  }

  public static function postUpdateBoard($id)
  {
    $board = Board::findOrFail($id);

    return $board;
  }

  public static function getDeleteBoard($id)
  {
    $board = Board::findOrFail($id);

    return $board;
  }
}
