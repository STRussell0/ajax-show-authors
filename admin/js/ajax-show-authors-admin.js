jQuery(document).ready( function() {




	jQuery("#savebutton").click( function() {

		admin = false;
		editor = false;
		author = false;
		contributor = false;
		subscriber = false;
		
		if(document.getElementById('administrator').checked) {
			admin = true;
		}
		if(document.getElementById('editor').checked) {
			editor = true;
		}
		if(document.getElementById('author').checked) {
			author = true;
		}
		if(document.getElementById('contributor').checked) {
			contributor = true;
		}
		if(document.getElementById('subscriber').checked) {
			subscriber = true;
		}
		
	   ajaxurl = jQuery(this).attr("admin");
	   console.log(ajaxurl);
	   jQuery.ajax({
		  type : "post",
		  dataType : "json",
		  url : ajaxurl,
		  data : {action: "save_settings",
				  administrator: admin,
				  editor: editor,
				  author: author,
				  contributor: contributor,
				  subscriber: subscriber},
		  success: function() {

			let saved = document.getElementById('saved-setting');
			saved.classList.remove('visibility')
			saved.classList.add('animation')
			saved.classList.add('opacity')

			function saved_setting () {
				saved.classList.add('visibility')
				saved.classList.remove('animation')
			}
			 setTimeout(() => saved_setting(), 2000);
		  }
	})
 
 })

})
