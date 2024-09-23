var budgetValue = document.getElementById("budget-value"),
  expenseName = document.getElementById("expense-name"),
  expenseValue = document.getElementById("expense-value"),
  bud = document.getElementById("bud"),
  exp = document.getElementById("exp"),
  bal = document.getElementById("bal"),
  deactivate = document.getElementById("deactivate"),
  remark = document.getElementById("remark"),
  contentX = document.getElementById("content-x"),
  sum = 0;

function saveExpense() {
  if (expenseName.value == "" && expenseValue.value == "") {
    remark.style.display = "block";
    remark.style.color = "red";
    remark.innerHTML = "Please type in what you have to spend on";
  } else {
    sum += Number(expenseValue.value);
    exp.innerHTML = sum;
    bal.innerHTML = bud.innerHTML - exp.innerHTML;

    addToLog(expenseName.value, expenseValue.value);

    expenseValue.value = "";
    expenseName.value = "";

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
function addToLog(expense, cost) {
    var newExpense = document.createElement("p"),
      newCost = document.createElement("p"),
      content = document.createElement("div"),
      expenseText = document.createTextNode(expense),
      costText = document.createTextNode(cost);

    newExpense.appendChild(expenseText);
    newCost.appendChild(costText);

    newCost.style.width = "25%";
    newCost.style.margin = "0 auto";
    newExpense.style.margin = "0 auto";
    newExpense.style.width = "25%";

    content.appendChild(newExpense);
    content.appendChild(newCost);
    contentX.appendChild(content);

    content.style.display = "flex";
    content.style.width = "95%";
    content.style.marginLeft = "5px";
}
