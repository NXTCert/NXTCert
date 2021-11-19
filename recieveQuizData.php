<?php session_start(); 

require 'vendor/autoload.php';

    /* Starts the session */
    $client = new MongoDB\Client("mongodb://localhost:27017");
    echo "Connection to database successfully";

    // select a database
    $db = $m->nxtcert;
    echo "Database mydb selected";

    $collection = $client->nxtcert->users;
    echo "Collection selected succsessfully";
    
     // Check if the form is submitted
    if ( isset( $_POST['submit'] ) ){
    
    $collection->update($user = $_SESSION['UserData']['Username']);

        education: '';
        budget: '';


//Question 1
    switch ($education) {               
  case $_POST["education"] = low:
   array('$set'=>array("low"=>$education));
    break;
  case $_POST["education"] = medium:
    array('$set'=>array("medium"=>$education));
    break;
  case $_POST["education"] = high:
    array('$set'=>array("high"=>$education));
    break;
  default:
    array('$set'=>array("low"=>$education));
}
        

        

//Question 2
        
                                   //name for each checkbox input industry[]

certType: array();

if(isset($_POST['certificationType'])) {
    $selectedcertificationType = $_POST['certificationType'];

    echo "You chose the following color(s): <br>";
    foreach ($selectedcertificationType as $industry){
        array_push($industries, $industry);
    }}
//        
//        // sanitize the value / check if box is selected
//$AI_Engineering = filter_input(INPUT_POST, 'AI Engineering', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($AI_Engineering) {
//    array('$set'=>results("AI Engineering")=>($AI_Engineering));
//}
//
//        
//                // sanitize the value / check if box is selected
//$Business = filter_input(INPUT_POST, 'Business', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Business) {
//    array('$set'=>results("Business"=>$Business));
//}
//                // sanitize the value / check if box is selected
//$Cloud = filter_input(INPUT_POST, 'Cloud', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Cloud) {
//    array('$set'=>results("Cloud"=>$Cloud));
//}
//                // sanitize the value / check if box is selected
//$Cyber_Security = filter_input(INPUT_POST, 'Cyber Security', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Cyber_Security) {
//    array('$set'=>results("Cyber Security"=>$Cyber_Security));
//}
//                // sanitize the value / check if box is selected
//$Data_Administation = filter_input(INPUT_POST, 'Data Administation', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Data_Administation) {
//    array('$set'=>results("Data Administation"=>$Data_Administation));
//}
//                // sanitize the value / check if box is selected
//$Date_Engineering = filter_input(INPUT_POST, 'Date Engineering', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Date_Engineering) {
//    array('$set'=>results("Date Engineering"=>$Date_Engineering));
//}
//                // sanitize the value / check if box is selected
//$Data_Science = filter_input(INPUT_POST, 'Data Science', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Data_Science) {
//    array('$set'=>results("Data Science"=>$Data_Science));
//}
//                // sanitize the value / check if box is selected
//$Data_Solutions = filter_input(INPUT_POST, 'Data Solutions', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Data_Solutions) {
//    array('$set'=>results("Data Solutions"=>$Data_Solutions));
//}
//                // sanitize the value / check if box is selected
//$Database = filter_input(INPUT_POST, 'Database', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Database ) {
//    array('$set'=>results("Database"=>$Database ));
//}
//                // sanitize the value / check if box is selected
//$Development = filter_input(INPUT_POST, 'Development', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Development) {
//    array('$set'=>results("Development"=>$Development));
//}
//                // sanitize the value / check if box is selected
//$DevOps  = filter_input(INPUT_POST, 'DevOps', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($DevOps ) {
//    array('$set'=>results("DevOps"=>$DevOps));
//}
//                // sanitize the value / check if box is selected
//$Project_Management  = filter_input(INPUT_POST, 'Project Management', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Project_Management ) {
//    array('$set'=>results("Project Management"=>$Project_Management ));
//}
//                // sanitize the value / check if box is selected
//$Tech_Support  = filter_input(INPUT_POST, 'Tech Support', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Tech_Support ) {
//    array('$set'=>results("Tech Support"=>$Tech_Support ));
//}
        
//Question 3
                   
                               //name for each checkbox input industry[]

careerIntrest: array();

if(isset($_POST['careers'])) {
    $selectedcareers = $_POST['careers'];

    echo "You chose the following color(s): <br>";
    foreach ($selectedcareers as $industry){
        array_push($industries, $industry);
    }}
//        
//                // sanitize the value / check if box is selected
//$Computer_Network_Architecture  = filter_input(INPUT_POST, 'Computer Network Architecture', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Computer_Network_Architecture ) {
//    array('$set'=>results("Computer Network Architecture"=>$Computer_Network_Architecture ));
//}
//                // sanitize the value / check if box is selected
//$Computer_Systems_Analyst  = filter_input(INPUT_POST, 'Computer Systems Analyst', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Computer_Systems_Analyst ) {
//    array('$set'=>results("Computer Systems Analyst"=>$Computer_Systems_Analyst ));
//}
//                // sanitize the value / check if box is selected
//$AI_Engineering = filter_input(INPUT_POST, 'AI Engineering', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($AI_Engineering) {
//    array('$set'=>results("AI Engineering"=>$AI_Engineering));
//}
//                // sanitize the value / check if box is selected
//$Data_Scientist  = filter_input(INPUT_POST, 'Data Scientist', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Data_Scientist ) {
//    array('$set'=>results("Data Scientist"=>$Data_Scientist ));
//}
//                // sanitize the value / check if box is selected
//$Database_Andministator  = filter_input(INPUT_POST, 'Database Andministator', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Database_Andministator ) {
//    array('$set'=>results("Database Andministator"=>$Database_Andministator ));
//}
//                // sanitize the value / check if box is selected
//$Information_Security_Analyst  = filter_input(INPUT_POST, 'Information Security Analyst', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Information_Security_Analyst ) {
//    array('$set'=>results("Information Security Analyst"=>$Information_Security_Analyst ));
//}
//                        // sanitize the value / check if box is selected
//$IT_Manager   = filter_input(INPUT_POST, 'IT Manager', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($IT_Manager  ) {
//    array('$set'=>results("IT Manager"=>$IT_Manager  ));
//}
//                        // sanitize the value / check if box is selected
//$Product_Manager   = filter_input(INPUT_POST, 'Product Manager', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Product_Manager  ) {
//    array('$set'=>results("Product Manager"=>$Product_Manager  ));
//}
//                        // sanitize the value / check if box is selected
//$Software_Engineer   = filter_input(INPUT_POST, 'Software Engineer', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Software_Engineer  ) {
//    array('$set'=>results("Software Engineer"=>$Software_Engineer  ));
//}
//                        // sanitize the value / check if box is selected
//$Tech_Support_Support_Specalist   = filter_input(INPUT_POST, 'Tech Support / Support Specalist', FILTER_SANITIZE_STRING);
//
//// check against the valid value
//if ($Tech_Support_Support_Specalist  ) {
//    array('$set'=>results("Tech Support / Support Specalist"=>$Tech_Support_Support_Specalist  ));
//}
        
        
////Question 4
//      
        
    switch ($budget) {               
  case $_POST["budget"] = zero_to_three_hundred:
   array('$set'=>array("$0 - 300"=>$budget));
    break;
  case $_POST["budget"] = three_hundred_to_five_hundred:
    array('$set'=>array("$300 - 500"=>$budget));
    break;
  case $_POST["budget"] = five_hundred_plus:
    array('$set'=>array("$500+"=>$budget));
    break;
  default:
    array('$set'=>array("$0 - 300"=>$budget));
}

   echo "Document updated successfully";

    // now display the updated document
    $cursor = $collection->find();

    // iterate cursor to display title of documents
    echo "Updated document";

    foreach ($cursor as $document) {
    }
}
?>

<!--
Reference:
https://www.w3schools.com/php/php_switch.asp
https://www.phptutorial.net/php-tutorial/php-checkbox/
-->
