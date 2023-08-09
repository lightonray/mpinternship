     $(document).ready(function() {
            // Function to animate slide left and fade out
            function slideLeftFadeOut(element) {
              $(element).animate({
                opacity: 0, 
                left: "-100%", 
                }, 'low', 'linear', function() {
                // Animation complete
                $(this).hide();
              });

            }

            function slideRightFadeOut(element) {
                $(element).animate({
                  opacity: 0, 
                  left: "100%", 
                  }, 'low', 'linear', function() {
                  // Animation complete
                  $(this).hide();
                });
                
              }

            function slideInFromLeft(element) {
                $(element).css({ left: "-100%", opacity: 0 }).show();
                $(element).animate({ left: "25%", opacity: 1 }, 1000);
              }

              function slideInFromRight(element) {
                $(element).css({ left: "100%", opacity: 0 }).show();
                $(element).animate({ left: "25%", opacity: 1 }, 1000);
              }


            // Trigger the animation when the "Register" link is clicked
            $("#register-link").click(function(event) {
              event.preventDefault(); // Prevent the default link behavior
              slideLeftFadeOut("#login-form");
              slideInFromLeft("#register-form");
            });

            $("#login-link").click(function(event) {
                event.preventDefault(); // Prevent the default link behavior
                slideRightFadeOut("#register-form");
                slideInFromRight("#login-form");
              });

              $("#register-form form").submit(function(event) {
                event.preventDefault(); // Prevent form submission (for demonstration)
                
                // Simulate successful registration
                // In your actual implementation, you would handle the registration process
                // and show the popup upon successful registration.
                setTimeout(function() { 
                  $("#success-popup").fadeIn();
                }, 1000); // Delay the popup appearance for 1 second
              });
            
              // Close the popup when the "Close" button is clicked
              $("#close-popup").click(function() {
                $("#success-popup").fadeOut();
              });

              




              $(function(){

                //creating a style object for the ripple effect
                function RippleStyle(width, height, posX, posY){
                  this.width = ( width <= height ) ? height : width;
                  this.height = ( width <= height ) ? height : width;
                  this.top = posY - (this.height * 0.5);
                  this.left = posX - (this.width * 0.5);
                }
              
                $('.btn').on('mousedown', function(e){
                  //appending an element with a class name "btn-ripple"
                  var rippleEl = $('<span class="btn-ripple"></span>').appendTo(this);
              
                  //getting the button's offset position
                  var pos = $(this).offset();
              
                  //get the button's width and height
                  var width = $(this).outerWidth();
                  var height = $(this).outerHeight();
              

                  
                  //get the cursor's x and y position within the button
                  var posX = e.pageX - pos.left;
                  var posY = e.pageY - pos.top;
              
                  //adding a css style to the ripple effect
                  var rippleStyle = new RippleStyle(width, height, posX, posY);
                  rippleEl.css(rippleStyle);
                });
              
                //this event listener will be triggered once the ripple animation is done
                $('.btn').on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', '.btn-ripple', function(){
                  $(this).remove();
                });
              });
            });
