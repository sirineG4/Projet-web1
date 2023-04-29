"use strict";

const statusDisplay = document.getElementById("status");
const countField = document.getElementById("numberTurns");
const startBox = document.getElementById("startBox");
const playField = document.getElementById("field");
const player1_name = document.getElementById("player1_name");
const player2_name = document.getElementById("player2_name");
const player1 = document.getElementById("player1");
const player2 = document.getElementById("player2");
const gameWrapper = document.getElementById("game-wrapper");
const modeSelection = document.getElementById("mode-selection");
const computerGame = document.getElementById("g");

let gameActive = true;
let currentPlayer = "X";
let gameState = [];
let cols,
  rows,
  steps,
  counter = 0;
let gameMode = 0;

const winnMessage = () => `${currentPlayer} has won!`;
const nobodyWinsMessage = () => `it's a draw!`;

onload = () => {
  gameWrapper.className = "hidden";
  computerGame.style.display = "none";
};

// ----------------------------------  START GAME

let checkInput = (input) => {
  input = +input;
  input = input < 3 ? 3 : input > 10 ? 10 : input;
  return input;
};

let createMatrix = () => {
  let arr;
  for (let i = 0; i < 10; i++) {
    arr = [];
    for (let j = 0; j < 10; j++) {
      arr[j] = 0;
    }
    gameState[i] = arr;
  }
  console.log(gameState);
};
let drawField = () => {
  let cellSize = (window.innerHeight * 0.5) / cols;
  let box = document.createElement("div");
  box.setAttribute("id", "container");

  let cell, row;
  for (let i = 0; i < rows; i++) {
    row = document.createElement("div");
    row.className = "row";
    for (let j = 0; j < cols; j++) {
      cell = document.createElement("div");
      cell.setAttribute("id", `${i}_${j}`);
      cell.className = "cell";
      cell.style.width =
        cell.style.height =
        cell.style.lineHeight =
          `${cellSize}px`;
      cell.style.fontSize = `${cellSize / 16}em`;
      row.appendChild(cell);
    }
    box.appendChild(row);
  }
  playField.appendChild(box);
};

let handleStart = () => {
  if (gameMode == 2) {
    playField.className = "hidden";
    computerGame.style.display = "block";
    startBox.className = "hidden";
    playField.className = "hidden";
    cols = checkInput(document.getElementById("columns").value);
    rows = checkInput(document.getElementById("rows").value);
    steps = checkInput(document.getElementById("steps").value);

    runGame();
  } else {
    player1.innerHTML =
      player1_name.value === "" ? "Player 'X'" : player1_name.value;
    player2.innerHTML =
      player2_name.value === "" ? "Player 'O'" : player2_name.value;
    cols = checkInput(document.getElementById("columns").value);
    rows = checkInput(document.getElementById("rows").value);
    steps = checkInput(document.getElementById("steps").value);
    createMatrix();
    drawField();
    startBox.className = "hidden";
    handlePlayerSwitch();
    document
      .querySelectorAll(".cell")
      .forEach((cell) => cell.addEventListener("click", handleClick));
  }
};

// ---------------------------------- WINNER ALGORITHM

