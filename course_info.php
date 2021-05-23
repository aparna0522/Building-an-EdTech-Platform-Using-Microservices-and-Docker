<?php
    session_start();
    include('header.html');
    $course_id= $_GET['id'];
    $connect = mysqli_connect('mysql','root','root');
	mysqli_select_db($connect,'eduhub_course');
    if(isset($_SESSION['userid'])){
        $userid=$_SESSION['userid'];
        $enrollment_query = "SELECT user_id FROM enrollment WHERE user_id='$userid' AND course_id='$course_id'";
        $enrollment_result=mysqli_query($connect,$enrollment_query);
        if(mysqli_num_rows($enrollment_result)>0){
            while($rows=mysqli_fetch_array($enrollment_result,MYSQLI_ASSOC)){  
                $uid=$rows['user_id'];
            }
        }
    }
    
?>
<style type="text/css">
.jumbotron1 {
    padding: 7rem 1rem;
    margin-bottom: 2rem;
    background: url("https://images.unsplash.com/photo-1532958808832-aae08f887875?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDIwfHx8ZW58MHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60") repeat center fixed;
    background-size:cover;
    border-radius: .3rem;
    border-bottom: 2px solid #8c8c8c;
    text-shadow: black 0px 12px 12px;
}

</style>
<body ng-app='course_detail' ng-controller='course_detail_ctrl'>
    <div ng-init="display_course_detail()">
        <div class="jumbotron1" >
        <!-- ng-repeat="details in course_details" -->
            <div class="container"ng-cloak>
                <div class="row">    
                    <div class="col-sm-7 text-white d-flex justify-content-center">
                        <div ng-repeat="x in course_details.course">
                            <h1 class="py-2 font-weight-bold" ng-cloak>{{x.coursetitle}}</h1>
                            <p class="font-italic h4" ng-cloak>{{x.coursesubtitle}}</p>
                            <p  class="lead text-dark" ng-cloak><span class="badge badge-pill badge-light">{{x.course_level}}</span></p>
                            <p class="lead"><i>Charles Russell Severance</i></p>
                    
                            <?php 
                            if(isset($_SESSION['userid']))
                            {   
                                if($uid!=$_SESSION['userid'])
                                    echo '<a href="http://localhost:7000/payment/{{x.course_id}}/'.$_SESSION['userid'].'" class="btn btn-light text-dark">Enroll</a>';
                                else
                                    echo '<a href="viewcourse.php?id={{x.course_id}}" class="btn btn-light text-dark">Go to course</a>';
                            }    
                            else 
                                echo '<a href="http://localhost:5001/login" class="btn btn-light text-dark">Enroll</a>';
                            ?>
                            <span class="ml-2 lead" ng-cloak>{{x.amount| currency:"&#8377;"}}</span>                            
                            <p class="mt-1" ng-cloak>{{x.course_language}}</p>
                        </div>    
                    </div>
                    <div class="col-sm-5 py-2">
                        <div ng-repeat="x in course_details.course">
                            <img src="{{x.course_image}}" width="400px" alt="course-image" class="rounded float-right" >                   
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <div>
        <!-- ng-repeat="details in course_details" -->
            <div class="container">
                <div class="row">  
                    <!-- <div class="col-8">             -->
                        <div>
                            <p class="h3 my-3" ng-show="course_details.course[0].coursedescription">About this course</p>
                            <hr/> 
                            <p class="lead font-italic text-dark text-justify" ng-cloak>{{course_details.course[0].coursedescription}}</p>
                        </div> 
                    <!-- </div> -->
                    <!-- <div class="col-4">       -->
                    <div class="col-12">   
                            <p class="h3 mt-5" ng-show="course_details.skills.length">What you will learn!</p>
                            <hr class="my-4" ng-show="course_details.skills.length">
                            <ul>
                            <!-- ng-repeat="z in details.skills" -->
  						        <li class="lead text-dark" ng-repeat="z in course_details.skills" ng-cloak>{{z.learn_detail}}</li>
					        </ul>
                            
                
                    </div>
                    <div class="col-12">
                        <div >      
                            <p class="h3 mt-5" ng-show="course_details.skills.length">
                                Skills you will learn
                            </p> 
                            <hr class="my-4" ng-show="course_details.skills.length">
                            <span ng-repeat="z in course_details.skills"> 
                                <span class="btn btn-dark" ng-cloak>{{z.skills}}</span>
                            </span>
                        </div>
                    </div>                 
                    <!-- </div>  -->
                    <!-- <div class="col-4">
                        <img src="https://res.cloudinary.com/eduhub/image/upload/v1614061805/course_image_videos/jumbotronpic_d5vvdv.png" alt="course-info"></img>
                    </div>        -->
                </div>
            </div>        
        </div>
        <div class="my-5">
        <!-- ng-repeat="details in course_details" -->
            <div class="container">
                <h3 class="mb-3 text-center">Syllabus - What you will learn from this course</h3>
                <hr class="mb-3 w-100"/>
                <div class="row" ng-repeat="y in course_details.lecture">
                    <div class="col-2 my-3">
                        <p class=" text-uppercase text-center" style="letter-spacing:2px;">WEEK</p>
                        <p class="text-center h1">{{$index + 1}}</p>
                    </div>
                    <div class="col-10 my-3">
                        <h4  ng-cloak>{{y.lec_name}}</h4>
                        <p class="text-justify font-weight-light"ng-cloak>{{y.lec_description}}</p>
                    </div>
                    
                </div>  
               
            </div>
        </div>
    </div>
                <!-- <div ng-init="display_course_detail()"> 
                        <div ng-repeat="details in course_details">
                            <div ng-repeat="x in details.course">
                                <h1 ng-cloak>{{x.coursetitle}}</h1>
                                <h5>Subtitle</h5>
                                <p ng-cloak>{{x.coursesubtitle}}</p>
                                <h5>Description</h5>
                                <p ng-cloak>{{x.coursedescription}}</p>
                                <img src="{{x.course_image}}" alt="course_image"></img>
                                <h5>language</h5>
                                <p ng-cloak>{{x.course_language}}</p>
                                <h5>level</h5>
                                <p ng-cloak>{{x.course_level}}</p>
                                <h5>category</h5>
                                <p ng-cloak>{{x.category}}</p>
                                <h5>amount</h5>
                                <p ng-cloak>{{x.amount}}</p>
                            </div>
                            <div ng-repeat="y in details.lecture">
                                <div ng-repeat="y in lec_info">
                                <h3 ng-cloak>{{y.lec_name}}</h3>
                                <h6 ng-cloak>{{y.lec_description}}</h6>
                                </div>
                            </div>
                            <ul ng-repeat="z in details.skills">
                                <div ng-repeat="y in lec_info">
                                <li ng-cloak>{{z.learn_detail}}</li>
                            
                                </div>
                            </ul>
                            <div ng-repeat="z in details.skills">
                                <div ng-repeat="y in lec_info">
                                <span ng-cloak>{{z.skills}}</span>
                            
                                </div>
                            </div>
                            
                        </div>

                </div>  -->



<?php include('footer.html');

echo"<script>
var course_detail_app = angular.module('course_detail',[]);
course_detail_app.controller('course_detail_ctrl',function(\$scope,\$http){
        \$scope.display_course_detail = function(){
        \$http({
            method:'GET',
            url:'course-service/course_details.php',
            params:{
                'course_id':".$course_id."    
            }
        }).then(function(response){  
            \$scope.course_details=response.data;
        },
        function(response){
            console.error(response);
        });
    
    }   

});
</script>
</body>
</html>";

?>
