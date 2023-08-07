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

        public function safety($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function SignUp($sql) {
            $query = $this->connect()->prepare($sql);
            return $query;
        }




    }
?>
