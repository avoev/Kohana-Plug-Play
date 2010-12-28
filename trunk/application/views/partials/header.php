<?php

    echo html::anchor('welcome', 'Kohana Plug&Play');

    if(Request::instance()->controller !== 'login')
    {
      if(Auth::instance()->logged_in()!= 0){
          #redirect to the user account
          echo html::anchor('login/signout', '<span class="login">Logout</span>');
      }
      else
      {
          echo html::anchor('login', '<span class="login">Login</span>');
      }
    }
    else
    {
        echo html::anchor('#', 'Hint', array('class' => 'login'));
    }

?>
