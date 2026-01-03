<?php 
What is localStorage in JavaScript?
- localStorage is a place in your browser where you can save small pieces of data that stay even after you close or refresh the page.
- like A mini notepad inside your browser where your website can write and read information.
- Refreshing the page doesn’t delete localStorage data because it’s meant to remember things for longer, until you decide to delete it.
?>


<script>
// Save data
localStorage.setItem("username", "John");

// Read data
let user = localStorage.getItem("username"); // "John"

// Delete data
localStorage.removeItem("username");

// Clear everything
localStorage.clear();

</script>