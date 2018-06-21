const quoteLoc = document.querySelector("#quote");
const authorLoc = document.querySelector("#author");
const quoteBtn = document.querySelector("#buttonDiv");
const body = document.querySelector("body");


printQuote();

$(quoteBtn).click(function() {
    //$("h1").fadeOut(1000);
    //$("h3").fadeOut(1000);
    printQuote();
    changeBackground();
});

function changeBackground() {
    let indexNum = getRandomNum(coloursArr.length);
    body.style.backgroundColor = coloursArr[indexNum];
}

function printQuote() {
    let indexNum = getRandomNum(quotes.length);
    quoteLoc.innerHTML = '"' + quotes[indexNum].quote + '"';
    authorLoc.innerHTML = '- ' + quotes[indexNum].author;
}

function getRandomNum(max) {
    return Math.floor(Math.random() * max);
}