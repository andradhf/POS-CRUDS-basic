<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script type="text/javascript" src="/js/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function printToPDF() {
            
            window.print();

            setTimeout(function() {
                location.reload();
            }, 1000); 
        } 
        function displayLocalDateTime() {
            var date = new Date();
            var options = { 
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: false 
            };
            var formattedDateTime = date.toLocaleString('id-ID', options);
            document.getElementById('localDateTime').textContent = formattedDateTime;
    }
        // JavaScript
            function tambahNilai() {
                var inputElement = document.getElementById('inputValue');
                var currentValue = parseInt(inputElement.value);

                // Tambah nilai sebanyak 1 setiap kali tombol diklik
                currentValue += 1;

                // Update nilai pada input
                inputElement.value = currentValue;

                }

    </script>
    <title>Kasir</title>
    <style>
        @media print{
            .cetak, .nabar, .price, .qty, .disc, .totbar, .in, .new, .del, .diskon1, .diskon2, .acton1, .acton2, .border, .gone, .hidenav{
                display : none;
            }
        }
        </style>
</head>
<body class="row"  onload="displayLocalDateTime()">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark hidenav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/asset/Logo Kasir.png" alt="Wasir" style="width:40px;" class="rounded-pill">
    </a>
  </div>
  <form class="d-flex">
        <a class="btn btn-primary" type="button" href="{{route('logout')}}"><i class="fa fa-sign-out"></i></a>
    </form>
</nav>
  <div style="background-image: url(/asset/2.png);"> 
  <div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
    <div class="col-2"></div>   
    
    <div  class="col-8 container " >
        <div  class="container-fluid " style="margin-top: 100px; border: 1px solid; border-color:black;"  >
            <tr>
@php
$user_id = auth()->user()->id;
$koneksi = new mysqli("localhost","root","","kasir");
$data = $koneksi->query("SELECT * FROM  kasir WHERE user_id = $user_id");
$total1 = 0;
while($tampil = $data->fetch_array()){
    $total1 += $tampil["totbar"];}

$angka = $total1;
$format_akuntansi = number_format($angka, 0, ',', '.');
$format_akuntansi = 'Rp ' . str_replace(',', '.', $format_akuntansi) . ',-';


    function terbilang($angka) {
    $angka = abs($angka);
    $terbilang = array(
        "", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"
    );
    $hasil = "";
    if ($angka < 12) {
        $hasil = " " . $terbilang[$angka];
    } elseif ($angka < 20) {
        $hasil = terbilang($angka - 10) . " Belas";
    } elseif ($angka < 100) {
        $hasil = terbilang($angka / 10) . " Puluh" . terbilang($angka % 10);
    } elseif ($angka < 200) {
        $hasil = " Seratus" . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        $hasil = terbilang($angka / 100) . " Ratus" . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        $hasil = " Seribu " . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        $hasil = terbilang($angka / 1000) . " Ribu" . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) {
        $hasil = terbilang($angka / 1000000) . " Juta" . terbilang($angka % 1000000);
    } elseif ($angka < 1000000000000) {
        $hasil = terbilang($angka / 1000000000) . " Miliar" . terbilang(fmod($angka, 1000000000));
    } elseif ($angka < 1000000000000000) {
        $hasil = terbilang($angka / 1000000000000) . " Triliun" . terbilang(fmod($angka, 1000000000000));
    }
    return $hasil;   
}
    $angka = $total1;
    $hasil = terbilang($angka);
@endphp
                <td><p id="angka"style="height:30px; width:300px;font-size:30px;" >{{$format_akuntansi}}</p></td>
                <td><p style=" height:30px; font-size:15px; border-radius:20px;">({{$hasil}} Rupiah )</p></td>
            </tr>
        </div>

    <div style="border: 1px solid; border-color:black;" >   
        
        <div style="margin: 10px;" class="row" style="align-item;">
            <form class="form-vertical" method="post" action="{{ route('count-store') }}">
                <table>
                    <tr>
                        <td style="margin-right: 30px;">Tanggal : </td>
                        <td><span id="localDateTime"></span></th>
                    </tr>
                @csrf
                    <tr>
                    <!--form-group untuk fungsi auto hitung jangan di rubah-->
                    <div class="col-md-2">
                           <td> <input type="text"  required placeholder="Nama barang" name="nabar" id="nabar" class="form-control nabar" ></td>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-2">
                           <td> <input type="number" required placeholder="Harga Barang" step="any" min="0" name="price" id="price" class="form-control price" value=""></td>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                           <td> <input type="number" required placeholder="Quantity" step="any" min="0" name="qty" id="qty" class="form-control qty" value=""></td>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-2">
                           <td> <input type="number" required placeholder="Discount %" step="any" min="0" name="disc" id="disc" class="form-control disc" value="0"></td>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-md-2">
                           <td> <input type="text" required placeholder="Total Harga" name="totbar" id="totbar" class="form-control totbar" Readonly value=''></td>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                           <td> <button type="submit"  class="btn btn-primary in" >=></button>
                    </div>
                    </tr>
                </table>
            </form>
        </div>
        

        <div style="margin: 10px;" class="row">
            <div >
            <table class="table  ">
                    <tr align="center" >
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th class="diskon2">Disc</th>
                        <th>Total</th>
                        <th class="acton2">Action</th>
                    </tr>
 @php
    function rupiah($angka){
        $hasil = number_format($angka, '0',',','.');
        return $hasil;
    }
