<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller {

	public function indexAction() {

	}

	public function registerAction() {
		$user = new Users();
		$success = $user->save(
			$this->request->getPost(),
			[
				'name',
				'email',
			]
		);
		if( $success ) {
			echo 'Thank You';
		}else {
			echo 'Sorry, Failed!';
			foreach ( $user->getMessages() as $message ) {
				echo $message->getMessage(),'<br>';
			}
		}
		$this->view->disable();
	}

}