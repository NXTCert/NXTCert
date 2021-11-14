<?php session_start(); 

    /* Starts the session */
    $m = new MongoClient();
    echo "Connection to database successfully";

    // select a database
    $db = $m->nxtcert;
    echo "Database mydb selected";
    
     // Check if the form is submitted
    if ( isset( $_POST['submit'] ) )
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $collection = $db->users;
    echo "Collection selected succsessfully";
    
    /* Define username and associated password array */
    $logins = array('test@test' => '1234','user@user' => 'password');

        
    // now update the document
   $collection->update(array('email'=>'MongoDB@gmail.com'), 
      array('$set'=>array("title"=>"MongoDB Tutorial")));
   echo "Document updated successfully";

    // now display the updated document
    $cursor = $collection->find();

    // iterate cursor to display title of documents
    echo "Updated document";

    foreach ($cursor as $document) {
        echo $document["title"] . "\n";
    }
}
?>
