<?php 
    session_start();
    $userid =  strval($_SESSION['userid']);
    $course_id=$_GET['id'];
    include('header.html');
?>  

<style>
    .nav-pills .nav-link.active {
        /* background-color: #ff8800; */
        background-color: #ffbb33;
    }
    .nav-pills .nav-link{
        font-size: 20px;
    }
    .week__tab.nav-pills .nav-link.active {
        background-color: #fff;
        border-right: #ffbb33 solid 6px;
        border-left: #ffbb33 solid 6px;
    }
    .nav-pills a:hover{
        background-color: #f2f2f2;
    }
    /*.img-thumbnail{
        border:
    }*/
</style>
<body ng-app="viewcourse" ng-controller="viewCtrl" ng-cloak>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FBFBFB">
            
            <a class="navbar-brand" href="dashboard.php">
                <img 
                    src="images/favicon.jpeg"
                    width="75"
                    height="75"
                    alt="EduHub.png"
                />EduHub
                </a>

                <button
                    id="navbarToggle"
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">	
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="dashboard.php?id=<?php echo $_SESSION['userid'];?>">Back to Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-warning" href="http://localhost:3000">My Todo List</a>
                        </li>
                    </ul>
                </div>	
        </nav>
    </header>     
    <div class="container" ng-init="viewdisplay()">
        <!-- Nav tabs -->
        <div class="dynamic__tabs mt-5 mb-3">
            <ul class="nav nav-pills nav-justified text-center" role="tablist">
                <li class="nav-item mr-1">
                  <a class="nav-link active text-dark" data-toggle="pill" href="#overview"><i class="fas fa-bullseye-arrow pr-3"></i>OVERVIEW</a>
                </li>
                <li class="nav-item mr-1" ng-repeat="details in lecture_details">
                  <a class="nav-link text-dark" data-toggle="pill" href="#week{{$index+1}}"><i class="far fa-calendar-alt pr-3"></i>WEEK {{$index +1}}</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link text-dark" data-toggle="pill" href="#discussion"><i class="fas fa-comments fa-lg"></i>  DISCUSSIONS</a>
                </li>
              </ul>
        </div>
       
        <!-- Tab panes -->
        <div class="tab-content shadow-lg p-3 mb-5 bg-white rounded">
            <div id="overview" class="container tab-pane active"><br>
                <div class="overview p-3">
                    <div ng-repeat="details in course_details">
                        <h3 class="text-center">{{details.coursetitle}} </h3>
                        <hr class="slide2">
                        <!-- <img src="{{details.course_image}}" alt="courseimage"> -->
                        <p class="text-center lead">{{details.coursesubtitle}}</p>
                        <p class="text-justify" style="font-weight:400;">{{details.coursedescription}}</p>
                    </div>
                    <h5 class="text-justify" ng-show="skill_details.length">What will you learn?</h5>
                    <hr ng-show="skill_details.length">
                    <ul ng-repeat="details in skill_details">
                        <li>{{details.learn_detail}}</li>    
                    </ul>
                    <h5 class="text-justify mt-5" ng-show="skill_details.length">Skills you will learn</h5>
                    <hr ng-show="skill_details.length">
                    <span ng-repeat="details in skill_details">
                        <span class="btn btn-dark font-weight-bold">{{details.skills}}</span>
                    </span>
                    <div class="image-box my-5 text-center">
                       
                        <div ng-repeat="details in course_details">
          
                            <img src="{{details.course_image}}" class="img-thumbnail rounded" alt="courseimage" style="border:#ffbb33 solid 5px;">
                    
                        </div> 
                    </div>
                    <div>
                        <hr class="text-center w-25 slide2">
                        <p class="text-center lead">Get started with your course!!!</p>
                        <hr class="text-center w-25 slide2">
                        
                    </div>  
                </div> 
            </div>
          
            <div id="week{{$index+1}}" class="container tab-pane fade" ng-repeat="details in lecture_details"><br>
                <div class="row">
                    <div class="col-md-3 col-sm-2 w-50 mt-5">
                        <ul class="nav nav-pills flex-column week__tab text-justify" role="tablist">
                            <li class="nav-item">
                             <a class="nav-link active text-dark" data-toggle="pill" href="#lecture{{$index +1}}"><i class="fas fa-laptop-code px-3" style="font-size: 15px;"></i>Lecture</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-toggle="pill" href="#document{{$index+1}}"><i class="fas fa-file-invoice px-3" style="font-size: 15px;"></i>Documents</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="col-md-9 w-0">
                        <div class="tab-content flex-center">
                            <h3 class="text-center">WEEK {{$index+1}}</h3>
                            <hr class="slide2">
                            <div id="lecture{{$index +1}}" class="container tab-pane active"><br> 
                                <p class="h4 px-3 mx-3"><i class="far fa-dot-circle pr-2"></i>{{details.lec_name}}</p>
                               
                                <video width="100%" height="100%" class="text-center p-3 m-3" style="outline:none" controls>
                                    <source src="{{details.video}}">
                                </video>
                                
                                <h4 class="text-center">About the lecture</h4>
                                <hr class="slide2">
                                <p class="text-justify text-dark p-3 m-3">{{details.lec_description}}</p>
                            </div> 
                            <div id="document{{$index+1}}" class="container tab-pane fade"><br>
                                <h5><i class="fas fa-book-open"></i>  Reading section</h5>  
                                <hr>
                                <p class="text-dark">In this section you can read the important notes and also you can download for future references.</p>
                                <p class="text-center mb-3">
                                    <iframe ng-src="{{document.document}}" ng-show="{{details.lec_id}}=={{document.lec_id}}" ng-repeat="document in documents" frameborder="1" allowfullscreen="true" width="100%" height="600"></iframe>
                                </p> 
                                        <!-- <i class="far fa-file-pdf"></i> <a href="uploads/{{document.document}}" target="_janhavi">{{document.document}}</a> -->
                            </div>    
                        </div> 
                    </div>
                </div>
            </div>
            
            <div id="discussion" class="container tab-pane fade">
                <div class="discusion-forum m-5">
                    <h2 class="my-2 text-center">Discussion Forum</h2>
                    <hr class="slide2">
                    <div class="form-group">
                        <textarea class="form-control" ng-model="maincomment" placeholder="Ask your doubt" cols="30" rows="2"></textarea><br>
                        <button style="float:right;" class="btn btn-warning mb-4" ng-click="submitComment()">Submit</button>
                    </div>    
                    <div class="userComments" ng-init="getComments()">
                        <h4><i class="fas fa-comments fa-lg"></i>  {{ncomments}} Discussions</h4>
                        <div class="comment" ng-repeat="comment in comments">
                            <div class="my-4 p-3" style="border:1px solid grey; border-radius:25px;">
                                <div class="user font-weight-bold">
                                    <span><i class="fas fa-user-circle fa-lg pr-2" style="color:#DC143C;"></i></span>
                                    <span style="font-size:15px">{{comment.username}}</span> 
                                    <span class="time text-muted px-4 font-weight-lighter timeago" style="float:right;"><small><i class="far fa-clock"></i> {{comment.createdOn}}</span></small>
                                </div>
                                <div class="userComment ml-4 pl-3" style="word-wrap: break-word;">
                                    <p>{{comment.comment}}</p>
                                </div>
                                <div class="reaction mt-2 pl-4">
                                    <span class="like px-2" style="color:blue;">
                                        <i class="fas fa-arrow-alt-circle-up fa-lg" ng-click="reaction(comment.comment_id,'unlike')" ng-show="{{comment.usersliked.user_id==user_id}}" data-id={{comment.comment_id}}></i><i class="far fa-arrow-alt-circle-up fa-lg like-btn" ng-hide="{{comment.usersliked.user_id==user_id}}"  ng-click="reaction(comment.comment_id,'like')"></i>  {{comment.reactions.likes}}
                                    </span>
                                    <span class="dislike px-2" style="color:blue;">
                                        <i class="fas fa-arrow-alt-circle-down fa-lg" ng-show="{{comment.usersdisliked.user_id==user_id}}" ng-click="reaction(comment.comment_id,'undislike')"></i><i class="far fa-arrow-alt-circle-down fa-lg"  ng-hide="{{comment.usersdisliked.user_id==user_id}}" ng-click="reaction(comment.comment_id,'dislike')"></i> {{comment.reactions.dislikes}}
                                    </span>
                                    <span class="reply">
                                        <i class="fa fa-reply" aria-hidden="true"></i>  <a href="javascript:void(0)" style="color:black" data-commentid="{{comment.comment_id}}" onclick="reply(this)">Reply</a>
                                    </span>
                    
                                </div>
                                <hr ng-show="{{comment.replies.length}}">
                                <div class="text-muted mb-2" style="margin-left:50px;" ng-show="{{comment.replies.length}}"><i class="fa fa-reply" aria-hidden="true"></i> Replied to {{comment.username}}</div>
                                <div class="replybox bg-light p-2 my-2" style="margin-left:50px; border-left:3px solid #ffc107;" ng-repeat="reply in comment.replies">            
                                    <div class="user ml-3 font-weight-bold">
                                        <span><i class="fas fa-user-circle fa-lg pr-2" style="color:green;"></i></span>
                                        <span style="font-size:15px">{{reply.username}}</span> 
                                        <span class="time text-muted px-4 font-weight-lighter timeago" style="float:right;"><small><i class="far fa-clock"></i> {{reply.createdOn}}</span></small>
                                    </div>
                                    <div class="userComment ml-4 pl-4 bg-light" style="word-wrap: break-word;">
                                        <p>{{reply.reply}}</p>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group replyRow mt-2" style="display:none">
                        <textarea class="form-control" ng-model="userreply" placeholder="Reply...." cols="30" rows="2"></textarea><br>
                        <button class="btn btn-warning mb-4" ng-click="submitReply()">Reply</button>
                        <button class="btn btn-secondary mb-4 ml-2" onclick="$('.replyRow').hide();">Close</button>
                    </div>     
                </div>
            
            </div>
        </div>
    </div>  
    <?php include('footer.html');?>
    <script src="js/jquery.timeago.js"></script>
            <script>
                var comment_id=0;
                function reply(caller){
                    comment_id= $(caller).attr('data-commentid');
                    $(".replyRow").insertAfter($(caller));
                    $(".replyRow").show(); 
                }
                var app = angular.module('viewcourse',[]);
                app.controller('viewCtrl',function($scope,$http,$sce){
                    var course_id=<?php echo $course_id; ?>;
                    var username="The Anonymous";
                    <?php echo'var user_id="'.$userid.'";';?>
                    $scope.user_id=user_id;
                    $scope.viewdisplay=function(){
                        $http({
                            method:'GET',
                            url:'course-service/viewcourse_details.php',
                            params:{
                                // 'course_id':".$course_id." 
                                'course_id':<?php echo $course_id; ?>
                            }
                        }).then(function(response){
                            $scope.course_details=response.data.course;
                            $scope.lecture_details = response.data.lecture;
                            $scope.skill_details = response.data.skills;
                            $scope.documents = response.data.documents;
                            $scope.documentUrl=[];
                            for(var i=0; i< $scope.documents.length;i++){
                                $scope.documents[i].document='uploads/'+ $sce.trustAsResourceUrl($scope.documents[i].document);
                                console.log($scope.documents);
                            }    
                            
                        },
                        function(response){
                            console.error(response);
                        });
                    }
                    $scope.getComments=function(){
                        $http({
                            method:"GET",
                            url:"course-service/getcomments.php",
                            params:{
                                'course_id': course_id
                            }

                        }).then(function(response){
                            $scope.ncomments = response.data.ncomments;
                            $scope.comments=response.data.comments;
                            for(var i=0;i<$scope.comments.length;i++){
                                $scope.comments[i].createdOn = $.timeago($scope.comments[i].createdOn); 
                                for(var j=0; j<$scope.comments[i].replies.length;j++){
                                    $scope.comments[i].replies[j].createdOn = $.timeago($scope.comments[i].replies[j].createdOn); 
                                }  
                            }
                            console.log(response.data);
                        },function(response){
                            console.error(response);
                        });
                    }  
                    $scope.submitComment=function(){
                        if($scope.maincomment){
                            $http({
                                url:"course-service/comments.php",
                                method:"POST",
                                data:{
                                    'course_id': course_id,
                                    'username': username,
                                    'user_id':user_id,
                                    'comment':$scope.maincomment
                                }
                            }).then(function(response){
                                console.log(response.data);
                                if(response.data.message=="Success"){
                                    $scope.maincomment=null;
                                    $scope.getComments();
                                }
                            },function(response){
                                console.error(response);
                            });
                        }
                    }
                    $scope.reaction=function(c_id,action){
                        console.log(action);
                        $http({
                                url:"course-service/likes.php",
                                method:"POST",
                                data:{
                                    'user_id':user_id,
                                    'comment_id':c_id,
                                    'action':action
                                }
                            }).then(function(response){
                                console.log(response.data);
                                if(response.data.message=="Success"){
                                
                                    $scope.getComments();
                                }
                            },function(response){
                                console.error(response);
                            });
                    }
                    $scope.submitReply=function(){
                        if($scope.userreply){
                            $http({
                                url:"course-service/comments.php",
                                method:"POST",
                                data:{
                                    'comment_id': comment_id,
                                    'user_id':user_id,
                                    'username': username,
                                    'reply':$scope.userreply
                                }
                            }).then(function(response){
                                console.log(response.data);
                                if(response.data.message=="Success"){
                                    $scope.userreply=null;
                                    $scope.getComments();
                                }
                            },function(response){
                                console.error(response);
                            });
                        }
                    }
                });
            </script>   
</body>
</html>    