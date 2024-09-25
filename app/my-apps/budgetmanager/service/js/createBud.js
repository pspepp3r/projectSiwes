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

function setBudget() {
    if (budgetValue.value == "") {
        remark.style.display = "block";
        remark.style.color = "red";
        remark.innerHTML = "Please type in how much you've got";
    } else {
        remark.style.display = "none";
        bud.innerHTML = budgetValue.value;
        budgetValue.value = ""
        deactivate.style.display = "none";
    }
}

function saveExpense() {
    if (expenseName.value == "" && expenseValue.value == "") {
        remark.style.display = "block";
        remark.style.color = "red";
        remark.innerHTML = "Please type in what you have to spend on";
    } else if (isNaN(bud.innerHTML)) {
        remark.style.display = "block"
        remark.innerHTML = "Budget is required";
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
            remark.innerHTML = "Alert, recommended cost limit exceeded&excl;";
        }
    }
}

/**
 * Logs expense name and expense cost
 * @param {string} expense 
 * @param {number} cost 
 * @returns void
 */
function addToLog(expense, cost) {
    if (isNaN(bud.innerHTML)) {
        remark.style.display = "block"
        remark.innerHTML = "Budget is required";
    } else {
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
}

// This has nothing to do with the math, just naming the budget
//defining variables


