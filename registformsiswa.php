<?php
$prodi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "BD" => "Bisnis Digital"];
$skill = ["HTML" => 10, "CSS" => 10, "JavaScript" => 20, "RWD Bootstrap" => 20, "PHP" => 30, "Python" => 30, "Java" => 50];
$domisili = ["Jakarta", "Bogor", "Depok", "Tanggerang", "Bekasi", "Lainnya"];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Registrasi Form</title>
  <style>
    .container {
      background-color: khaki;
    }

    .container .fieldset .legend {
      text-align: center;
    }
  </style>


</head>

<body>

  <div class="container">
    <fieldset>
      <legend><b>Form Registrasi IT CLUB Data Science</b> </legend>

      <form method="POST" action="">
        <div class="row mb-3">
          <label for="nim" class="col-sm-2 col-form-label">NIM</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nim" name="nim">
          </div>

        </div>
        <div class="row mb-3">
          <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
          </div>

        </div>
        <fieldset class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>

          <div class="col-sm-10">
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" checked>
              <label class="form-check-label" for="laki-laki">
                Laki-Laki
              </label>
            </div>


            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
              <label class="form-check-label" for="perempuan">
                Perempuan
              </label>
            </div>
          </div>

          <div class="row mb-3">
            <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
            <div class="col-sm-10">
              <select class="form-select" id="prodi" name="prodi">
                <?php foreach ($prodi as $k => $v) : ?>
                  <option value="<?= $k ?>"><?= $v ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-sm-2 pt-0" class="custom-control-label">Skill Web & Programming</label>
            <div class="col-3">
              <?php foreach ($skill as $k => $v) : ?>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="skill[]" id="<?= $k ?>" type="checkbox" class="custom-control-input" value="<?= $k ?>">
                  <label for="<?= $k ?>" class="custom-control-label"><?= $k ?></label>
                </div>
              <?php endforeach ?>
            </div>
          </div>

          <div class="row mb-3">
            <label for="domisili" class="col-sm-2 col-form-label">Tempat Domisili</label>
            <div class="col-sm-10">
              <select class="form-select" id="domisili" name="domisili" class="custom-select" required="required">
                <?php foreach ($domisili as $v) : ?>
                  <option value="<?= $v ?>"><?= $v ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary " name="proses"> Submit </button>
              </div>
      </form>
    </fieldset>


  </div>

  <?php
  if (isset($_POST['proses'])) {
    $nim = $_POST['nim'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $skill_dipilih = $_POST['skill'];
    $skor_skill = 0;
    foreach ($skill_dipilih as $sk) {
      $skor_skill += $skill[$sk];
    }
    $kategori_skill = 0;
    if ($skor_skill <= 0) {
      $kategori_skill = 'Tidak Memadai';
    } elseif ($skor_skill >= 0 && $skor_skill <= 40) {
      $kategori_skill = 'Kurang';
    } elseif ($skor_skill >= 40 && $skor_skill <= 60) {
      $kategori_skill = 'Cukup';
    } elseif ($skor_skill >= 60 && $skor_skill <= 100) {
      $kategori_skill = 'Baik';
    } elseif ($skor_skill >= 100 && $skor_skill <= 170) {
      $kategori_skill = 'Sangat Baik';
    } else {
      echo 'Kategori skill tidak ada';
    }
    $domisili = $_POST['domisili'];
    $email = $_POST['email'];

    echo '<br/>NIM : ' . $nim;
    echo '<br/>Nama Lengkap : ' . $nama_lengkap;
    echo '<br/>Jenis Kelamin : ' . $jenis_kelamin;
    echo '<br/>Program Studi : ' . $prodi;
    echo '<br/>Skill : ' . implode(', ', $skill_dipilih);
    echo '<br/>Skor Skill : ' . $skor_skill;
    echo '<br/>Kategori Skill : ' . $kategori_skill;
    echo '<br/>Domisili : ' . $domisili;
    echo '<br/>Email : ' . $email;
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>