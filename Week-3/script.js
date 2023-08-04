$(document).ready(function(){
    // Load tasks from localStorage on page load
    loadTasks();

    $("#submittask").on("click", function(){
        var taskContent = $("#taskInput").val();
        if (taskContent.trim() !== "") {
            addTask(taskContent);
            // Save tasks to localStorage
            saveTasks();
        }
        $("#taskInput").val("");      
    });

    $(document).on("click", ".delete-btn", function() {
        $(this).parent().remove();
        // Save tasks to localStorage after deletion
        saveTasks();
    });

    $(document).on("click", ".edit-btn", function() {
        var taskItem = $(this).closest("li");
        var taskContentDiv = taskItem.find(".text");
        var currentTaskContent = taskContentDiv.text();
        var editedTaskContent = prompt("Edit Task:", currentTaskContent);
        if (editedTaskContent !== null && editedTaskContent.trim() !== "") {
            taskContentDiv.text(editedTaskContent);
            // Save tasks to localStorage after edit
            saveTasks();
        }
    });

    function addTask(taskContent) {
        var listItem = $("<li>").addClass("d-flex align-items-center");
        var taskContentDiv = $("<p>").addClass("text my-0 ms-0 me-2").text(taskContent);
        var deleteButton = $("<button>").addClass("btn btn-danger m-1 delete-btn").text("Delete");
        var editButton = $("<button>").addClass("btn btn-secondary edit-btn").text("Edit");
        listItem.append(taskContentDiv, deleteButton,editButton);
        $("#taskList").append(listItem);
    }


    function loadTasks() {
        var storedTasks = localStorage.getItem("tasks");
        if (storedTasks) {
            var tasks = JSON.parse(storedTasks);
            tasks.forEach(function(taskContent) {
                addTask(taskContent);
            });
        } 
    }

    function saveTasks() {
        var tasks = [];
        $("#taskList li").each(function() {
            tasks.push($(this).find("p").text());
        });
        localStorage.setItem("tasks", JSON.stringify(tasks));
    }
});