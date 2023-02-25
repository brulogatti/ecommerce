<?php
namespace HCode;

use Rain\Tpl;

class PageAdmin {

    private $tpl;
    private $itens = [];
    private $defaults = [
        "data"=>[]
    ];

    public function __construct($opts = array(), $tpl_dir= "/views/admin/")
    {
        $this->itens = array_merge($this->defaults, $opts);

        // config
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]. $tpl_dir,
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );

        Tpl::configure($config);

        $this->tpl = new Tpl;

        $this->setData($this->itens["data"]);

        $this->tpl->draw("header");
    }

    private function setData($data = array()){
        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function setTpl($name, $data = array(), $returnHTML = false){
        $this->setData($data);

        return $this->tpl->draw($name, $returnHTML);
    }

    public function __destruct()
    {
        $this->tpl->draw("footer");
    }
}
/*
class PageAdmin extends Page{
            public function __construct($opts = array(), $tpl_dir= "/views/admin/")
            {
                parent::__construct($opts, $tpl_dir);
            }
    }*/
?>