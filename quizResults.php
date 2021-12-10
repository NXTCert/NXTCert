
<?php 

session_start();
require_once 'db_config.php'; 


$userId = $_SESSION['UserData']['UserId'];



if(isset($_POST['submit'])){
    //get and insert user experience
    $userExperience = isset($_POST['education']) ? $_POST['education'] : '';

    $addItem = "INSERT INTO userExperience(UserId, ExperienceId) VALUES ('".$userId."','".$userExperience."');";
    $result = $db->query($addItem);

    //get and insert user industries

    $userIndustry = isset($_POST['certificationType']) ? $_POST['certificationType'] : '';
    foreach($userIndustry  as $industry){


    $addItem = "INSERT INTO userIndustries(UserId, IndustryId) VALUES ('".$userId."','".$industry."');";
    $result = $db->query($addItem);
    }

    //get and insert user careers as user industries
    $userCareer = isset($_POST['careers']) ? $_POST['careers'] : '';
    foreach($userCareer as $industry){
        $addItem = "INSERT INTO userIndustries(UserId, IndustryId) VALUES ('".$userId."','".$industry."');";
        $result = $db->query($addItem);
    }

    //get and insert user budget
    $userBudget = isset($_POST['budget']) ? $_POST['budget'] : '';
    $addItem = "INSERT INTO userBudgets(UserId, BudgetId) VALUES ('".$userId."','".$userBudget."');";
    $result = $db->query($addItem);
    echo "budget:";
    echo $userBudget;
    echo "budget:";
    
    header("location:certificates.php");
      
    exit;

}


?>