<div class="container profile-controller">

    <form action="<?php echo URL; ?>profile/ChangeUserName" method="POST">
        <h1 class="homepage-title"> My Profile </h1>
        <div class="profile-box">
            <p><?php echo $_SESSION['message'] ?></p>
            <div class="profile-email" title="Email">
                <span class="email-icon"><i class="far fa-envelope"></i></span>
                <input type="text" name="email" value="" placeholder="<?php echo $_SESSION['email'] ?>" disabled/>
            </div>

            <div class="profile-username" title="Username">
                <span class="user-icon"><i class="fas fa-user"></i></span>

                <input type="text" name="username2" value="" placeholder="<?php echo $_SESSION['username'] ?>"/>

            </div>
            <div class="profile-username">
                <span class="user-icon"><i class="fas fa-user"></i></span>
                <input type="text" name="username" value="" placeholder="New username" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'New username'" required>
            </div>

            <div class="profile-lastlogin" title="Last Login">
                <span class="history-icon"><i class="fa fa-history"></i></span>
                <input type="text" name="username3" value="" placeholder="<?php echo $_SESSION['username'] ?>" disabled/>
            </div>
            <input class="profile-submit" type="submit" name="ChangeUserName" value="Change username click here"/>

        </div>

    </form>

</div>
