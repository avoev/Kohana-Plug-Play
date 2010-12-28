<div id="message_bar"></div>
<?php
    if(isset($errors))
    {
      print_r( $errors);
    }
?>
<div class="articles_wrapper">
  <?php
      print form::open('login/signin', array('id'=>'login_form'));
      print '<div class="articles round gradient">'.form::input('username', 'username' ,array('id' => 'username', 'class' => 'form_input_field')).'</div>';
      print '<div class="articles round gradient">'.form::password('password', 'password',array('id' => 'password', 'class' => 'form_input_field')).'</div>';
      print '<div class="articles round gradient">'.form::submit('submit', 'Sign In',array('id' => 'submit', 'class' => '')).'</div>';
      print form::close();
  ?>
</div>
<script>
  $(document).ready(function() {
     $('.login').click(function(event){
        event.preventDefault()
        $('#message_bar').displayMessage({
          color : 'green'
        });
     })
   });
</script>

<div id="messsage_bar" style="height:40px; background: #363636; border-bottom: 1px solid #1c5620;  line-height: 40px; font:bold 16px/40px Tahoma,Arial,Helvetica,sans-serif; padding:0 20px; display:none;"><span></span><a href="#" id="close" style="color: red; position: relative; float: right; text-decoration: none;">X</a></div>
