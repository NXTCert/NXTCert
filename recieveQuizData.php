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
    
    $collection->update($user = $_SESSION['UserData']['Username']);
    

//Question 1
    switch ($education) {               
  case low:
   array('$set'=>array("low"=>$education));
    break;
  case medium:
    array('$set'=>array("medium"=>$education));
    break;
  case high:
    array('$set'=>array("high"=>$education));
    break;
  default:
    array('$set'=>array("low"=>$education));
}
        

//Question 2
        // sanitize the value / check if box is selected
$AI_Engineering = filter_input(INPUT_POST, 'AI Engineering', FILTER_SANITIZE_STRING);

// check against the valid value
if ($AI_Engineering) {
    array('$set'=>array("AI Engineering"=>$AI_Engineering));
}
                // sanitize the value / check if box is selected
$Business = filter_input(INPUT_POST, 'Business', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Business) {
    array('$set'=>array("Business"=>$Business));
}
                // sanitize the value / check if box is selected
$Cloud = filter_input(INPUT_POST, 'Cloud', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Cloud) {
    array('$set'=>array("Cloud"=>$Cloud));
}
                // sanitize the value / check if box is selected
$Cyber_Security = filter_input(INPUT_POST, 'Cyber Security', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Cyber_Security) {
    array('$set'=>array("Cyber Security"=>$Cyber_Security));
}
                // sanitize the value / check if box is selected
$Data_Administation = filter_input(INPUT_POST, 'Data Administation', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Data_Administation) {
    array('$set'=>array("Data Administation"=>$Data_Administation));
}
                // sanitize the value / check if box is selected
$Date_Engineering = filter_input(INPUT_POST, 'Date Engineering', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Date_Engineering) {
    array('$set'=>array("Date Engineering"=>$Date_Engineering));
}
                // sanitize the value / check if box is selected
$Data_Science = filter_input(INPUT_POST, 'Data Science', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Data_Science) {
    array('$set'=>array("Data Science"=>$Data_Science));
}
                // sanitize the value / check if box is selected
$Data_Solutions = filter_input(INPUT_POST, 'Data Solutions', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Data_Solutions) {
    array('$set'=>array("Data Solutions"=>$Data_Solutions));
}
                // sanitize the value / check if box is selected
$Database = filter_input(INPUT_POST, 'Database', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Database ) {
    array('$set'=>array("Database"=>$Database ));
}
                // sanitize the value / check if box is selected
$Development = filter_input(INPUT_POST, 'Development', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Development) {
    array('$set'=>array("Development"=>$Development));
}
                // sanitize the value / check if box is selected
$DevOps  = filter_input(INPUT_POST, 'DevOps', FILTER_SANITIZE_STRING);

// check against the valid value
if ($DevOps ) {
    array('$set'=>array("DevOps"=>$DevOps));
}
                // sanitize the value / check if box is selected
$Project_Management  = filter_input(INPUT_POST, 'Project Management', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Project_Management ) {
    array('$set'=>array("Project Management"=>$Project_Management ));
}
                // sanitize the value / check if box is selected
$Tech_Support  = filter_input(INPUT_POST, 'Tech Support', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Tech_Support ) {
    array('$set'=>array("Tech Support"=>$Tech_Support ));
}
        
//Question 3
        
                // sanitize the value / check if box is selected
$Computer_Network_Architecture  = filter_input(INPUT_POST, 'Computer Network Architecture', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Computer_Network_Architecture ) {
    array('$set'=>array("Computer Network Architecture"=>$Computer_Network_Architecture ));
}
                // sanitize the value / check if box is selected
$Computer_Systems_Analyst  = filter_input(INPUT_POST, 'Computer Systems Analyst', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Computer_Systems_Analyst ) {
    array('$set'=>array("Computer Systems Analyst"=>$Computer_Systems_Analyst ));
}
                // sanitize the value / check if box is selected
$AI_Engineering = filter_input(INPUT_POST, 'AI Engineering', FILTER_SANITIZE_STRING);

// check against the valid value
if ($AI_Engineering) {
    array('$set'=>array("AI Engineering"=>$AI_Engineering));
}
                // sanitize the value / check if box is selected
$Data_Scientist  = filter_input(INPUT_POST, 'Data Scientist', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Data_Scientist ) {
    array('$set'=>array("Data Scientist"=>$Data_Scientist ));
}
                // sanitize the value / check if box is selected
$Database_Andministator  = filter_input(INPUT_POST, 'Database Andministator', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Database_Andministator ) {
    array('$set'=>array("Database Andministator"=>$Database_Andministator ));
}
                // sanitize the value / check if box is selected
$Information_Security_Analyst  = filter_input(INPUT_POST, 'Information Security Analyst', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Information_Security_Analyst ) {
    array('$set'=>array("Information Security Analyst"=>$Information_Security_Analyst ));
}
                        // sanitize the value / check if box is selected
$IT_Manager   = filter_input(INPUT_POST, 'IT Manager', FILTER_SANITIZE_STRING);

// check against the valid value
if ($IT_Manager  ) {
    array('$set'=>array("IT Manager"=>$IT_Manager  ));
}
                        // sanitize the value / check if box is selected
$Product_Manager   = filter_input(INPUT_POST, 'Product Manager', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Product_Manager  ) {
    array('$set'=>array("Product Manager"=>$Product_Manager  ));
}
                        // sanitize the value / check if box is selected
$Software_Engineer   = filter_input(INPUT_POST, 'Software Engineer', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Software_Engineer  ) {
    array('$set'=>array("Software Engineer"=>$Software_Engineer  ));
}
                        // sanitize the value / check if box is selected
$Tech_Support_Support_Specalist   = filter_input(INPUT_POST, 'Tech Support / Support Specalist', FILTER_SANITIZE_STRING);

// check against the valid value
if ($Tech_Support_Support_Specalist  ) {
    array('$set'=>array("Tech Support / Support Specalist"=>$Tech_Support_Support_Specalist  ));
}
        
        
//Question 4
        
                        // sanitize the value / check if box is selected
$zero_to_three_hundred  = filter_input(INPUT_POST, '$0 - 300', FILTER_SANITIZE_STRING);

// check against the valid value
if ($zero_to_three_hundred ) {
    array('$set'=>array("$0 - 300"=>$zero_to_three_hundred ));
}
                        // sanitize the value / check if box is selected
$three_hundred_to_five_hundred  = filter_input(INPUT_POST, '$300 - 500', FILTER_SANITIZE_STRING);

// check against the valid value
if ($three_hundred_to_five_hundred ) {
    array('$set'=>array("$300 - 500"=>$three_hundred_to_five_hundred ));
}
                        // sanitize the value / check if box is selected
$five_hundred_plus  = filter_input(INPUT_POST, '$500+', FILTER_SANITIZE_STRING);

// check against the valid value
if ($five_hundred_plus ) {
    array('$set'=>array("$500+"=>$five_hundred_plus ));
}

   echo "Document updated successfully";

    // now display the updated document
    $cursor = $collection->find();

    // iterate cursor to display title of documents
    echo "Updated document";

    foreach ($cursor as $document) {
//        echo $document["firstname"] . "\n";
//        echo $document["lastname"] . "\n";
//        echo $document["title"] . "\n";
//        echo $document["title"] . "\n";
    }
}
?>

<!--
Reference:
https://www.w3schools.com/php/php_switch.asp
https://www.phptutorial.net/php-tutorial/php-checkbox/
-->
