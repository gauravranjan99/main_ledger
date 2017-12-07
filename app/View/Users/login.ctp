<!-- <script>
angular.module('components').factory('Authenticate',function($http, appConfig, $window) {

	var Authenticate = {};

	Authenticate.login = function (user) {
		$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
		delete $http.defaults.headers.common['AuthToken'];
		$http({
			method: 'POST',
			url: appConfig.apiUrl + '/user/login',
			data: $.param(user),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.success(function (data, status, headers, config) {
			$http.defaults.headers.common['AuthToken'] = data.data.token;
			$window.sessionStorage.token = data.data.token;

			// Just for testing, issue a request with the API token we just got
			$http({
				method: 'GET',
				url: appConfig.apiUrl + '/user/token_test',
				useXDomain:true,
				headers: {'AuthToken': data.data.token}
			})
			.success(function (data, status, headers, config) {
				console.log(data);
			})
			.error(function (data, status, headers, config) {
				console.log('ERROR');
			});
		})
		.error(function (data, status, headers, config) {
			// Erase the token if the user fails to log in
			delete $window.sessionStorage.token;
		});
	};

	return Authenticate;
});

</script> -->


<div class="logo">
  <?php //echo $this->Html->image('satkar-logo.jpg',array('height'=>'70px','width'=>'70px'),array('escape'=>false)); ?>

</div>
  <div class="content">
<?php echo $this->Session->flash();?>
<!-- BEGIN LOGIN FORM -->
<?php echo $this->Form->create('User',array('novalidate','url'=> array('controller' => 'Users', 'action' => 'login'),'method'=>'POST')); ?>
<!-- <form class="login-form" action="index.html" method="post"> -->
    <div class="form-title">
        <span class="form-title">Welcome.</span>
        <span class="form-subtitle">Please login.</span>
    </div>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter any username and password. </span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
          <?php echo $this->Form->input("User.username",array('placeholder'=>'Enter Username','autocomplete'=>'off','required'=>'required','class'=>'form-control form-control-solid placeholder-no-fix','label'=>false));?>
        <!-- <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> -->
       </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <?php echo $this->Form->input("User.password",array('placeholder'=>'Password','autocomplete'=>'off','class'=>'form-control form-control-solid placeholder-no-fix','required'=>'required','label'=>false));?>
        <!-- <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> -->
       </div>
    <div class="form-actions">
      <?php echo $this->Form->submit('Login',array("class"=>"btn red btn-block uppercase"));?>
        <!-- <button type="submit" class="btn red btn-block uppercase">Login</button> -->
    </div>
    <?php echo $this->Form->end();?>
<!-- </form> -->
<!-- END LOGIN FORM -->
</div>