@endphp
                   @foreach($kasir as $kasir) 
                   <tr align="center" >
                        <td>{{ $kasir->nabar}}</td>
                        <td>{{ rupiah($kasir->price)}}</td>
                        <td>{{ $kasir->qty}}</td>
                        <td class="diskon1">{{ $kasir->disc}}</td>
                        <td>{{ rupiah($kasir->totbar)}}</td>
                        <td class="acton1"><a href="/count/delete/{{$kasir->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm" style="display:inline"><i class="fa fa-trash"></i></a>


                    </tr>
                    @endforeach
            </table>
            </div>
            <div>
            </div>
        </div>
        


        <div class="row">
            <div class="col-10">
                    <form class="form-vertical" method="post" action="{{ route('selling') }}">
                    <table>
@php
$user_id = auth()->user()->id;
$koneksi = new mysqli("localhost","root","","kasir");
$data = $koneksi->query("SELECT * FROM  kasir WHERE user_id = $user_id");
$total = 0;
while($tampil = $data->fetch_array()){
    $total += $tampil["totbar"];}
    
@endphp
                    <tr>
                        <div class="form-group">
                            <td><label class="col-lg-3 control-label">Sub Total</label></td>
                            <div class="col-lg-3">
                            <td><input type="text" class="form-control" Readonly value="{{rupiah($total)}}"></td>
                            <td><input type="hidden" step="any"  id="subtotal" name="subtotal"  class="form-control accounting" Readonly value="{{$total}}"></td>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                           <td> <label class="col-lg-3 control-label">Bayar</label></td>
                            <div class="col-lg-3">
                            <td> <input type="number" step="any" min="0" name="paid" id="paid" class="form-control" value=""></td>
                            </div>
                        </div>
                    
                        <div class="form-group">
                           <td> <label class="col-lg-3 control-label">Kembali</label><td>
                            <div class="col-lg-3" style="padiing-right:20px;">
                               <td> <input type="text" name="exchange" id="exchange" class="form-control" Readonly value="0"></td>
                               <td> <input type="hidden" name="id" id="id" class="form-control" Readonly value="1" ></td>
                            </div>
                        </div>
                    </tr>
                    </table>
                    
            </div>

            <div class="col-2" style="align-items: end;">
        
                   <button type="submit" class="btn btn-secondary cetak" onclick="tambahNilai()" style="margin-top: 50px; " href="{{route('count.delete.all')}}" ></button><i class="fa fa-print" style="font-size:30px"></i></a>
              
            </div>
                    </form>
        </div>
    </div>
    </div>

    <div class="col-2">




    </div> 

</body>
</html>
<script type="text/javascript">
 $("#price").keyup(function(){   
   var a = parseFloat($("#price").val());
   var b = parseFloat($("#disc").val());
   var e = parseFloat($("#qty").val());
   var c = (a*b)/100;
   var d = (c*e);
   var f = (a*e)-d;
   $("#totbar").val(f);
 });
 
 $("#disc").keyup(function(){
   var a = parseFloat($("#price").val());
   var b = parseFloat($("#disc").val());
   var e = parseFloat($("#qty").val());
   var c = (a*b)/100;
   var d = (c*e);
   var f = (a*e)-d;
   $("#totbar").val(f);
 });

 $("#qty").keyup(function(){
   var a = parseFloat($("#price").val());
   var b = parseFloat($("#disc").val());
   var e = parseFloat($("#qty").val());
   var c = (a*b)/100;
   var d = (c*e);
   var f = (a*e)-d;
   $("#totbar").val(f);
 });
</script>

<script type="text/javascript">
 $("#subtotal").keyup(function(){   
   var a = parseFloat($("#subtotal").val());
   var b = parseFloat($("#paid").val());
   var c = b-a;
   $("#ecxhange").val(c);
 });
 
 $("#paid").keyup(function(){
   var a = parseFloat($("#subtotal").val());
   var b = parseFloat($("#paid").val());
   var c = b-a;
   $("#exchange").val(c);
 });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
