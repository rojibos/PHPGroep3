<?php

require 'C:\xampp\htdocs\herkansing/DAL/Content_DAL.php';
require 'C:\xampp\htdocs\herkansing/models/Content_Model.php';


class Content
{
    private $DAL;
    private $Model;
    private $data=[];

    function __construct()
    {
        $this->DAL = new Content_DAL();

    }
    function GetAllContent($page)
    {
        $DataRows = $this->DAL->GetAllContent($page);

        foreach ($DataRows as $row){
            $this->Model = new Content_Model();

            $this->Model->type = $row["type"];
            $this->Model->text = $row["text"];
            $this->Model->id = $row["content_id"];

            $this->data[] = $this->Model;
        }

        return $this->data;
    }
}