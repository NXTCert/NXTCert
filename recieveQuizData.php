<?php session_start(); 

    /* Starts the session */
    $m = new MongoClient();
    echo "Connection to database successfully";

    // select a database
    $db = $m->nxtcert;
    echo "Database mydb selected";

    $collection = $db->users;
    echo "Collection selected succsessfully";
    
     // Check if the form is submitted
    if ( isset( $_POST['submit'] ) ){
        
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
        
    // now update the document
   $collection->update($Username = $_POST['email']), 
      array('$set'=>array("firstname"=>$firstname))
      array('$set'=>array("lastname"=>$lastname))
      array('$set'=>array("title"=>"MongoDB Tutorial"))
      array('$set'=>array("title"=>"MongoDB Tutorial"));
   echo "Document updated successfully";

    // now display the updated document
    $cursor = $collection->find();

    // iterate cursor to display title of documents
    echo "Updated document";

    foreach ($cursor as $document) {
        echo $document["firstname"] . "\n";
        echo $document["lastname"] . "\n";
        echo $document["title"] . "\n";
        echo $document["title"] . "\n";
    }
}
?>