let isWinning = (y, x) => {
  let winner = currentPlayer === "X" ? 1 : 2,
    length = steps * 2 - 1,
    radius = steps - 1,
    countWinnMoves,
    winnCoordinates;

  // horizontal
  countWinnMoves = 0;
  winnCoordinates = [];
  for (let i = y, j = x - radius, k = 0; k < length; k++, j++) {
    if (
      i >= 0 &&
      i < rows &&
      j >= 0 &&
      j < cols &&
      gameState[i][j] === winner &&
      gameActive
    ) {
      winnCoordinates[countWinnMoves++] = [i, j];
      if (countWinnMoves === steps) {
        winnActions(winnCoordinates);
        return;
      }
    } else {
      countWinnMoves = 0;
      winnCoordinates = [];
    }
  }

  // vertical
  countWinnMoves = 0;
  winnCoordinates = [];
  for (let i = y - radius, j = x, k = 0; k < length; k++, i++) {
    if (
      i >= 0 &&
      i < rows &&
      j >= 0 &&
      j < cols &&
      gameState[i][j] === winner &&
      gameActive
    ) {
      winnCoordinates[countWinnMoves++] = [i, j];
      if (countWinnMoves === steps) {
        winnActions(winnCoordinates);
        return;
      }
    } else {
      countWinnMoves = 0;
      winnCoordinates = [];
    }
  }

  // oblique to the right
  countWinnMoves = 0;
  winnCoordinates = [];
  for (let i = y - radius, j = x - radius, k = 0; k < length; k++, i++, j++) {
    if (
      i >= 0 &&
      i < rows &&
      j >= 0 &&
      j < cols &&
      gameState[i][j] === winner &&
      gameActive
    ) {
      winnCoordinates[countWinnMoves++] = [i, j];
      if (countWinnMoves === steps) {
        winnActions(winnCoordinates);
        return;
      }
    } else {
      countWinnMoves = 0;
      winnCoordinates = [];
    }
  }

  // oblique to the left
  countWinnMoves = 0;
  winnCoordinates = [];
  for (let i = y - radius, j = x + radius, k = 0; k < length; k++, i++, j--) {
    if (
      i >= 0 &&
      i < rows &&
      j >= 0 &&
      j < cols &&
      gameState[i][j] === winner &&
      gameActive
    ) {
      winnCoordinates[countWinnMoves++] = [i, j];
      if (countWinnMoves === steps) {
        winnActions(winnCoordinates);
        return;
      }
    } else {
      countWinnMoves = 0;
      winnCoordinates = [];
    }
  }
};

// ----------------------------------  GAME ONGOING

let handlePlayerSwitch = () => {
  if (currentPlayer === "X") {
    player1.style.background = "#8458B3";
    player2.style.background = "#d0bdf4";
  } else {
    player1.style.background = "#d0bdf4";
    player2.style.background = "#8458B3";
  }
};

let isMovesLeft = () => {
  if (counter === cols * rows) {
    statusDisplay.innerHTML = nobodyWinsMessage();
    gameActive = false;
  }
};

let handleClick = (event) => {
  let clickedIndex = event.target.getAttribute("id").split("_");
  let i = +clickedIndex[0];
  let j = +clickedIndex[1];

  if (gameState[i][j] !== 0 || !gameActive) return;

  gameState[i][j] = currentPlayer === "X" ? 1 : 2;
  event.target.innerHTML = currentPlayer;
  countField.innerHTML = `${++counter}`;

  isWinning(i, j);
  isMovesLeft();
  currentPlayer = currentPlayer === "X" ? "O" : "X";
  handlePlayerSwitch();

  // console.log(gameState)
};

// ----------------------------------  SHOW WINNING RESULTS

function winnActions(winner) {
  console.log(winner);

  gameActive = false;
  statusDisplay.innerHTML = winnMessage();
  statusDisplay.style.color = "#139de2";

  let cell;
  for (let i = 0; i < winner.length; i++) {
    cell = document.getElementById(`${winner[i][0]}_${winner[i][1]}`);
    cell.style.color = "#139de2";
  }
}

// ----------------------------------  RESET GAME
let handlePlayAgain = () => {
  computerGame.style.display = "none";
  gameActive = true;
  currentPlayer = "X";
  counter = 0;
  countField.innerHTML = "0";
  statusDisplay.innerHTML = "";
  statusDisplay.style.color = "black";
  player1.style.background = player2.style.background = "#d0bdf4";
  playField.removeChild(document.getElementById("container"));
  handleStart();
};

