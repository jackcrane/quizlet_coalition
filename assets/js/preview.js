let previewPane = document.getElementsByClassName("preview")[0]

function preview(target) {
  let image = target.getElementsByTagName("img")[0].src
  let title = target.getElementsByTagName("h2")[0].innerHTML
  let tags = target.getElementsByClassName("tags")[0].innerHTML
  let desc = target.getElementsByClassName("desc")[0].innerHTML
  let link = target.getElementsByClassName("link")[0].innerHTML
  let contact = target.getElementsByClassName("email")[0].innerHTML
  let id = target.getElementsByClassName("id")[0].innerHTML

  previewPane.getElementsByTagName("h2")[0].innerHTML = title
  previewPane.getElementsByTagName("img")[0].src = image
  previewPane.getElementsByClassName("desc")[0].innerHTML = desc
  previewPane.getElementsByClassName("link")[0].style.display = "inline-block";
  previewPane.getElementsByClassName("contact")[0].style.display = "inline-block";
  previewPane.getElementsByClassName("edit")[0].style.display = "inline-block";
  previewPane.getElementsByClassName("link")[0].href = link
  previewPane.getElementsByClassName("contact")[0].href = "mailto:"+contact;
  previewPane.getElementsByClassName("edit")[0].href = "edit.php?id="+id;
}
