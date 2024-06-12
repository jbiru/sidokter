<?php 

if(isset($_POST['input'])){
//     $input=$_POST['input'];
    $query=$this->db->query("SELECT * FROM activity_document"); 
    if (($query->num_rows)>0) { ?>
        <table>
            <tbody>
                <?php 
                $row=$query->result_array;
                while($row) {?>
                <tr>
                    <td><?= $row['judul_dokumen'];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>tidak ada data</p>
    <?php }} ?>
    


