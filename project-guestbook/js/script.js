// ambil nama file dari URL
let path = window.location.pathname;

// ambil nama file terakhir
let fileName = path.split("/").pop();

// hapus .html
fileName = fileName.replace(".html", "");

// ubah dash menjadi spasi
fileName = fileName.replace(/-/g, " ");

// kapital huruf awal setiap kata
fileName = fileName.replace(/\b\w/g, char => char.toUpperCase());

// set title
document.title = `${fileName} | My Website`;