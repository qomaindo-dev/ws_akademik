  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?php echo base_url('assets/login/images/tutwuri.png');?>" alt="IMG">
        </div>

        <form class="login100-form validate-form" action="<?php echo base_url('Loginsiswa/login_action') ?>" method="post">
          <span class="login100-form-title">
            Login Siswa
          </span>
          
          <!-- Untuk validasi Emailnya, kalau mau dipaka diaktifkan dulu -->
          <!-- <div class="wrap-input100 validate-input" data-validate = "Valid username is required: contoh@email.com"> -->
          <!-- validasi end -->

            <div class="wrap-input100 validate-input">
            <input class="input100" type="text" id="nis" name="nis" placeholder="NIS">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password"  id="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  
