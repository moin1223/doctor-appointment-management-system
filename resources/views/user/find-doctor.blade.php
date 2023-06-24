<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,300&display=swap"rel="stylesheet">
  <!------- sweetalert ------>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
  <!-------- select2 js ---- -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
      integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b121968cc9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href={{ asset('css/style.css') }}>
  <link rel="stylesheet" href={{ asset('css/table/base-table.css') }}>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <div class="p-4 text-right"> <!-- Add the "text-right" class to align the button to the right -->
    <a class="btn  text-right btn-success" href="{{route('check.serial.number')}}">সিরিয়াল নাম্বার দেখুন</a>
  </div>
    <div class="col-md-12">
      <h3 class="text-center mt-5">ডাক্তার খুজুন</h3>
      <div class="form-container mt-4">
        <form class="myForm" id="voiceForm" method="Get" action="{{ route('find_doctor') }}">
          <div class="form-group">
            <label for="name">আপনার সমস্যাটি বলুন</label>
            <input class="myInput" type="text" id="name" name="name" placeholder="আপনার সমস্যাটি বলুন" required>
          </div>
          <button class="d-none" type="submit" class="submit-btn mt-5"></button>
        </form>
      </div>
    </div>

  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-11 user-table mb-5">
            <div class="d-flex justify-content-between">
                <h4 class="text-center">ডাক্তারদের তালিকা</h4>
                {{-- <div class="createSegment">
                    <a class="btn dim_button create_new" href="{{ route('role.create') }}"> <i
                            class="fa-regular fa-plus"></i> Create New</a>
                </div> --}}


            </div>
                    <table class="table mt-5 mb-5 table-borderless">
                        <thead class="table-head">
                            <tr class="text-center">
                              <th class="p-3" scope="col">ক্রমিক নাম্বার</th>
                              <th class="p-3" scope="col">নাম</th>
                              <th class="p-3" scope="col">বিশেষজ্ঞ</th>
                              <th class="p-3" scope="col">মোবাইল নাম্বার</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ( $doctors as $doctor)
                    <tr class="text-center">
                        <td class="p-3">{{$loop->index+1}}</td>
                        <td class="p-3">{{$doctor->name}}</td>
                        <td class="p-3">{{$doctor->specialist}}</td>
                        <td class="p-3">{{$doctor->mobile_number}}</td>
                        <td >
                          <a class="btn btn-success btn-sm rounded-pill" href="{{ route('appointment.book', [$doctor->id]) }}">সিরিয়াল নিতে আগ্রহী</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  <script>
    const nameInput = document.getElementById('name');
    const voiceForm = document.getElementById('voiceForm');

    nameInput.addEventListener('click', startSpeechRecognition);

    function startSpeechRecognition(event) {
      const inputField = event.target;
      const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
      recognition.lang = 'bn-BD'; // Set the language to Bengali

      recognition.onresult = (event) => {
        const result = event.results[event.results.length - 1][0].transcript;
        inputField.value = result;
        voiceForm.submit(); // Submit the form after setting the voice input value
      };

      recognition.start();
    }
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
