<?php

namespace App\Helper;

use Log;

class BookMetadataLogger
{
  public static function log($book_id, $shelf_id, $name, $isbn, $created_at)
  {
      $meta_data = [
        $book_id => [
          'shelf_id'        => $shelf_id,
          'author'          => $name,
          'isbn'            => $isbn,
          'published_at'    => $created_at
        ]
      ];

      Log::info($meta_data);
  }
}