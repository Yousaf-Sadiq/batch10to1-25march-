// arrays 
//       
// Find the last element of an array without giving a hard-coded index.
// Check whether the first or the last index of an array has a specified value, let's say 5.
// Make an array to store the names of students and check whether that array has your own name or
 // not and also return the index of that value.
// Add the array element at the specified index.
// Delete the array element from the specified index.

let b= ["1",2,5,6,89,564];

let a = [6,"abc",4,5,6,7];

// let c = a.concat(b);  concate function 
let c = [...a,...b];  // spread operator

console.log(c);

let value ="abcs";

console.log(a.indexOf(value));
console.log(a.lastIndexOf(value));

let range = (a.length -1 )

let newArray= a.slice(2,6);


// console.log(newArray)

// console.log(a.toString());
// push unshift

// a.shift()
// splice

// a.splice(3,1)
// delete a[3];

console.log(a);

a = 5;

if (Array.isArray(a)) {
 console.log(true)
}
else{
 console.log(false)
}