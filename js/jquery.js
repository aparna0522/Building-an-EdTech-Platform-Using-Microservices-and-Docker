
 //    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
 //        localStorage.setItem('activeTab', $(e.target).attr('href'));
 //    });
 //    var activeTab = localStorage.getItem('activeTab');
 //    if(activeTab){
 //        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
	// }
	//form validation for video and images.
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		if (fileName!="") {
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		}
		else{
			fileName = "No file selected";
			$(this).siblings(".custom-file-label").text(fileName);
		}
	});
	// for reset button
	$("#resetItem").on("click",function(){
		var fileName = $(".custom-file-input").val().split("\\").pop();
		fileName = "No file selected";
		$(".custom-file-label").removeClass("selected").text(fileName);
	
	}); 
	
	//section and lecture button
	// var max_lecture = 5;
	// var add_lecture = $('.add_lecture_button');
	// var lecture_div = $('.lecture-div');
	// var lecture = 0;

	// $(add_lecture).on('click',function(e){
	// 	e.preventDefault();
	// 	if(lecture < max_lecture){
			// $(lecture_div).append('<div class="alert alert-dark mt-4"><h3>Lecture</h3><div class="form-group"><label for="lectureName">Lecture Name</label><input type="text" class="form-control" id="lectureName" name="lectureName" placeholder="Enter lecture name" maxlength="100" required><div class="invalid-feedback"><span><i class="fa fa-exclamation-circle"></i> Lecture name.</span></div><div class="valid-feedback"><span><i class="fa fa-check-circle"></i> Looks good!</span></div></div><div class="form-group"><label for="lectureDescription">Lecture description</label><input type="text" class="form-control" id="lectureDescription" name="lectureDescription" placeholder="Enter lecture description" maxlength="100" required><div class="invalid-feedback"><span><i class="fa fa-exclamation-circle"></i> Lecture name.</span></div><div class="valid-feedback"><span><i class="fa fa-check-circle"></i> Looks good!</span></div></div><div class="form-group"><label for="Videos">Add Videos</label><div class="custom-file"><input type="file" class="custom-file-input" id="videoFile" name="videos" accept="video/*" required><label class="custom-file-label" for="videoFile">No file selected</label><div class="invalid-feedback"><span><i class="fa fa-exclamation-circle"></i> Please select a video.</span></div><div class="valid-feedback"><span><i class="fa fa-check-circle"></i> Nice Video!</span></div></div></div><div class="form-group"><button class="btn btn-secondary" type="submit" id="submit">Save</button><button class="btn btn-outline-dark remove_lecture" type="button" id="remove"><i class="fa fa-trash" aria-hidden="true"></i> Remove Lecture</button></div></div>');
	// 		lecture++ ;
	// 	}
	// 	else if(lecture >= max_lecture){
	// 		alert('Exceeded 5 lectures!');
	// 	}
	// });
	
	// var add_lecture = $('.add_lecture_button');
	// var lecture_div = $('#lecture-div');
	// $(add_lecture).on('click',function(e){
	// 	e.preventDefault();
	// 	if(lecture < max_lecture){
	
	// 	 lecture++;
	//     }
	//     else if(lecture >= max_lecture){
	//     	alert('Exceeded three lectures!');
	//  	}
	//  });










  

// $(document).ready(function(){
// 	$('#submit').click(function(){
// 		var courseTitle = $('#ccke_mytextarea').val();

// 		if(courseTitle == ""){
// 			$('#show_error').html('**The field must be filled.');
// 			$('#show_error').css('color','red');
// 			return false;
// 		}
// 	});

// });