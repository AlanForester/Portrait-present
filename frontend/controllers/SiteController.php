<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends FrontendController
{
         public $layout = "//layouts/main";
    
	public function actionIndex()
	{
		$this->render('index');
                
	}
        public function actionMain()
	{
            $this->layout = "//layouts/main000";
		$this->render('main123');
                
	}
        
        public function actionCardform()
        {
            $ans = null;
            if ((yii::app()->request->isAjaxRequest)&&(yii::app()->request->isPostRequest)) {
                $email=yii::app()->request->getPost('email');
                $ncard=yii::app()->request->getPost('ncard');
                if ($email&&$ncard){
                    if (!$cards=Cards::model()->findByAttributes(array('n_card' => $ncard))) {
                    $ans = 0;
                    }
                    else {
                        if ($cardactive =  Activecard::model()->findByAttributes(array('card_id'=>$cards->id))) 
                                $ans=0;
                        else {
                            $user = Users::model()->findByAttributes(array('email' => $email));
                            if(!$user) {
                                $user = new Users;
                                $user->email = $email;
                                $user->save();
                                //$ans='Новый пользователь добавлен';
                                }
                           // else $ans='Пользователь найден';
                            
                        }
                        
                    }
                   if($ans === 0) {
                       echo $ans;
                   } else {
                       $this->renderPartial('_step1', array('user'=>$user->id, 'card_id' => $cards->id), false, true);
                   }
                   
                   
                }
               
            }
            
        


            yii::app()->end();
             
        }
        
        public function actionImages() 
        {
            $card_id=yii::app()->request->getQuery('card_id');
            $source = $_FILES['fineuploadtest']['tmp_name'];
            move_uploaded_file($source, __DIR__."/../../media/images/".$card_id);
            $image = Yii::app()->image->load(__DIR__."/../../media/images/".$card_id);
            $image->save(); 
            $image->resize(400, 300);
            $image->save(__DIR__."/../../media/images/".$card_id.".jpg");
            
            $name=$_FILES['fineuploadtest']['name'];
            $image = file_get_contents( __DIR__."/../../media/images/".$card_id );
            
            $img = Images::model()->findByAttributes(array('activ_id' => $card_id));
            if(!$img) $img = new Images;
            $img->name = $name;
            $img->activ_id = $card_id;
            $img->img = $image;
            $img->save();
            if(file_exists(__DIR__."/../../media/images/".$card_id)) unlink(__DIR__."/../../media/images/".$card_id);
            echo json_encode(array('success' => 'true'));
            yii::app()->end();
        }
        
        
        public function actionZakaz() {
             $user=yii::app()->request->getPost('user');
             $card_id=yii::app()->request->getPost('card_id');
             $user = Users::model()->findByAttributes(array('id' => $user));
             $punkts =  Punkts::model()->findAll();
             $plist='';
             foreach($punkts as $punkt) {
                 $plist=$plist.'<p><input type="radio" name="flatsv" value="'.$punkt['id'].'"> '.$punkt['punkt'].'</p>';
                }
             $countries = Countries::model()->findAll();
             $clist='';
             foreach($countries as $countrie) {
                 if ($countrie['country_id']=='3159') $countrie['country_id']=$countrie['country_id'].'" selected="';
                 $clist=$clist.'<option value="'.$countrie['country_id'].'">'.$countrie['name'].'</option>';
                }
             $regions = Regions::model()->findAllByAttributes(array('country_id' => '3159'));
             $rlist='<select name="state" id="state">';
             foreach($regions as $region) {
                 $rlist=$rlist.'<option value="'.$region['region_id'].'">'.$region['name'].'</option>';
                }
              $rlist=$rlist.'</select>';
            // echo var_dump($_POST); 
            $this->renderPartial('_step2', array('card_id'=>$card_id, 'rlist'=>$rlist, 'clist'=>$clist, 'plist'=>$plist, 'name'=>$user['name'], 'ot4estvo'=>$user['ot4estvo'], 'family'=>$user['family'], 'phone'=>$user['phone']), false, true);
            
            yii::app()->end();
        }
        
        
        public function actionRegions() {
            $coun_id=yii::app()->request->getPost('value');
            $regions = Regions::model()->findAllByAttributes(array('country_id' => $coun_id));
             $rlist='<select name="state" id="state">';
             foreach($regions as $region) {
                 $rlist=$rlist.'<option value="'.$region['region_id'].'">'.$region['name'].'</option>';
                }
            $rlist=$rlist.'</select>';
            echo $rlist; 
            yii::app()->end();
            
        }
        
        
         public function actionZakazend() {
            echo '<div style="text-align:center; padding:20px;">Спасибо<br> Ближайшее время наши менеджеры свяжутся с Вами</div>';
            $card_id=yii::app()->request->getPost('card_id');
            $user_id=yii::app()->request->getPost('user_id');
            $phone=yii::app()->request->getPost('phone');
            $family=yii::app()->request->getPost('family');
            $ot4estvo=yii::app()->request->getPost('ot4estvo');
            $name=yii::app()->request->getPost('name');
            $typek=yii::app()->request->getPost('typek');
            $coment=yii::app()->request->getPost('coment');
            $options_delivery=yii::app()->request->getPost('options_delivery');
            if ($options_delivery=='flatsv') {
                $info_delivery=yii::app()->request->getPost('info_delivery');
                $options_delivery='Самовывоз';
            }
            else {
                $country = Countries::model()->findByAttributes(array('country_id' => yii::app()->request->getPost('country')));
                $region = Regions::model()->findByAttributes(array('region_id' => yii::app()->request->getPost('state')));
                
                $info_delivery=yii::app()->request->getPost('postcode').', Страна:'.$country->name.', Регион:'.$region->name.', Город:'.yii::app()->request->getPost('city').', Адрес:'.yii::app()->request->getPost('street_address');
                $options_delivery='Доставка';
            }
            
            $user = Users::model()->findByAttributes(array('id' => $user_id));
            $user->name = $name;
            $user->ot4estvo = $ot4estvo;
            $user->family = $family;
            $user->phone = $phone;
            $user->save();
            
            $image = Images::model()->findByAttributes(array('activ_id' => $card_id));
            $image->typek = $typek;
            $image->options_delivery = $options_delivery;
            $image->info_delivery = $info_delivery;
            $image->coment = $coment;
            $image->save();
            
            $activecard= new Activecard;
            $activecard->user_id = $user_id;
            $activecard->card_id = $card_id;
            $activecard->save();
            
            $card = Cards::model()->findByAttributes(array('id' => $card_id));
            $card->date_activ = date("Y-m-d");
            $card->save();
            
yii::app()->end();
        }
        
        /**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}