
let btn = document.querySelector("#btn");
let search = document.querySelector("#search");

btn.addEventListener("click",function(){
 APICall()
})


async function APICall() {
  let apiKey = "43a4ae518fe69003563bee12073d451e";
  let locations =search.value ;

  let url = `https://api.openweathermap.org/data/2.5/weather?q=${locations}&APPID=${apiKey}`;

  let response = await fetch(url);

  let data = await response.json();
  console.log(data);
  console.log(data.weather[0].description);
  console.log(data.coord.lat);
if (data.weather[0].main == "Clouds") {
 img.src="https://images.unsplash.com/photo-1500740516770-92bd004b996e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZGFyayUyMGNsb3VkeSUyMHNreXxlbnwwfHwwfHx8MA%3D%3D"
}

  let output = "";
  for (const key in data) {
    // output += data[key] +"<br>";

    if (typeof data[key] == "object") {
      for (const childKey in data[key]) {
        if (typeof data[key][childKey] == "object") {
          for (const subChildKey in data[key][childKey]) {
            output += `${key} => ${childKey} => ${subChildKey} : ${data[key][childKey][subChildKey]} <br>`;
          }
        } else {
          output += `${key} => ${childKey} : ${data[key][childKey]} <br>`;
        }
      }
    } else {
      output += `${key} : ${data[key]} <br>`;
    }
  }

  result.innerHTML=output;
}
