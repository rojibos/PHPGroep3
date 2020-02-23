<?php
require_once '../header.php';
require '../../logic/Content.php';
$content = new Content();
$data = $content->GetAllContent('jazz');
?>
<main>
    <?php echo $data[2]->text; ?>
</main>
<?php
require_once '../footer.php';