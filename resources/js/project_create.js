console.log('project_create loaded');

load_script();

function load_script(){
    loadStatusLoader();
    loadPriorityLoader();

    // delete this
    const id = document.getElementById('createdByField');
    console.log("id : " + id.value);
}

function loadStatusLoader(){
    const btnOptNotStarted = document.getElementById('optNotStarted');
    const btnOptOngoing = document.getElementById('optOngoing');

    var statusField = document.getElementById('statusField');

    btnOptNotStarted.addEventListener('click', function() {
        setNotStarted(this, btnOptOngoing);
    });
    btnOptOngoing.addEventListener('click', function() {
        setOngoing(this, btnOptNotStarted);
    });

    console.log('Status : ' + statusField.values);
}

function loadPriorityLoader(){
    const btnOptLow = document.getElementById('optLow');
    const btnOptMed = document.getElementById('optMedium');
    const btnOptHigh = document.getElementById('optHigh');
    const btnOptCritical = document.getElementById('optCritical');
    const btnOptUrgent = document.getElementById('optUrgent');

    var priorityField = document.getElementById('priorityField');

    btnOptLow.addEventListener('click', function(){
        setLow(this, btnOptMed, btnOptHigh, btnOptCritical, btnOptUrgent);
    });
    btnOptMed.addEventListener('click', function(){
        setMedium(this, btnOptLow, btnOptHigh, btnOptCritical, btnOptUrgent);
    });
    btnOptHigh.addEventListener('click', function(){
        setHigh(this, btnOptLow, btnOptMed, btnOptCritical, btnOptUrgent);
    });
    btnOptCritical.addEventListener('click', function(){
        setCritical(this, btnOptLow, btnOptMed, btnOptHigh, btnOptUrgent);
    });
    btnOptUrgent.addEventListener('click', function(){
        setUrgent(this, btnOptLow, btnOptMed, btnOptHigh, btnOptCritical);
    });
    console.log('Prority: ' + priorityField.values);
}


// project status
function setNotStarted(btn, btnOptOngoing){
    statusField.value = "not started";
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnOptOngoing.removeAttribute('style');
    console.log('Status : ' + statusField.value);
}

function setOngoing(btn, btnOptNotStarted){
    statusField.value = "in_progress";
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnOptNotStarted.removeAttribute('style');
    console.log('Status : ' + statusField.value);
}


// project priority
function setLow(btn, btnMed, btnHi, btnCri, btnUrg){
    priorityField.value = 1;
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnMed.removeAttribute('style');
    btnHi.removeAttribute('style');
    btnCri.removeAttribute('style');
    btnUrg.removeAttribute('style');
    console.log('Prority: ' + priorityField.value);
}
function setMedium(btn, btnLo, btnHi, btnCri, btnUrg){
    priorityField.value = 2;
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnLo.removeAttribute('style');
    btnHi.removeAttribute('style');
    btnCri.removeAttribute('style');
    btnUrg.removeAttribute('style');
    console.log('Prority: ' + priorityField.value);
}
function setHigh(btn, btnLo, btnMed, btnCri, btnUrg){
    priorityField.value = 3;
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnLo.removeAttribute('style');
    btnMed.removeAttribute('style');
    btnCri.removeAttribute('style');
    btnUrg.removeAttribute('style');
    console.log('Prority: ' + priorityField.value);
}
function setCritical(btn, btnLo, btnMed, btnHi, btnUrg){
    priorityField.value = 4;
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnMed.removeAttribute('style');
    btnHi.removeAttribute('style');
    btnLo.removeAttribute('style');
    btnUrg.removeAttribute('style');
    console.log('Prority: ' + priorityField.value);
}
function setUrgent(btn, btnLo, btnMed, btnHi, btnCri){
    priorityField.value = 5;
    btn.style.backgroundColor = 'grey';
    btn.style.color = 'white';

    btnMed.removeAttribute('style');
    btnHi.removeAttribute('style');
    btnCri.removeAttribute('style');
    btnLo.removeAttribute('style');
    console.log('Prority: ' + priorityField.values);

}

