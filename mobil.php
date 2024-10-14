<?php
class Mobil {
    public $nama;
    public $merk;

    function __construct($nama, $merk) {
        $this->nama = $nama;
        $this->merk = $merk;
    }

    protected function getNama() {
        return $this->nama;
    }

    protected function getMerk() {
        return $this->merk;
    }

    function cetakInfo() {
        echo "Nama Mobil: " . $this->getNama() . "<br>";
        echo "Merk Mobil: " . $this->getMerk() . "<br>";
    }
}

class MobilSport extends Mobil {
    public $speed;
    public $turbo;

    function __construct($nama, $merk, $speed, $turbo) {
        parent::__construct($nama, $merk);
        $this->speed = $speed;
        $this->turbo = $turbo;
    }

    function cetakInfo() {
        parent::cetakInfo();
        echo "Kecepatan: " . $this->speed . " km/h<br>";
        echo "Turbo: " . ($this->turbo ? 'Ya' : 'Tidak') . "<br>";
    }
}

class CityCar extends Mobil {
    public $model;
    public $irit;
    public $sensor;

    function __construct($nama, $merk, $model, $irit, $sensor) {
        parent::__construct($nama, $merk);
        $this->model = $model;
        $this->irit = $irit;
        $this->sensor = $sensor;
    }

    function cetakInfo() {
        parent::cetakInfo();
        echo "Model: " . $this->model . "<br>";
        echo "Efisiensi Bahan Bakar: " . $this->irit . "<br>";
        echo "Sensor: " . $this->sensor . "<br>";
    }
}

// Membuat objek
$mobilSport = new MobilSport("toyota GT86", "toyota GT86", 330, true);
$mobilSport1 = new MobilSport("M4", "M4", 360, false);

$cityCar = new CityCar("Jazz", "Jazz", "tipe RS", "40 km/l", "Parkir Otomatis");
$cityCar1 = new CityCar("Fortunner", "Fortunner", "tipe sport", "30 km/l", "Lane Assist");

echo "<h2>Mobil Sport:</h2>";
$mobilSport->cetakInfo();
echo "<br>";

echo "<h2>City Car:</h2>";
$cityCar->cetakInfo();
?>
