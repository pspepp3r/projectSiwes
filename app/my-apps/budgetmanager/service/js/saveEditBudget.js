var budSaveBtn = document.querySelector("#bud-save"),
  budLoadBtn = document.querySelector("#bud-load"),
  budJSON = document.querySelector("#bud-json").innerHTML,
  budDelBtn = document.querySelector("#bud-delete");
var modal = document.querySelector(".modal"),
  backdrop = document.querySelector(".backdrop");

budLoadBtn.addEventListener("click", (e) => {
  modal.style.display = "none";
  backdrop.style.display = "none";

  let xhr = new XMLHttpRequest();

  xhr.open("get", "service/php/load.budget.php?file=" + budJSON, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      imported = JSON.parse(xhr.responseText);
      remark.style.display = "block";
      // remark.innerHTML = xhr.responseText;
      remark.innerHTML = imported;

      setBudName = imported.budName;
      bud.innerHTML = imported.budValue;
      cost = 0;
      for (i = 0; i < imported.expenses.length; i++) {
        addToLog(imported.expenses[i].expenseName, imported.expenses[i].expenseValue);
        cost += Number(imported.expenses[i].expenseValue);
      }
      exp.innerHTML = cost;
      bal.innerHTML = bud.innerHTML - exp.innerHTML;

      if (bal.innerHTML > (0.15 * bud.innerHTML)) {
        remark.style.display = "block";
        remark.style.color = "black";
        remark.innerHTML = "Keep going..."
      } else {
        remark.style.display = "block"
        remark.style.color = "red";
        remark.innerHTML = "Alert, recomended cost limit exceeded&excl;";
      }

    }
  }

  xhr.send();

});

budSaveBtn.addEventListener("click", (e) => {
  if (bud.innerHTML == "") {
    remark.style.display = "block";
    remark.innerHTML = "Please put in the required fields";
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

    let xhr = new XMLHttpRequest();

    xhr.open("get", "service/php/save.edit.budget.php?bud=" + exported + "&bname=" + setBudName, true);

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
});

budDelBtn.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();

  xhr.open("get", "service/php/delete.budget.php?file=" + budJSON, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      if (xhr.responseText === "Deleted") {
        remark.innerHTML = "Your budget have been removed!"
        setTimeout(() => {
          location.href = "bud.index.php";
        }, 2000);

      } else {
        remark.innerHTML = xhr.responseText;
      }
    }
  }

  xhr.send();
});
