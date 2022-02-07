jQuery(document).ready( function() {

    jQuery("#linkbutton").click( function(e) {
       e.preventDefault();
       nonce = jQuery(this).attr("data-nonce");

       jQuery.ajax({
          type : "post",
          dataType : "json",
          url : myAjax.ajaxurl,
          data : {action: "show_authors", nonce: nonce},
          success: function(response) {
             const list = document.getElementById('list')

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