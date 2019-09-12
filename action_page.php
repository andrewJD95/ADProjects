
<?php
    $keyword = $category = "";

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

    $checkKeyword = "SELECT keyword, category FROM keywordsuggestions WHERE keyword = '".$keyword."'";
    
    if($checkKeyword){
        echo $category;
    }

    //Attempt sql insert query
    $sql = "INSERT INTO keywordsuggestions ( keyword, category ) VALUES ( '$keyword', '$category' )";

   $insert = mysqli_query($link, $sql);
   
   if( $insert ) {
        header("Location: categoryHome.html");
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
    
    //Close connection
    mysqli_close( $link );
?>
