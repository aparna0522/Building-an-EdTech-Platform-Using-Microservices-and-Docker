// Image functionality
var CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/eduhub/image/upload';
var CLOUDINARY_PRESET = 'eduhub';
const imgFile = document.getElementById("imgFile");
const previewContainer = document.getElementById("imagePreview");
const resetItem = document.getElementById("resetItem");
const previewImage = previewContainer.querySelector(".image-preview__img");
const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
var img_url='';
var _URL = window.URL || window.webkitURL;
imgFile.addEventListener("change",function(event){
	var img,file;
	file = this.files[0];	
	if(file) {
		img= new Image();
		img.onload=function(){
			var imgwidth= this.width;
			var imgheight= this.height;
			if (imgwidth==510 && imgheight==200) {
				document.getElementById('img_error').innerHTML='';
				
				const formData = new FormData()
				formData.append('file', file);
				formData.append('upload_preset',CLOUDINARY_PRESET);
				formData.append('cloud_name','eduhub');  
				  fetch(CLOUDINARY_URL, {
					method: 'POST',
					body: formData
				})
				.then(response => response.json())  
				  .then(function(data){
					  previewDefaultText.style.display = "none";
					  previewImage.style.display ="block"; 
					  previewImage.setAttribute("src",data.url);
					  img_url=data.url;
			//   localStorage.setItem("course_img",data.url);
				  })
				  .catch(function(err) {
					console.log(err);
				  })	
			}
			else{
				document.getElementById('img_error').innerHTML='<div class="text-danger">Invalid image size!</div>';
				previewDefaultText.style.display = null;
				previewImage.style.display = null;
				previewImage.setAttribute("scr","");
			}
		}
		img.src = _URL.createObjectURL(file);	
			   
	}
	else{
		document.getElementById('img_error').innerHTML='';
		previewDefaultText.style.display = null;
		previewImage.style.display = null;
		previewImage.setAttribute("scr","");
		// localStorage.setItem("course_img",'');
	}

});

resetItem.addEventListener("click",function(){
		previewDefaultText.style.display = null;
		previewImage.style.display = null;
		previewImage.setAttribute("scr","");
});

