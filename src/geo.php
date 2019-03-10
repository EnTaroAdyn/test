<?php
    namespace src;

    class geo {
        public function solution($array = []){

            if(!$this->checkParam($array)){
                return false;
            }

            if(is_array($array)){
                $max = 0;
                $min = 0;
                $deep = 0;
                $i = 1;
                $rez = 0;

                foreach($array as $row){
                    if($max > $row){
                        if($min >= $row){
                            $min = $row;
                        } else if ($deep < $row - $min){
                            $deep = $row - $min;
                        }
                    } else {
                        if($rez <= $max - $min && $i > 0){
                            $rez = $max - $min;
                        }

                        $deep = 0;
                        $max = $row;
                        $min = $row;
                        $i = 0;
                    }

                    $i++;
                }

                if($rez < $deep) {
                    $rez = $deep;
                }

                return $rez;
            }

            return false;
        }

        private function checkParam($array) {

            if (!isset($array)){
                return false;
            }

            if (!is_array($array)){
                return false;
            }

            if (count($array) > 100000){
                return false;
            }

            if (array_keys($array) !== range(0, count($array) - 1)){
                return false;
            }

            foreach($array as $row){
                if(!(is_numeric($row) && $row > 0 && $row <= 100000000)){
                    return false;
                }
            }

            return true;
        }
    }
?>