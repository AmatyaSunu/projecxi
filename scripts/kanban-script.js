/* Script for the kanban dashboard page
Author: Sunidhi Amatya */

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
    { index: 'todo', title: "TO DO", count: 0 },
    { index: 'inprogress', title: "IN PROGRESS", count: 0 },
    { index: 'intesting', title: "IN TESTING", count: 0 },
    { index: 'review', title: "REVIEW", count: 0 },
    { index: 'done', title: "DONE", count: 0 }
];

// Function to retrieve query parameters from the URL
function getQueryVariable(variable) {
    const query = window.location.search.substring(1);
    const vars = query.split('&');

    for (let i = 0; i < vars.length; i++) {
        const pair = vars[i].split('=');

        if (decodeURIComponent(pair[0]) === variable) {
            return decodeURIComponent(pair[1]);
        }
    }

    return null;
}

// To capatilize first letter
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
  }

// Get project key and name query parameter from the URL and render data to page
const projectKey = getQueryVariable('projectKey');
const projectName = getQueryVariable('projectName');

const title = document.getElementById('projectName');
const key = document.getElementById('projectKey');

title.textContent = capitalizeFirstLetter(projectName);
key.textContent = projectKey.toUpperCase();

// Count the ticket on todo list
document.addEventListener("DOMContentLoaded", function () {
    for (var i = 0; i < kanbanColumns.length; i++) {
        var column = kanbanColumns[i];
        var columnDiv = document.getElementById(column.index);

        if (columnDiv) {
            var ticketCount = columnDiv.querySelectorAll('.ticket').length;

            var countSpanId = column.index + '-count';
            var countSpan = document.getElementById(countSpanId);

            //render count in html 
            if (countSpan) {
                countSpan.textContent = ticketCount;
            }

            column.count = ticketCount;
        }
    }
});

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");

    var dropTarget = ev.target.classList.contains('kanban-block') ? ev.target : ev.target.closest('.kanban-block');
    var sourceColumnId = document.getElementById(data).closest('.kanban-block').id;

    dropTarget.appendChild(document.getElementById(data));

    // Increase the count for the ticket count in target div
    for (var i = 0; i < kanbanColumns.length; i++) {
        var column = kanbanColumns[i];
        if (dropTarget.id === column.index) {
            column.count++;
            document.getElementById(column.index + '-count').textContent = column.count;
            break;
        }
    }

    // Decrease the count in source div
    for (var i = 0; i < kanbanColumns.length; i++) {
        var column = kanbanColumns[i];
        if (sourceColumnId === column.index) {
            column.count--;
            document.getElementById(column.index + '-count').textContent = column.count;
            break;
        }
    }
}

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

document.getElementById('back').addEventListener('click', function () {
    navigateToPage('../dashboard.html');
});

document.getElementById('create-ticket-btn').addEventListener('click', function () {
    navigateToPage('./create-a-ticket.html');
});

document.getElementById('filter').addEventListener('click', function () {
    navigateToPage('../Search/search.html');
});

document.getElementById('main-logo-kanban').addEventListener('click', function () {
    navigateToPage('../dashboard.html')
});