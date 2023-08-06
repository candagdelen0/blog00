<?php 
    class Blog extends Db {
        public function getCities() {
            $sql = "SELECT * FROM sehirler LIMIT 3";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getAbout() {
            $sql = "SELECT * FROM about";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }



?>
