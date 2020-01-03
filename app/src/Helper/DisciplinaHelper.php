<?php


namespace Ifnc\Tads\Helper;


class DisciplinaHelper
{
    public $disciplina;
    public $type_border;
    public $type_btn;
    public $link;

    public function __construct($disciplina,$type_border,$type_btn,$link)
    {
        $this->disciplina = $disciplina;
        $this->type_border = $type_border;
        $this->type_btn = $type_btn;
        $this->link = $link;

    }

}