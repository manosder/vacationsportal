
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("datefrom")[0].setAttribute('min', today);
document.getElementsByName("dateto")[0].setAttribute('min', today);
