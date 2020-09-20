let apiResponse;
let quizlet_link;
let quizlet_title;
let schoolId;
let teacherId;
let classId;
let status_debug = true;

let cards = {
  getCards:function(value) {
    quizlet_link = value;
    btn = document.getElementById("searchbtn")
    btn.classList.add("disabled");
    btn.innerHTML = "Looking..."
    // debugConsoleLog("Getting cards")
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // debugConsoleLog(this.responseText=="}}  ")
        if(this.responseText!="}}  ") {
          // debugConsoleLog("return okay")
          var myObj = JSON.parse(this.responseText);
          apiResponse = myObj;
          // debugConsoleLog(apiResponse)
          // cards.displayCards()
          cards.displayTitle()

          btn.classList.remove("disabled");
          btn.innerHTML = "Search"
        } else {
          btn.classList.remove("disabled");
          btn.innerHTML = "Search"
          // debugConsoleLog("return NOT okay")
        }
      }
    };
    xmlhttp.open("GET", "./api/get.php?url="+value, true);
    xmlhttp.send();
  },
  displayCards:function() {
    for (let property in apiResponse.cards) {
      let tr = document.createElement("tr")
      let td1 = document.createElement("td")
      let td2 = document.createElement("td")
      td1.innerHTML = apiResponse.cards[property].a
      td2.innerHTML = apiResponse.cards[property].q
      tr.appendChild(td1)
      tr.appendChild(td2)
      document.getElementById("preview_table").appendChild(tr)
      // debugConsoleLog(`${property}: ${apiResponse.cards[property].q}`);
    }
  },
  displayTitle:function() {
    let h1 = document.createElement("h1")
    h1.innerHTML = apiResponse.title
    document.getElementById("preview_table").innerHTML = ""
    document.getElementById("preview_table").appendChild(h1)
    document.getElementById("nextbtn").style.display = "initial"
    document.getElementById("nextbtn").innerHTML = "Is this the title of your Quizlet?"
    quizlet_title = apiResponse.title;
  }
}

