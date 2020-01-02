    <div id="pritable" style="padding:20px; width:100%; font-size:10px;">
        <div style="text-align:center;">
            <img src="<?=base_url()?>asset/dist/img/logo.png" width="40px" height="40px">
            <h4>Artha Cell</h4>
            <p>Jalan Karang Klumprik Timur XI Blok J12</p>
        </div>
        <?php
        foreach ($print as $data){
            ?>
            Tanggal : <?=$data->tanggal_pembelian?> &nbsp; Jam : <?=$data->jam?>
            <?php
        }
        ?><br>
        -----------------------------------------------------------
        <div style="margin:auto;">
            <table border="0" style="font-size:12px; width:90%; height:15%;" cellspacing="10" cellpadding="10">
                <?php
                    $total = 0;
                    foreach ($print as $data){
                        $total += $data->total_harga;
                        ?>
                        <tr>
                            <td style="max-width:150px;"><?=$data->kode_barang?></td>
                            <td style="max-width:150px;">&nbsp;<?=$data->nama_barang?></td>
                            <td style="max-width:150px;">&nbsp;<?=$data->jumlah_beli?></td>
                            <td style="max-width:150px;">&nbsp;<?=number_format($data->harga,0,'',',');?></td>
                        </tr>
                            
                    <?php
                    }
                        
                ?>
                <tr>
                    <td colspan="2" style="text-align:right;">Total</td>
                    <td></td>
                    <td>&nbsp;<?=number_format($total,0,'',',');?></td>
                </tr>        
            </table>
        </div>
        <br>
        ------------------- Gunting Disini -------------------
        <br>
        <!-- TOTAL -->
    </div>