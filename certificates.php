<?php 
session_start();
require_once 'db_config.php'; 
$userId = $_SESSION['UserData']['UserId'];



?>


<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Certificates</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="main.css">
	  <link rel="stylesheet" href="certificates.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

 </head>
 <body>
     <!-- keep at top -->
    <div id="nav-placeholder">

    </div>
<!-- start of certs showing dynamiocally if the person is logged in - Chelsey --> 
    <p id="certTitle"> Your Recommended Certifications &nbsp;&nbsp;<i id="bars" class="fas fa-bars barsIcon"></i></p>

	<?php 
		if(!isset($_SESSION['UserData']['UserId'])){
	?>
		<button id="quizButton"> <a href='loginForm.php'>Login to Take the Quiz</a></button>
	<?php
		}
		else{
			$sql = "SELECT * FROM userIndustries WHERE UserID = '".$userId."'";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {

				$budgetQuery = "SELECT budgetId from userBudgets where userid = '".$userId."'";
				$budget = $db->query($budgetQuery);
				while($row = $budget->fetch_assoc()) {
					$userBudget = $row["budgetId"];             
				 }



				$sql = "SELECT experienceId from userExperience where userid = '".$userId."'";
				$experience = $db->query($sql);
				while($row = $experience->fetch_assoc()) {
					$userExperience = $row["experienceId"]; 
					           
				 }


				$userIndustryArray = array();
				$sql = "SELECT industryid FROM userIndustries WHERE UserID = '".$userId."'";
				$industries = $db->query($sql);
				while($row = $industries->fetch_assoc()) {
					$userind = $row["industryid"]; 
					array_push($userIndustryArray,$userind);           
				 }
				// print_r($userIndustryArray);
				$implodedArrary = implode($userIndustryArray, ',');


				$sql = "SELECT * FROM certs WHERE experienceid = '".$userExperience."' AND budgetid <= '".$userBudget."' AND industryid in (".$implodedArrary.")";
				$certs = $db->query($sql);
				$rowcount = mysqli_num_rows($certs);
				// printf("Result set has %d rows.\n",$rowcount);
				
				if ($rowcount > 0){
					while($row = $certs->fetch_assoc()) {
						$title = $row["title"];
						$description = $row["description"];
						$cost = $row["cost"];
						$url = $row["url"];
			 
						?>
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<i class="far fa-heart heartIcon"></i>
	
						</div>
	
						<?php
					 }
				} else{
					echo "No certification matching your criteria, please browse certs by industry below.";
				}

				


			} else {
	?>
		<button id="quizButton"> <a href='newQuiz11-15.php'>Take the Quiz</a></button>
	<?php 
		}}
	?>



    
   
     <!-- <div class="certs">
         <p class="title">Certification Title</p>
         <p class="source">Certification Source | $0</p>
         <p class="description">Description: </p>
         <i class="fas fa-external-link-alt shareIcon"></i>
         <i class="far fa-heart heartIcon"></i>
     </div>
     <div class="category">
		 <br>
		  -->
