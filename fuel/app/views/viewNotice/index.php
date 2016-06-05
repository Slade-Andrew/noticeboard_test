<h1><?php echo $title; ?></h1>

<ul>
<?php
    foreach ($articles as $a)
    {
        echo '<li>'.$a->title.'</li>';
    }
?>
</ul>