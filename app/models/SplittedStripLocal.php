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

}
