jQuery(document).ready( function() {


	jQuery("#linkbutton").click( function(e) {
	   e.preventDefault();
	   nonce = jQuery(this).attr("data-nonce");
	   ajaxurl = jQuery(this).attr("admin");
	   jQuery.ajax({
		  type : "post",
		  dataType : "json",
		  url : ajaxurl,
		  data : {action: "show_authors", nonce: nonce},
		  success: function(response) {
			 const list = document.getElementById('list')
			 console.log('Hello');

			 for (const key in response) {
				const item = document.createElement('li')
				item.innerText = response[key]
			   list.appendChild(item)
			 }
			 jQuery('#linkbutton').hide();
		  }
 
	})
 
 })

})
