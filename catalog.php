<?php 
include("inc/data.php");
include("inc/functions.php");

$pageTitle = "Full Catalog";
//a variable to highlight the selected page
$section = null;

if (isset($_GET["cat"])){
  if ($_GET["cat"] == "books") {
    $pageTitle = "Books";
    $section = "books";
  } else if ($_GET["cat"] == "movies"){
    $pageTitle = "Movies";
    $section = "movies";
  } else if ($_GET["cat"] == "music") {
    $pageTitle = "Music";
    $section = "music";
  }
}
  
include("inc/header.php"); ?>

<div class="section catalog page">
  <div class="wrapper">
    <h1><?php 
      if ($section != null) {
        echo "<a href='catalog.php'>Full Catalog</a> &gt; ";
      }
      echo $pageTitle;
    ?></h1>
    <ul class="items">
      <?php 
        //uses array_category and passing in the whole $catalog and filters it using $section
        //the array_category will return the array keys that are filtered
        $categories = array_category($catalog, $section); 
        
        //go through each keys in $categories and display it accordingly using get_item_html function
        foreach($categories as $id) {
          echo get_item_html($id,$catalog[$id]);
        }
      ?>    
    </ul>
  </div>
</div>

<?php include("inc/footer.php") ?>