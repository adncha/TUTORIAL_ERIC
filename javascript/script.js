function done() {
    var password = document.getElementById("pass").value;
    if (password == "motherload") {
        location.href = "/blog/add_new_entry";
        document.getElementById("popup").style.display = "none";
    } else {
        alert("Wrong Password!");
    }
};

function showPopup() {
    document.getElementById("popup").style.display = "block";
};

function hide() {
    document.getElementById("popup").style.display = "none";
};

window.onscroll = function () {
    var a = document.body.scrollTop;
    if (a > "100") {
        document.getElementsByClassName("navbar")[0].style.opacity = "0.6";
        document.getElementsByClassName("navbar-brand")[0].style.color = "tomato";
    }
    else {
        document.getElementsByClassName("navbar")[0].style.opacity = "1";
        document.getElementsByClassName("navbar-brand")[0].style.color = "white";
    }
};

function comment() {
    x = document.getElementsByClassName("leaveComment");
    for (var i=0; i<x.length; i++) {
        x[i].disabled = true;
    }
    var area = document.createElement("textarea");
    area.setAttribute("class", "commentText");
    area.setAttribute("rows", 4);
    area.setAttribute("cols", 30);
    var foo = document.getElementsByClassName("fooBar");
    foo[1].appendChild(area);

    var button = document.createElement("BUTTON");
    button.setAttribute("class", "button");
    button.innerHTML = 'Submit';
    var sub = document.getElementsByClassName("subCom");
    sub[1].appendChild(button);
    var x = document.getElementsByClassName("button");
    x[0].onclick = submit;
};

function submit() {
    x = document.getElementsByClassName("leaveComment");
    var area = document.getElementsByClassName("commentText");
    var parent = document.getElementsByClassName("fooBar");
    parent[1].removeChild(area[0]);

    var button = document.getElementsByClassName("button");
    var sub = document.getElementsByClassName("subCom");
    sub[1].removeChild(button[0]);

    for (var i=0; i<x.length; i++) {
        x[i].disabled = false;
    }
};