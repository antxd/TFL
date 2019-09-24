<script type="text/javascript">
jQuery(document).ready(function($){
	function ajax_resp_actions(action,param,param1){
		switch (action){
			case 'reload':
					location.reload()
				break;
			case 'alert':
					param1.find('.resp').html(param).fadeIn()
					setTimeout(function(){ param1.find('.resp').hide().html(''); }, 4000);
				break;
			default:
				alert('error on action')
		}
	}
	$('.ajax_form').submit(function(){
		var $this = $(this);
		$this.find('.loader').fadeIn()
		$.post(base_url+'ajax',$this.serializeArray(), function(data){
			console.log(data)
			$this.find('.loader').fadeOut()
			ajax_resp_actions(data.action,data.param,$this)
		})
		return false;
	})
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
	$('[data-toggle="popover"]').popover();
	$('.owl-carousel').owlCarousel({
	    loop:false,
	    margin:10,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:3,
	            nav:true
	        },
	        1000:{
	            items:6,
	            nav:true
	        }
	    }
	})
})
</script>
</body>
</html>