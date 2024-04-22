// loops
/**
 
for loop 
foreach 

while 
do while 

for in 
for of 

 */

let a = [
  1, 23, 543, 654, 78, 659867, 987, 98, 543, 543, 22434, 32, 423, 42, 42, 4,
  234, 24, 23, 432, 432,
];

let range = a.length - 1;

// start point ; condition/ending point ; increament / decreament
// i = i+1
// i += 2  => i = i + 2
// i++
let div = document.querySelector("#demo");

let output = "";

// for (let i = 0; i <= range; i++) {

//  output += a[i] + "<br>";

// }

// a.forEach(function(t){

// })

let abc = {
  name: "XYZ",
  address: "abc street",
  number: 122134,
  subject: ["PHY","COMP"]
};

for (let key in abc) {
  output = output + `${key} : ${abc[key]}  <br>`;

  // console.log(abc[key]);
}

// a.forEach(function(value){
//  output += value + "<br>";
// });

//546
a = [1, 2, 3, 5, 1, 32, 12];

function sumArray(q) {
  let sum = 0;

  q.forEach(function (value) {
    sum += value;
  });

  return sum;
}

// 2 x 1 = 2
// 2 x 2 = 4
// 2 x 10 = 20

function printTable(number, end = 10) {
  let abc = "";
  // let product=1;
  for (let i = 0; i <= end; i++) {
    //            2     x  0  =  2
    //            2     x  1  =  2
    //            2     x  2  =  4

    let product = number * i;

    //            2     x  3  =  6
    abc += `${number}  x ${i} = ${product} <br>`;
  }

  // let result = [$var1,$var2];
  return abc;
}

// div.innerHTML = printTable(2, 20);

let b = [2, 3, 4, 1, 432, 65556666, 5433, 2345];

for (let selection = 0; selection < b.length; selection++) {
  // console.log(b[selection]);

  let greater = true;

  for (let check = 0; check < b.length; check++) {
    if (selection != check) {
      if (b[selection] < b[check]) {
        greater = false;

        break;
      }
      // console.log(b[check]);
    }
  }

  if (greater) {
    console.log(b[selection]);
  }
}

// Sum all the array elements by using a loop.
// Make a reverse of the array by using a loop.
// Make a table of the given number with all possible loops.
// Find the largest number in an array by using a loop.
// Find the smallest number in an array by using a loop.
// Make an array to store the name of 5 students and iterate with for and foreach loop.
// Make an object to store the information of a student and iterate with a for-in loop.
