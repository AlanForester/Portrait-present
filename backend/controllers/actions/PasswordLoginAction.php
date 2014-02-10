<?php

/**
 * Controller action for logging users in using the login form containing username and password.
 *
 * It is statically dependent on the LoginForm model representing the authentication form.
 *
 * @package YiiBoilerplate\Backend
 */
class PasswordLoginAction extends CAction {

    /**
     * If there were no login attempt or it failed render login form page
     * otherwise redirect him to wherever he should return to.
     *
     * Also, this endpoint serves as the AJAX endpoint for client-side validation of login info.
     */
    public function run() {
        
        $username = yii::app()->request->getPost('email');
        $password = '';
        //echo md5($password).'ggg';
        $identity = new UserIdentity($username, $password);
        if ($identity->authenticate()) {
            Yii::app()->user->login($identity);
            $this->controller->layout = "//layouts/admin";
            Yii::app()->request->redirect("/site/cards");
        } else {
            echo $identity->errorCode;
            /*
              $email=yii::app()->request->getPost('email');
              $this->render('index', array('user'=>$email), false, true); */
            $this->controller->render('index');
        }
        // die();
        // $user = Yii::app()->user;
        // $this->redirectAwayAlreadyAuthenticatedUsers($user);
        // $this->controller->render('login', compact('model'));
    }

    /**
     * @param CHttpRequest $request
     * @param User $model
     */
    /* private function respondIfAjaxRequest($request, $model)
      {
      $ajaxRequest = $request->getPost('ajax', false);
      if (!$ajaxRequest or $ajaxRequest !== 'login-form')
      return;

      echo CActiveForm::validate(
      $model,
      array('username', 'password', 'verifyCode')
      );
      Yii::app()->end();
      } */
}