let classes = {
  getClasses:function(value) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        debugConsoleLog(this.responseText)
        if(this.responseText!="}}  ") {
          debugConsoleLog("return okay")
          var myObj = JSON.parse(this.responseText);
          classesApiResponse = myObj;
          debugConsoleLog(classesApiResponse)
          classes.displayClasses()
          // btn.classList.remove("disabled");
          // btn.innerHTML = "Search"
        } else {
          // btn.classList.remove("disabled");
          // btn.innerHTML = "Search"
          debugConsoleLog("return NOT okay")
        }
      }
    };
    debugConsoleLog("./api/teachers/get.php?school_id="+schoolId+"&name="+value)
    xmlhttp.open("GET", "./api/teachers/get.php?school_id="+schoolId+"&name="+value, true);
    xmlhttp.send();
  },
  displayClasses:function() {
    document.getElementById("classes_display").innerHTML = ""
    let detail = document.createElement("div")
    detail.classList.add("detail")
    let h3 = document.createElement("h3")
    let h5 = document.createElement("h5")
    let a = document.createElement("a")
    a.innerHTML = "add them"
    a.classList.add("col")
    a.classList.add("blue")
    detail.setAttribute("style","cursor:initial;")
    a.href = "javascript:schools.teachers.addTeacher()"
    h3.innerHTML = "Don't see your teacher?"
    h5.innerHTML = "Refine your search terms or "
    h5.appendChild(a)
    detail.appendChild(h3)
    detail.appendChild(h5)
    console.log("appending add")
    document.getElementById("classes_display").appendChild(detail)
    for (let property in classesApiResponse.teachers) {
      let detail = document.createElement("div")
      detail.setAttribute("onclick","schools.teachers.select_teacher(this)")
      let h3 = document.createElement("h3")
      let h5 = document.createElement("h5")
      let span = document.createElement("span")
      span.style.display = "none"
      span.innerHTML = classesApiResponse.teachers[property].id
      h3.innerHTML = classesApiResponse.teachers[property].name
      for (let c in classesApiResponse.teachers[property].subjects) {
        h5.innerHTML += classesApiResponse.teachers[property].subjects[c] + ", "
        // classes.displayCourse(classesApiResponse.teachers[property],c)
      }
      h5.innerHTML = h5.innerHTML.substring(0, h5.innerHTML.length - 1);
      h5.innerHTML = h5.innerHTML.substring(0, h5.innerHTML.length - 1);
      // h5.innerHTML = classesApiResponse.teachers[property].school_id
      detail.classList.add("detail")
      detail.appendChild(h3)
      detail.appendChild(h5)
      detail.appendChild(span)
      document.getElementById("classes_display").appendChild(detail)
      // debugConsoleLog(`${property}: ${apiResponse.cards[property].q}`);
      // debugConsoleLog(schoolApiResponse.schools[property])
    }
    document.getElementById("classes_display").style.display = "block"
  },
  displayCourse:function(c,k) {
    // I SRSLY HAVE NO IDEA WHAT THE HELL THIS FUNCTION DOES BUT EVERYTHING BREAKS WHEN I TAKE IT OUT. SO I LEAVE IT IN.
    let detail = document.createElement("div")
    detail.setAttribute("onclick","classes.select_course(this)")
    detail.classList.add("detail")
    let h3 = document.createElement("h3")
    let h5 = document.createElement("h5")
    let span = document.createElement("span")
    span.style.display = "none"
    span.innerHTML = c
    h3.innerHTML = c
    detail.appendChild(h3);
    detail.appendChild(h5);
    detail.appendChild(span);
    document.getElementById("courses_display").appendChild(detail);
    document.getElementById("courses_display").style.display = "block"
    console.log(detail)
  },
  select_course:function(e) {
    debugConsoleLog(e)
    let actives = document.getElementsByClassName("active")[0]
    if(actives != undefined) {
      actives.classList.remove("blue");
      actives.classList.remove("active");
    }
    e.classList.add("blue")
    e.classList.add("active")
    document.getElementById("nextbtn").style.display = "initial";
    document.getElementById("nextbtn").innerHTML = "Next";

    classId = e.getElementsByTagName("h3")[0].innerHTML;

    // teacherId = parseInt(e.getElementsByTagName("span")[0].innerHTML)
    teacherClasses = e.getElementsByTagName("h5")[0].innerHTML.split(", ")
  },
  addCourse:function() {
    document.getElementById("4").style.display = 'none';
    document.getElementById("addCourse").style.display = "table-cell";
  },
  addCourseStatus:"",
  addCourseM:function(n) {
    console.log(n)
    document.getElementById("nextbtn").style.display = 'none'
    if(n!="") {
      document.getElementById("addCourseBtn").classList.add('disabled');
      let courseName = n;
      courseId = courseName;
      classId = courseName;
      //api/teachers/addclass?tid=21&cnm=
      let link = "api/teachers/addclass.php?tid=" + teacherId + "&cnm=" + courseName;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          debugConsoleLog(this.responseText)
          let courseAddApiResponse = this.responseText.split(",")
          debugConsoleLog(courseAddApiResponse)
          if(courseAddApiResponse[0] == 100) {
            status = "Course added successfully";
            document.getElementById("addCourseStatusReturn").innerHTML = status
          } else if(courseAddApiResponse[0] == 102) {
            status = "Course already exists";
            document.getElementById("addCourseStatusReturn").innerHTML = status
          } else if(courseAddApiResponse[0] == 104) {
            status = "Something went wrong. Please try again later. If the issue persists, please contact us.";
            document.getElementById("addCourseStatusReturn").innerHTML = status
          }
          document.getElementById("nextbtn").innerHTML = "Next"
          document.getElementById("nextbtn").href = "javascript:navigation.nextC()"
          document.getElementById("nextbtn").style.display = 'initial'
        }
      };
      xmlhttp.open("GET", link, true);
      xmlhttp.send();
    } else {
      status = "Your school name or location was empty"
    }
    document.getElementById("addSchoolStatusReturn").innerHTML = status;
  }
}

