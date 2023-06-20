<!DOCTYPE html>
<html>
<head>
  <title>Bengali Voice Input</title>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,300&display=swap" rel="stylesheet">
  <!------- sweetalert ------>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
  <!-------- select2 js ---- -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
      integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b121968cc9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href={{ asset('css/style.css') }}>
  <link rel="stylesheet" href={{ asset('css/table/base-table.css') }}>
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
  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-11 user-table">
            <div class="d-flex justify-content-between">
                <h4 class="text-center">আপনার জন্য নিম্নের ডাক্তারদের সাজেশন করা হলো</h4>
            </div>
       
            <table class="table mt-5 table-borderless">
                <thead class="table-head">
                    <tr class="text-center">
                        <th class="p-3" scope="col">ক্রমিক নাম্বার</th>
                        <th class="p-3" scope="col">নাম</th>
                        <th class="p-3" scope="col">বিশেষজ্ঞ</th>
                        <th class="p-3" scope="col">মোবাইল নাম্বার</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- Include jQuery library -->
  <script>
    const voiceInput = document.getElementById('voiceInput');
    const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
    recognition.lang = 'bn-BD'; 

    voiceInput.addEventListener('focus', startSpeechRecognition);

    function startSpeechRecognition() {
      recognition.start();
    }

    recognition.onresult = (event) => {
      const result = event.results[event.results.length - 1][0].transcript;
      voiceInput.value = result;
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{ route('voice.input') }}",
        type: 'POST',
        data: { voiceInput: result },
        dataType: 'json',
        success: function(response) {
          console.log('response', response);
          var tableBody = document.getElementById('tableBody');
          tableBody.innerHTML = ""; // Clear the existing table rows

          response.forEach(function(data) {
            var row = document.createElement('tr');
            row.className = "text-center";

            var numberCell = document.createElement('td');
            numberCell.textContent = data.number;
            row.appendChild(numberCell);

            var nameCell = document.createElement('td');
            nameCell.textContent = data.name;
            row.appendChild(nameCell);

            var specialistCell = document.createElement('td');
            specialistCell.textContent = data.specialist;
            row.appendChild(specialistCell);

            var mobileCell = document.createElement('td');
            mobileCell.textContent = data.mobile;
            row.appendChild(mobileCell);

            tableBody.appendChild(row);
          });
        },
        error: function(error) {
          console.log('error', error);
          var responseText = error.responseJSON.errors;
        },
      });
    };
  </script>
</body>
</html>
