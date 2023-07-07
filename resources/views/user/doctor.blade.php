<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,300&display=swap" rel="stylesheet">
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
  <!-- select2 js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
      integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b121968cc9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/table/base-table.css') }}">
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
    .search-doctor{
      color: #fff;
      font-weight: bold;
    }
    .p-3{
      font-weight: bold;
    }
    .dynamic-color {
  transition: background-color 0.3s ease;
}

.dynamic-color:hover,
.dynamic-color:focus {
  background-color: #5ce8a7; /* Change the color to your desired hover color */
}

.dynamic-color:active {
  background-color: #e514b1; /* Change the color to your desired click color */
}


  </style>
</head>
<body>
  <div style="background-image: url('{{ asset('images/rural.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="p-4 text-right">
    {{-- <a class="btn text-right btn-success" href="{{route('check.serial.number')}}">সিরিয়াল নাম্বার দেখুন</a> --}}
    <a href="{{route('find_doctor')}}" class="btn btn-success">Go To Home</a>
  </div>
  {{-- <div class="col-md-12" >
    <h3 class="text-center search-doctor mt-5">ডাক্তার খুজুন</h3>
    <div class="form-container mt-4">
      <form class="myForm" id="voiceForm" method="GET" action="{{ route('find_doctor') }}">
        <div class="form-group">
          <label class="search-doctor" for="name">আপনার সমস্যাটি বলুন</label>
          <input class="myInput" type="text" id="name" name="name" placeholder="আপনার সমস্যাটি বলুন" required>
        </div>
        <button class="d-none" type="submit" class="submit-btn mt-5"></button>
      </form>
    </div>
  </div>
  </div> --}}

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-11 user-table mb-5"  style="background-image: url('{{ asset('images/doctor.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="d-flex justify-content-between">
          <h4 class="text-center">ডাক্তারদের তালিকা</h4>
        </div>
        <table class="table mt-5 mb-5 table-borderless" >
          <thead class="table-head">
            <tr class="text-center">
              <th class="p-3" scope="col">ক্রমিক নাম্বার</th>
              <th class="p-3" scope="col">নাম</th>
              <th class="p-3" scope="col">বিশেষজ্ঞ</th>
              <th class="p-3" scope="col">মোবাইল নাম্বার</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($doctors as $doctor)
            <tr class="text-center">
              <td class="p-3">{{ $loop->index+1 }}</td>
              <td class="p-3">{{ $doctor->name }}</td>
              <td class="p-3">{{ $doctor->specialist }}</td>
              <td class="p-3">{{ $doctor->mobile_number }}</td>
              <td>
               <a class="btn btn-success btn-sm rounded-pill dynamic-color" href="{{ route('appointment.book', [$doctor->id]) }}">সিরিয়াল নিতে আগ্রহী</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row mt-5 test-center">{{ $doctors->links() }}</div>
      </div>
      {{-- <h1>{{$searchTerm}}</h1> --}}
    </div>
  </div>

  <footer class="bg-dark text-white text-center py-4">
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
</body>
</html>