<!-- START of listing the certs - Chelsey -->
 
		 <p id="searchTitle" ><a id="browseancor"><u id="test">Browse Certifications by Category</u></a></p>
		 
     </div>
	

		<table class="browseCertsBox">
		  <tr>
			<td ><a id="top1" href ="#bottom1">AI Engineering</a></td>
			<td ><a id="top6" href ="#bottom6">Data Engineering</a></td>
			<td ><a id="top11" href ="#bottom11">DevOps</a></td>
		  </tr>
		  <tr>
			<td ><a id="top2"href ="#bottom2">Business</a></td>
			<td ><a id="top7" href ="#bottom7">Data Science</a></td>
			<td ><a id="top12" href ="#bottom12">Networking</a></td>
		  </tr>
		  <tr>
			<td ><a id="top3" href ="#bottom3">Cloud</a></td>
			<td ><a id="top8" href ="#bottom8">Data Solutions</a></td>
			<td ><a id="top13" href ="#bottom13">Programming</a></td>
		  </tr>
		  <tr>
			<td ><a id="top4" href ="#bottom4">Cyber Security</a></td>
			<td ><a id="top9" href ="#bottom9">Database</a></td>
			<td ><a id="top14" href ="#bottom14">Project Management</a></td>
		  </tr>
		  <tr>
			<td ><a id="top5" href ="#bottom5">Data Administration</a></td>
			<td ><a id="top10" href ="#bottom10">Development</a></td>
			<td ><a id="top15" href ="#bottom15">Tech Support</a></td>
		  </tr>

		</table> 

	 
	<p id="categoryTitle" ><a id="bottom1"><u>AI Engineering Certifications</u></a></p>
			 	  <div class="certs">
				 <p class="title">Microsoft Certified: Azure AI Engineer Associate</p>
				 <p class="source">Timeline: Self-Paced | Cost: $165 <br>
				 <p class="description">Description: "Understand the components that make up the Azure AI portofolio. The Azure AI Engineer Associate Certification will give you the skills to design and build your own AI solutions using Azure Cognitive Services, Azure Cognitive Search, and Azure Bot Services. To obtain the Azure AI Engineer Associate Certification, you must be able to plan and manage an Azure Cognitive Services solution, implement computer vision solutions, implement natural language processing solutions, implement knowledge mining solutions, and implement conversational AI solutions." </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-ai-engineer/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/azure-ai-engineer/" target="_blank">Study Material | </a>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-ai-engineer/#certification-exams" target="_blank">Exam</a>

			 </div>

				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>
	 <p id="categoryTitle"><a id="bottom2"><u>Business Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Microsoft Certified: Dynamics 365 Fundamentals (CRM)</p>
				 <p class="source">Timeline: Self-Paced | Cost: $99 <br>
				 <p class="description">Description: "The Dynamics 365 Fundamentals (CRM) Certification will expose you to the customer engagement capabilities of Dynamics 365. To obtain the Dynamics 365 Fundamentals (CRM) Certification, you must be able to describe Dynamics 365 Marketing, Dynamics 365 Sales, Dynamics 365 Customer Service, Dynamics 365 Field Service, Project Operations, and shared features." </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/d365-fundamentals-customer-engagement-apps-crm/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/d365-fundamentals-customer-engagement-apps-crm/" target="_blank">Study Material</a>
			

			 </div>
<div class="certs">
				 <p class="title">Microsoft Certified: Dynamics 365 Customer Service Functional Consultant Associate</p>
				 <p class="source">Prerequisites: One to three years of experience as a functional consultant implementing Dynamics 365. <br>
				 <p class="description">Description: To obtain the Dynamics 365 Customer Service Functional Consultant Associate Certification, you must be able to manage cases and Knowledge Management, manage queues, entitlements, and service-level agreements, implement scheduling, implement Omnichannel for Customer Service, and manage analytics. </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/d365-functional-consultant-customer-service/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/d365-functional-consultant-customer-service/" target="_blank">Study Material </a>

			 </div>


	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom3"><u>Cloud Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">AWS Certified Cloud Practitioner
</p>
				 <p class="source">Timeline: Six Hours worth of study material  | Cost: $100 <br>
				 <p class="description">Description: Obtaining this certification shows organizations that you have a crutial understanding of implementing cloud initatives, as well as validating cloud fluency and base AWS expertise. </p>
				 <a href="https://aws.amazon.com/certification/certified-cloud-practitioner/?ch=tile&tile=getstarted " target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.aws.training/Details/eLearning?id=60697 " target="_blank">Study Material | </a>
				 <a href="https://aws.amazon.com/certification/certified-cloud-practitioner/?ch=tile&tile=getstarted " target="_blank">Exam</a>

			 </div>
