<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\SplittedStripLocal as CSplittedStripLocal;
class SplittedStripLocal extends CSplittedStripLocal {

    public static function insertBySceneId($sceneId) {
        $model = new self;
        $model->databasedata_id = (int) Databasedata::insertGetId();
        $model->strips_id = (int) Strips::insertGetId();
        $model->scene_id = $sceneId;
        $model->save(false);
    }
    public static function insertByLoop($data,$sceneId){
        foreach ($data as $key => $value){
            foreach($value as $request){ 
                foreach($request->STRIPS as $aaa=>$bbb){
                    $stname = 'ST' . sprintf('%02d', $bbb);
                    if($request->STRIPS->{$stname}['name']){
                        $model=new self;
                        $model->databasedata_id=(int)  Databasedata::insertGetId($request->STRIPS->{$stname}->DatabaseData);
                        $model->strips_id=(int)Strips::insertGetId($request->STRIPS->{$stname}->Definition);
                        $model->scene_id=(int)$sceneId;
                        $model->status=(int)$request->STRIPS->{$stname}['status'];
                        $model->type=(string)$request->STRIPS->{$stname}['type'];
                        $model->image=(string)$request->STRIPS->{$stname}['image'];
                        $model->name=(string)$request->STRIPS->{$stname}['name'];
                        $model->save(false);
                        StripAccessLocal::insertBySplitted($request->STRIPS->{$stname}->Passes, $model->id);
                    }
                }
            }
        }
    }
    public static function updateBySceneId($data,$sceneId){
        $model = self::find()->where(['scene_id'=>$sceneId])->one();
        //echo '<pre>'.print_r($model->attributes,true).'</pre>';
        foreach ($data as $key => $value){
            foreach($value as $request){ 
                //echo '<pre>'.print_r($request->STRIPS->ST01,true).'</pre>';

                foreach($request->STRIPS as $aaa=>$bbb){
                    $stname = 'ST' . sprintf('%02d', $bbb);
                    if($request->STRIPS->{$stname}['name']){
                        //echo $request->STRIPS->{$stname}['name'];
                        //echo '<pre>'.print_r($request->STRIPS->{$stname}->DatabaseData,true).'</pre>';
                        Databasedata::updateXML($request->STRIPS->{$stname}->DatabaseData,$model->databasedata_id);
                        Strips::updateXML($request->STRIPS->{$stname}->Definition,$model->strips_id);
                        
                        //echo '<pre>'.print_r($request->STRIPS->{$stname}->Passes,true).'</pre>';
                        StripAccessLocal::insertBySplitted($request->STRIPS->{$stname}->Passes, $model->id);
                    }
                }
            }
        }
    }

}
