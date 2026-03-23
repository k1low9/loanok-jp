<?php

  class SplitPrice{

        private $split_price;
        private $result;

        private $dir_name;
        private $title;


        function get_price($price){
          global $wpdb;
          $this->split_price = $price;
          $split_price_array=array();

          $this->result = $wpdb->get_results("SELECT * FROM $wpdb->split_price WHERE price = ".$this->split_price,"ARRAY_A");
          $split_price_array["12"]=$this->result[0]["12times"];
          $split_price_array["24"]=$this->result[0]["24times"];
          $split_price_array["36"]=$this->result[0]["36times"];
          $split_price_array["48"]=$this->result[0]["48times"];
          $split_price_array["60"]=$this->result[0]["60times"];
          $this->result[0]["bunkatu"] = $split_price_array;

          return $this->result[0];
        }
      }
