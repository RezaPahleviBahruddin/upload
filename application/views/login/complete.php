<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <?php require_once VINC.'header.php';?>  

</head>
<body class="hold-transition register-page">
<div class="register-box">

  <div class="register-box-body">
    <p class="login-box-msg">Fill your password to finish sign up process</p>

    <?php echo form_open('login/complete/token/'.$token, array('class' => 'bs-example')) ?>
	  <div style="display:none">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      </div>      
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password') ?>
      </div>
      <div class="form-group has-feedback">
        <input name="passconf" type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?php echo form_error('passconf') ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close() ?>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<?php require_once VINC.'footer.php'; ?>
</script>
</body>
</html>