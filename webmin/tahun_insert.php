<?php
//insert.php  
include_once("promp.php");
if (!empty($_POST)) {
    $output = '';
    $kode = $con->real_escape_string($_POST["inKode"]);
    $inisial = $con->real_escape_string($_POST["inIsial"]);
    $status = $con->real_escape_string($_POST["inState"]);

    $querys = $con->query("INSERT INTO tahun_pelajaran(IDTP,KETERANGAN,AKTIF) VALUES('$kode', '$inisial', '$status')");
    if ($querys) {
        $output .= '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                Dat berhasil ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        $stmts = $con->query("SELECT * FROM tahun_pelajaran ORDER BY IDTP ASC");
        $output .= '
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">KODE</th>
                                <th scope="col">TAHUN PELAJARAN</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">Aktifitas</th>
                            </tr>
                        </thead>
                        <tbody>

     ';
        while ($data = $stmts->fetch_array()) {
            $output .= '
                        <tr>
                            <th scope="row">' . $data['IDTP'] . '</th>
                            <td>' . $data['KETERANGAN'] . '</td>
                            <td>' . $data['AKTIF'] . '</td>
                            <td><a href="tahun_edit.php?id=' . $data['IDTP'] . '" id=' . $data['IDTP'] . ' class="badge bg-success edit_data"><i class="bi bi-pencil-square"></i> ubah</a></td>
                        </tr>';
        }
        $output .= '</tbody></table>';
    }
    echo $output;
}
