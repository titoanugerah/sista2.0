<!DOCTYPE html>
<html>
<body onload="window.print()">
  <style>td{font-size: 11pt;}</style>
  <div class="container" style="width: 21cm; height: 29.7cm; padding: 2rem; margin: 0 auto;">
    <table style="margin-top:-5%">
      <tr>
        <td width="1%"><img src="<?php echo base_url('./assets/logo/undip-regular.png'); ?>" alt="" width="230%" style="margin : 0 120%;"></td>
        <td colspan="3">
          <center>
          <b>KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</b><br>
          <b>UNIVERSITAS DIPONEOGO FAKULTAS TEKNIK</b><br>
          <b style="font-size: 20pt;">DEPARTEMEN TEKNIK LINGKUNGAN</b><br>
          <p style="font-size: 7pt;">Jl. Prof. Soedarto, S.H., Tembalang, Semarang,
          Telepon dan Fax. (024) 76480678, Situs: www.enveng.undip.ac.id<br></p>
        </center>

        </td>
      </tr>
      <br>
      <tr>
        <td align="center" colspan="4" ><b>&nbsp;&nbsp;&nbsp;<br><br>FORM KELAYAKAN MENGAJUKAN KERJA PRAKTEK</b></td>
      </tr>
      <tr>
        <td colspan="4" style="padding: 1% 3%;"><br>Menerangkan bahwa mahasiswa berikut ini : </td>
      </tr>
      <tr>
        <td style="padding: 3% 0 1% 3%;">Nama</td>
        <td style="padding: 3% 0 1% 0;"></td>
        <td colspan="2" style="padding: 3% 0 1% 0;">: <?php echo $this->session->userdata['fullname']; ?></td>
      </tr>
      <tr>
        <td style="padding: 1% 3%;">NIM</td>
        <td>:</td>
        <td colspan="2">: <?php echo $this->session->userdata['nim']; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="padding: 1% 3%;">Telah memenuhi persyaratan untuk menempuh Mata Kuliah Kerja Praktek (yang dibuktikan dengan Transkrip Akademik<br> dan  KRS) yaitu :
        </td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 1% 3%;"><b>Telah lulus *</b> :</td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 1% 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php if($content->skss<110){echo 'v';} ?>] SKS > 92 SKS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (__<u><?php if($content->skss<110){echo (int)$content->skss;}else{ echo '&nbsp;&nbsp;&nbsp;&nbsp;';} ?></u>___)</td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 1% 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dan sedang mengambil : </td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 1% 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php if($content->skss<110){echo 'v';} ?>] SKS > 22 SKS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (___<u><?php if($content->skss<110){echo (int)$content->sksd;}else{ echo '&nbsp;&nbsp;&nbsp;&nbsp;';} ?></u>___) Ket.: Diluar SKS Perbaikan</td>
      </tr>
      <tr>
        <td  colspan="3" style="padding: 1% 3%;"><b>Atau telah lulus *</b> :</td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 1% 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<?php if($content->skss>=110){echo 'v';} ?>] SKS > 110 SKS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (___<u><?php if($content->skss>=110){echo (int)$content->skss;} ?></u>___)<br><br><br> </td>
      </tr>
      <table width="100%">
        <tr>
          <td colspan="2" width="30%" align="center" style="padding-top:3%; padding-right:18%">
          </td>
          <td colspan="2" width="30%" align="center" style="padding-top:3%">
            Dosen Wali<br><br><br><br><br>



          <u><?php echo $content->dosen_wali; ?></u><br>
          NIP. <?php echo $content->nip; ?>
            <br>
          </td>
        </tr>
      </table>
    </table>


  </div>



  <script>
    function myFunction() {
//      window.print();
    }
  </script>

</body>
</html>
