<?php
require_once '../header.php';
require '../../logic/Content.php';
$content = new Content();
$data = $content->GetAllContent('jazz');
?>
    <main>
        <?php if(isset($data[2]->text)){echo $data[2]->text;} else{echo "test";} ?>
    </main>
<?php
require_once '../footer.php';