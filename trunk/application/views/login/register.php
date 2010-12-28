<?php
    if(isset($errors))
    {
      print_r( $errors);
    }
?>
<div class="articles_wrapper">
  <?php
      print form::open('login/register', array('id'=>'signup_form'));
      print '<div class="articles round gradient">'.form::input('username', 'User' ,array('id' => 'username', 'class' => 'form_input_field')).'</div>';
      print '<div class="articles round gradient">'.form::input('email', 'Email' ,array('id' => 'email', 'class' => 'form_input_field')).'</div>';
      print '<div class="articles round gradient">'.form::password('password', '',array('id' => 'password', 'class' => 'form_input_field')).'</div>';
      print '<div class="articles round gradient">'.form::password('password_confirm', '',array('id' => 'password_confirm', 'class' => 'form_input_field')).'</div>';
      print '<div class="articles round gradient">'.form::submit('submit', 'Register',array('id' => 'submit', 'class' => '')).'</div>';
      print form::close();
  ?>
</div>