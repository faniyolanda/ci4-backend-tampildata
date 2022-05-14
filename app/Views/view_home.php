<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Tugas Akhir</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12">
                <h5>Data Mahasiswa</h5>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No BP</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($mahasiswa as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['nobp']; ?></td>
                                <td> <?= $row['nama']; ?></td>
                                <td> <?= $row['alamat']; ?></td>
                                <td> <?= $row['nohp']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
