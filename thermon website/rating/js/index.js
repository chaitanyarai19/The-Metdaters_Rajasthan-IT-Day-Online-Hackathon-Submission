var $star_rating = $('.star-rating .fa');
var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
$("#srr_rating").click(function() {
	var $star_rating = $('.star-rating .fa');
	var rating = parseInt($star_rating.siblings('input.rating-value').val());
	var remk= $('#remark').val();
	var email= $('#email').val();
	var name= $('#name').val();
	var demo_id= $('#demo_id').val();
	if(rating>0 && name!=""){
            $.ajax({
			url: "save_rating.php",
			type: "GET",
			data: {
			    rate: rating,
				remark:remk,
				email: email,
				name: name,
				demo_id:demo_id
				
			},
			success : function(data){
				swal({
				  title: "Thank You!",
				  text: "Rating submitted successfully!",
				  icon: "success",
				});
				//location.reload();	
			}
			});
	}
	else{
		alert('Name field manadatory !');
	}
            
});
$(".selected").click(function() {
	    var selected = $(this).hasClass("highlight");
		$(".selected").removeClass("highlight");
		if(!selected){
		   $(this).addClass("highlight");
		}
	
});