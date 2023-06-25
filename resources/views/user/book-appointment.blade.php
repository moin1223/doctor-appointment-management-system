<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!------- sweetalert ------>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
    <title>Voice Input Form (Bengali)</title>
    <style>
        .form-container {
            max-width: 500px;
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
<div class="p-4">
    <a href="{{ route('find_doctor') }}" class="btn btn-success">Go To Home</a>
</div>
<h3 class="text-center mt-5">নিচের তথ্যগুলো দিন</h3>
<div class="form-container mt-4">
    <form class="myForm" id="voiceForm" method="POST" action="{{ route('appointment.book.store') }}">
        @csrf
        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
        <div class="form-group">
            <label for="name">নাম:</label>
            <input type="text" id="name" name="patient_name" placeholder="আপনার নাম বলুন" required>
        </div>
        <div class="form-group">
            <label for="mobile">মোবাইল নম্বর:</label>
            <input type="tel" id="mobile" name="mobile_number" placeholder="আপনার মোবাইল নম্বর বলুন" required>
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
        <button type="submit" class="submit-btn mt-5">সাবমিট করুন</button>
    </form>
</div>

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
