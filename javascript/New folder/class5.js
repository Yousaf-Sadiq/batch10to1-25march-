// grand parent
let body = document.querySelector("body");

// parent
// let div = document.createElement("div");
// div.classList.add("d-flex");

// body.prepend(div);

// child
// let h1 = document.createElement("h1");
// h1.innerHTML = "create by js";
// div.appendChild(h1);

let form = document.forms["abc"];

let btn = document.querySelector("#btn");

// let input = form["search"];

let input = document.querySelector("#search");
let error = document.querySelector("#error");

btn.addEventListener("click", function () {
  let value = input.value;

  if (value == "" || value == null || value == undefined) {
    // alert("please fill the field"); backgroundColor
    error.innerHTML = "please fill the field";
    error.style.color = "red";
  } else {
    error.innerHTML = "";
    printInputData(value);
    input.value = "";
  }
});

addElement("div", "", "d-flex");
let div = document.querySelector(".d-flex");

function printInputData(content) {
  let i = 1;


  while (i <= 3) {
    addElement("h1", content, "text", `h1_${i}`, div);

    var h1 = document.querySelector(`#h1_${i}`);

    addElement("button", "x", "remove", `remove_${i}`, h1);

    i++;
  }
}

function addElement(tag, content, classes = null, id = null, WhereTo = null) {
 
  // here we create new tag that we want
  let newTag = document.createElement(tag);
  newTag.innerHTML = content;

  //  agar class add krni hu tu
  if (classes != null) {
    newTag.classList.add(classes);
  }

  //  agar id add krni hu tu
  if (id != null) {
    // newTag.setAttribute("id",id);
    newTag.id = id;
  }

  //  jidhr new tag ko print krna hai
  // agar ismain value ni hogi then yeh body tag main print krdaiga

  if (WhereTo != null) {
    WhereTo.appendChild(newTag);
  } else {
    document.body.prepend(newTag);
  }
}

// div.prepend(h1);

// h1.innerText
// h1.textContent
// h1.createTextNode()
