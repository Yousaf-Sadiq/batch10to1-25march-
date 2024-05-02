let todo = document.querySelector("#todo");
let error = document.querySelector("#error");

if (localStorage.getItem("todo")) {
 // localStorage.removeItem("todo");

  todo.innerHTML = localStorage.getItem("todo");

  let button = document.querySelector("#btn");

  button.onclick = () => {
   addTask();
   remove();
   AddLineThrough();
 };

 
  remove();
  AddLineThrough();
} else {
  // ------create input tag
  let input = document.createElement("input");
  input.type = "text";
  input.id = "search";

  // insert into specific div

  todo.appendChild(input);
  // ------create button tag
  let button = document.createElement("button");
  button.type = "button";
  button.id = "btn";
  button.onclick = () => {
    addTask();
    remove();
    AddLineThrough();
  };
  button.innerHTML = "ADD TASK";

  input.after(button);

  // =====================================

  let div = document.createElement("div");
  // div.classList.add("d-flex");
  div.id = "list";
  todo.appendChild(div);

  // ===================================

  let listDiv = document.querySelector("#list");

  let ol = document.createElement("ol");
  ol.id = "ol_tag";

  listDiv.appendChild(ol);
}

// =======================================
function remove() {
  let allRemoveBtn = document.querySelectorAll(".remove");

  console.log(allRemoveBtn);

  for (let index = 0; index < allRemoveBtn.length; index++) {
    allRemoveBtn[index].onclick = () => {
      let currentBTN = allRemoveBtn[index];
      // console.log(allRemoveBtn[index]);
      let parentELement = currentBTN.parentElement.parentElement;

      parentELement.style.transition = "all 0.75s ease-in-out";
      parentELement.style.backgroundColor = "red";
      parentELement.style.color = "white";
      parentELement.style.fontWeight = "bolder";

      setTimeout(function () {
        parentELement.style.opacity = "0";

        setTimeout(function () {
          parentELement.remove();
          save_todo();
        }, 1000);
      }, 1000);
    };
  }

  // allRemoveBtn.forEach((btn) => {
  //   btn.addEventListener("click", function () {

  //   });

  // });
}

function AddLineThrough() {
  let addLine = document.querySelectorAll(".addLine");

  console.log(addLine);

  for (let index = 0; index < addLine.length; index++) {
    addLine[index].onclick = () => {
      let currentSpanTag = addLine[index];
      // console.log(currentSpanTag);
      currentSpanTag.classList.toggle("strikeThrough");
      save_todo();
     };
  }
  

  // allRemoveBtn.forEach((btn) => {
  //   btn.addEventListener("click", function () {

  //   });

  // });
}

function addTask() {
 let input = document.querySelector("#search")

  let Inputvalue = input.value;

  if (Inputvalue == "" || Inputvalue == undefined || Inputvalue == null) {
    error.innerHTML = "Please Fill the field";
  } else {
    error.innerHTML = "";

    let li = document.createElement("li");
    li.classList.add("d-flex");
    let ol_tag = document.querySelector("#ol_tag");

    ol_tag.appendChild(li);

    let span = document.createElement("span");
    span.classList.add("addLine");
    span.innerHTML = Inputvalue;

    li.appendChild(span);

    let span2 = document.createElement("span");
    span2.innerHTML = "<button class='remove'  >X</button>";

    span.after(span2);

    input.value = "";

    save_todo();
  }
}

function save_todo() {
  let currentHTml = todo.innerHTML;
  // console.log(currentHTml)
  localStorage.setItem("todo", currentHTml);
}
