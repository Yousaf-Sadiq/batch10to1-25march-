// logical operators   AND OR NOT
// if statements
// conditional operators

/*
  F            F             F
(5 > 7)  && (7 > 9)  

*/

let age = 21;

if (age >= 18 && age <= 20) {
  console.log("between the 18 and 20 ");
} else {
  console.log("invalid");
}

// Check two given numbers and return true if one of the numbers is 50 or if their sum is 50.
// Check from the given integer, whether it is positive or negative.
// Check whether a given number is even or odd.
// Check whether a given positive number is a multiple of 3.
// Determine whether a given year is a leap year.

let a = 25;
let b = 25;

let sum = a + b;

// =
// ==  value comparing  5 == '5'  T
// === value + data type comparing   5 === '5' F

function checkNumber(q, p) {
  let sum = q + p;
  let output = "";
  if (q == 50 || p == 50) {

   output ="either one of the variable is equal to 50";

  } else if (sum == 50) {
   output="their sum is equal to 50";
   
  } else {
   output="both conditions are failed";
  }


  return output;
}


console.log(checkNumber(25,29));

let q = 0;

if (q > 0) {
  console.log("positive number");
} else if (q == 0) {
  console.log("Neutral number or equal to zero");
} else {
  console.log("negative number");
}

//===================== function ================================
/*
default/normal function with no return
default/normal function with return

parametrize function with no return
parametrize function with  return

arrow function with return 
arrow function with no return 


anonymous function with return 
anonymous function with no return 

*/
let r = 10;

function SUM(q = 0, p = 0) {
  r = 27;
  let a = q;
  let b = p;

  let sum = a + b;

  return sum;
}

console.log(SUM(15, 5));
console.log(r);
