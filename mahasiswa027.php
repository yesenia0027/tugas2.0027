<?php
// Kelas Mahasiswa
class Mahasiswa {
    // Atribut
    public $nama;
    public $nim;
    public $kelas;

    // Constructor untuk menginisialisasi atribut Mahasiswa
    function __construct($nama, $nim, $kelas) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->kelas = $kelas;
    }

    // Metode untuk menampilkan nama mata kuliah
    function matkul(Mahasiswa $mahasiswaS) {
        return "Mata kuliah yang diambil oleh $this->nama.";
    }
}

// Kelas Absen bergantung pada Mahasiswa
class Absen extends Mahasiswa {
    // Atribut
    public $mata_kuliah;
    public $nama_dosen;
    public $jml_pertemuan;
    public $jml_hadir;

    // Constructor untuk inisialisasi atribut Absen
    function __construct($mata_kuliah, $nama_dosen, $jml_pertemuan, $jml_hadir) {
        $this->mata_kuliah = $mata_kuliah;
        $this->nama_dosen = $nama_dosen;
        $this->jml_pertemuan = $jml_pertemuan;
        $this->jml_hadir = $jml_hadir;
    }

    // Metode untuk menghitung persentase kehadiran
    function kehadiran(Mahasiswa $mahasiswa) {
        $persentase_kehadiran = 0;
        if ($this->jml_pertemuan > 0) {
            $persentase_kehadiran = ($this->jml_hadir / $this->jml_pertemuan) * 100;
        }
        return "Nama: $mahasiswa->nama<br>" .
			   "NIM: $mahasiswa->nim<br>" .
               "Kelas: $mahasiswa->kelas<br>" .
               "Mata Kuliah: $this->mata_kuliah<br>" .
               "Pembimbing $this->nama_dosen<br>" .
               "Persentase Kehadiran: " . $persentase_kehadiran . "%<br>";
    }
}
class Nilai extends Mahasiswa {
    // Atribut
    public $nim;
    public $nama;
    public $mata_kuliah;
    public $nilai;

    // Constructor untuk inisialisasi atribut Nilai
    function __construct($nim, $nama, $mata_kuliah, $nilai) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->mata_kuliah = $mata_kuliah;
        $this->nilai = $nilai;
    }

    // Metode untuk menentukan grade berdasarkan nilai
    function grade(Mahasiswa $mahasiswa) {
        $grade = '';

        // Penentuan grade berdasarkan nilai
        if ($this->nilai >= 90) {
            $grade = 'A';
        } else if ($this->nilai >= 80) {
            $grade = 'B';
        } else if ($this->nilai >= 75) {
            $grade = 'C';
        } else if ($this->nilai >= 60) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        return "Nilai: $this->nilai<br>" .
               "Grade: $grade<br>";
    }
}


// Contoh penggunaan
$mahasiswa1 = new Mahasiswa("Yesenia Ikfa S.", "23.230.0027", "LAB 7");
$absen1 = new Absen("Pemrograman Web 2", "Pak Ari", 14, 12);

// Menghitung kehadiran mahasiswa menggunakan objek Mahasiswa
echo $absen1->kehadiran($mahasiswa1);
$nilai1 = new Nilai("23.230.0027", "Yesenia Ikfa S.", "Pemrograman Web 2", 95);
echo $nilai1->grade($mahasiswa1);
?>