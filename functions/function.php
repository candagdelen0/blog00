<?php 
    class Blog extends Db {
        public function getCities($sql) {
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

        public function getAdvise() {
            $sql = "SELECT * FROM oneri";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function loginControl($sql) {
            $stmt = $this->connect()->prepare($sql);
            return $stmt;
        }



    }
?>
