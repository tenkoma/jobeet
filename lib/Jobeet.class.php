<?php
class Jobeet
{
  static public function slugify($text)
  {
    // 文字ではないもしくは数値を-に置き換える
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // トリムする
    $text = trim($text, '-');

    // 翻字する
    if (function_exists('iconv'))
    {
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // 小文字に変換する
    $text = strtolower($text);

    // 望まない文字を取り除く
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
      return 'n-a';
    }
    
    return $text;
  }
}