<div class="certs">
				 <p class="title">Exam AZ-900: Microsoft Azure Fundamentals</p>
				 <p class="source">Timeline: Six hours worth of study material | Cost: $99 <br>
				 <p class="description">Description:The Microsoft Azure Fundamentals certification verifies that you have a basic understanding of cloud concepts, as well as specifics regarding Microsoft Azure. In regards to Microsoft Azure this shows an understanding of the services provided, workloads, security/privacy, and pricing in adition to general support. This certifation is used as a base certification to expand from for future Microsoft certifications. </p>
				 <a href="https://www.udemy.com/course/az900-azure/?utm_source=adwords&utm_medium=udemyads&utm_campaign=MicrosoftAzure_v.PROF_la.EN_cc.US_ti.6716&utm_content=deal4584&utm_term=_._ag_124143562920_._ad_532193995850_._kw_az%20900%20certification_._de_c_._dm__._pl__._ti_kwd-979668148272_._li_9023533_._pd__._&matchtype=e&gclid=CjwKCAjw7fuJBhBdEiwA2lLMYZgy2q30uB-vojGm4pXkAWz24DqIRj9e36ENsZxBIjD4KivQG4PxHhoCMxwQAvD_BwE" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.udemy.com/course/az900-azure/?utm_source=adwords&utm_medium=udemyads&utm_campaign=MicrosoftAzure_v.PROF_la.EN_cc.US_ti.6716&utm_content=deal4584&utm_term=_._ag_124143562920_._ad_532193995850_._kw_az%20900%20certification_._de_c_._dm__._pl__._ti_kwd-979668148272_._li_9023533_._pd__._&matchtype=e&gclid=CjwKCAjw7fuJBhBdEiwA2lLMYZgy2q30uB-vojGm4pXkAWz24DqIRj9e36ENsZxBIjD4KivQG4PxHhoCMxwQAvD_BwE" target="_blank">Study Material | </a>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/exams/az-900" target="_blank">Exam</a>

			 </div>
<div class="certs">
				 <p class="title">Comptia Cloud+</p>
				 <p class="source">Cost: $338 - $999 <br>
				 <p class="description">Description: CompTIA Cloud+ is the only performance-based IT certification that considers cloud-based infrastructure services as part of larger IT system operations, regardless of platform. Migrating to the cloud allows mission-critical programs and data storage to be deployed, optimized, and protected. CompTIA Cloud+ certifies the technical abilities required to protect these priceless assets.
				 Note: Certification must be renewed every three years</p>
				 <a href="https://www.comptia.org/certifications/cloud" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/certifications/cloud" target="_blank">Study Material </a>
			

			 </div>


	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom4"><u>Cyber Security Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Exam 98-367: Security Fundamentals</p>
				 <p class="source">Timeline: Seven hours worth of study material | Cost: $140.99 <br>
				 <p class="description">Description: Microsoft Security Fundamentals tests your knowledge of various types of security such as: physical security, Internet security, operating system security, network security, and software security. This exam validates that a candidate has fundamental security knowledge and skills.</p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/exams/98-367" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.udemy.com/course/microsoft-mta-security-fundamentals-98-367/" target="_blank">Study Material | </a>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/exams/98-367" target="_blank">Exam</a>

			 </div>
<div class="certs">
				 <p class="title">CompTIA Security</p>
				 <p class="source">Timeline: Self-Paced | Cost: $549 <br>
				 <p class="description">Description: The CompTIA Security+ certification shows employers from the cybersecurity sector that you have a base understanding of network security and risk management needed to protect their business. </p>
				 <a href="https://www.comptia.org/landing/certificationsecurityplus/index.html?gclid=CjwKCAjwzOqKBhAWEiwArQGwaE7IIWxafunBcR2kz1xHNq6zTq662lGRgInjJxii15DDmqC6zYaQ-RoCDVwQAvD_BwE" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/landing/certificationsecurityplus/index.html?gclid=CjwKCAjwzOqKBhAWEiwArQGwaE7IIWxafunBcR2kz1xHNq6zTq662lGRgInjJxii15DDmqC6zYaQ-RoCDVwQAvD_BwE" target="_blank">Study Material </a>
		

			 </div>
	 	  <div class="certs">
				 <p class="title">Microsoft Certified: Azure Security Engineer Associate</p>
				 <p class="source">Cost: $165 <br>
				 <p class="description">Description: "Become an Azure security expert.
					The Azure Security Engineer Associate Certification will give you the skills to implement Azure security controls and threat protection to protect data, applications, and networks.
					To obtain the Azure Security Engineer Associate Certification, you must be able to manage identity and access, implement platform protection, manage security operations, and secure data and applications." </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-security-engineer/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/azure-security-engineer/" target="_blank">Study Material </a>
			

			 </div>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom5"><u>Data Administation Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Comptia CySA+</p>
				 <p class="source">Timeline: Self-Paced | Cost: $549 <br>
				 <p class="description">Description: The Comptia CySA+ certification shows that you are able to protect aginst cyber security threats from analyzing networks and devices by critical insight gained from analyzeing behavior.</p>
				 <a href="https://www.comptia.org/landing/cysaplus/index.html?utm_compid=cpc-google-paid_search_certs-CySa%2B-text_ad-na-cysa%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaPysmIxy1yNoT46EY5OeezzyNPl7O2CB8L9yGs-Q1cQ25XaMQV0HhBoCFqwQAvD_BwE" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/landing/cysaplus/index.html?utm_compid=cpc-google-paid_search_certs-CySa%2B-text_ad-na-cysa%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaPysmIxy1yNoT46EY5OeezzyNPl7O2CB8L9yGs-Q1cQ25XaMQV0HhBoCFqwQAvD_BwE" target="_blank">Study Material </a>

			 </div>
