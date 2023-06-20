<!DOCTYPE html>
<html>
<head>
  <title>Bengali Voice Input</title>
  <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    .submit-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Bengali Voice Input (ভয়েস ইনপুট)</h2>
    <div class="form-group">
      <label for="voiceInput">ভয়েস ইনপুট:</label>
      <input type="text" id="voiceInput" name="voiceInput" placeholder="ভয়েস ইনপুট দিন" required>
    </div>
  </div>

  <script>
    const voiceInput = document.getElementById('voiceInput');
    const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
    recognition.lang = 'bn-BD'; // Set the language to Bengali

    voiceInput.addEventListener('focus', startSpeechRecognition);

    function startSpeechRecognition() {
      recognition.start();
    }

    recognition.onresult = (event) => {
      const result = event.results[event.results.length - 1][0].transcript;
      voiceInput.value = result;
    };
  </script>
</body>
</html>
