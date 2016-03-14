/**
 * this function handles the dragging and dropping of the items in the availablelineup list and the setlineup lists
 */
$(function(){
	$("#sortable1").sortable({
	helper:"clone",
    connectWith: "#sortable2",
    start:function(event,ui)
    {
      saveMe = $(ui.item).clone();
      startingList = $(ui.item).parent();
      $(ui.item).show();
      saveMe.insertAfter($(ui.item) ).hide();
    },
    stop: function(event, ui){
        if(startingList.attr("id") == $(ui.item).parent().attr("id")) 
        {
            saveMe.remove();
        }
        else 
        {
            saveMe.remove();
        }
    }
  }).disableSelection();
  $("#sortable2").sortable({
        helper:"clone",
        connectWith: "#sortable1",
        start:function(event,ui)
        {
          saveMe = $(ui.item).clone();
          startingList = $(ui.item).parent();
          $(ui.item).show();
          saveMe.insertAfter($(ui.item) ).hide();
        },
        stop: function(event, ui)
        {
            if(startingList.attr("id") == $(ui.item).parent().attr("id") ) 
            {
                saveMe.remove();
            }
            else
            {
                saveMe.remove();
            }
        }
     }).disableSelection();
  
  /**
   * function that captures the double click event for the available list and the setlineup list.
   * the function moves the item to the other list.
   */
  $('.ui-sortable-handle').dblclick(function(event)
  {
	  if ($(event.target).parent('#sortable2').size() > 0)
		$('#sortable1').append(this);
	  else
		$('#sortable2').append(this);  
		  
  });
      
  /**
   *  the reset lineup button 
   *  this funtion moves all the list items from the setlineup list to the available lineup list.
   */
  function moveAllItems(event) 
  {
	  event.data.src.children().fadeOut("fast", function() {
  			$(this).appendTo(event.data.dest).fadeIn("fast");
	  });
  }

  
  /**
   *  this is the "click" event handler for the reset lineup button
   */
  $('#moveAllItems').on('click', { src: $('#sortable2'), dest: $('#sortable1') }, moveAllItems);


  
  
  /**
   *  function that change the load button text to loading... when loading nfl player data
   */
  $('#LoadingButton').on('click', function (){
	var $btn = $(this);
	$btn.button("loading");
	setTimeout(function () {
	    $btn.button('reset');
	}, 10000);

  });
 
  
  /**
   *  function that gets the contents of the setlineup list and puts the values in a hidden input field
   */
  $('#submitLineUp').on('click', function() {
	  var values = $('#sortable2').text();
	  $('input[name=result]').val(values);
  });
  
  /**
   * function that uses an ajax post request to send an email message that resets the usernames password
   */
  $('#sendemail').on('click', function() {
	  var val = $('#username').val();
	  if (val === ''){
		  showAndDismissAlert('danger', "Please provide the accounts User Name to be reset.", 5000);
		  return false;
	  }
	  
	  var base_url = $('#base_url').val();  // getting the value that was set in a hidden field
	  var userdata = "username="+ val;
	  console.log(userdata);
	  $.ajax({
		  type: "POST",
		  url: base_url+"LoginController/send_password",
		  data: userdata,
		  cache: false, 
		  success : showAndDismissAlert('success', 'Your email message has been sent successfully.', 3000)
	  });
	  
  });
 
  
  $('input').keyup(function() {
	    filter(this);
	});

	function filter(element) {
	    var value = $(element).val();
	    var $li = $("#sortable1 > li.ui-sortable-handle");

    	$li.hide();
    	$li.filter(function() {
        	return $(this).text().toLowerCase().indexOf(value) > -1;
    	}).show();
	}

  
  /**
   * function to display a message that fades out after the timeout has been reached.
   */
  function showAndDismissAlert(type, message, timeout) {
	    var htmlAlert = '<div class="alert alert-' + type + '">' + message + '</div>';

	    // append the alert.
	    $(".alert-messages").prepend(htmlAlert);
	    
	    //use the last to get the appended information.
	    $(".alert-messages .alert").first().fadeOut(timeout,"swing" ,setTimeout(function () { $(this).remove(); }));
	    return true;
	}
    
  });