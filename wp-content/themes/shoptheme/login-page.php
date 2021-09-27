<?php 
     /**
      * Template Name: Custom Login page
      */

     global $user_ID;
     global $wpdb;

     if(!$user_ID){

          if($_POST){
               $username = $wpdb->prepare($_POST['username']);
               $password = $wpdb->prepare($_POST['password']);

               $login_array = array();
               $login_array['user_login'] = $username;
               $login_array['user_password']= $password;

               $verify_user =  wp_signon($login_array, true);
               if(!is_wp_error($verify_user)){

                    echo "<script>window.location = '" .site_url()."'</script>";
               }
               else{
                    echo "<p>Invalid</p>";
               }
          }else{
               get_header();
               ?>
               <form action="" method="POST">
                    <p>
                         <label for="username">UserName</label>
                         <input type="text" id="username" name="username" placeholder="Enter Username">
                    </p>
                    <p>
                         <label for="username">Password</label>
                         <input type="password" id="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                         <button type="submit" name="btn_submit">Login</button>
                    </p>
               </form>
     
               <?php 
               get_footer();
          }
       
     }else{

     }
?>

