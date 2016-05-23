<?php
class WorFileCache
{
    private $FILE     = "";
    private $PATH     = "";
    private $Filepath = "";
    public function __construct($filename = "", $path = "")
    {
        $this->PATH     = dirname(__FILE__) . "/" . $path . "/";
        $this->FILE     = $filename . '.txt';
        $this->Filepath = $this->PATH . '/' . $this->FILE;
    }
    public function isCacheFolderExist()
    {
        $path = $this->PATH;
        if (!file_exists($path) && !is_dir($path)) {
            if (!mkdir($path, 0777, true)) {
                $file = fopen($path . "/error.log", "a");
                fwrite($file, '[' . date('Y-m-d H:i:s') . '] Cannot create folder.');
                fclose($file);
                return true;
            }
            return false;
        }
        return true;
    }
    public function readCache()
    {
        $path = $this->Filepath;
        //echo $path;
        if ($this->isCacheFolderExist()) {
            if (file_exists($path)) {
                $contents   = file_get_contents($path);
                $cacheArray = json_decode($contents);
                if ($cacheArray) {
                    return $cacheArray;
                } else {
                    return new stdClass();
                }
            } else {
                return new stdClass();
            }
        }
    }
    public function saveCache($key, $text)
    {
        $cacheArray       = new stdClass();
        $path             = $this->Filepath;
        $cacheArray       = $this->readCache();
        $cacheArray->$key = $text;
        $file             = fopen($path, "w+");
        fwrite($file, json_encode($cacheArray));
        fclose($file);
    }

    public function getCache($key)
    {
        $path = $this->Filepath;
        if ($cacheArray = $this->readCache()) {
            if (isset($cacheArray->$key)) {
                return $cacheArray->$key;
            } else {
                return "";
            }
        }
    }
}
