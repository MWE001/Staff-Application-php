<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="blueIce-layout-cell blueIce-content"><div class="blueIce-block clearfix">
<div class="blueIce-blockheader">
<h3 class="t">Staff Application</h3>
</div>
<div class="blueIce-blockcontent"><p>
Thank you for your interest in a staff position at <?php echo SITE_NAME; ?>. Please complete the following form and fill out all fields. Our Human Resources department will get back to you within 48 hours with a responce.
<hr />
</p>
<p>
<form method="post" action="<?php echo url('/application'); ?>">

  <table width="100%" border="0"class="blueIce_table">
    <tr>
      <td><strong>Name: *</strong></td>
      <td>
		<?php
		if(Auth::LoggedIn())
		{
			echo Auth::$userinfo->firstname .' '.Auth::$userinfo->lastname;
			echo '<input type="hidden" name="name" 
					value="'.Auth::$userinfo->firstname 
							.' '.Auth::$userinfo->lastname.'" />';
		}
		else
		{
		?>
		<?php
		}
		?>
      </td>
    </tr>
    <tr>
		<td width="1%" nowrap><strong>Pilot ID: *</strong></td>
		<td>
		<?php
		if(Auth::LoggedIn())
		{
			echo Auth::$userinfo->pilotid;
			echo '<input type="hidden" name="pilotid" 
					value="'.Auth::$userinfo->pilotid.'" />';
		}
		else
		{
		?>
		<?php
		}
		?>
		</td>
	</tr>
	<!-- Do Not remove this hidden input -->
	<tr>
		<td><input id="subject" type="text" name="subject" size="25" value="<?php echo $_POST['subject'];?>" style="display: none;" />&nbsp;</td>
	</tr>
	<!-- End Hidden Input -->
	<tr>
		<td><strong>Position: *</strong></td>
	<td>
		<select name="positions" style="width: 340px;">
  		<option value="Chief Operations Officer">Chief Operations Officer</option>
 		<option value="Human Resources">Human Resources</option>
  		<option value="Flight Dispatcher">Scheduling Manager</option>
		<option value="Events Manager">Events Manager</option>
		<option value="Fleet manager">Fleet manager</option>
		<option value="Marketing Director">Marketing Director</option>
		<option value="Focus City manager">Focus City Manager</option>
  		<option value="ATC">Air Traffic Controller</option>
		</select></td>
	</tr>

	<tr>
		<td width="40%"><strong>Tell Us About Your Previous VA Experience: *</strong></td>
		<td><textarea name="message1" cols='45' rows='5'><?php echo $_POST['message'];?></textarea></td>
	
	</tr>
    <tr>
      <td><strong>Why Should We Choose You For This Position?: *</strong></td>
      <td>
		<textarea name="message2" cols='45' rows='5'><?php echo $_POST['message'];?></textarea>
      </td>
    </tr>
    <tr>
      <td><strong>Do You Have Any Real World Experiance?: (Optional)</strong></td>
      <td>
		<textarea name="message3" cols='45' rows='5'><?php echo $_POST['message'];?></textarea>
      </td>
    </tr>
    
    <tr>
		<td width="1%" nowrap><strong>Captcha</strong></td>
		<td>
		<?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
        <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>
        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
        </script>
		</td>
	</tr>
	
    <tr>
		<td>
			<input type="hidden" name="loggedin" value="<?php echo (Auth::LoggedIn())?'true':'false'?>" />
		</td>
		<td>
          <input type="submit" name="submit" value='Send Message'>
		</td>
    </tr>
  </table>
</form>