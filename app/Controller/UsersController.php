<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::import('Vendor', 'JWT', array('file' => 'vendor/autoload.php'));
use \Firebase\JWT\JWT;
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */


class UsersController extends AppController {
    public $uses = array('User');
    public $components = array(
      'Auth' => array(
          'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
          'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
      )
  );

    public function beforeFilter() {
    parent::beforeFilter();
        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'
                ),
                'userModel' => 'User',
                'scope' => array(
                    'User.active' => 1,
                )
            ),
            'BzUtils.JwtToken' => array(
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password',
                ),
                'header' => 'AuthToken',
                'userModel' => 'User',
                'scope' => array(
                    'User.active' => 1
                )
            )
        );

    $this->Auth->allow( 'login');
    $this->Auth->deny('view');
}



public function login_123() {
  	$this->layout = 'new-layout';
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
            //$this->Session->setFlash(__('success login in.'), 'success');
        } else {
            //$this->Session->setFlash(__('Invalid username or password, try again'));
            $this->Session->setFlash(__('Invalid username or password, try again'),'error');
            $this->request->data = array();
        }
    }
}

    public function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function is_valid($token) {
        $is_valid = false;
        $token_parts = explode('.', $token);
        $header_and_payload_combined = $token_parts[0] . '.' . $token_parts[1];
        $recieved_signature = $token_parts[2];
        $new_signature = base64_encode($this->create_signature($header_and_payload_combined));
        if($new_signature == $recieved_signature) {
            $is_valid = true;
        }
        return $is_valid;
    }
	
	 private function create_signature($message) {
        $hash = hash_hmac('sha256', $message, $this->shared_secret);
        $hash = strtoupper($hash);
        return $hash;
    }
	
	
	


