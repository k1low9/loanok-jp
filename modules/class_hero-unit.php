<?php

  /**
   * hero image class
   */
  class HeroUnit
  {
    private $dir;
    private $files;

    function __construct($path , $ext = null){

      if (!is_null($ext)) {
        $ext = strtolower($ext);
      }
      $dh = opendir($path);
      $result = array();
      while ($file = readdir($dh)) {
        if ($file != '.' && $file != '..') {
          if (is_null($ext) || strtolower($this->getExt($file)) == $ext) {
            $result[] = $file;
          }
        }
      }
      closedir($dh);

      $this->files = $result;

    }
    function getExt($filename)
    {
      if (($pos = strrpos($filename, '.')) !== false) {
        return substr($filename, $pos + 1);
      } else {
        return '';
      }
    }

    function getHero(){
      return $this->files;
    }
  }
