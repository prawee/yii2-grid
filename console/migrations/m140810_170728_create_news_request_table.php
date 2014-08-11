<?php

use yii\db\Schema;
use yii\db\Migration;

class m140810_170728_create_news_request_table extends Migration {

    public function up() {
        //0.scene
        $this->createTable('scene',[
            'id'=>  Schema::TYPE_PK,
            'wo_doc_name'=>  Schema::TYPE_STRING.'(255) NULL',
            'aoi_name'=>  Schema::TYPE_STRING.'(128) NULL',
        ]);
        
        //1.mission_local
        $this->createTable('mission_local', [
            'id' => Schema::TYPE_PK,
            'attr_version' => Schema::TYPE_STRING . '(45) NULL',
            'attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'attr_status' => Schema::TYPE_STRING . '(45) NULL',
            'attr_lock' => Schema::TYPE_STRING . '(45) NULL',
            'attr_name' => Schema::TYPE_STRING . '(45) NULL',
            'name' => Schema::TYPE_STRING . '(255) NULL',
            //dababasedata
            'dbd_miseo_reference' => Schema::TYPE_STRING . '(255) NULL',
            'dbd_miseo_group' => Schema::TYPE_TEXT,
            'dbd_periodicity_flag' => Schema::TYPE_STRING . '(1) NULL',
            'dbd_stereo_type' => Schema::TYPE_STRING . '(1) NULL',
            'dbd_organism' => Schema::TYPE_INTEGER,
            'dbd_nb_summits_cov' => Schema::TYPE_INTEGER,
            //progzone
            'pgz_attr_name' => Schema::TYPE_STRING . '(255) NULL',
            'pgz_attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_attr_c1' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_attr_c2' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_attr_c3' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_attr_c4' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_miseo_name' => Schema::TYPE_STRING . '(255) NULL',
            'pgz_request_status_id' => Schema::TYPE_INTEGER,
            'pgz_satellite' => Schema::TYPE_STRING . '(45) NULL',
            'pgz_phase' => Schema::TYPE_STRING . '(128) NULL',
            'pgz_downlink_station_id' => Schema::TYPE_INTEGER,
            'pgz_average_altitude' => Schema::TYPE_INTEGER,
            'pgz_miseo_template' => Schema::TYPE_STRING . '(128) NULL',
            'pgz_center_latitude' => Schema::TYPE_DECIMAL . '(20,15)',
            'pgz_center_longitude' => Schema::TYPE_DECIMAL . '(20,15)',
            'pgz_nb_summits_cov' => Schema::TYPE_INTEGER,
            'pgz_item_length' => Schema::TYPE_INTEGER,
            //definition
            'def_attr_name' => Schema::TYPE_STRING . '(128) NULL',
            'def_attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c1' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c2' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c3' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c4' => Schema::TYPE_STRING . '(45) NULL',
            'def_id_user' => Schema::TYPE_INTEGER,
            'def_user_coordinates' => Schema::TYPE_STRING . '(128) NULL',
            'def_miseo_comment' => Schema::TYPE_TEXT,
            'def_deposit_date' => Schema::TYPE_DATETIME,
            'def_start_date' => Schema::TYPE_DATE,
            'def_end_date' => Schema::TYPE_DATE,
            'def_completion_date' => Schema::TYPE_DATE,
            'def_priority_id' => Schema::TYPE_INTEGER,
            'def_periodicity_flag' => Schema::TYPE_STRING . '(1) NULL',
            'def_periodicity_period' => Schema::TYPE_INTEGER,
            'def_periodicity_min_delay_between_shots' => Schema::TYPE_INTEGER,
            //criteria
            'cri_attr_name' => Schema::TYPE_STRING . '(45) NULL',
            'cri_attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'cri_attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'cri_attr_c1' => Schema::TYPE_STRING . '(45) NULL',
            'cri_attr_c2' => Schema::TYPE_STRING . '(45) NULL',
            'cri_attr_c3' => Schema::TYPE_STRING . '(45) NULL',
            'cri_attr_c4' => Schema::TYPE_STRING . '(45) NULL',
            'cri_updatable_gains' => Schema::TYPE_STRING . '(1) NULL',
            'cri_sensor_type' => Schema::TYPE_INTEGER,
            'cri_sensor_type_bgain' => Schema::TYPE_STRING . '(3) NULL',
            'cri_sensor_type_ggain' => Schema::TYPE_STRING . '(3) NULL',
            'cri_sensor_type_rgain' => Schema::TYPE_STRING . '(3) NULL',
            'cri_sensor_type_irgain' => Schema::TYPE_STRING . '(3) NULL',
            'cri_sensor_type_gain' => Schema::TYPE_STRING . '(3) NULL',
            'cri_nadir_viewing' => Schema::TYPE_STRING . '(1) NULL',
            'cri_nadir_min_roll' => Schema::TYPE_DECIMAL . '(5,5)',
            'cri_nadir_max_roll' => Schema::TYPE_DECIMAL . '(5,5)',
            'cri_nadir_min_pitch' => Schema::TYPE_DECIMAL . '(5,5)',
            'cri_nadir_max_pitch' => Schema::TYPE_DECIMAL . '(5,5)',
            'cri_compression_ratio' => Schema::TYPE_INTEGER,
            'cri_luminosity' => Schema::TYPE_STRING . '(1) NULL',
            'created' => Schema::TYPE_DATETIME,
            'modified' => Schema::TYPE_DATETIME,
            'created_by_id' => Schema::TYPE_INTEGER,
            'midified_by_id' => Schema::TYPE_INTEGER,
            'distributor_id' => Schema::TYPE_INTEGER,
            'client_id' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_INTEGER,
            'scene_id' => Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_missionLocal_scene', 'mission_local', 'scene_id', 'scene', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_requestStatus', 'mission_local', 'pgz_request_status_id', 'request_status', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_downlinkStation', 'mission_local', 'pgz_downlink_station_id', 'downlink_station', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_created', 'mission_local', 'created_by_id', 'user', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_modified', 'mission_local', 'midified_by_id', 'user', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_distributor', 'mission_local', 'distributor_id', 'user', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_client', 'mission_local', 'client_id', 'user', 'id', 'SET NULL', 'CASCADE');

        //2.som_polygon_local
        $this->createTable('som_polygon_local', [
            'id' => Schema::TYPE_PK,
            'mission_local_id' => Schema::TYPE_INTEGER,
            'attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'attr_format' => Schema::TYPE_STRING . '(45) NULL',
            'attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'attr_lock' => Schema::TYPE_STRING . '(45) NULL',
            'attr_name' => Schema::TYPE_STRING . '(45) NULL',
            'miseo_reference' => Schema::TYPE_STRING . '(255) NULL',
            'miseo_group' => Schema::TYPE_TEXT,
            'miseo_template' => Schema::TYPE_STRING . '(128) NULL',
            'point_latitude' => Schema::TYPE_DECIMAL . '(5,5)',
            'point_longitude' => Schema::TYPE_DECIMAL . '(5,5)',
            'scene_id' => Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_somPolygonLocal_missionLocal', 'som_polygon_local', 'mission_local_id', 'mission_local', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_somPolygonLocal_scene', 'som_polygon_local', 'scene_id', 'scene', 'id', 'CASCADE', 'CASCADE');

        //3.splitted_strip_local
        $this->createTable('splitted_strip_local', [
            'id' => Schema::TYPE_PK,
            'mission_local_id' => Schema::TYPE_INTEGER,
            'attr_status' => Schema::TYPE_STRING . '(45) NULL',
            'attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'attr_lock' => Schema::TYPE_STRING . '(45) NULL',
            'attr_name' => Schema::TYPE_STRING . '(45) NULL',
            //databasedata
            'dbd_miseo_reference' => Schema::TYPE_STRING . '(255) NULL',
            'dbd_miseo_group' => Schema::TYPE_TEXT,
            'dbd_miseo_template' => Schema::TYPE_STRING . '(45) NULL',
            'dbd_satellite' => Schema::TYPE_STRING . '(45) NULL',
            'dbd_phase' => Schema::TYPE_STRING . '(45) NULL',
            'dbd_delta_lat_north' => Schema::TYPE_DECIMAL . '(20,15)',
            'dbd_delta_lat_south' => Schema::TYPE_DECIMAL . '(20,15)',
            //definition
            'def_attr_name' => Schema::TYPE_STRING . '(255) NULL',
            'def_attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c1' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c2' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c3' => Schema::TYPE_STRING . '(45) NULL',
            'def_attr_c4' => Schema::TYPE_STRING . '(45) NULL',
            'def_miseo_name' => Schema::TYPE_STRING . '(255) NULL',
            'def_strip_status_id' => Schema::TYPE_INTEGER,
            'def_rank' => Schema::TYPE_INTEGER,
            'def_lat_center' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lon_center' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_strip_length' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_strip_width' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lat_corner_nw' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lon_corner_nw' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lat_corner_ne' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lon_corner_ne' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lat_corner_se' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lon_corner_se' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lat_corner_sw' => Schema::TYPE_DECIMAL . '(20,15)',
            'def_lon_corner_sw' => Schema::TYPE_DECIMAL . '(20,15)',
            'created' => Schema::TYPE_DATETIME,
            'modified' => Schema::TYPE_DATETIME,
            'scene_id' => Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_splittedStripLocal_missionLocal', 'splitted_strip_local', 'mission_local_id', 'mission_local', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_splittedStripLocal_scene', 'splitted_strip_local', 'scene_id', 'scene', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_missionLocal_stripStatus', 'splitted_strip_local', 'def_strip_status_id', 'strip_status', 'id', 'SET NULL', 'CASCADE');

        //4.strip_access_local
        $this->createTable('strip_access_local', [
            'id' => Schema::TYPE_PK,
            'splitted_strip_local_id' => Schema::TYPE_INTEGER,
            'attr_status' => Schema::TYPE_STRING . '(45) NULL',
            'attr_type' => Schema::TYPE_STRING . '(45) NULL',
            'attr_image' => Schema::TYPE_STRING . '(45) NULL',
            'attr_name' => Schema::TYPE_STRING . '(45) NULL',
            'miseo_reference' => Schema::TYPE_STRING . '(128) NULL',
            'miseo_group' => Schema::TYPE_TEXT,
            'miseo_template' => Schema::TYPE_STRING . '(128) NULL',
            'orbit_cycle' => Schema::TYPE_INTEGER,
            'orbit_cycle_couple' => Schema::TYPE_TEXT,
            'roll_max_access' => Schema::TYPE_STRING . '(255) NULL',
            'earliest_date' => Schema::TYPE_DATETIME,
            'created' => Schema::TYPE_DATETIME,
            'modified' => Schema::TYPE_DATETIME,
            'modified_by_id' => Schema::TYPE_INTEGER,
            'scene_id' => Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_stripAccessLocal_splittedStripLocal', 'strip_access_local', 'splitted_strip_local_id', 'splitted_strip_local', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_stripAccessLocal_scene', 'strip_access_local', 'scene_id', 'scene', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_stripAccessLocal_modified', 'strip_access_local', 'modified_by_id', 'user', 'id', 'SET NULL', 'CASCADE');
    }

    public function down() {
        echo "m140810_170728_create_news_request_table cannot be reverted.\n";

        return false;
    }

}
