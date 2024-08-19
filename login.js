document.getElementById("login-btn").addEventListener("click", () => {

    let emailpattern = /[a-zA-z\d]+@+[a-z]+.+[a-z]{2,3}/g

    let passwordpattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/g

    let email = document.getElementById("form2Example1").value.match(emailpattern)

    let pass = document.getElementById("form2Example2").value.match(passwordpattern)

    if (email && pass) {
        window.location.href = "index.html"
        document.getElementById("msg").innerText = ""
        document.getElementById("passerror").innerText = ""
        document.getElementById("emailerror").innerText = ""
        document.getElementById("form2Example1").style.border = ""
        document.getElementById("form2Example2").style.border = ""
    }
    else if (!email && pass) {
        document.getElementById("emailerror").innerText = "incorrect email"
        document.getElementById("passerror").innerText = ""
        document.getElementById("msg").innerText = ""
        document.getElementById("form2Example1").style.border = "2px solid red"
        document.getElementById("form2Example2").style.border = "2px solid black"
    }
    else if (email && !pass) {
        document.getElementById("passerror").innerText = "incorrect pass"
        document.getElementById("emailerror").innerText = ""
        document.getElementById("msg").innerText = ""
        document.getElementById("form2Example2").style.border = "2px solid red"
        document.getElementById("form2Example1").style.border = "2px solid black"
    }
    else if (document.getElementById("form2Example1").value == "" && document.getElementById("form2Example2").value == "") {
        document.getElementById("msg").innerText = "please fill out this fields"
        document.getElementById("passerror").innerText = ""
        document.getElementById("emailerror").innerText = ""
        document.getElementById("form2Example1").style.border = ""
        document.getElementById("form2Example2").style.border = ""
    }
    else if (!email && !pass) {
        document.getElementById("msg").innerText = "incorrect Email or Password"
        document.getElementById("passerror").innerText = ""
        document.getElementById("emailerror").innerText = ""
        document.getElementById("form2Example1").style.border = "2px solid red"
        document.getElementById("form2Example2").style.border = "2px solid red"

    }

    else {
        alert("error")
    }
})


