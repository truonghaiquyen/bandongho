var timer = document.querySelector('#dateOder');
console.log(timer);
function updateTime(params) {
   var d = new Date();
   let hours = d.getHours();
   let minutes = d.getMinutes();
   let seconds = d.getSeconds();
   let day = d.getDate();
   let month = d.getMonth() + 1;
   let year = d.getFullYear();

   hours = hours < 10 ? '0' + hours : hours;
   minutes = minutes < 10 ? '0' + minutes : minutes;
   seconds = seconds < 10 ? '0' + seconds : seconds;
   day = day < 10 ? '0' + day : day;
   month = month < 10 ? '0' + month : month;
   year = year < 10 ? '0' + year : year;
   timer.value = `${hours}h-${minutes}m-${seconds}s  ${day}/${month}/${year}`;
}
setInterval(() => {
   updateTime();
}, 1000);
