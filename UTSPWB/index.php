<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<style type="text/css">
  .container1{
    border: 1px solid red;
    margin: 30px 300px;
  }
  .container2{
    display: none;
    border: 1px solid red;
    margin: 30px 300px;
    padding-bottom: 200px;
    padding-left: 10px;
  }
  .floatLeft {
    width: 50%;
    float: left;
  }

</style>
<body>
  <div class="container1" style="border: 1px solid red;">
    <center>
      <h3>Form Input</h3>

      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" id="nama" required></td>
        </tr>
        <tr>
          <td>Kode Booking</td>
          <td>:</td>
          <td>
            <select required id="kodeBooking">
              <option value="">select kode booking</option>
              <option value="AL02102">AL02102</option>
              <option value="BG03025">BG03025</option>
              <option value="CR02111">CR02111</option>
              <option value="KM03075">KM03075</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td>:</td>
          <td><input type="number" id="jumlah" required> Orang</td>
        </tr>
        <tr>
          <td>Lama</td>
          <td>:</td>
          <td><input type="number" id="lama" required> Hari</td>
        </tr>
        <tr>
          <td>Jenis Pembayaran</td>
          <td>:</td>
          <td>
            <select required id="jenisPembayaran">
              <option value="">select pembayaran</option>
              <option value="Kartu Kredit">Kartu Kredit</option>
              <option value="Debit">Debit</option>
              <option value="Cash">Cash</option>
            </select>
          </td>
        </tr>
      </table>
      <br>
      <input type="submit" id="btnSubmit" value="Proses" style="margin-right: 20px;" onclick="getValue();">
      <input type="button" id="btnClear" value="Hapus" style="margin-bottom: 20px;" onclick="clearValueAdd();">
    </center>
  </div>
  <br>
  <div class="container2 tb1" id="hide-elemen">
    <center><h3>Florensia Hotel</h3></center>
    <div class="floatLeft">
      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td id="tdNama">val</td>
        </tr>
        <tr>
          <td>Nama Kamar</td>
          <td>:</td>
          <td id="tdNamaKamar">val</td>
        </tr>
        <tr>
          <td>Nomor</td>
          <td>:</td>
          <td id="tdNomor">val</td>
        </tr>
        <tr>
          <td>Lama</td>
          <td>:</td>
          <td id="tdLama">val</td>
        </tr>
        <tr>
          <td>Potongan/Tambahan</td>
          <td>:</td>
          <td id="tdPotongan">val</td>
        </tr>
        <tr>
          <td>Total Biaya Keseluruhan</td>
          <td>:</td>
          <td id="tdGrand">val</td>
        </tr>
      </table>
    </div>
    <div class="floatLeft tb2">
      <table>
        <tr>
          <td>Kode Booking</td>
          <td>:</td>
          <td id="tdKodeBooking">val</td>
        </tr>
        <tr>
          <td>Lantai</td>
          <td>:</td>
          <td id="tdLantai">val</td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td>:</td>
          <td id="tdJumlah">val</td>
        </tr>
        <tr>
          <td>Jenis Pembayaran</td>
          <td>:</td>
          <td id="tdJenisPembayaran">val</td>
        </tr>
        <tr>
          <td>Biaya Springbed Tambahan</td>
          <td>:</td>
          <td id="tdSpringbed">val</td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
  function getValue()
  {
    var nama = document.getElementById("nama").value;
    var kodeBooking = document.getElementById("kodeBooking").value;
    var jumlah = document.getElementById("jumlah").value;
    var lama = document.getElementById("lama").value;
    var jenisPembayaran = document.getElementById("jenisPembayaran").value;
    var x = document.getElementById("hide-elemen");
    x.style.display = "block";
    document.getElementById('tdNama').innerHTML = nama;
    document.getElementById('tdKodeBooking').innerHTML = kodeBooking;
    document.getElementById('tdJumlah').innerHTML = jumlah;
    document.getElementById('tdLama').innerHTML = lama;
    document.getElementById('tdJenisPembayaran').innerHTML = jenisPembayaran;

    var namaKamar = kodeBooking.substring(0,2);
    var nomorKamar = kodeBooking.slice(4,7);
    var lantai = kodeBooking.slice(2,4);
    document.getElementById('tdLantai').innerHTML = lantai;
    document.getElementById('tdNomor').innerHTML = nomorKamar;
    
    var harga = 0;    

    var jumlah = document.getElementById("jumlah").value;

    if (jumlah >2 )
    {
      var sisa = jumlah - 2;
      var tambahan = sisa * 75000;
      document.getElementById('tdSpringbed').innerHTML = 'Rp.'+ tambahan;
    }else{
      document.getElementById('tdSpringbed').innerHTML = 'Rp.'+ 0;
    }

    if(namaKamar == 'AL'){
      document.getElementById('tdNamaKamar').innerHTML = 'Alamanda';
      var price = 450000*lama;
      if(jumlah > 2){
        var co = jumlah-2;
        var hargaKm = (co * 75000) + price;
        var total = potongan(price) + hargaKm;
        var pot = total - hargaKm;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.'+ total.toLocaleString();
      }else{
        var total = potongan(price);
        var pot = total-price;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.'+ total.toLocaleString();
      }

    }else if(namaKamar == 'BG'){
      document.getElementById('tdNamaKamar').innerHTML = 'Bougenvile';
      var price = 350000*lama;
      if(jumlah > 2){
        var co = jumlah-2;
        var hargaKm = (co * 75000) + price;
        var total = potongan(price) + hargaKm;
        var pot = total - hargaKm;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.' + total.toLocaleString();
      }else{
        var total = potongan(price);
        var pot = total-price;
        document.getElementById('tdPotongan').innerHTML = 'Rp.' + pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.' + total.toLocaleString();
      }
    }else if(namaKamar == 'CR'){
      document.getElementById('tdNamaKamar').innerHTML = 'Crysan';
      var price = 375000*lama;
      if(jumlah > 2){
        var co = jumlah-2;
        var hargaKm = (co * 75000) + price;
        var total = potongan(price) + hargaKm;
        var pot = total - hargaKm;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.'+ total.toLocaleString();
      }else{
        var total = potongan(price);
        var pot = total-price;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.'+ total.toLocaleString();
      }
    }else if(namaKamar == 'KM'){
      document.getElementById('tdNamaKamar').innerHTML = 'Kemuning';
      var price = 425000*lama;
      if(jumlah > 2){
        var co = jumlah-2;
        var hargaKm = (co * 75000) + price;
        var total = potongan(price) + hargaKm;
        var pot = total - hargaKm;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.'+  total.toLocaleString();
      }else{
        var total = potongan(price);
        var pot = total-price;
        document.getElementById('tdPotongan').innerHTML = 'Rp.'+ pot.toLocaleString();
        document.getElementById('tdGrand').innerHTML = 'Rp.'+ total.toLocaleString();
      }
    }else{
      alert('none');
    }

    clearValue();
  }

  function potongan(harga)
  {
    var jenisPembayaran = document.getElementById("jenisPembayaran").value;
    if(jenisPembayaran == "Kartu Kredit"){
        return (harga * 0.2);
    }else if(jenisPembayaran == "Debit"){
        return (harga * 0.15);
    }else if(jenisPembayaran == "Cash"){
      return (harga * 0);
    }else{
      alert('error');
    }
  }

  function clearValue() {
     document.getElementById("nama").value = "";
     document.getElementById("kodeBooking").value = "";
     document.getElementById("jumlah").value = "";
     document.getElementById("lama").value = "";
     document.getElementById("jenisPembayaran").value = "";
  }

  function clearValueAdd() {
     document.getElementById("nama").value = "";
     document.getElementById("kodeBooking").value = "";
     document.getElementById("jumlah").value = "";
     document.getElementById("lama").value = "";
     document.getElementById("jenisPembayaran").value = "";
     var x = document.getElementById("hide-elemen");
     x.style.display = "none";
  }
</script>