public function login() {
        
	$secret_key = "-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA8bh/uHV/terH3op3U+Hn
g5U2UUniohJWB4HHh0KpHbp693jdlWA9H2KUwkEWux0QsmNzEt4wJy8l15rDSz98
b4ZlDOaB8IIoUTV7Cw9zlcGSFPQPztxwF/07CQghVh2ajYUqeKI6AoSXT9v0cpDx
AosIjvLqZ0BAC+McG8+Q1xVTpJuCHywEGxe2vFS1InbqxPLs9mxCUHkNb+dSjrUI
ovY7y0gZuL2O0FURBxMJXvgrh9SUZOKc3p36d/ujX76sGWIM5ez7oxWGnmiI53+2
VEfzjkj8gRs2Z00kmfjPvqx+WSSx3scKMc9yoJiMZN5IhWQ/3KcrF4IBvflGycMK
ynhBPTrp3t6wyS4yVZrHXQPoXyfiVOhOGb2XNkh5/7uDz1XcXLLfwJ1A/mzP8cYB
I7t91aKoUv7jliT7013gtqxUDu0z8NtwWGZnDI+4aTKYdLTPROu+CXp/yxptJms+
yL/LLqjx9qnsUvu/0LxNetPvF7KHAAGmAPrJ5GWBS8GppCxwtVJEv+CizN0kaCyn
aZ9+wLnNlZf0dtvcreyxIzfVfDQVQ0fCyMC2eZq3MuSuzleWqnlp2n+rbSy1l2iq
mHWdGX41L8hzp6QAfoC8tVy53SLUyP5cINFLxRbEbCEEc1ZXrKdB3Iyz2waV3KPc
u3spJd5ybAJNSaccmmeZl1MCAwEAAQ==
-----END PUBLIC KEY-----";

	$recievedJwt = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXlsb2FkIjoiIHRlc3QgcGF5bG9hZCIsImlhdCI6MTUwNTcyNTY5OSwiZXhwIjozMDE0MDQzMzk4LCJhdWQiOiJ2aXNjZW5hcmlvIiwiaXNzIjoiY29kZTExIiwic3ViIjoiemFja2NhcnBlbnRlckBibG9ja3dhdG5lLmNvbSJ9.t-e6nIzE83W_HMV0lff9RTZ96LELJqf-pdWDMlA5Ji4xWAlMrO9M0IwgaeSrZRzpE8r2KlEt-SovLHd4v5NiFEHjM3uNwkmkIF0NI5kGI6EKDh1bPSFkek6MRZxQYnTbgq9eKSompSk32Q3zTEkyLn19-x0p0xAT_YTZV_g6hWPvYkJp7D11zFIX2EG_9RkFYtaZ4lYviM5YzguH98e3z3sglIV-2vJyO3DPd9iha-sLmq_6dk60bSHwaKerBekB3C__TLNrzUeK_GLjxGbDawtiBLllrFdrYGhqBtgrGE8xqY8JZoNlqbWY35r8x2xR4VTL2IF46-ToiktVtCUmVr0E0GaAEj1YHEtulIOGWC5zM_warOr8du0MR8MtBWpJYXP0yvsJX5E8nmsRYFMLCTl-UTG4Lt7QdXzZwXUcqyQUEbMWTcH7D092jVGt9fxSW2I7Ao61ZpXYZGiLs-_TRBVFugDL4mr06kmEfGOp3I9fPsoVT2ixjhVl-A_-p7wPMKmEk0KH3dWZqqI9PU4PYNiI1lMCC0K3dMadaDMBr3gsA-Cu3HK7TBbLhmopUnOqEnIclUHv0yrObQk_IwtA94qc3uQhAisdRbH3M9r1VvsxShcOnSvmTyGl0iSoFowxDPSYWrqP-_AOMFszri1efZIjoLY1Qe_zxvg-RPUBYVY";
		
		$decoded = JWT::decode($recievedJwt, $secret_key, array('RS256'));
		pr($decoded);die;
         //$recievedJwt = 'eyJhbGciOiAiSFMyNTYiLCJ0eXAiOiAiSldUIn0=.eyJjb3VudHJ5IjogIlJvbWFuaWEiLCJuYW1lIjogIk9jdGF2aWEgQW5naGVsIiwiZW1haWwiOiAib2N0YXZpYWFuZ2hlbEBnbWFpbC5jb20ifQ==.gbB+B063g+kwsoc4L3B1Bu2wM+VEBElwPiLOb0fj2SE=';
		 
         //$secret_key = 'Octaviasecretkey';
         $jwt_values = explode('.', $recievedJwt);
         $recieved_signature = $jwt_values[2];
         $recievedHeaderAndPayload = $jwt_values[0] . '.' . $jwt_values[1];
         $resultedsignature = base64_encode(hash_hmac('sha256', $recievedHeaderAndPayload, $secret_key, true));
         pr($jwt_values);
         pr($recieved_signature);
         pr($recievedHeaderAndPayload);
         pr($resultedsignature);
         if($resultedsignature == $recieved_signature) {
      	 echo "Success";
           } else {
             echo "not success";
         }
		 
		 die;
          

      $key = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA8bh/uHV/terH3op3U+Hn
      g5U2UUniohJWB4HHh0KpHbp693jdlWA9H2KUwkEWux0QsmNzEt4wJy8l15rDSz98
      b4ZlDOaB8IIoUTV7Cw9zlcGSFPQPztxwF/07CQghVh2ajYUqeKI6AoSXT9v0cpDx
      AosIjvLqZ0BAC+McG8+Q1xVTpJuCHywEGxe2vFS1InbqxPLs9mxCUHkNb+dSjrUI
      ovY7y0gZuL2O0FURBxMJXvgrh9SUZOKc3p36d/ujX76sGWIM5ez7oxWGnmiI53+2
      VEfzjkj8gRs2Z00kmfjPvqx+WSSx3scKMc9yoJiMZN5IhWQ/3KcrF4IBvflGycMK
      ynhBPTrp3t6wyS4yVZrHXQPoXyfiVOhOGb2XNkh5/7uDz1XcXLLfwJ1A/mzP8cYB
      I7t91aKoUv7jliT7013gtqxUDu0z8NtwWGZnDI+4aTKYdLTPROu+CXp/yxptJms+
      yL/LLqjx9qnsUvu/0LxNetPvF7KHAAGmAPrJ5GWBS8GppCxwtVJEv+CizN0kaCyn
      aZ9+wLnNlZf0dtvcreyxIzfVfDQVQ0fCyMC2eZq3MuSuzleWqnlp2n+rbSy1l2iq
      mHWdGX41L8hzp6QAfoC8tVy53SLUyP5cINFLxRbEbCEEc1ZXrKdB3Iyz2waV3KPc
      u3spJd5ybAJNSaccmmeZl1MCAwEAAQ==";
      $token = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXlsb2FkIjoiIHRlc3QgcGF5bG9hZCIsImlhdCI6MTUwNTcyNTY5OSwiZXhwIjozMDE0MDQzMzk4LCJhdWQiOiJ2aXNjZW5hcmlvIiwiaXNzIjoiY29kZTExIiwic3ViIjoiemFja2NhcnBlbnRlckBibG9ja3dhdG5lLmNvbSJ9.t-e6nIzE83W_HMV0lff9RTZ96LELJqf-pdWDMlA5Ji4xWAlMrO9M0IwgaeSrZRzpE8r2KlEt-SovLHd4v5NiFEHjM3uNwkmkIF0NI5kGI6EKDh1bPSFkek6MRZxQYnTbgq9eKSompSk32Q3zTEkyLn19-x0p0xAT_YTZV_g6hWPvYkJp7D11zFIX2EG_9RkFYtaZ4lYviM5YzguH98e3z3sglIV-2vJyO3DPd9iha-sLmq_6dk60bSHwaKerBekB3C__TLNrzUeK_GLjxGbDawtiBLllrFdrYGhqBtgrGE8xqY8JZoNlqbWY35r8x2xR4VTL2IF46-ToiktVtCUmVr0E0GaAEj1YHEtulIOGWC5zM_warOr8du0MR8MtBWpJYXP0yvsJX5E8nmsRYFMLCTl-UTG4Lt7QdXzZwXUcqyQUEbMWTcH7D092jVGt9fxSW2I7Ao61ZpXYZGiLs-_TRBVFugDL4mr06kmEfGOp3I9fPsoVT2ixjhVl-A_-p7wPMKmEk0KH3dWZqqI9PU4PYNiI1lMCC0K3dMadaDMBr3gsA-Cu3HK7TBbLhmopUnOqEnIclUHv0yrObQk_IwtA94qc3uQhAisdRbH3M9r1VvsxShcOnSvmTyGl0iSoFowxDPSYWrqP-_AOMFszri1efZIjoLY1Qe_zxvg-RPUBYVY";

      $jwt_values = explode('.', $token);
      $test = base64_decode($jwt_values[1]);
      pr($test);die;
      
      $jwt = JWT::encode($token, $key);
      //$decoded = JWT::decode($jwt, $key, array('HS256'));
      $decoded = JWT::decode($jwt, $key, array('RS256'));

      die;

  if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            $user = $this->Auth->user();
            //pr($user);

            //pr($json_decoded);die;
            $decoded_array = (array) $decoded;
        } else {
          $this->Session->setFlash(__('Invalid username or password, try again'));
        }
      }
    }



    public function logout() {
      //  $this->Session->setFlash("You've been logged out",'/Notifications/success');
        $this->redirect($this->Auth->logout());
    }




    public function register(){
        //$this->layout = 'log';
	       if(!empty($this->request->data)) {
	    $this->request->data['User']['active'] = 1;
	    //pr($this->request->data);die;
            $username = $this->data['User']['username'];
	    $password = $this->data['User']['password'];
	    $rePassword = $this->data['User']['re-password'];
	    $isUserExist = $this->User->find('first',array('conditions'=>array('User.username'=>$username),'contain'=>false));
	    if(!empty($isUserExist)){
                $this->Session->setFlash('User already registered','/Notifications/error');
		$this->redirect(array('controller'=>'users','action'=>'login'));
	    }
	    if(!empty($password)) {
		if($password != $rePassword){
		    $this->Session->setFlash('Password does not match','/Notifications/error');
                    $this->redirect(array('controller'=>'users','action'=>'login'));
		}
	    }else{
                $this->Session->setFlash('Please enter password','/Notifications/error');
		$this->redirect(array('controller'=>'users','action'=>'login'));
	    }
            unset($this->request->data['User']['re-password']);

                //$token = Security::hash($this->request->data['User']['username'], 'md5', true).time().rand();
	    //$this->request->data['User']['registration_token'] = $token;

	    //pr($this->request->data);die;

	    if($this->User->save($this->request->data)) {
                $this->Session->setFlash('You have been registered','/Notifications/success');
                $this->redirect(array('controller'=>'users','action'=>'login'));

	    }
	}
    }






    public function index() {

    }


}
