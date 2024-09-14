let cbinap = document.getElementById("cpenginapan"); 
let cbtransport = document.getElementById("ctransportasi"); 
let cbmakan = document.getElementById("cmakan"); 
let tjumhari = document.getElementById("tjumhari"); 
let tjumpeserta = document.getElementById("tjumpeserta"); 
let tharga = document.getElementById("tharga"); 
let ttagihan = document.getElementById("ttagihan"); 

tjumhari.addEventListener("change", function () {
  let harga = Number(tharga.value);
  let tagihan = harga * Number(tjumhari.value) * Number(tjumpeserta.value); 
  ttagihan.value = tagihan;
});

tjumpeserta.addEventListener("change", function () {
  let harga = Number(tharga.value);
  let tagihan = harga * Number(tjumhari.value) * Number(tjumpeserta.value); 
  ttagihan.value = tagihan;
});

cbinap.addEventListener("change", function () {
  let harga = Number(tharga.value);
  if (this.checked) {
    harga = harga + 1000000;
  } else {
    harga = harga - 1000000;
  }
  tharga.value = harga;
  
  let tagihan = harga * Number(tjumhari.value) * Number(tjumpeserta.value); 
  ttagihan.value = tagihan;
});

cbtransport.addEventListener("change", function () {
  let harga = Number(tharga.value);
  if (this.checked) {
    harga = harga + 1200000;
  } else {
    harga = harga - 1200000;
  }
  tharga.value = harga;
  
  let tagihan = harga * Number(tjumhari.value) * Number(tjumpeserta.value); 
  ttagihan.value = tagihan;
});

cbmakan.addEventListener("change", function () {
  let harga = Number(tharga.value);
  if (this.checked) {
    harga = harga + 500000;
  } else {
    harga = harga - 500000;
  }
  tharga.value = harga;
  
  let tagihan = harga * Number(tjumhari.value) * Number(tjumpeserta.value); 
  ttagihan.value = tagihan;
});