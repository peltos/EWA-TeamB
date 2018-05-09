<div class="container signup-controller">

  <script>
    window.onload = function() {
      var $recaptcha = document.querySelector('#g-recaptcha-response');

      if($recaptcha) {
          $recaptcha.setAttribute("required", "required");
      }
    };
  </script>

    <form action="<?php echo URL; ?>signup/adduser" method="POST">
        <h1 class="homepage-title"> Sign Up </h1>
        <div class="signup-box">
            <p><?php echo $_SESSION['message'] ?></p>
            <p>*Required fields!</p>
            <div class="signup-username">
                <span class="user-icon"><i class="fas fa-user"></i></span>
                <input type="text" name="username" value="" placeholder="Username" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Username'" required>
                       <p>*</p>
            </div>
            <div class="signup-email">
                <span class="email-icon"><i class="far fa-envelope"></i></span>
                <input type="text" name="email" value="" placeholder="Email Address" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Email Address'" required/>
                       <p>*</p>
            </div>
            <div class="signup-password">
                <span class="password-icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" value="" placeholder="Password" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Password'" required/>
                       <p>*</p>
            </div>
            <div class="signup-passwordcheck">
                <span class="user-icon"><i class="fas fa-check"></i></span>
                <input type="password" name="passwordcheck" value="" placeholder="Confirm Password"
                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required/>
                       <p>*</p>
            </div>

            <div class="g-recaptcha" data-sitekey="6LcZoVAUAAAAAJMN1MqE_0s89kpMBxtHzE8J_HQi"></div>
            <input class="signup-submit" type="submit" name="adduser" value="submit"/>
        </div>

    </form>

</div>
