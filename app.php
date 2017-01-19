<?php
  class app{
    var $parser; // for the parser
    var $markdown; // for the actual markdown
    var $filename; // the file name for the
    var $shortcuts;
    public function __construct ($vars = null){
      $this -> init();
    }

    public function init(){
      $this -> parser = new \cebe\markdown\GithubMarkdown();
      $this -> shortcuts = $this::get_shortcuts();
      $this -> markdown = $this::set_markdown();

    }
    private function get_shortcuts() {
      $shortcuts = file_get_contents(getcwd() . '/shortcuts.json');
      $shortcuts = json_decode($shortcuts, true);
      return $shortcuts;
    }
    private function set_markdown() {
      if (!isset($_GET['docname'])) {
        $this -> filename = '/README.md';
        return file_get_contents(getcwd() . '/README.md');
      }
      $docname = $_GET['docname'];
      if ( is_array($this->shortcuts) && isset($this->shortcuts[$docname]) ){
        $docname = $this->shortcuts[$docname];
      }
      if (strpos($docname, 'http') !== false) {
        if (substr($docname,-3) == '.md' && $this::checkExternalFile($docname) == 200) {
          $this -> filename = $docname;
          return file_get_contents($docname);
        }
      }
      else {
        $filename = getcwd() .'/docs/' . $_GET['docname'] . '.md';
        if (file_exists ( $filename )){
          $this -> filename = '/docs/' . $_GET['docname'] . '.md';
          return file_get_contents($filename);
        }
      }
      return $this::set404();
    }
    private function checkExternalFile($url) {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_NOBODY, true);
      curl_exec($ch);
      $retCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      return $retCode;
    }
    private function set404(){
      http_response_code(404);
      return "# 404 file not found";
    }
  }
  $app = new app();
