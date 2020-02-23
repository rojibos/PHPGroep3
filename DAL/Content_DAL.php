<?php
require 'Database.php';

class Content_DAL extends Database
{
    function GetAllContent($page)
    {
        $data = [];
        $query = "SELECT text, type, content_id FROM content WHERE page LIKE :page";
        try {
            $stmt = $this->dbconnenct()->prepare($query);
        }
        catch(Exception $e){
            echo $e->getMessage().'PDO error, Cant prepare statement';
        }
        $stmt->execute(["page" => $page]);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $row;
        }
        return $data;
    }
}