function search(v) {
  if(v!="") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('results').innerHTML = "No results"
        if(this.responseText!="No results") {
          // debugConsoleLog("return okay")
          var myObj = JSON.parse(this.responseText);
          searchResponse = myObj;
          // console.log(searchResponse)
          document.getElementById('results').innerHTML = ""
          for (let property in searchResponse.results) {
            console.log(searchResponse.results[property].subject)
            let parent = document.createElement("div")
            parent.classList.add("queryResult")
            let title = document.createElement("h1")
            title.innerHTML = searchResponse.results[property].title
            let subtitle = document.createElement("h5")
            subtitle.innerHTML = searchResponse.results[property].link
            let link = document.createElement("a")
            link.classList.add("btn","blue")
            link.href="studysets/"+searchResponse.results[property].id+"/index.php"
            link.innerHTML = "Get Quizlet";
            parent.appendChild(title)
            parent.appendChild(subtitle)
            parent.appendChild(link)

            document.getElementById("results").appendChild(parent)
            // let tr = document.createElement("tr")
            // let td1 = document.createElement("td")
            // let td2 = document.createElement("td")
            // td1.innerHTML = apiResponse.cards[property].a
            // td2.innerHTML = apiResponse.cards[property].q
            // tr.appendChild(td1)
            // tr.appendChild(td2)
            // document.getElementById("preview_table").appendChild(tr)
            // debugConsoleLog(`${property}: ${apiResponse.cards[property].q}`);
          }


        } else {
        }
      }
    };
    xmlhttp.open("GET", "./api/search.php?query="+v, true);
    xmlhttp.send();
  } else {
    document.getElementById('results').innerHTML = "No results"
  }
}
