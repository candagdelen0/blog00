<?php 
    class Blog extends Db {
        public function genelsorgu($sql) {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function sorgu($sql) {
            $stmt = $this->connect()->prepare($sql);
            return $stmt;
        }

        public function safety($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function editText($id, $ulkeAdi, $sehirAdi, $sehirResmi, $sehirAciklama, $metin) {
            $sql = "UPDATE sehirler SET ulkeAdi=:ulkeAdi, sehirAdi=:sehirAdi, sehirResmi=:sehirResmi, sehirAciklama=:sehirAciklama, metin=:metin WHERE id=:id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([
                'id' => $id,
                'ulkeAdi' => $ulkeAdi,
                'sehirAdi' => $sehirAdi,
                'sehirResmi' => $sehirResmi,
                'sehirAciklama' => $sehirAciklama,
                'metin' => $metin,
            ]);
        }

    }
?>
