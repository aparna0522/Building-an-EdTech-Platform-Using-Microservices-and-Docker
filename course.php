<?php 
	session_start();
	if(isset($_SESSION['userid'])){
	include('header.html');
?>	

	<body ng-app="myApp" ng-controller="myCtrl">	
		<!-- Navbar -->
		<div class="course-bg">
			<header>
				<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FBFBFB">
					
					<a class="navbar-brand" href="dashboard.php?id=<?php echo $_SESSION['userid'];?> ">
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
									<a class="nav-link btn btn-warning" href="dashboard.php?id=<?php echo $_SESSION['userid'];?> ">Dashboard</a>
								</li>
								<!-- <li class="nav-item">
									<h6 class="nav-link text-dark" style="font-size: 1.25em;">USERNAME</h6>
								</li> -->
							</ul>
						</div>	
				</nav>
			</header>
		
		<!-- main content -->
			<div class="main-content mb-5">
				<div class="container-fluid mt-5 pt-3">
					<div class="row">
						<!-- Vertical tabs -->
						<section class="col-lg-3 col-md-3 col-sm-12 side-bar" >
							<h5 class="text-center px-3  mb-0 mt-4">Guidelines</h5>
							<hr class="slide2">
							
							<button type="button" class="nav-link text-dark " data-toggle="modal" data-target="#staticBackdrop" style="background-color: #e1e1e7; border:0px; font-size: 20px;font-weight: 500;outline:none;">
							<span><small><i class="far fa-circle mr-2"></i></small>Course Creation Guidelines</span>
							</button>
							<ul class="nav nav-tabs flex-column" ng-cloak>
								<h5 class="text-center px-3  mb-0 mt-4">Plan your course</h5>
								<hr class="slide2">
								<li><a href="#course-landing" class="nav-link text-dark px-4" data-toggle="tab" style="background-color: #e1e1e7; border-color:#e1e1e7;"><span><small><i class="far fa-circle" ng-show="course_incomplete"></i><i class="far fa-check-circle" ng-show="course_complete"></i></small> Course landing page</span></a></li>
								<li><a href="#course-video" class="nav-link text-dark  px-4" data-toggle="tab" style="background-color: #e1e1e7; border-color:#e1e1e7;"><span><small><i class="far fa-circle" ng-show="lec_incomplete"></i><i class="far fa-check-circle" ng-show="lec_complete"></i></small> Curriculum</span></a></li>
								<li><a href="#target-student" class="nav-link text-dark px-4" data-toggle="tab" style="background-color: #e1e1e7; border-color:#e1e1e7;"><span><small><i class="far fa-circle" ng-show="skill_incomplete"></i><i class="far fa-check-circle" ng-show="skill_complete"></i></small> Target your student</span></a></li>
							</ul>
						</section>
						<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header text-dark heading-form">
			<div class="modal-title" id="staticBackdropLabel">
				<h3 class="my-3">Guidelines for course creation</h3> 
			</div>
          
		  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img src="https://image.freepik.com/free-vector/young-businesswoman-holding-paper-pointing-finger-side-cartoon-illustration_56104-506.jpg" alt="confident girl" style="float: left; width:400px; margin:25px;">
            <h5 class="text-dark my-1">Choose your course domain/field</h5>
			<p class="text-dark my-2 text-justify">
				There are four major fields which Eduhub provides it's users namely: Arts, Business, Marketing and IT&Software. You can accordingly align your course to include it in either of these four domains. 
			</p>
				<p class="text-dark my-2 text-justify">
					Skim through the following steps to understand how you can add your course's landing page:
					<ul class="text-dark" style="list-style-position: inside;">
						<li>Ensure to complete this step before proceeding to add your videos.</li>
						<li>Give an strikingly relevant title to your course! It is mandatory to fill this field, users would be able to find your course with this.</li>
						<li>You may skip writing the course subtitle and the course description. But they increase the USP of your course, so work wisely! </li>
						<li>Use the course's image relevant to the course's topic.Note that the course image should have the dimensions 510px width and 200px height.</li>
						<li>You can offer the course for free or can charge the students for the same.</li>
						<li>Once you submit the form, you won't be able to make changes.</li>
					</ul>
				</p>
                <hr class="mt-3">            
               <p class="mt-5">
                    <img class="my-1 mt-4" src="https://cdn.pixabay.com/photo/2016/04/25/12/06/man-1351761_960_720.png" alt="businessman" style="float:right; width: 400px; margin:25px; margin-top:35px;">
                    <h5 class="text-dark lead font-weight-bold my-1 ">How to upload videos?</h5>
                    <p class="text-dark my-2 text-justify">
						We suggest you to include an introductory video, wherein you can introduce yourself, and give a general idea about the course. It’ll set the right tone and expectations for your students. So it needs to be brief but impactful. Keep it within 2–4 minutes. 
                    </p>
                    <p class="text-dark my-2 text-justify">
						Steps need to be consider while creating lectures and uploading videos:
                        <ul class="text-dark col-8"  style="list-style-position: inside;">
                        <li>There are three fields which you need to fill in mandatorily to include the videos, they are Lecture title, Lecture description and your Video.</li>
                        <li>Size of the video should be maximum 12MB.</li>
                        <li>You can include maximum of 10 lectures in your course, basically, it would mean a 10 week course. </li>
                        <li>Once you upload your video, wait for a minute, until you find the video uploaded.<b> Do not refresh your page during this period.</b> Then you can save the course by clicking on the "Save" button.</li>
						<li>Add the documents if you want for the lecture.</li>
                        <li>Now, you can go and check the courses on Eduhub and you will find yours right there!!</li>
						
                        </ul>
                    </p>
                </p>
               <hr class="mt-2">
               <img src="https://cdn.pixabay.com/photo/2017/10/11/17/09/read-2841722_960_720.jpg" alt="boy" style="float: left; width: 400px; margin:25px;">
               <h5 class="text-dark lead font-weight-bold my-1 mt-5">Targeting your student</h5>
					<p class="text-dark my-2 text-justify">
					As a way of marketing your course, you can include the skills that the student is bound to get from learning and completing this course. This is completely optional step, however, it might increase the chances of your course getting viewed and purchased! 
					</p>
					<p class="text-dark my-2 text-justify">
					How to fill in these details?
					    <ul class="text-dark"  style="list-style-position: inside;">
						    <li>You can enter the various skills that are being taught by you in this course.</li>
						    <li>Ensure to add all the relevant skills and you are good to go!</li>
					    </ul>
					</p>
				

                <div class="text-center" style="clear: both;">
					<hr class="mt-2">		
                    <h5 class="text-dark font-weight-bold">Ready to create your course? Let's go!</h5>
                    <small class="text-dark">Click on Course landing page tab.</small>
                </div>
               
						
					
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
						<!-- Tab Contents  -->
						<section class="col-lg-9 col-md-9 col-sm-12">													
							<div class="tab-content flex-center">
								
								<!-- Course Landing Page -->
								<div class="tab-pane fade show active" id="course-landing">
									<div class="form-container">
										<div ng-cloak class="alert {{alertcourseClass}} alert-dismissible" ng-show="alertcourseMsg">
											<button type="button" class="close" ng-click="closeMsg()">&times;</button>
											{{alertcourseMessage}}
										  </div>
									 <h3 class="text-dark heading-form">Course landing page</h3>
									 <hr class="style-eight">
									 <div class="form-content">
										<form autocomplete="on">
											  
											<div class="form-group">
											    <label for="courseTitle">Course title</label>
											    <input type="text" class="form-control" id="courseTitle" ng-model="coursetitle" placeholder="Insert your course title">			
											</div>

											<div class="form-group">
												  <label for="courseSubtitle">Course subtitle</label>
												    <input type="text" class="form-control" ng-model="coursesubtitle" id="courseSubtitle" placeholder="Insert your course title">	    
											</div>

											<div class="form-group">  
												<label for="courseDescription">Course Description</label>
												<textarea rows="4" cols="50" id="courseDescription" ng-model="coursedescription" class="form-control" placeholder="Insert your course description" spellcheck="false"></textarea>
											</div>
											  
		      								<div class="form-group">
												<div class="form-row align-items-center">
												    <div class="col-4 my-1">
												      <label class="mr-sm-2" for="language"> Language</label>
												      <select class="custom-select mr-sm-2" id="language" ng-model="language">
												        <option value="">Choose language of teaching</option>
												        <option value="English(UK)">English(UK)</option>
												        <option value="English(US)">English(US)</option>
												        <option value="Hindi">Hindi</option>
												        <option value="Marathi">Marathi</option>
												      </select>
							
		      										</div>
												    <div class="col-4 my-1">
												      <label class="mr-sm-2" for="level">Level</label>
												      <select class="custom-select mr-sm-2" id="level" ng-model="level">
												        <option value = "">-- Select level --</option>
												        <option value="Beginner level">Beginner level</option>
												        <option value="Intermediate level">Intermediate level</option>
												        <option value="Expert level">Expert level</option>
												      </select>
						
												    </div>
												    <div class="col-4 my-1">
												      <label class="mr-sm-2" for="category">Category</label>
												      <select class="custom-select mr-sm-2" id="courseCategory" ng-model="category">
												        <option value="">Choose course category</option>
												        <option value="Arts">Arts</option>
												        <option value="Business">Business</option>
												        <option value="Marketing">Marketing</option>
												        <option value="IT&Software">IT &amp;Software</option>
												      </select>
										
												    </div>
												</div> 
											</div>

											<div class="form-group">
												  	<label class="mr-sm-2" for="courseimage">Course image</label>
												  	<div class="form-row align-items-center">
													    <div class="col-lg-6 col-sm-12 col-md-12 my-1 mx-0">
													    	<div class="image-preview" id="imagePreview">
													    		<img src="" alt="course image" class="image-preview__img" id="course_img">
													    		<span class="image-preview__default-text">Image Preview</span>	
													    	</div>
													    </div>	
													    <div class="col-lg-6 col-sm-12 col-md-12 my-1 mx-0">
													    	<p>Upload your course image here. It must meet our course image quality standards to be accepted. Important guidelines: 510x200 pixels; .jpg, .jpeg, or .png. no text on the image.</p>
													    	<div class="custom-file">
	    														<input type="file" class="custom-file-input" id="imgFile" name="image" ng-model="image" accept="image/*">
	    														<label class="custom-file-label" for="imgFile">No file selected</label>
																<div id="img_error"></div>
			      											</div>
	  													</div>    		
													</div>    	
											</div>
											<div class="form-group">
												<label for="Payment">Amount : {{amount | currency:"&#8377;"}}</label>
											    <input type="number" step="0.01" class="form-control" id="payment" name="amount" ng-model="amount" placeholder="Enter amount in INR" maxlength="50">
												<small class="form-text text-muted">
													Please enter the amount in Rupees. If it is free enter 0.00.
												</small>
												
									 		</div>
											<div class="form-group">
											  		<button class="btn btn-warning" type="submit" ng-click="submitCourse()" >Save</button>
											  		<button class="btn btn-outline-warning" type="reset" id="resetItem">Reset</button>							
											</div>
										</form>
									 </div>		  
									</div>
								</div>	
							
								<!-- Course Lecture -->
							
								<div class="tab-pane fade" id="course-video">
									<div class="form-container">
										<div class="alert {{alertlecClass}} alert-dismissible" ng-show="alertlecMsg">
											<button type="button" class="close" ng-click="closeMsg()">&times;</button>
												{{alertlecMessage}}
									  	</div>
										<h3 class="text-dark heading-form">Curriculum</h3>
										<hr class="style-eight">
										<div class="form-content">
											<p class="text-dark lead"> Start putting together your course by creating videos and related documents for your lecture.</p>
											<p class="text-dark lead">You can create as many lectures as you wish, abiding our rules.</p>
											<p class="text-dark lead"><span class="font-weight-bold">Note:</span> Once you submit a single lecture contents, you would not be able to change them.</p>
					
											<form  autocomplete="on">																								
				
												<!-- <div class="lecture-div">
													<div class="alert alert-dark mt-4">
														<h3>Lecture</h3>
														<div class="form-group">	
															<label for="lectureName">Lecture Name</label>
															<input type="text" class="form-control" id="lectureName" name="lectureName" placeholder="Enter lecture name" maxlength="100" required>
															<div class="invalid-feedback"><span><i class="fa fa-exclamation-circle"></i> Lecture name.</span></div>
															<div class="valid-feedback"><span><i class="fa fa-check-circle"></i> Looks good!</span></div>
														</div>	
		
														<div class="form-group">
															<label for="lectureDescription">Lecture description</label>
															<input type="text" class="form-control" id="lectureDescription" name="lectureDescription" placeholder="Enter lecture description" maxlength="100" required>
															<div class="invalid-feedback"><span><i class="fa fa-exclamation-circle"></i> Lecture name.</span></div>
															<div class="valid-feedback"><span><i class="fa fa-check-circle"></i> Looks good!</span></div>
														</div>
		
														<div class="form-group">
															<label for="Videos">Add Videos</label>
															<div class="custom-file">
																	<input type="file" class="custom-file-input" id="videoFile" name="videos" accept="video/*" required>
																	<label class="custom-file-label" for="videoFile">No file selected</label>
																	<div class="invalid-feedback"><span><i class="fa fa-exclamation-circle"></i> Please select a video.</span></div>
																	<div class="valid-feedback"><span><i class="fa fa-check-circle"></i> Nice Video!</span></div>		
															</div>
														</div>
		
														<div class="form-group">
																<button class="btn btn-secondary" type="submit" id="submit">Save</button>
														
														</div>	
													</div>  
												</div> -->
												<div class="lecture-div">
													<div class="alert alert-dark mt-4">
														<h3>Lecture</h3>
														<div class="form-group">	
															<label for="lectureName">Lecture Name</label>
															<input type="text" class="form-control" id="lectureName" ng-model="lecturename" placeholder="Enter lecture name" maxlength="100" required>
															<!-- <div ng-show="invalidtextlecname"><span class="text-danger"><i class="fa fa-exclamation-circle"></i> Enter lecture name.</span></div> -->
														</div>	
									
														<div class="form-group">
															<label for="lectureDescription">Lecture description</label>
															<textarea rows="4" cols="50"class="form-control" id="lectureDescription" ng-model="lectureDescription" placeholder="Enter lecture description" spellcheck="false"></textarea>
															<!-- <div ng-show="invalidtextlecdes"><span class="text-danger"><i class="fa fa-exclamation-circle"></i> Enter lecture decription.</span></div> -->
														</div>
									
														<div class="form-group">
															<label for="Videos">Add Videos: </label>
															<span class="font-italics h6">Size of Video should be less than 12MB</span>
															<div class="form-row">
													
																<div class="col-lg-4 col-md-12 d-flex justify-content-center">															
																	<video class="w-100" id='video-preview'  controls>
																		<source  type="video/mp4" src="">
																	</video>
																	
																</div>
					
																<div class="col-lg-8 col-md-12 mt-3">
																	<div class="custom-file">
																		<input type="file" class="custom-file-input" id="videoFile" name="videos" accept="video/*">
																		<label class="custom-file-label" for="videoFile">No file selected</label>
																		<div id="video_error"></div>
																		
																	</div>
																</div>
																
															</div>	
														</div>
									
														<div class="form-group" >
																<button class="btn btn-warning" type="button" id="lecturesave" disabled ng-click="lecture_submit()">Save</button>	
														</div>	
														
													</div>
														
												</div>
												
												
											</form>	
											<form id="document-form" class="text-center m-5" onsubmit="return submitDocument();" ng-show="lec_name">
        										<div id="alert-msg"></div>
												<div class="alert alert-dark">
												<h3>Lecture Name: {{lec_name}}</h3>
        										<hr class="w-50">
        											<p><i>Upload the documents</i></p>    
        											<button  class="btn btn-outline-dark" type="button" onclick="selectFiles();">
            											Select files
        											</button>
         											<input type="submit" id="submitFile" class="btn btn-dark">
												</div>
												
    										</form>
    										<div id="selected-files"></div>
    									
										</div>	
									</div>	
								
								</div>

								<!-- Student Target -->
								<div class="tab-pane fade" id="target-student">
									<div class="form-container">
										<div class="alert {{alertskillColor}} alert-dismissible" ng-show="alertskillMsg">
											<button type="button" class="close" ng-click="closeMsg()">&times;</button>
												{{alertskillMessage}}
									  	</div>
										<h3 class="text-dark heading-form">Target your student (Optional)</h3>
										<hr class="style-eight">
										<div class="form-content">
											<p class="text-dark lead"> The descriptions you write here will help students decide if your course is the one for them.</p>
						
											<form autocomplete="on">																								
												<div class="form-group">	
													<label for="skills">What will students learn in your course?</label>
													<input type="text" class="form-control" id="courselearn" ng-model="learn_detail" placeholder="Eg: Install Python and write your first code." maxlength="100">
												</div>		
												<div class="form-group">	
													<label for="skills">What skills they will learn? {{skill}}</label>
													<input type="text" class="form-control" id="skills" ng-model="skill" placeholder="Eg: Python Basic, Web Scraping, etc." maxlength="100">
												</div>		
												<div class="form-group">
													<button class="btn btn-secondary" ng-click="skillsubmit()"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
												</div>
											</form>	
										</div>	
									</div>	
								</div>
							</div>		
						</section>	
					</div>		
				</div>	
			</div>
		</div>
			<?php include('footer.html')?>
			<script src="js\script.js"></script>
			<script type="text/javascript">
    			$(window).on('load', function() {
        			$('#staticBackdrop').modal('show');
    			});
			</script>	
	</body>
</html>
<?php
}
else{
    header("Location:http://localhost:5001/login");
}

?>