<div class="articles_wrapper">
<?php
    foreach($articles as $article)
    {
        echo '<div class="articles round gradient">'.html::anchor('welcome/article/'.$article->id, $article->name).'</div>';
    }
?>
<?php echo $page_links;?> 
</div>