let handleRestart = () => {
  computerGame.style.display = "none";
  gameActive = true;
  currentPlayer = "X";
  counter = 0;
  countField.innerHTML = "0";
  statusDisplay.innerHTML = "";
  statusDisplay.style.color = "black";
  player1.style.background = player2.style.background = "#d0bdf4";
  player1_name.value = player2_name.value = "";
  player1.innerHTML = player2.innerHTML = "-";
  startBox.className = "sidebar";
  playField.removeChild(documecontainernt.getElementById(""));
};

let handlePlayWithComputer = () => {
  gameMode = 2;
  displayGameParams();
};
let displayGameParams = () => {
  modeSelection.className = "hidden";
  gameWrapper.className = "game-wrapper";
  params.className = "sidebar";
  field.className = "sidebar";
};

let handlePlayWithFriend = () => {
  gameMode = 1;
  displayGameParams();
};

document.querySelector("#start").addEventListener("click", handleStart);
document.querySelector("#playAgain").addEventListener("click", handlePlayAgain);
document.querySelector("#restart").addEventListener("click", handleRestart);
document
  .querySelector("#play-with-computer")
  .addEventListener("click", handlePlayWithComputer);
document
  .querySelector("#play-with-friend")
  .addEventListener("click", handlePlayWithFriend);

var empty = 0,
  you = 1,
  ai = -1;

const runGame = () => {
  var field = [];
  var table = document.getElementById("t");
  for (let y = 0; y < rows; y++) {
    var tr = document.createElement("tr");
    table.appendChild(tr);
    var row = [];
    field.push(row);
    for (let x = 0; x < cols; x++) {
      var td = document.createElement("td");
      td.classList.add("cell2");
      td.onclick = playerMove(field, x, y);
      tr.appendChild(td);
      row.push({ value: empty, element: td });
    }
  }
};

const playerMove = (field, x, y) => () => {
  if (!move(field, x, y, you)) return;
  wins(field, you) ? gameOver("You won!") : aiMove(field);
};

const move = (field, x, y, who) => {
  var e = field[y][x];
  if (e.value !== empty) return false;
  e.value = who;
  e.element.innerHTML = who === you ? "X" : "O";
  return true;
};

function gameOver(msg) {
  setTimeout(function () {
    alert(msg);
    window.location.reload();
  }, 100);
}

const wins = (f, player) => {
  const lineWins = (x, y, dx, dy) => {
    var a = f[y][x].value,
      b = f[y + dy][x + dx].value,
      c = f[y + 2 * dy][x + 2 * dx].value;
    return a === b && b === c && a === player;
  };
  for (let i = 0; i < 3; i++) {
    if (lineWins(0, i, 1, 0) || lineWins(i, 0, 0, 1)) return true;
  }
  return lineWins(0, 0, 1, 1) || lineWins(2, 0, -1, 1);
};

const validMoves = (field) => {
  var moves = [];
  for (let y = 0; y < 3; y++) {
    for (let x = 0; x < 3; x++) {
      if (field[y][x].value === empty) moves.push({ x: x, y: y });
    }
  }
  return moves;
};

const findRandomMove = (field) => {
  var moves = validMoves(field);
  if (moves.length === 0) return null;
  return moves[Math.floor(Math.random() * moves.length)];
};
const findBestMove = (field, player) => {
  if (wins(field, player)) return { score: player };
  if (wins(field, -player)) return { score: -player };
  var moves = validMoves(field);
  if (moves.length === 0) return { score: 0 };
  var res = [];
  for (let i = 0; i < moves.length; i++) {
    var m = moves[i];
    var e = field[m.y][m.x];
    e.value = player;
    var r = findBestMove(field, -player);
    r.move = m;
    res.push(r);
    e.value = empty;
  }

  res.sort((a, b) => (b.score - a.score) * player);
  return res[0];
};
const aiMove = (field) => {
  //  const m = findRandomMove(field);
  var m = findBestMove(field, ai).move;
  if (!m) {
    gameOver("Draw!");
    return;
  }
  move(field, m.x, m.y, ai);
  wins(field, ai) && gameOver("Computer won!");
};
