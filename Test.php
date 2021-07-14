<?php

interface TestKalkulator {
    public function hitungBR($satuan);
}

class PersegiPanjang implements TestKalkulator {
    public $panjang;
    public $lebar;

    public function hitungBR($satuan) {
        $this->panjang = $satuan['panjang'];
        $this->lebar = $satuan['lebar'];
        return ('Bangun Ruang : Persegi Panjang<br>'.
                'Panjang : '.$this->panjang.' m<br>'.
                'Lebar : '.$this->lebar.' m<br>'.
                'Rumus : panjang x lebar<br>'.
                'Luas Persegi Panjang : '.$this->panjang * $this->lebar.' m2');
    }
}

class Bola implements TestKalkulator {
    public $jari;

    public function hitungBR($satuan) {
        $this->jari = $satuan['Jari'];
        return ('Bangun Ruang : Bola<br>'.
                'Jari (r) : '.$this->jari.' m<br>'.
                'Rumus : 4/3 x phi x r x r x r<br>'.
                'Volume Bola : '.(4/3) * pi() * $this->jari * $this->jari * $this->jari.' m3');
    }
}

class Kerucut implements TestKalkulator {
    public $tinggi;
    public $jari;

    public function hitungBR($satuan) {
        $this->tinggi = $satuan['tinggi'];
        $this->jari = $satuan['jari'];
        return ('Bangun Ruang : Kerucut<br>'.
                'Tinggi : '.$this->tinggi.' m<br>'.
                'Jari (r) : '.$this->jari.' m<br>'.
                'Rumus : 1/3 x luas alas (lingkaran: phi*r*r) x t<br>'.
                'Volume Kerucut : '.(1/3) * pi() * $this->jari * $this->jari * $this->tinggi.' m3');
    }
}

class Kubus implements TestKalkulator {
    public $rusuk;

    public function hitungBR($satuan) {
        $this->rusuk = $satuan['rusuk'];
        return ('Bangun Ruang : Kubus<br>'.
                'Panjang Rusuk (r) : '.$this->rusuk.' m<br>'.
                'Rumus : r x r x r<br>'.
                'Volume Kubus : '.$this->rusuk * $this->rusuk * $this->rusuk.' m3');
    }
}

class Lingkaran implements TestKalkulator {
    public $jari;

    public function hitungBR($satuan) {
        $this->jari = $satuan['jari'];
        return ('Bangun Ruang : Lingkaran<br>'.
                'Jari (r) : '.$this->jari.' m<br>'.
                'Rumus : 2 x phi x r<br>'.
                'Keliling Lingkaran : '.(2 * pi() * $this->jari.' m'));
    }
}

class KalkulatorBRGeometry {
    public function initializeKalkulatorBR($menu) {

        if ($menu === 'luasPersegiPanjang') {
            return new PersegiPanjang();
        }
        if ($menu == 'volumeBola') {
            return new Bola();
        }
        if ($menu === 'volumeKerucut') {
            return new Kerucut();
        }
        if ($menu === 'volumeKubus') {
            return new Kubus();
        }
        if ($menu === 'kelilingLingkaran') {
            return new Lingkaran();
        }

        throw new Exception("Tidak ada pilihan tersebut!");
    }
}

$satuan = ['rusuk'=> 0, 'panjang'=> 3, 'lebar'=> 4, 'jari'=> 0, 'tinggi'=>0];
class Json {
    public static function form($data){
        return json_encode($data);
    }
}
echo 'Input : <br>';
print(Json::form($satuan));
echo '<br><br>';

$pilihanKalkulatorBR = 'luasPersegiPanjang';
$kalkulatorBRGeometry = new KalkulatorBRGeometry();
$kalkulatorBR = $kalkulatorBRGeometry->initializeKalkulatorBR($pilihanKalkulatorBR);
$hasilKalkulatorBR = $kalkulatorBR->hitungBR($satuan);
print_r($hasilKalkulatorBR);