//ambil elemen2 yang dibutuhkan
var keyword = document.getElementById('keyword');
var containerMapel = document.getElementById('container-mapel');
var mySelect = document.getElementById('my-select');

//tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){

  //buat object ajax
  var xhr = new XMLHttpRequest();

  //cek kesiapan ajax
  xhr.onreadystatechange = function(){

    if(xhr.readyState == 4 && xhr.status == 200){
      containerMapel.innerHTML = xhr.responseText;
      console.log(containerMapel);
    }

  }

  //eksekusi ajax
  xhr.open('GET', 'cari_mapel.php?key=' + keyword.value, true);
  xhr.send();

});
