<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form div {
    margin-bottom: 10px;
}

label {
    display: block;
}

input[type="text"], input[type="number"], input[type="datetime-local"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #3e8e41;
}
    </style>
</head>
<body>
    
    <form method="POST" action="">
        @csrf
    
        <div>
            <label for="topic">Topic:</label>
            <input type="text" name="topic" id="topic" required>
        </div>
    
        <div>
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" name="start_time" id="start_time" required>
        </div>
    
        <div>
            <label for="duration">Duration (in minutes):</label>
            <input type="number" name="duration" id="duration" required>
        </div>
    
        <div>
            <button type="submit">Create Meeting</button>
        </div>
    </form>
    <script>
        // Optional: add client-side validation using JavaScript
const form = document.querySelector('form');
const topicInput = document.querySelector('#topic');
const startTimeInput = document.querySelector('#start_time');
const durationInput = document.querySelector('#duration');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    // Validate form inputs
    if (topicInput.value.trim() === '') {
        alert('Please enter a topic.');
        return;
    }

    if (startTimeInput.value.trim() === '') {
        alert('Please enter a start time.');
        return;
    }

    if (durationInput.value.trim() === '' || isNaN(durationInput.value.trim())) {
        alert('Please enter a valid duration.');
        return;
    }

    // Submit the form
    form.submit();
});
    </script>
</body>
</html>