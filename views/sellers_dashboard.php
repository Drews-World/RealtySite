<?php 
session_start();

$add_property_form = ' 
<div class="form-container flex-col">
  <div class="flex-row justify-between" >
    <h5>Sell a property</h5>
    <button class="circular-button" id="expandButton">+</button>
  </div>
  <form action="../endpoints/add_property_endpoint.php" method="post" class="flex-col" id="propertyForm">
      <div class="flex-col input-container">
          <label for="price">Price</label>
          <input type="number" name="price" id="price" placeholder=" e.g. $300,000" required />
      </div>
      <div class="flex-col input-container">
          <label for="num-bedrooms">Number Bedrooms</label>
          <input type="number" name="num-bedrooms" id="num-bedrooms" placeholder="e.g. 3" required />
      </div>
      <div class="flex-col input-container">
          <label for="num-bathrooms">Number Bathrooms</label>
          <input type="number" name="num-bathrooms" id="num-bathrooms" placeholder="e.g. 3" required />
      </div>
      <div class="flex-col input-container">
          <label for="sqft">Sqft</label>
          <input type="number" name="sqft" id="sqft" placeholder="e.g. 4,598 sqft" required />
      </div>
      <div class="flex-col input-container">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" placeholder="Include street, city, state, and zip" required />
      </div>
      <button type="submit" class="action-btn">List property</button>
  </form>
</div>
';



if(isset($_SESSION['user_id'])) {
  
  include("../models/models.php");

  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM properties WHERE user_id = $user_id";
  $result = $conn->query($sql);
  
  //not liking this variable html but here we are
  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      
      $property_list .= '<div class="grid-item form-container">';
        $property_list .= "<img src=" . $row['image_path'] . " height=250 width='100%' style='border-radius:'/> <br/>";
        $property_list .= "<div class='stat-container flex-col'>";
          $property_list .= "<p><span class='blue house-stat'>Price:</span> $" . $row["price"]. "</p>";
          $property_list .= "<p><span class='blue house-stat'>Number Bedrooms:</span> " . $row["num_bedrooms"]. "</p>";
          $property_list .= "<p><span class='blue house-stat'>Number Bathrooms:</span> " . $row["num_bathrooms"]. "</p>";
          $property_list .= "<p><span class='blue house-stat'>Sqft:</span> " . $row["sqft"]. "</p>";
          $property_list .= "<p><span class='blue house-stat'>Address:</span> " . $row["address"]. "</p>";
        $property_list .= "</div>";
      $property_list .= '</div>';
      }
} 


}




$content_css = "<link rel='stylesheet'  href='../css/seller_dasboard.css'>";

$content = '
<div class="dashboard">
  <h1 style="text-align:center; margin-bottom:20px">Sellers Dasboard</h1>
  <div class="grid-container">
    ' . $property_list . '
    ' . $add_property_form . '
  </div>
</div>

<script src="../js/seller_dash.js"></script>

';


include 'main_template.php';

?>