let schools = {
  searchSchool:function() {
    value = document.getElementById('school_input').value
    loc = document.getElementById("state_input").value + ", " + document.getElementById("country_input").value
    debugConsoleLog(value)
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        debugConsoleLog(this.responseText)
        var myObj = JSON.parse(this.responseText);
        schoolApiResponse = myObj;
        debugConsoleLog(schoolApiResponse)
        // debugConsoleLog(apiResponse)
        // cards.displayCards()
        schools.displaySchools();
      }
    };
    debugConsoleLog("./api/schools/get.php?name="+value+"&loc="+loc)
    xmlhttp.open("GET", "./api/schools/get.php?name="+value+"&loc="+loc, true);
    xmlhttp.send();
  },
  displaySchools:function() {
    document.getElementById("table_display").innerHTML = ""
    let detail = document.createElement("div")
    detail.classList.add("detail")
    let h3 = document.createElement("h3")
    let h5 = document.createElement("h5")
    let a = document.createElement("a")
    a.innerHTML = "add it"
    a.classList.add("col")
    a.classList.add("blue")
    detail.setAttribute("style","cursor:initial;")
    a.href = "javascript:schools.addSchool()"
    h3.innerHTML = "Don't see your school?"
    h5.innerHTML = "Refine your search terms or "
    h5.appendChild(a)
    detail.appendChild(h3)
    detail.appendChild(h5)
    document.getElementById("table_display").appendChild(detail)
    for (let property in schoolApiResponse.schools) {
      let detail = document.createElement("div")
      detail.setAttribute("onclick","select(this)")
      let h3 = document.createElement("h3")
      let h5 = document.createElement("h5")
      let span = document.createElement("span")
      span.style.display = "none"
      span.innerHTML = schoolApiResponse.schools[property].id
      h3.innerHTML = schoolApiResponse.schools[property].name
      h5.innerHTML = schoolApiResponse.schools[property].location
      detail.classList.add("detail")
      detail.appendChild(h3)
      detail.appendChild(h5)
      detail.appendChild(span)
      document.getElementById("table_display").appendChild(detail)
      // debugConsoleLog(`${property}: ${apiResponse.cards[property].q}`);
      // debugConsoleLog(schoolApiResponse.schools[property])
      document.getElementById("table_display").style.display = "block"
    }
    document.getElementById("table_display").style.display = "block"

  },
  addSchool:function() {
    document.getElementById("2").style.display = 'none';
    document.getElementById("addSchool").style.display = "table-cell";
  },
  addSchoolStatus:"",
  addSchoolM: function(n,l,c) {
    document.getElementById("nextbtn").style.display = 'none'
    if(n!=""&&l!="") {
      document.getElementById("addSchoolBtn").classList.add('disabled')
      let schoolName = n;
      let schoolLocation = l + ", " + c;
      let link = "api/schools/add.php?loc=" + schoolLocation + "&name=" + schoolName;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          debugConsoleLog(this.responseText)
          let schoolAddApiResponse = this.responseText.split(",")
          console.log(schoolAddApiResponse)
          if(schoolAddApiResponse[0] == 100) {
            schools.addSchoolStatus = "School added successfully";
            schoolId = schoolAddApiResponse[1]
            document.getElementById("addSchoolStatusReturn").innerHTML = schools.addSchoolStatus
          } else if(schoolAddApiResponse[0] == 102) {
            schools.addSchoolStatus = "School already exists";
            schoolId = schoolAddApiResponse[1]
            document.getElementById("addSchoolStatusReturn").innerHTML = schools.addSchoolStatus
          } else if(schoolAddApiResponse[0] == 104) {
            schools.addSchoolStatus = "Something went wrong. Please try again later. If the issue persists, please contact us.";
            document.getElementById("addSchoolStatusReturn").innerHTML = schools.addSchoolStatus
          }
          document.getElementById("nextbtn").innerHTML = "Next"
          document.getElementById("nextbtn").href = "javascript:navigation.nextSc()"
          document.getElementById("nextbtn").style.display = 'initial'
        }
      };
      xmlhttp.open("GET", link, true);
      xmlhttp.send();
    } else {
      schools.addSchoolStatus = "Your school name or location was empty"
    }
    document.getElementById("addSchoolStatusReturn").innerHTML = schools.addSchoolStatus;
  },
  teachers:{
    select_teacher:function(e) {
      debugConsoleLog(e)
      let actives = document.getElementsByClassName("active")[0]
      if(actives != undefined) {
        actives.classList.remove("blue");
        actives.classList.remove("active");
      }
      e.classList.add("blue")
      e.classList.add("active")
      document.getElementById("nextbtn").style.display = "initial";
      document.getElementById("nextbtn").innerHTML = "Next";

      teacherId = parseInt(e.getElementsByTagName("span")[0].innerHTML)
      teacherClasses = e.getElementsByTagName("h5")[0].innerHTML.split(", ")

      document.getElementById("courses_display").innerHTML = "";
      let detail = document.createElement("div")
      detail.classList.add("detail")
      let h3 = document.createElement("h3")
      let h5 = document.createElement("h5")
      let a = document.createElement("a")
      a.innerHTML = "add them"
      a.classList.add("col")
      a.classList.add("blue")
      detail.setAttribute("style","cursor:initial;")
      a.href = "javascript:classes.addCourse()"
      h3.innerHTML = "Don't see your class?"
      h5.innerHTML = "Refine your search terms or "
      h5.appendChild(a)
      detail.appendChild(h3)
      detail.appendChild(h5)
      document.getElementById("courses_display").appendChild(detail);

      for (let property in teacherClasses) {
        classes.displayCourse(teacherClasses[property])
      }
      document.getElementById("courses_display").style.display = "block"
    },
    addTeacher:function() {
      document.getElementById("3").style.display = 'none';
      document.getElementById("addTeacher").style.display = "table-cell";
    },
    addTeacherStatus:"",
    addTeacherM:function(n) {
      document.getElementById("nextbtn").style.display = 'none'
      if(n!="") {
        document.getElementById("addSchoolBtn").classList.add('disabled');
        let teacherName = n;
        let link = "api/teachers/add.php?loc=" + schoolId + "&name=" + n;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            debugConsoleLog(this.responseText)
            let teacherAddApiResponse = this.responseText.split(",")
            debugConsoleLog(teacherAddApiResponse)
            if(teacherAddApiResponse[0] == 100) {
              status = "Teacher added successfully";
              teacherId = parseInt(teacherAddApiResponse[1])
              document.getElementById("addTeacherStatusReturn").innerHTML = status
            } else if(teacherAddApiResponse[0] == 102) {
              status = "Teacher already exists";
              teacherId = parseInt(teacherAddApiResponse[1])
              document.getElementById("addTeacherStatusReturn").innerHTML = status
            } else if(teacherAddApiResponse[0] == 104) {
              status = "Something went wrong. Please try again later. If the issue persists, please contact us.";
              document.getElementById("addTeacherStatusReturn").innerHTML = status
            }
            document.getElementById("nextbtn").innerHTML = "Next"
            document.getElementById("nextbtn").href = "javascript:navigation.nextS()"
            document.getElementById("nextbtn").style.display = 'initial'
          }
        };
        xmlhttp.open("GET", link, true);
        xmlhttp.send();
      } else {
        status = "Your school name or location was empty"
      }
      document.getElementById("addSchoolStatusReturn").innerHTML = status;
    }
  }
}

