<?php
function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["title"] . "' />" 
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function array_category($catalog, $category) {
  //if the category is not chosen, which is the full catalog
  //return all keys to the output 
//  if ($category == null){
//    return array_keys($catalog); 
//  }
//  
  $output = array();
  
  foreach ($catalog as $id => $item) {
    if ($category == null || strtolower($category)  == strtolower($item["category"])) {
      $sort = $item["title"];
      //trims the word "the ", "a ", "an "
      $sort = ltrim($sort, "The ");
      $sort = ltrim($sort, "A ");
      $sort = ltrim($sort, "An ");
      $output[$id] = $sort;
    }
  }
  //sorts the $output array accordingly
  asort($output);
  //then returning all the keys as the output;
  return array_keys($output);

}