<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/your/custom.css">
    <!------- sweetalert ------>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
    <title>Voice Input Form (Bengali)</title>
    <style>
        .form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
}
    </style>
</head>
<body>
<div class="p-4">
    <a href="{{ route('find_doctor') }}" class="btn btn-success">Go To Home</a>
</div>
<h3 class="text-center mt-2">নিচের তথ্যগুলো দিন</h3>
<div class="form-container" style="background-image: url('{{ asset('images/medical.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <form class="myForm" id="voiceForm" method="POST" action="{{ route('appointment.book.store') }}">
        @csrf
        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">নাম:</label>
            <input class="form-control" type="text" id="name" name="patient_name" placeholder="নাম বলুন" required>
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputEmail1" class="form-label">মোবাইল নম্বর:</label>
            <input class="form-control" type="tel" id="mobile" name="mobile_number" placeholder="মোবাইল নম্বর বলুন" required>
        </div>
        <h6 class="mt-5">সময় নির্ধারণ করুন</h6>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="schedule" value="{{ $doctor->schedule_1 }}" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                সকাল ({{ $doctor->schedule_1 }}) টা
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="schedule" value="{{ $doctor->schedule_2 }}" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                বিকাল ({{ $doctor->schedule_2 }}) টা
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mx-auto">সাবমিট করুন</button>

    </form>
</div>
<br>
<footer class="bg-dark text-white text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>যোগাযোগ করুন</h5>
        <p>ঠিকানা: চট্টগ্রাম মেডিকেল, 57 K.B. Fazlul Kader Rd, চট্টগ্রাম 4203</p>
        <p>মোবাইল: 01873813517</p>
      </div>
      <div class="col-md-4">
        <h5>সামাজিক যোগাযোগ</h5>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="https://www.facebook.com/khaledbin.islam.545" target="_blank">
              <i class="fab fa-facebook fa-2x"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="mailto:khaledrayan40@gmail.com" target="khaledrayan40@gmail.com">
              <i class="fas fa-envelope fa-2x"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>বিশেষ ধন্যবাদ</h5>
        <p>ডাক্তার রেকমেন্ডেশন ও অ্যাপয়েন্টমেন্ট সিস্টেম</p>
        <span>2023</span>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
<script>
    function convertEnglishToBengaliNumber(number) {
        const englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const bengaliNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        let convertedNumber = '';

        for (let i = 0; i < number.length; i++) {
            const char = number[i];
            const index = englishNumbers.indexOf(char);

            if (index !== -1) {
                convertedNumber += bengaliNumbers[index];
            } else {
                convertedNumber += char;
            }
        }

        return convertedNumber;
    }

    const nameInput = document.getElementById('name');
    const mobileInput = document.getElementById('mobile');
    const voiceForm = document.getElementById('voiceForm');

    nameInput.addEventListener('click', startSpeechRecognition);
    mobileInput.addEventListener('click', startSpeechRecognition);

    function startSpeechRecognition(event) {
        const inputField = event.target;
        const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
        recognition.lang = 'bn-BD'; // Set the language to Bengali

        recognition.onresult = (event) => {
            const result = event.results[event.results.length - 1][0].transcript;
            const convertedResult = convertEnglishToBengaliNumber(result);
            inputField.value = convertedResult;
        };

        recognition.start();
    }

    // voiceForm.addEventListener('submit', (event) => {
    //   event.preventDefault();
    //   // Perform form submission logic here
    //   // ...
    //   console.log('Form submitted successfully');
    // });
</script>
<script>
    $(document).ready(function() {
        $('.myInput').on('input', function() {
            $('.myForm').submit();
        });
    });
</script>
</body>
</html>
