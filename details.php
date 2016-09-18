<?php 
include("inc/data.php");
include("inc/functions.php");

//when the user is redirected to this page,
//get the id of the article from the catalog
//and set the $item as the catalog[id]

if (isset($_GET["id"])){
  $id = $_GET["id"];
  if (isset($catalog[$id])) {
    $item = $catalog[$id];
  }
}

//else, if the item is not set or not available
//redirect the user to full catalog page

if (!isset($item)) {
  header("location:catalog.php");
  exit;//to make sure nothing runs during the redirection
}

$pageTitle = $item["title"];
//a variable to highlight the selected page
$section = null;

include("inc/header.php"); ?>

<div class="section page ">

  <div class="wrapper">
    <div class="breadcrumbs">
      <a href="catalog.php">Full Catalog</a>
      &gt; <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>"><?php echo $item["category"]; ?></a>
      &gt; <?php echo $item["title"]; ?>
    </div>
    
    <div class="media-picture">
      <span>
        <img src="<?php echo $item["img"];?>" alt="<?php echo $item["title"];?>" />
      </span>
    </div>
    
    <div class="media-details">
      <h1><?php echo $item["title"]; ?></h1>
      <table>
        
        <tr>
          <th>Category</th>
          <td><?php echo $item["category"]; ?></td>
        </tr>
        
        <tr>
          <th>Genre</th>
          <td><?php echo $item["genre"]; ?></td>
        </tr>
        
        <tr>
          <th>Format</th>
          <td><?php echo $item["format"]; ?></td>
        </tr>
        
        <tr>
          <th>Year</th>
          <td><?php echo $item["year"]; ?></td>
        </tr>
        
        //if the category is books, display the uncommon details
        <?php if (strtolower($item["category"]) == "books") {?>
        //if category is books, we want to show the author and the isbn
        <tr>
          <th>Authors</th>
          <td><?php echo implode(", ",$item["authors"]); ?></td>
        </tr>
        
        <tr>
          <th>Publisher</th>
          <td><?php echo $item["publisher"]; ?></td>
        </tr>
        
        <tr>
          <th>ISBN</th>
          <td><?php echo $item["isbn"]; ?></td>
        </tr>
        
        //if it is movies
        <?php } else if (strtolower($item["category"]) == "movies") {?>
        <tr>
          <th>Director</th>
          <td><?php echo $item["director"]; ?></td>
        </tr>
        
        <tr>
          <th>Writers</th>
          <td><?php echo implode(", ",$item["writers"]); ?></td>
        </tr>
        
        <tr>
          <th>Authors</th>
          <td><?php echo implode(", ",$item["stars"]); ?></td>
        </tr>
        
        //if it is music
        <?php } else if (strtolower($item["category"]) == "music") {?>
        <tr>
          <th>Artist</th>
          <td><?php echo $item["artist"]; ?></td>
        </tr>
        <?php }?>
        
        
      
      </table>
      
    </div>
    
    
  </div>
</div>







































