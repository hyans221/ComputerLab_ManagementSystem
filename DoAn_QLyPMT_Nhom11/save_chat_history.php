<?php
// Load the existing chat history from the JSON file
$chatHistory = json_decode(file_get_contents('chat_history.json'), true);

// Get the new message data from the POST request
$newMessage = json_decode(file_get_contents('php://input'), true);

// Add the new message to the chat history
$chatHistory[] = $newMessage;

// Save the updated chat history to the JSON file
file_put_contents('chat_history.json', json_encode($chatHistory, JSON_PRETTY_PRINT));

// Return a success response
echo 'Message saved to chat history file.';