<div class="certs">
				 <p class="title">Comptia CASP+</p>
				 <p class="source">Cost: $466 <br>
				 <p class="description">Description: "For those who prefer the technological aspects of the IT field rather than management, the CompTIA Advanced Security Practitioner certification is a great solution. These certifications, paired with our Career Services team, will put you on a course for your dream career in information technology."</p>
				 <a href="https://www.mycomputercareer.edu/program/it-certifications/comptia/?gclid=Cj0KCQjwnJaKBhDgARIsAHmvz6ewesbc3686p1aPCR4PSy8GFaSMX83s-3cbmSqYInh06oC8ngbYaI0aAv6bEALw_wcB" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/faq/casp/how-much-does-the-casp-certification-cost" target="_blank">Study Material | </a>
				 <a href="https://www.mycomputercareer.edu/program/it-certifications/comptia/?gclid=Cj0KCQjwnJaKBhDgARIsAHmvz6ewesbc3686p1aPCR4PSy8GFaSMX83s-3cbmSqYInh06oC8ngbYaI0aAv6bEALw_wcB" target="_blank">Exam</a>

			 </div>
<div class="certs">
				 <p class="title">Microsoft Certified: Azure Administrator Associate</p>
				 <p class="source">Cost: $165 <br>
				 <p class="description">Description: This certification seeks to prepare professional who use or wish to learn how to use the Microsoft Azure Environment. </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-administrator/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/azure-administrator/" target="_blank">Study Material </a>

			 </div>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom6"><u>Data Engineering Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Microsoft Certified: Azure Data Engineer Associate</p>
				 <p class="source">Cost: $165 <br>
				 <p class="description">Description: "A candidate for the Azure Data Engineer Associate certification should have subject matter expertise integrating, transforming, and consolidating data from various structured and unstructured data systems into structures that are suitable for building analytics solutions. Responsibilities for this role include helping stakeholders understand the data through exploration, building and maintaining secure and compliant data processing pipelines by using different tools and techniques. This professional uses various Azure data services and languages to store and produce cleansed and enhanced datasets for analysis. An Azure Data Engineer also helps ensure that data pipelines and data stores are high-performing, efficient, organized, and reliable, given a specific set of business requirements and constraints. This professional deals with unanticipated issues swiftly and minimizes data loss. An Azure Data Engineer also designs, implements, monitors, and optimizes data platforms to meet the data pipeline needs. A candidate for this certification must have solid knowledge of data processing languages, such as SQL, Python, or Scala, and they need to understand parallel processing and data architecture patterns." </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-data-engineer/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class = "examLink" href="https://docs.microsoft.com/en-us/learn/certifications/azure-data-engineer/" target="_blank">Exam</a>

			 </div>

	 				<p class="goBackToMenu"><a href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom7"><u>Data Science Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Microsoft Certified: Azure Data Scientist Associate</p>
				 <p class="source">Cost: $165 <br>
				 <p class="description">Description: "Candidates for the Azure Data Scientist Associate certification should have subject matter expertise applying data science and machine learning to implement and run machine learning workloads on Azure. Responsibilities for this role include planning and creating a suitable working environment for data science workloads on Azure. You run data experiments and train predictive models. In addition, you manage, optimize, and deploy machine learning models into production. A candidate for this certification should have knowledge and experience in data science and using Azure Machine Learning and Azure Databricks." </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-data-scientist/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class = "examLink" href="https://docs.microsoft.com/en-us/learn/certifications/azure-data-scientist/#certification-exams" target="_blank">Exam</a>

			 </div>


	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom8"><u>Data Solutions Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Exam AZ-204: Developing Solutions for Microsoft Azure</p>
				 <p class="source">Cost: $165 <br>
				 <p class="description">Description: This exam measures your ability to accomplish the following technical tasks: develop Azure compute solutions; develop for Azure storage; implement Azure security; monitor, troubleshoot, and optimize Azure solutions; and connect to and consume Azure services and third-party services. Test takers will be able to select the code language (C# or Python) that is included in the questions when they launch the exam if the exam is taken through Person VUE. However, this option is not available on exams taken through PSI. Those questions will contain C# code.</p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-developer/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/azure-developer" target="_blank">Study Material </a>

			 </div>
<div class="certs">
				 <p class="title">Microsoft Certified: Azure Solutions Architect Expert</p>
				 <p class="source">Cost: $165 <br>
				 <p class="description">Description: Indiviauals with experience in networking, security, disaster recovery, data platforms, and budgeting in Azure should consider obtaining this certification.  </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/azure-solutions-architect/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/azure-solutions-architect/" target="_blank">Study Material </a>

			 </div>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom9"><u>Database Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">CompTIA Server+</p>
				 <p class="source">Timeline: Self-Paced | Cost: $449 <br>
				 <p class="description">Description: This Comptia Server+ certification shows an understanding of servers regarding software, storage, and system best practices that employers look for. </p>
				 <a href="https://www.comptia.org/landing/serverplus/index.html?utm_compid=cpc-google-paid_search_certs-Server%2B-text_ad-na-server%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaGIXpLTJy_oxNj_QhHDu6I3mIG3sIBGvFRmOidcvKRbg4NahNm5qaxoC44QQAvD_BwE" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/landing/serverplus/index.html?utm_compid=cpc-google-paid_search_certs-Server%2B-text_ad-na-server%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaGIXpLTJy_oxNj_QhHDu6I3mIG3sIBGvFRmOidcvKRbg4NahNm5qaxoC44QQAvD_BwE" target="_blank">Study Material </a>

			 </div>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom10"><u>Development Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Google UX Design Certificate</p>
				 <p class="source">Timeline: Self-Paced | Cost: $39/month <br>
				 <p class="description">Description: With no prior experience necessary, this completely online curriculum will provide you with the skills you need for an entry-level position in UX design.</p>
				 <a href="https://grow.google/uxdesign/#?modal_active=none" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://grow.google/uxdesign/#?modal_active=none" target="_blank">Study Material </a>

			 </div>
<div class="certs">
				 <p class="title">Associate Android Developer Certification</p>
				 <p class="source">Timeline: Self-Paced |  Cost: $149 exam training free <br>
				 <p class="description">Description: Begin your career in mobile app development. No prior programming knowledge is required to learn how to create simple Android apps with our Android Basics in Kotlin course. Then, to demonstrate your developer abilities, take the Associate Android Developer Certification test. </p>
				 <a href="https://grow.google/androiddev/#?modal_active=none" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://grow.google/androiddev/#?modal_active=none" target="_blank">Study Material  </a>

			 </div>
	   <div class="certs">
				 <p class="title">App Development with Swift certification</p>
				 <p class="description">Description: Through Canvas by Instructure, Apple Professional Learning provides a free online course called Develop in Swift. Educators will learn the fundamentals of teaching Swift and Xcode from Apple professionals, making this a perfect introduction course for teaching Develop in Swift in any school setting.</p>
				 <a href="https://certiport.pearsonvue.com/Certifications/Apple/App-Dev-With-Swift/Overview" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://certiport.pearsonvue.com/Certifications/Apple/App-Dev-With-Swift/Overview" target="_blank">Study Material </a>

			 </div>  <div class="certs">
				 <p class="title">iOS App Development with Swift Specialization</p>
				 <p class="source">Timeline: Approximately 5 months <br>
				 <p class="description">Description: This course teach covers the foundations of Swift programming for iOS application development. You'll learn how to utilize programming tools like XCode, how to design interfaces and interactions and assess their usability, and how to incorporate camera, picture, and location data into your app. You'll use your abilities to develop a fully functional picture editing software for iPhone, iPad, and Apple Watch in the final Capstone Project.</p>
				 <a href="https://www.coursera.org/specializations/app-development" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.coursera.org/specializations/app-development" target="_blank">Study Material </a>

			 </div>
<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom11"><u>DevOps Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Microsoft Certified: DevOps Engineer Expert</p>
				 <p class="source">$165 <br>
				 <p class="description">Description: "Improve communications and collaboration by using automation. The DevOps Engineer Expert Certification will give you the skills to design and implement strategies for infrastructure, security, source control, testing, delivery, and feedback. To obtain the DevOps Engineer Expert Certification, you must be able to develop an instrumentation strategy, develop a Site Reliability Engineering (SRE) strategy, develop a security and compliance plan, manage source control, facilitate communication and collaboration, define and implement continuous integration, and define and implement a continuous delivery and release management strategy.
" </p>
				 <p class="description">Prerequisites:

					 Microsoft Certified: Azure Administrator Associate <br>
					Prerequisite Option 1: Prerequisite certification
						Azure Administrators implement, manage, and monitor an organization’s Microsoft Azure environment.

					Microsoft Certified: Azure Developer Associate
					<br>Prerequisite Option 2: Prerequisite certification
					Azure Developers design, build, test, and maintain cloud applications and service </p>
				 <a href="https://docs.microsoft.com/en-us/learn/certifications/devops-engineer/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://docs.microsoft.com/en-us/learn/certifications/devops-engineer/" target="_blank">Study Material | </a>
				 <a href
="https://docs.microsoft.com/en-us/learn/certifications/exams/az-400" target="_blank">Exam: AZ-400</a>

			 </div>


	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom12"><u>Networking Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">CompTIA Network+</p>
				 <p class="source">Timeline: Self-Paced | Cost: $499 <br>
				 <p class="description">Description: The CompTIA Network+ certification shows skils in designing managing, and securing networks. This certification is required to work at Dell, HP, and Apple</p>
				 <a href="https://www.comptia.org/landing/networkplus/index.html?utm_compid=cpc-google-paid_search_certs-Network%2B-text_ad-na-network%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaFcfCZ5NyWXRaZyAfreIYB_cmpqDoSWNFriWCS_nK31FPnU3IXzPORoCFPUQAvD_BwE" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/landing/networkplus/index.html?utm_compid=cpc-google-paid_search_certs-Network%2B-text_ad-na-network%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaFcfCZ5NyWXRaZyAfreIYB_cmpqDoSWNFriWCS_nK31FPnU3IXzPORoCFPUQAvD_BwE" target="_blank">Study Material </a>

			 </div>
<div class="certs">
				 <p class="title">Cisco Certified Technician (CCT)</p>
				 <p class="source">Cost: $125 <br>
				 <p class="description">Description: Cisco Certified Technicians have the skills to diagnose, restore, repair, and replace critical Cisco networking and system devices at customer sites. Technicians work closely with the Cisco Technical Assistance Center (TAC) to quickly and efficiently resolve support incidents.

				Cisco authorized training is available online and can be completed in multiple short sessions, enabling technicians to stay productive in the field. Cisco Certified Technician (CCT) certification is available in multiple technology tracks, providing an opportunity for Cisco support technicians to expand their area of expertise.
				 </p>

				 <a href="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/entry/technician-cct.html" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/entry/technician-cct.html#~stickynav=5" target="_blank">Study Material | </a>
					 <a href="https://www.cisco.com/c/en/us/training-events/training-certifications/exams/current-list/100-890-cltech.html" target="_blank">Required exams: 100-890 CLTECH (Valid for 3 years) </a>


			 </div>
	 <div class="certs">
				 <p class="title">Cisco CCNA Certification</p>
				 <p class="description">Description: "The Cisco CCNA Certification will give you the skills to manage many of today’s advanced networks. To obtain the Cisco CCNA Certification, you must be knowledgeable with network fundamentals, network access, IP connectivity, IP services, security fundamentals, and automation and programmability."
				 </p>

				 <a href ="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/associate/ccna.html" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/associate/ccna.html" target="_blank">Study Material | </a>
					 <a href="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/associate/ccna.html#~about-ccna" target="_blank">Required exams: 200-301 CCNA </a>


			 </div>


	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom13"><u>Programming Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Google IT Automation with Python
Professional Certificate</p>
				 <p class="source">Cost: Free <br>
				 <p class="description">Description: The Google IT Automation with Python Professional Certificate will give you hands-on experience to help you prepare for IT support roles and systems administration using Python.
				To obtain the Google IT Automation with Python Professional Certificate, you must be able to automate tasks using Python scripts, use Git and GitHub for version control, troubleshoot and debug complex problems, and apply automation by using the cloud.</p>
				 <a href="https://www.coursera.org/professional-certificates/google-it-automation?utm_source=google&utm_medium=institutions&utm_campaign=gwgsite-gDigital-paidha-sem-bk-it-exa-glp-br-null&_ga=2.215270228.2108743129.1631989015-1977958380.1631989015&_gac=1.151000267.1631989015.Cj0KCQjwnJaKBhDgARIsAHmvz6erAgTtVSlhYFr8HbzZ9MUjqeiRAPpilxtHYxLfInPVIjcwFtS4Fe8aAm-KEALw_wcB" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.coursera.org/professional-certificates/google-it-automation?utm_source=google&utm_medium=institutions&utm_campaign=gwgsite-gDigital-paidha-sem-bk-it-exa-glp-br-null&_ga=2.215270228.2108743129.1631989015-1977958380.1631989015&_gac=1.151000267.1631989015.Cj0KCQjwnJaKBhDgARIsAHmvz6erAgTtVSlhYFr8HbzZ9MUjqeiRAPpilxtHYxLfInPVIjcwFtS4Fe8aAm-KEALw_wcB" target="_blank">Study Material </a>
		

			 </div>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom14"><u>Project Management Certifications</u></a></p> 
	 
	 
			 <div class="certs">
				 <p class="title">Certified Associate in Project Management (CAPM)®</p>
				 <p class="source">Timeline: Twenty-Four hours worth of study material | Cost: $300 <br>
				 <p class="description">Description: The Certified Associate Project Manager is an entry-level certification for project manager practitioners. Designed for those with less project experience, the CAPM is intended to demonstrate candidates' understanding of the fundamental knowledge, terminology and processes of effective project management. The exam is over chapters 1-13 of "The PMBOK Guide", which is covered in the supplied study material. </p>
				 <a href="https://www.pmi.org/certifications/certified-associate-capm" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.udemy.com/course/capm-pmbok6/" target="_blank">Study Material | </a>
				 <a href="https://www.pmi.org/certifications/certified-associate-capm" target="_blank">Exam</a>

			 </div>
	  <div class="certs">
				 <p class="title">Entry Certificate in Business Analysis</p>
				 <p class="source">Timeline: Thirty-One hour worth of study material | Cost: $313.99 <br>
				 <p class="description">Description: The Entry Certificate in Business Analysis certification documents an understanding of the base knowledge of business analysis as well as the comptencies needed for the field. The certification is based on the BBOK Guide. </p>
				 <a href="https://www.udemy.com/course/the-business-analysis-certification-program-iiba-ecba/" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.udemy.com/course/the-business-analysis-certification-program-iiba-ecba/" target="_blank">Study Material | </a>
				 <a href="https://www.iiba.org/business-analysis-certifications/ecba/" target="_blank">Exam</a>

			 </div>
<div class="certs">
				 <p class="title">Google Project Management Certificate</p>
				 <p class="source">Timeline: Self-Paced | Cost: $39/month<br>
				 <p class="description">Description: With a professional certification designed by Google, you may get started in the high-growth sector of project management. Learn how to manage projects successfully and efficiently using both traditional and agile approaches. </p>
				 <a href="https://grow.google/projectmanagement/#?modal_active=none" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://grow.google/projectmanagement/#?modal_active=none" target="_blank">Study Material </a>

			 </div>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom15"><u>Tech Support Certifications</u></a></p>
			 <div class="certs">
				 <p class="title">Comptia A+ Certification</p>
				 <p class="source">Timeline: Self-Paced | Cost: $349 <br>
				 <p class="description">Description: The Comptia A+ certification shows fundemental understanding of PC, laptop, and moble technology/maintence. This certification is also a requirement for jobs in the department of justice as well as companies Dell, Lenovo, and Intel.</p>
				 <a href="https://www.comptia.org/landing/aplus/index.html?utm_compid=cpc-google-paid_search_certs-a%2B-a%2B-2021_04_01-a%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaFzST7v46uTxMqtjQLHz9D6g_tOK6UgXUV4HnO3DQ8WwxeBnPhRj7hoCyI4QAvD_BwE" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.comptia.org/landing/aplus/index.html?utm_compid=cpc-google-paid_search_certs-a%2B-a%2B-2021_04_01-a%2B-B2C&gclid=CjwKCAjwzOqKBhAWEiwArQGwaFzST7v46uTxMqtjQLHz9D6g_tOK6UgXUV4HnO3DQ8WwxeBnPhRj7hoCyI4QAvD_BwE" target="_blank">Study Material </a>

			 </div>
<div class="certs">
				 <p class="title">"Google IT Support
Professional Certificate"</p>
				 <p class="source">Cost: Free <br>
				 <p class="description">Description: "The Google IT Support Professional Certificate will give you hands-on experience to help you prepare for entry-level IT support roles.
				To obtain the Google IT Support Professional Certificate, you must be competent in troubleshooting, customer service, networking, operating systems, system administration, and security.
				This certificate is offered through Coursera and you must go through five modules to obtain the Google IT Support Professional Certificate." </p>
				 <a href="https://www.coursera.org/professional-certificates/google-it-support?utm_source=google&utm_medium=institutions&utm_campaign=gwgsite-gDigital-paidha-sem-bk-it-exa-glp-br-null&_ga=2.215270228.2108743129.1631989015-1977958380.1631989015&_gac=1.151000267.1631989015.Cj0KCQjwnJaKBhDgARIsAHmvz6erAgTtVSlhYFr8HbzZ9MUjqeiRAPpilxtHYxLfInPVIjcwFtS4Fe8aAm-KEALw_wcB#howItWorks" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="https://www.coursera.org/professional-certificates/google-it-support?utm_source=google&utm_medium=institutions&utm_campaign=gwgsite-gDigital-paidha-sem-bk-it-exa-glp-br-null&_ga=2.215270228.2108743129.1631989015-1977958380.1631989015&_gac=1.151000267.1631989015.Cj0KCQjwnJaKBhDgARIsAHmvz6erAgTtVSlhYFr8HbzZ9MUjqeiRAPpilxtHYxLfInPVIjcwFtS4Fe8aAm-KEALw_wcB#howItWorks" target="_blank">Study Material </a>

			 </div>

 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.php");
        });
    </script>

 </body>
</html>
<!-- Resources 
https://www.w3schools.com/html/tryit.asp?filename=tryhtml_table_intro

FORMAT FOR CERTS
	  <div class="certs">
				 <p class="title"></p>
				 <p class="source">Timeline: | Cost: $ <br>
				 <p class="description">Description: </p>
				 <a href="" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="" target="_blank">Study Material | </a>
				 <a href="" target="_blank">Exam</a>

			 </div>


i
CREATE TABLE certs (
    certId INT NOT NULL AUTO_INCREMENT,
	industry VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
	cost DECIMAL(10 , 2 ) NULL,
    costBreakdown VARCHAR(255) NULL,
	time INT NULL,
	url VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	notes VARCHAR(255) NULL,
	experience TINYINT,
    PRIMARY KEY (certId)
);