//Video Functionality
var custom_file = document.getElementsByClassName('custom-file-label'); 
var videoPreview = document.getElementById('video-preview');
var videoUpload = document.getElementById('videoFile');
var video_error = document.getElementById('video_error');
var CLOUDINARY_URL_VIDEO = 'https://api.cloudinary.com/v1_1/eduhub/video/upload';
var CLOUDINARY_PRESET = 'eduhub';
var button_disable = document.getElementById("lecturesave");
var disabled_attr = document.createAttribute("disabled");
var i = 0;
videoUpload.addEventListener('change',function(event){
    var videofile = event.target.files[0];
    if(videofile)
    {
        if(videofile.size< 12000000)
        {
            video_error.innerHTML='';
            var videoformdata = new FormData();
            videoformdata.append('file',videofile);
            videoformdata.append('upload_preset',CLOUDINARY_PRESET);
			
            axios({
                url:CLOUDINARY_URL_VIDEO,
                method:'POST',
                header: {           
                'Content-Type':'application/x-www-form-urlencoded'
                },
                data: videoformdata   
            }).then(function(res){
				
                videoPreview.src= res.data.secure_url;
                button_disable.removeAttribute("disabled"); 
            }).catch(function(err) {
            console.error(err);
            })

        }
        else
        {
            video_error.innerHTML='<div class="text-danger">Exceeded Size!</div>';
            videoPreview.src= '';
        }
    }
    else
    {
        video_error.innerHTML='';
        videoPreview.src= '';
        
    }
    
})
var course_id=null;
var lec_id= 0;
var app = angular.module("myApp",[]);
app.controller("myCtrl",function($scope,$http){ 
	$scope.alertcourseMsg = false;
	$scope.course_incomplete = true;
	$scope.course_complete=false;
	$scope.lec_incomplete =true;
	$scope.lec_complete = false;
	$scope.skill_incomplete = true;
	$scope.skill_complete = false; 
	$scope.course_id=null;
	$scope.lec_name=null;
	$scope.alertlecMsg=false;
	$scope.alertskillMsg=false;
	$scope.closeMsg = function(){
		$scope.alertcourseMsg=false;
		$scope.alertlecMsg=false;
		$scope.alertskillMsg=false;
	}
	$scope.submitCourse= function()
	{ 
		
		if(!$scope.coursedescription)
		{
			$scope.coursedescription="";
		}
		if(!$scope.coursesubtitle)
		{
			$scope.coursesubtitle="";
		}
		if(!$scope.coursetitle || !$scope.language || !$scope.level || !$scope.category||!img_url || !$scope.amount)
		{
			$scope.alertcourseMsg = true;
			$scope.alertcourseClass = 'alert-danger';
			$scope.alertcourseMessage = 'Make Sure you have filled title, language, level, category, image and amount.';
		}		
		else
		{
			$http({
			method: 'POST',
			url: 'course-service/course_insert.php',
			data: {
					'teacher_id':localStorage.getItem('userid'),
					'coursetitle': $scope.coursetitle,
					'coursesubtitle': $scope.coursesubtitle,
					'coursedescription': $scope.coursedescription,
					'language': $scope.language,
					'level': $scope.level,
					'category': $scope.category,
					'course_image': img_url,
					'amount': $scope.amount
					}
				}).then(function(response){
					   $scope.alertcourseMsg=true;
					if(response.data.message =='')
					{
						$scope.alertcourseClass = 'alert-danger';
						$scope.alertcourseMessage = response.data.error;
					}
					else
					{
						$scope.alertcourseClass='alert-success';
						$scope.alertcourseMessage = response.data.message;
						$scope.course_id = response.data.courseid;
						course_id= $scope.course_id;
						$scope.coursetitle =null;
						$scope.coursesubtitle = null; 
						$scope.coursedescription = null;
						$scope.language = null;
						$scope.level = null;
						$scope.category = null;
						$scope.amount=null;
						previewDefaultText.style.display = null;
						previewImage.style.display = null;
						previewImage.setAttribute("scr","");
						$scope.course_complete = true;
						$scope.course_incomplete = false;
					}
			
			});
		}
			
		
	
	}
	$scope.lecture_submit = function(){
    
		if(!$scope.lecturename || !$scope.lectureDescription || !videoPreview.src){
			
			$scope.alertlecMessage = 'Enter all fields';
			$scope.alertlecClass = "alert-danger"; 
			$scope.alertlecMsg=true; 
		}
		else if(!$scope.course_id)
		{
			$scope.alertlecMessage = 'First fill course section';
			$scope.alertlecClass = "alert-danger"; 
			$scope.alertlecMsg=true; 
		}
		else{
			$http({
	
				method:'POST',
				url:'course-service/lecture_insert.php',
				data:{
					'course_id':$scope.course_id,
					'lecturename':$scope.lecturename,
					'lecturedescription':$scope.lectureDescription,
					'video': videoPreview.src
				}
			}).then(function(response){
				
				if(response.data.message!=''){
					
					$scope.lec_incomplete=false;
					$scope.lec_complete=true;
					$scope.lectureDescription=null;
					$scope.lecturename=null;
					videoPreview.src='';
					$scope.alertlecMsg=true;
					$scope.alertlecClass = "alert-success";
					$scope.alertlecMessage = response.data.message;
					$scope.lec_name=response.data.lec_name;
					lec_id = response.data.lec_id;
					button_disable.setAttributeNode(disabled_attr);
					
					// document.getElementsByClassName("selected").value = "No file Selected";
					// custom_file.innerHTML('No file Selected');
	
				}
				else{
					$scope.alertlecMessage=response.data.error;
					$scope.alertlecClass = "alert-danger";
					$scope.alertlecMsg=true;
				}
				
			},
			function(response){
				console.error(response);
			});
		}
		
	}
	$scope.skillsubmit = function(){
		if(!$scope.course_id)
		{
			$scope.alertskillMessage = 'First complete course section';
			$scope.alertskillColor = "alert-danger";
			$scope.alertskillMsg = true;
		}
		else if(!$scope.learn_detail || !$scope.skill)
		{
			$scope.alertskillMessage = 'Fill all details';
			$scope.alertskillColor = "alert-danger";
			$scope.alertskillMsg = true;

		}
		else
		{
			$http({
				url:"course-service/skill_insert.php",
				method:"POST",
				data:{
					'course_id':$scope.course_id,
					'learn_detail':$scope.learn_detail,
					'skill':$scope.skill
				}
			}).then(function(response){
				if(response.data.message!=''){
					$scope.skill_complete =true;
					$scope.skill_incomplete=false;
					$scope.alertskillMessage= response.data.message;
					$scope.alertskillMsg = true;
					$scope.alertskillColor = "alert-success";
					$scope.learn_detail = null;
					$scope.skill=null;
				}
				else{
					$scope.alertskillMessage= response.data.error;
					$scope.alertskillMsg = true;
					$scope.alertskillColor = "alert-danger";
				}
				
			},
			function(response){
				console.error(response);
			});
		}
	} 


});

