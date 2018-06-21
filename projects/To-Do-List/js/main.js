const removeName = "Remove";
const upName = "Up";
const downName = "Down";
const importantName = "Important";
const listUl = document.querySelector('ul');
const addItemButton = document.querySelector('button.addItemButton');
const addItemInput = document.querySelector('input.addItemInput');

addItemButton.addEventListener('click', () => {
    let ul = document.getElementsByTagName('ul')[0];
    let li = document.createElement('li');
    li.textContent = addItemInput.value;
    
    li.appendChild(btnCreate(importantName));
    li.appendChild(btnCreate(upName));
    li.appendChild(btnCreate(downName));
    li.appendChild(btnCreate(removeName));
    ul.appendChild(li);
    addItemInput.value = "";
});

function btnCreate(btnName) {
    let tempBtn = document.createElement('button');
    tempBtn.textContent = btnName;
    tempBtn.className = btnName.toLowerCase();

    return tempBtn;
}

listUl.addEventListener('click', (event) => {
    if(event.target.tagName == 'BUTTON'){
        if(event.target.className == importantName.toLowerCase()) {
            let li = event.target.parentNode;
            if(li.style.backgroundColor == 'orange'){
                li.style.backgroundColor = 'white';
                li.style.color = 'black';
            } else {
                li.style.backgroundColor = 'orange';
                li.style.color = 'white';
            }
        }
        if(event.target.className == upName.toLowerCase()) {
            let li = event.target.parentNode;
            let prevLi = li.previousElementSibling;
            let ul = li.parentNode;
            if(prevLi) {
                ul.insertBefore(li, prevLi);
            }
        }
        if(event.target.className == downName.toLowerCase()){
            let li = event.target.parentNode;
            let nextLi = li.nextElementSibling;
            let ul = li.parentNode;
            if(nextLi) {
                ul.insertBefore(nextLi, li);
            }
        }
        if(event.target.className == removeName.toLowerCase()) {
            let li = event.target.parentNode;
            let ul = li.parentNode;
            ul.removeChild(li);
        }
    }

});