let navigation = {
  currentSlide:0,
  next:function() {
    document.getElementById(navigation.currentSlide + 1).style.display = "none"
    document.getElementById(navigation.currentSlide + 2).style.display = "table-cell"
    navigation.currentSlide++
    document.getElementById("nextbtn").style.display="none"
  },
  last:function() {
    document.getElementById(navigation.currentSlide + 1).style.display = "none"
    document.getElementById(navigation.currentSlide).style.display = "table-cell"
    navigation.currentSlide--
    // document.getElementById("nextbtn").style.display="none"
  },
  nextSc:function() {
    document.getElementById("addSchool").style.display = "none";
    document.getElementById("addTeacher").style.display = "table-cell";
    navigation.currentSlide++;
    document.getElementById("nextbtn").style.display = "none";
    // classes.addCourse();
  },
  nextS:function() {
    // document.getElementById("addSchool").style.display = "none";
    document.getElementById("addTeacher").style.display = "none";
    document.getElementById("4").style.display = "table-cell";
    navigation.currentSlide++;
    document.getElementById("nextbtn").style.display = "none";
    classes.addCourse();
  },
  nextC:function() {
    document.getElementById("addCourse").style.display = "none";
    document.getElementById("5").style.display = "table-cell";
    navigation.currentSlide++;
    document.getElementById("nextbtn").style.display = "none";
  }
}


function select(e) {
  debugConsoleLog(e)
  let actives = document.getElementsByClassName("active")[0]
  if(actives != undefined) {
    actives.classList.remove("blue");
    actives.classList.remove("active");
  }
  e.classList.add("blue")
  e.classList.add("active")
  document.getElementById("nextbtn").style.display = "initial";
  document.getElementById("nextbtn").innerHTML = "Next";

  schoolId = parseInt(e.getElementsByTagName("span")[0].innerHTML)
}

function submit() {
  console.log(quizlet_link)
  console.log(schoolId)
  console.log(teacherId)
  console.log(classId)
  let link = "api/add.php?link="+quizlet_link+"&schoolId="+schoolId+"&teacherId="+teacherId+"&classId="+classId+"&title="+quizlet_title;
  console.log(link)
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      debugConsoleLog(this.responseText)
      let submitApiResponse = this.responseText.split(",")
      if(submitApiResponse[0] == 100) {
        status = "Quizlet added successfully";
        document.getElementById("submitStatusReturn").innerHTML = status
        document.location.replace("studysets/"+submitApiResponse[1]+"/index.php")
      } else if(submitApiResponse[0] == 102) {
        status = "Quizlet already exists under the same teacher. If this is a mistake, contact us.";
        document.getElementById("submitStatusReturn").innerHTML = status
      } else if(submitApiResponse[0] == 104) {
        status = "Something went wrong. Please try again later. If the issue persists, please contact us.";
        document.getElementById("submitStatusReturn").innerHTML = status
      }
      // debugConsoleLog(apiResponse)
      // cards.displayCards()
    }
  };
  xmlhttp.open("GET", link, true);
  xmlhttp.send();
}

function debugConsoleLog(s) {
  if(status_debug) {
    console.log(s)
  }
}
