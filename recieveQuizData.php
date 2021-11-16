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
            $collection->update($user = $_SESSION['UserData']['Username']), 
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
        
//    $Current_College_Student = $_POST['Current College Student'];
//    $lastname = $_POST['Self taught with no industry experience'];
//    $lastname = $_POST['Self taught with industry experience'];
//    $lastname = $_POST['Recent college graduate with no experience'];
//    $lastname = $_POST['Professional with 5 - 10+ years of experience'];
    $AI_Engineering = $_POST['AI Engineering'];
    $Business = $_POST['Business'];
    $Cloud = $_POST['Cloud'];
    $Cyber_Security = $_POST['Cyber Security'];
    $Data_Administation = $_POST['Data Administation'];
    $Date_Engineering = $_POST['Date Engineering'];
    $Data_Science = $_POST['Data Science'];
    $Data_Solutions = $_POST['Data Solutions'];
    $Database = $_POST['Database'];
    $Development = $_POST['Development'];
    $DevOps = $_POST['DevOps'];
    $Project_Management = $_POST['Project Management'];
    $Tech_Support = $_POST['Tech Support'];
        
        
    $Computer_Network_Architecture = $_POST['Computer Network Architecture'];
    $Computer_Systems_Analyst = $_POST['Computer Systems Analyst'];
    $Data_Scientist = $_POST['Data Scientist'];
    $Database_Andministator = $_POST['Database Andministator'];
    $Information_Security_Analyst = $_POST['Information Security Analyst'];
    $IT_Manager = $_POST['IT Manager'];
    $Product_Manager = $_POST['Product Manager'];
    $Software_Engineer = $_POST['Software Engineer'];
    $Tech_Support_Support_Specalist = $_POST['Tech Support / Support Specalist'];
        
        
    $0-300 = $_POST['$0 - 300'];
    $300-500 = $_POST['$300 - 500'];
    $500+ = $_POST['$500+'];
        
    // now update the document
//   $collection->update($Username = $_POST['email']), 
      array('$set'=>array("AI Engineering"=>$AI_Engineering))
      array('$set'=>array("Business"=>$Business))
        array('$set'=>array("Cloud"=>$Cloud))
        array('$set'=>array("Cyber Security"=>$Cyber Security))
        array('$set'=>array("Data Administation"=>Data_Administation))
        array('$set'=>array("Date Engineering"=>$Date_Engineering))
        array('$set'=>array("Data Science"=>$Data_Science))
        array('$set'=>array("Data Solutions"=>$Data_Solutions))
        array('$set'=>array("Database"=>$Database))
        array('$set'=>array("Development"=>$Development))
        array('$set'=>array("DevOps"=>$DevOps))
        array('$set'=>array("Project Management"=>$Project_Management))
        array('$set'=>array("Tech Support"=>$Tech_Support));
        
        array('$set'=>array("Computer Network Architecture"=>$Computer_Network_Architecture))
        array('$set'=>array("Computer Systems Analyst"=>$Computer_Systems_Analyst))
        array('$set'=>array("Data Scientist"=>$Data_Scientist))
        array('$set'=>array("Database Andministator"=>$Database_Andministator))
        array('$set'=>array("Information Security Analyst"=>$Information_Security_Analyst))
        array('$set'=>array("IT Manager"=>$IT_Manager))
        array('$set'=>array("Product Manager"=>$Product_Manager))
        array('$set'=>array("Software Engineer"=>$Software_Engineer))
        array('$set'=>array("Tech Support / Support Specalist"=>$Tech_Support_Support_Specalist))
            
        array('$set'=>array("$0-300"=>$0-300))
        array('$set'=>array("$300-500"=>$300-500))
        array('$set'=>array("$500+"=>$500+))
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
-->