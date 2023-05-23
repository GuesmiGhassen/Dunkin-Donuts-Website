var coffee=setInterval(counter1,3)
let count1=1;
function counter1(){
count1++;
document.querySelector(".number1").innerHTML=count1;
if (count1==890){
clearInterval(coffee)
}
}
var clients=setInterval(counter2,1)
let count2=1;
function counter2(){
count2++;
document.querySelector(".number2").innerHTML=count2;
if (count2==1090){
clearInterval(clients)
}
}
var stores=setInterval(counter3,100)
let count3=1;
function counter3(){
count3++;
document.querySelector(".number3").innerHTML=count3;
if (count3==20){
clearInterval(stores)
}
}