var selectedFiles=[];
function selectFiles() {
	$.FileDialog({
		"accept": ".pdf"
	}).on("files.bs.filedialog", function (event) {
		var html = "";
		for (var a = 0; a < event.files.length; a++) {
			selectedFiles.push(event.files[a]);  
		}
		html+="<p class='text-center'><button type='button'class='close pr-2' style='float:none;' onclick='removeFiles()'>&times;</button><span><i class='fas fa-file'></i></span>&nbsp;Total files selected:<b> "+selectedFiles.length+"</b></p>";
		document.getElementById("selected-files").innerHTML = html;
	});
}
function removeFiles(){
					selectedFiles=[];
					document.getElementById("selected-files").innerHTML=" ";
				}
				function submitDocument() {
					var form = document.getElementById("document-form");
					var formDataDoc = new FormData(form);
					formDataDoc.append('course_id',course_id);
					formDataDoc.append('lec_id',lec_id);
					for (var a = 0; a < selectedFiles.length; a++) {
						formDataDoc.append("document[]", selectedFiles[a]);
					
				}
            
            	var ajax = new XMLHttpRequest();
            	var ajaxResponse;
            	ajax.open("POST", "course-service/uploaddocument.php", true);
            	ajax.send(formDataDoc);
         
            	ajax.onreadystatechange = function () {
                	if (this.readyState == 4 && this.status == 200) {
                    	console.log(JSON.parse(this.responseText) );
                    	ajaxResponse=JSON.parse(this.responseText);
                    
                    	if(ajaxResponse['message']!=undefined){
                        	document.getElementById("alert-msg").innerHTML+='<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'+ajaxResponse["message"]+'</strong></div>'
                        	lec_id=null;
							document.getElementById("selected-files").innerHTML="";
							selectedFiles=[];
                    	}
                    	else{
                        	document.getElementById("alert-msg").innerHTML+='<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'+ajaxResponse["error"]+'</strong></div>'
                    	}     
                    	console.log(ajaxResponse['message']); 
                    	console.log(ajaxResponse['error']);                   

                	}
            	};
				
            	return false;
        		}
// var courseform = document.querySelector('#courseform');

// courseform.addEventListener('submit', function(event) {
// // 	    if (courseform.checkValidity() === false) {
// // 	        event.preventDefault();
// // 	        event.stopPropagation();
// // 		}
// 		event.preventDefault();
// // 	    courseform.classList.add('was-validated');
		

// },false);  