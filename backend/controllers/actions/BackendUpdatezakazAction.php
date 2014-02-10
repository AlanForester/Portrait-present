<?php
class BackendUpdatezakazAction extends CAction
{
    
    public function run()
    {
         if ((yii::app()->request->isAjaxRequest)&&(yii::app()->request->isPostRequest)) {
            $id=yii::app()->request->getPost('id');
            $img = Images::model()->findByPk($id);
            if (!file_put_contents('backend/www/image.jpg', $img->img)) echo 'error';
            $painters = Users::model()->findAllByAttributes(array('role' => '2'));
            $painterslist='<option value="1">Не выбрано</option>';
             foreach($painters as $painter) {
                 if ($painter["id"]==$img->painter_id) $painter["id"]=$painter["id"].'" selected="';
                 $painterslist=$painterslist.'<option value="'.$painter["id"].'">'.$painter['email'].'</option>';
                }
            $this->controller->renderPartial('_upzak', array(
                'card_id' => $img->activ->card_id, 
                'typek' => $img->typek0->typek, 
                'email' => $img->activ->user->email, 
                'id' => $id, 
                'painterslist' => $painterslist,
                'name' => $img->activ->user->name, 
                'ot4estvo' => $img->activ->user->ot4estvo, 
                'family' => $img->activ->user->family, 
                'phone' => $img->activ->user->phone,
                'options_delivery' => $img->options_delivery,
                'info_delivery' => $img->info_delivery,
                'coment' => $img->coment,
                    ), false, true);

                yii::app()->end();
         }
    }
} 