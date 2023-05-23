
<center> <b id="login-name">Login Siswa</b> </center>
	<br>
	<div class="row">
		
<div class="col-md-6 col-md-offset-1" id="login">  

<form method="post" action="<?php echo base_url('Loginsiswa/login_action') ?>">
	
<div class="form-group">
<label class="user"> NIS  </label>
<div class="input-group">
	<span class="input-group-addon" id="iconn"> <i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="nis" name="nis" placeholder="username">
</div>
	
</div>

<div class="form-group">
<label class="user"> Password </label>
<div class="input-group">
	<span class="input-group-addon" id="iconn1"> <i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" id="password" name="password" placeholder=" Enter Password">
</div>
</div>

<div class="form-group">

<input type="submit" class="btn btn-success" value="login" style="border-radius:0px;">

    </div>
</form>
	  </div>
	</div>
