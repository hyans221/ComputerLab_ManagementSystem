<?php
include 'database.php';
@session_start();
$t = isset($_SESSION['username'])?$_SESSION['username']:'';
if (isset($_SESSION['username']) && $_SESSION['user_type'] == 'teacher'){
  $sql = "SELECT * FROM giaovien where tendangnhap = '$t' ";
}
else
{
  $sql = "SELECT * FROM admin where tendangnhap = '$t' ";
}
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hồ sơ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/huitlogo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
        .chat-container {
            width: 1000px;
            height: 450px;
            border: 1px solid #ccc;
            overflow-y: scroll;
            padding: 10px;
        }
        .chat-message {
            margin-bottom: 10px;
        }
        .chat-message .sender {
            font-weight: bold;
        }
        .chat-message .message {
            margin-left: 10px;
        }
        .chat-input {
            margin-top: 10px;
            display: flex;
        }
        .chat-input input {
            flex-grow: 1;
            padding: 5px;
        }
        .chat-input button {
            margin-left: 10px;
        }
    </style>
</head>

<body>
<?php
   include 'header.php';
   include 'sidebar.php';
?>

<main id="main" class="main">
        <div class="chat-container" id="chat-container">
            <!-- Messages will be displayed here -->
        </div>
        <div class="chat-input">
            <input type="text" id="message" placeholder="Enter your message...">
            <button type="submit" onclick="sendMessage()">Send</button>
            <?php 
                if ($_SESSION['user_type'] == 'admin')
                {
                  ?>
            <button type="button" onclick="clearChatHistory()">Clear Chat</button>
            <?php
                }
                ?>
        </div>

        <script>
            var chatContainer = document.getElementById('chat-container');

            // Function to send messages
            function sendMessage() {
                var message = document.getElementById('message').value;
                if (message.trim() !== '') {
                    var chatMessage = {
                        sender: '<?php if($_SESSION['user_type'] == 'teacher'){echo $row['hotenGV'];}else{echo 'admin';}  ?>',
                        content: message,
                        timestamp: new Date().toISOString()
                    };

                    // Save the message to the chat history file
                    saveMessageToFile(chatMessage);

                    var chatMessageElement = document.createElement('div');
                    chatMessageElement.classList.add('chat-message');
                    chatMessageElement.innerHTML = '<span class="sender">' + chatMessage.sender + ':</span> <span class="message">' + chatMessage.content + '</span>';
                    chatContainer.appendChild(chatMessageElement);
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                    document.getElementById('message').value = '';
                }
            }

            function saveMessageToFile(message) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_chat_history.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Message saved to chat history file.');
        }
    };
    xhr.send(JSON.stringify(message));
}
            // Load chat history from file when page loads
function loadChatHistory() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'chat_history.json', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var chatHistory = JSON.parse(xhr.responseText);
            chatHistory.forEach(function(message) {
                var chatMessageElement = document.createElement('div');
                chatMessageElement.classList.add('chat-message');
                chatMessageElement.innerHTML = '<span class="sender">' + message.sender + ':</span> <span class="message">' + message.content + '</span>';
                chatContainer.appendChild(chatMessageElement);
            });
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    };
    xhr.send();
}

// Call the loadChatHistory function when the page loads
window.addEventListener('load', loadChatHistory);
function clearChatHistory() {
    chatContainer.innerHTML = '';
    // Xóa nội dung của file chat_history.json
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'clear_chat_history.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Chat history cleared.');
        }
    };
    xhr.send();
}
        </script>

    </main><!-- End #main -->

  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>