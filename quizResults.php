
<?php 

session_start();
require_once 'db_config.php'; 


$userId = $_SESSION['UserData']['UserId'];


// $addItem = "INSERT INTO users (UserID, username, UserPassword) VALUES ('".$UserId."','".$Username."','".md5($Password)."');";
// $result = $db->query($addItem);

if(isset($_POST['submit'])){

    $userExperience = isset($_POST['education']) ? $_POST['education'] : '';
    echo "experience level:";
    echo $userExperience."</br>";
    $addItem = "INSERT INTO userExperience(UserId, ExperienceId) VALUES ('".$userId."','".$userExperience."');";
    $result = $db->query($addItem);

    echo "industries:";
    $userIndustry = isset($_POST['certificationType']) ? $_POST['certificationType'] : '';
    foreach($userIndustry  as $industry){
    echo $industry."</br>";

    $addItem = "INSERT INTO userIndustries(UserId, IndustryId) VALUES ('".$userId."','".$industry."');";
    $result = $db->query($addItem);
    }

    echo "careers:";
    $userCareer = isset($_POST['careers']) ? $_POST['careers'] : '';
    foreach($userCareer  as $career){
        
    echo $career."</br>";
    }
    // $userCareer = isset($_POST['careers']) ? $_POST['careers'] : '';

    $userBudget = isset($_POST['budget']) ? $_POST['budget'] : '';
    $addItem = "INSERT INTO userBudgets(UserId, BudgetId) VALUES ('".$userId."','".$userBudget."');";
    $result = $db->query($addItem);
    echo "budget:";
    echo $userBudget;
    echo "budget:";


}


?>