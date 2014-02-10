<?php
/**
* Controller action representing the act of home page rendering on backend.
*
* Everything which should be done when user opens the backend landing page is here.
*
* @package YiiBoilerplate\Backend
*/
class AddcardAction extends CAction
{
    /**
    * We render the homepage as a controller action here.
    */
    public function run()
    {

        if ((yii::app()->request->isAjaxRequest)&&(yii::app()->request->getPost('sum'))) {
            $sum=yii::app()->request->getPost('sum');
            for($i = 0; $i<$sum; $sum--) {
                $ncard = mt_rand(1000000000, 9999999999);
                while (Cards::model()->findByAttributes(array('n_card' => $ncard))) 
                    $ncard = substr(mt_rand(1000000000, 999999999999) + 1,0,10);

                $card = new Cards;
                $card->n_card = $ncard;
                $card->date_activ = '0000-00-00';
                $card->save();
            }
        }
        else {
            $ncard = mt_rand(1000000000, 9999999999);
                while (Cards::model()->findByAttributes(array('n_card' => $ncard))) 
                $ncard = substr(mt_rand(1000000000, 999999999999) + 1,0,10);

                $card = new Cards;
                $card->n_card = $ncard;
                $card->date_activ = '0000-00-00';
                $card->save();
                Yii::app()->request->redirect("/site/cards");
        }
        yii::app()->end();
    }
} 