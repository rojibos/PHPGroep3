<?php
require PATH.'DAL/Content_DAL.php';
require PATH.'models/Content_Model.php';


class Content
{
    private $DAL;
    private $Model;

    function __construct()
    {
        $this->DAL = new Content_DAL();
        $this->Model = new Content_Model();
    }
    function GetAllContent($page)
    {
        $DataRows = $this->DAL->GetAllContent($page);

        foreach ($DataRows as $row){
            switch ($row[1]){
                case "title":
                    $this->Model->title = $row[0];
                    break;
                case "subtitle":
                    $this->Model->subtitle = $row[0];
                    break;
                case "header":
                    $this->Model->headers = $row[0];
                    break;
                case "content":
                    $this->Model->contents = $row[0];
                    break;
                default:
                    break;
            }
        }

        return $this->Model;
    }
}