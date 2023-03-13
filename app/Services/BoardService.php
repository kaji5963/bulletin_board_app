<?php

namespace App\Services;

use App\Repositories\BoardRepository;
use Illuminate\Support\Facades\DB;

class BoardService
{
  public static function getBoardList()
  {
    $boards = BoardRepository::getAllBoard();

    return $boards;
  }

  public static function getUser()
  {
    $user = BoardRepository::getAuthUser();

    return $user;
  }

  public static function createBoard($request)
  {
    BoardRepository::postCreateBoard($request);
  }

  public static function editBoard($id)
  {
    $board = BoardRepository::getSingleBoard($id);

    return $board;
  }

  public static function updateBoard($request, $id)
  {
    // DBファザードのtransaction
    DB::transaction(function () use ($request, $id) {
      $board = BoardRepository::postUpdateBoard($id);
      $board->title = $request->title;
      $board->content = $request->content;
      $board->save();
    });
  }

  public static function deleteBoard($id)
  {
    $board = BoardRepository::getDeleteBoard($id);

    $board->delete();
  }
}
