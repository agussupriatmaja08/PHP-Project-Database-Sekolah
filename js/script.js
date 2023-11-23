// ambil elemen2 yng dibukuhkan
var keyword = document.getElementById('input');
var cari = document.getElementById('cari');
var container = document.getElementById('container');

 //tambahkan event ketika keyword ditulis

 keyword.addEventListener('keyup', function(){
 	// alert('ok');
    console.log(keyword.value);


    //buat object ajax
    var xhr = new  XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status ==200){
        container.innerHTML = xhr.responseText;
        } 
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/coba.txt', true);
    xhr.send();


 }) ;

    
    