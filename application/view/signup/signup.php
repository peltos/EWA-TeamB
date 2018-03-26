<div class="container signup-controller">

    <h2 class="homepage-title"> Sign up  </h2>
    <form action="<?php echo URL; ?>signup/adduser" method="POST">
        <div class="signup-username">
            <input type="text" name="username" value="" placeholder="Username" required/>
        </div>
        <div class="signup-email">
            <input type="text" name="email" value="" placeholder="Email" required/>
        </div>
        <div class="signup-password">
            <input type="text" name="password" value="" placeholder="Password" required/>
        </div>
        <div class="signup-passwordcheck">
            <input type="text" name="passwordcheck" value="" placeholder="Password Check" required/>
        </div>
        <input class="signup-submit" type="submit" name="adduser" value="Submit"/>
    </form>

</div>
