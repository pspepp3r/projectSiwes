var budSaveBtn = document.querySelector("#bud-save"),
  budLoadBtn = document.querySelector("#bud-load");
var budName = document.querySelector("#bud-name"),
  budBtn = document.querySelector("#bud-name-btn"),
  modal = document.querySelector(".modal"),
  backdrop = document.querySelector(".backdrop");

budBtn.addEventListener("click", () => {
  if (!(budName.value == "")) {
    setBudName = budName.value;
    modal.style.display = "none";
    backdrop.style.display = "none";
    // console.log(setBudName);
  } else {
    console.log("invalid");
  }
});

budSaveBtn.addEventListener("click", (e) => {
  if (bud.innerHTML == " --") {
    remark.style.display = "block";
    remark.innerHTML = "Please fill all required fields";
  } else {

    newBudget = {
      "budName": setBudName,
      "budValue": bud.innerHTML,
      "expenses": [
        //{ "expenseName": "", "expenseValue": ""}, etc
      ]
    }

    for (i = 0; i < contentX.children.length; i++) {
      newBudget.expenses.push({
        "expenseName": contentX.children[i].children[0].innerHTML,
        "expenseValue": contentX.children[i].children[1].innerHTML
      });
    }

    exported = JSON.stringify(newBudget);

    var xhr = new XMLHttpRequest();

    xhr.open("get", "service/php/save.budget.php?bud=" + exported + "&bname=" + setBudName, true);

    xhr.onload = () => {
      if (xhr.status == 200) {
        if (xhr.responseText === "Saved") {
          remark.innerHTML = "Your budget have been saved!"
          setTimeout(() => {
            location.href = "bud.index.php";  
          }, 2000);
          
        } else {
          remark.innerHTML = xhr.responseText;
        }
      }
    }

    xhr.send();
  }
})
