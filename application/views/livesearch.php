<?php 
// Iterasi dan tampilkan data
echo '<table class="table mt-5 table-hover table-info  "><tbody class=" table-hover border ">';
$no=1;
foreach ($results as $item) {
    echo "<tr class='text-start'>";
    echo "<td  class='text-start'>" . $no++. "</td>";
    echo "<td class='text-start'>" . $item->judul_dokumen . "</td>";
    echo "<td class='text-start'>" . $item->jenis_dokumen . "</td>";
    echo "<td class='text-start'>" . $item->tgl_terbit . "</td>";
    echo "<td><a href='".base_url('home/viewDocument/')."$item->id_activity_document' class='btn btn-sm btn-primary'>Lihat</a></td>";
    echo "</tr>";
}
echo "</tbody></table>";
?>
    


