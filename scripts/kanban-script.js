// PRIORITIES
const PRIORITY_HIGH = 'HIGH';
const PRIORITY_MEDIUM = 'MEDIUM';
const PRIORITY_LOW = 'LOW';

// STATUS
const TYPE_TODO = 'TODO';
const TYPE_INPROGRESS = 'INPROGRESS';
const TYPE_DONE = 'DONE';

// TITLES
const kanbanColumns = [
    { title: "TO DO", count: 0 },
    { title: "IN PROGRESS", count: 0 },
    { title: "IN TESTING", count: 0 },
    { title: "REVIEW", count: 0 },
    { title: "DONE", count: 0 }
];

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drop(ev) {
    console.log("drop", ev)
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");

    // Check if the target has the class 'kanban-block'. If not, find its closest parent with that class.
    var dropTarget = ev.target.classList.contains('kanban-block') ? ev.target : ev.target.closest('.kanban-block');

    // Append the dragged item to the drop target.
    dropTarget.appendChild(document.getElementById(data));
}


