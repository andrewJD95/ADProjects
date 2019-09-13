
<?php
    $keyword = $category = "";
    $count = 0;
    //attempt to connect to database
    $link = mysqli_connect( "localhost", "root", "", "categorysuggestions" );
    //Check connection
    if( $link===false ){
	    die( "ERROR: Could not connect. " . mysqli_connect_error() );
    }
        
    if(!empty($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $category = $_GET["categories"];
    }
    
    //Attempt sql insert query
    $sql = "INSERT INTO keywordsuggestions ( keyword, category ) VALUES ( '$keyword', '$category' )";
    $insert = mysqli_query($link, $sql);

    $checkKeyword = "SELECT keyword, category FROM keywordsuggestions WHERE keyword = '".$keyword."'";
    
    $query = mysqli_query($link, "SELECT * FROM keywordsuggestions");
    while ($row = mysqli_fetch_array($query)){
        if($checkKeyword){
            echo $row[1];
        }
        echo $count;
    }
   if( $insert ) {
        //header("Location: action_page.php");
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
    
    //Close connection
    mysqli_close( $link );
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <form action="/action_page.php" method="GET" onsubmit="">
      Enter Keyword: <input type="text" name="keyword" /><br />
      <script>
        if ($keyword == red ) {
        }
      </script>
      <br />
      Category:<br />
      <br />
      <select name="categories">
        <optgroup value="Suggested">Suggested</optgroup>
        <optgroup value="Other">Other Options</optgroup>
        <option value="apple">Apple</option>
        <option value="Pear">Pear</option>
        <option value="Orange">Orange</option>
        <option value="Banana">Banana</option>
        <option value="Strawberry">Strawberry</option>
      </select>
      <br />
      <br />
      <input type="submit" value="Submit" />
    </form>
  </body>
</html>
