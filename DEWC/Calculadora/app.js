const numberButtons = document.querySelectorAll(".btn-number");
const clearButton = document.querySelector(".btn-clear");
const operationButtons = document.querySelectorAll(".btn-operation");
const deleteButton = document.querySelector(".btn-delete");
const equalButton = document.querySelector(".btn-equals");
const display = document.querySelector(".display");

let firstNumber = "";
let operation = "";
let secondNumber = "";
let result = "";

const numEventKeys = ["1","2","3","4","5","6","7","8","9","0","."];
const operationEventKeys = ["/","*","-","+","%"];
const enterEventKey = ["Enter"];
const backspaceEventKey = ["Backspace"];
const escapeEventKey = ["Escape"];

// Backspace Enter Escape

function onNumberClick(event) {
  const value = event.target.innerHTML;

  if (operation === "") {
    if (firstNumber.length >= 12) {
      return;
    }
    if (value !== "." || !firstNumber.includes(".")) {
      if (value === "." && firstNumber === "") {
        firstNumber = "0";
      }
      firstNumber += value;
    }
  } else {
    if (secondNumber.length >= 12) {
      return;
    }
    if (value !== "." || !secondNumber.includes(".")) {
      if (value === "." && secondNumber === "") {
        secondNumber = "0";
      }
      secondNumber += value;
    }
  }

  updateScreen();
}

function onOperationClick(event) {
  const value = event.target.innerHTML;
  operation = value;
  updateScreen();
}

function resolve() {
  let value1 = Number(firstNumber); // En lugar de poner parseInt, para que acepte double e int
  let value2 = Number(secondNumber);

  switch (operation) {
    case "/":
      result = value1 / value2;
      break;
    case "*":
      result = value1 * value2;
      break;
    case "-":
      result = value1 - value2;
      break;
    case "+":
      result = value1 + value2;
      break;
    case "%":
      result = value1 * (value2 / 100);
      break;
  }

  result = Math.round(result * 100) / 100;
  // result = result.toString().slice(0,14)
  if (errorResult()) {
    return;
  }
  updateScreen();
}

function formatScreen(value) {}

function deleteLastCharacter() {
  if (operation === "") {
    // 0.2
    firstNumber = firstNumber.slice(0, -1);
    // 0.

    if (firstNumber.endsWith('.')) {
      // 0
      firstNumber = firstNumber.slice(0, -1);
    }
  } else {
    secondNumber = secondNumber.slice(0, -1);

    if (secondNumber.endsWith('.')) {
      secondNumber = secondNumber.slice(0, -1);
    }
  }
  updateScreen();
}

function resetStatus() {
  firstNumber = "";
  operation = "";
  secondNumber = "";
  result = "";
  updateScreen();
}

function updateScreen() {
  if (result !== "") {
    display.innerHTML = result;
    return;
  }

  if (operation !== "") {
    display.innerHTML = secondNumber || "0";
    return;
  }
  display.innerHTML = firstNumber || "0";
}

function errorResult() {
  if (result.toString().length >= 16) {
    result = "Error";
    updateScreen();
    return true;
  }
  return false;
}

function detectarTeclasPulsadas(event) {
  const key = event.key;
}

function addEventListeners() {
  document.addEventListener("keydown", (event) => {
    const key = event.key;
  
    if (numEventKeys.includes(key)) {
      onNumberClick({ target: { innerHTML: key } });
    }
  
    if (operationEventKeys.includes(key)) {
      onOperationClick({ target: {innerHTML: key} });
    }
  
    if (enterEventKey.includes(key)) {
      resolve();
    }
  
    if (backspaceEventKey.includes(key)) {
      deleteLastCharacter();
    }
  
    if (escapeEventKey.includes(key)) {
      resetStatus();
    }
  });

  numberButtons.forEach((button) => {
    button.addEventListener("click", onNumberClick);
  });

  operationButtons.forEach((operator) => {
    operator.addEventListener("click", onOperationClick);
  });

  equalButton.addEventListener("click", resolve);

  clearButton.addEventListener("click", resetStatus);

  deleteButton.addEventListener("click", deleteLastCharacter);
}

addEventListeners();
updateScreen();