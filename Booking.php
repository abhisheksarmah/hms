<?php
error_reporting(0);
include('Database.php');
session_start();

if (!isset($_SESSION["uid"])) {
  header("Location: login.php");
}

function roomTypeInNumberToRoomType($roomTypeInNumber) {
  return $roomTypeInNumber == 3 ? 'King Size Bed' : ($roomTypeInNumber == 2 ? 'Double Bed' : 'Single Bed');
}

function roomTypeInStringToRoomTypeInNumber($roomTypeInString) {
  return $roomTypeInString == 'King Size Bed' ? 3 : ($roomTypeInString == 'Double Bed' ? 2 : 1);
}
// var_sump($_POST);
// exit();

if (isset($_POST["fetchroom"])) {
  $defaultRoomId = $_POST["defaultRoomId"];
  $defaultRoomNumber = $_POST["defaultRoomNumber"];
  $defaultRoomType = $_POST["defaultRoomType"];
  $noOfAdults = $_POST["noOfAdults"];
  $defaultRoomTypeInNumber = $_POST["defaultRoomTypeInNumber"];

  if ($noOfAdults > $defaultRoomTypeInNumber) {
    $remainder = $noOfAdults % $defaultRoomTypeInNumber;
    if ($remainder == 0) {
      $limit = (int) $noOfAdults / (int) $defaultRoomTypeInNumber;
      $roomTypeNeeded = roomTypeInNumberToRoomType($defaultRoomTypeInNumber);
      // var_dump($limit, $roomTypeNeeded);
      $query = "SELECT * FROM `rooms` where `Room_status` = 0 AND `RoomType` = '{$roomTypeNeeded}' ORDER BY `RoomNo` ASC LIMIT {$limit}";
    }
    if ($remainder == 1) {
      
      $singleBedLimit = 1;
      $dafultBedTypeNumber = ($noOfAdults - $remainder) / (int) $defaultRoomTypeInNumber; 
      $roomTypeNeeded = roomTypeInNumberToRoomType($defaultRoomTypeInNumber);
      $defaultBedLimit = $dafultBedTypeNumber;
      // var_dump($dafultBedTypeNumber, $roomTypeNeeded, $defaultBedLimit);

      // var_dump($singleBedLimit, $roomTypeNeeded, $defaultRoomTypeInNumber);
      // exit();
      $query = "(SELECT * FROM `rooms` where `Room_status` = 0 AND `RoomType` = '{$roomTypeNeeded}' ORDER BY `RoomNo` ASC LIMIT {$defaultBedLimit}) 
      UNION 
      (SELECT * FROM `rooms` where `Room_status` = 0 AND `RoomType` = 'Single Bed' ORDER BY `RoomNo` ASC LIMIT {$singleBedLimit})";
    }
    if ($remainder == 2) {
      $dafultBedTypeNumber = ($noOfAdults - $remainder) / (int) $defaultRoomTypeInNumber;
      $roomTypeNeeded = roomTypeInNumberToRoomType($defaultRoomTypeInNumber);
      $defaultBedLimit = $dafultBedTypeNumber;
      // var_dump($dafultBedTypeNumber, $roomTypeNeeded, $defaultBedLimit, $noOfAdults - $remainder, $_POST["defaultRoomTypeInNumber"]);

      // $singleBedLimit = 2;
      $doubleBedLimit = 1;
      $query = "(SELECT * FROM `rooms` where `Room_status` = 0 AND `RoomType` = '{$roomTypeNeeded}' ORDER BY `RoomNo` ASC LIMIT {$defaultBedLimit}) 
      UNION 
      (SELECT * FROM `rooms` where `Room_status` = 0 AND `RoomType` = 'Double Bed' ORDER BY `RoomNo` ASC LIMIT {$doubleBedLimit})";
      // var_dump($dafultBedTypeNumber, $roomTypeNeeded, $defaultBedLimit);
      // exit();
    }
  }

  // 4 adults scenario
  // he has gone through single, default adult 1 only, he changes it to 4 then it can show 1 + 1 + 1 + 1 (since choosen single) 
  // he has gone through double, default adult 2 only, he changes it to 4 then it can show 2 + 2 (since choosen double) 
  // he has gone through triple, default adult 3 only, he changes it to 4 then it can show 3 + 1 (since choosen triple and take nearest possible room type)

  // 3 adults scenario
  // he has gone through single, default adult 1 only, he changes it to 3 then it can show 1 + 1 + 1 (since choosen single) 
  // he has gone through double, default adult 2 only, he changes it to 3 then it can show 2 + 1 (since choosen double and take nearest possible room type) 
  // he has gone through triple, default adult 3 only, it will show triple bed rooms when coming to booking page

  // 2 adults scenario
  // he has gone through single, default adult 1 only, he changes it to 2 then it can show 1 + 1 (since choosen single and take nearest possible room type) 
  // he has gone through double, default adult 2 only, it will show double bed rooms when coming to booking page

  // 1 adult scenario
  // he has gone through single, default adult 1 only, it will show single bed rooms when coming to booking page

  // $totalRoomsNeeded = 2;
  header('Content-type: application/json');
  $sql = mysqli_query($conn, $query);
  $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);

  echo json_encode($data);
  return;
}

if (isset($_POST["bookroom"])) {
  $roomid = $_POST["roomid"];
  $roomno = $_POST["roomno"];
  $roomtype = $_POST["roomtype"];

  $roomTypeInNumber = $roomtype == 'King Size Bed' ? 3 : ($roomtype == 'Double Bed' ? 2 : 1);

  $roomprice = $_POST["RoomPrice"];

  $sql = mysqli_query($conn, $query);
  $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

if (isset($_POST["adddroom"])) {
  $acid =  $_POST["aid"];
  $RoomIDs = $_POST["rid"];

  $RoomNos = $_POST["rno"];
  $RoomTypes = $_POST["rtype"];
  $RoomPrices = $_POST["rprice"];
  $Cname = $_POST["cname"];
  $Cmail = $_POST["cmail"];
  $Cphone = $_POST["cphn"];
  $Caddrs = $_POST["caddr"];
  $Cidn = $_POST["cidn"];
  $Cindate = $_POST["cindate"];
  $Coutdate = $_POST["coutdate"];
  $Cadult = $_POST["cadlts"];
  $Cchild = $_POST["child"];

  $indate = strtotime($_POST['cindate']);
  $outdate = strtotime($_POST['coutdate']);
  $day = $outdate - $indate;
  $totalday =  round($day / (60 * 60 * 24));

  $defaultRoomTypeInNumber = $_POST["defaultRoomTypeInNumber"];

  // price

  // var_dump($_POST["rprice"]);
  $RoomIDs = explode(',', $RoomIDs);
  $RoomNos = explode(',', $RoomNos);
  $RoomTypes = explode(',', $RoomTypes);
  $RoomPrices = explode(',', $RoomPrices);
// var_dump($RoomIDs, $RoomNos, $RoomTypes);
  $sql = '';

  foreach ($RoomIDs as $key => $roomId) {
    // var_dump($RoomTypes[$key]);
    $roomTypeInString = $RoomTypes[$key];
    $roomNo = $RoomNos[$key];
    $roomPrice = $RoomPrices[$key];

    $totalprice = $totalday * $roomPrice;

    // var_dump($totalday);
    if($Cadult >= $defaultRoomTypeInNumber) {
      $roomCapacityInNumber = roomTypeInStringToRoomTypeInNumber($roomTypeInString);

      $sql .= "INSERT INTO `reservation`(`Acid`,`Rev_name`, `Rev_email`, `Rev_phone`, `Rev_IdnPan`, `Rev_Add`, `Rev_Sdate`, `Rev_Edate`, `rev_adults`, `rev_child`, `rev_totalguest`, `Rev_roomno`, `Rev_roomtype`, `Room_total`, `status`) 
      VALUES ('$acid','$Cname','$Cmail','$Cphone','$Cidn','$Caddrs','$Cindate','$Coutdate','$roomCapacityInNumber','$Cchild','$roomCapacityInNumber','$roomNo','$roomTypeInString','$totalprice','0');";
    } else {
      $sql .= "INSERT INTO `reservation`(`Acid`,`Rev_name`, `Rev_email`, `Rev_phone`, `Rev_IdnPan`, `Rev_Add`, `Rev_Sdate`, `Rev_Edate`, `rev_adults`, `rev_child`, `rev_totalguest`, `Rev_roomno`, `Rev_roomtype`, `Room_total`, `status`) 
      VALUES ('$acid','$Cname','$Cmail','$Cphone','$Cidn','$Caddrs','$Cindate','$Coutdate','$Cadult','$Cchild','$Cadult','$roomNo','$roomTypeInString','$totalprice','0');";
    }

    // exit();
  }
  // exit();
  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // total guest

  // $totalguest = $Cadult + $Cchild;

  // // calculate total price
  // $indate = strtotime($_POST['cindate']);
  // $outdate = strtotime($_POST['coutdate']);
  // $day = $outdate - $indate;
  // $totalday =  round($day / (60 * 60 * 24));

  // $totalprice = $totalday * $price;

  // // insert data
  // $sql = "INSERT INTO `reservation`(`Acid`,`Rev_name`, `Rev_email`, `Rev_phone`, `Rev_IdnPan`, `Rev_Add`, `Rev_Sdate`, `Rev_Edate`, `rev_adults`, `rev_child`, `rev_totalguest`, `Rev_roomno`, `Rev_roomtype`, `Room_total`, `status`) 
  // VALUES ('$acid','$Cname','$Cmail','$Cphone','$Cidn','$Caddrs','$Cindate','$Coutdate','$Cadult','$Cchild','$totalguest','$Roomno','$RoomType','$totalprice','0')";

  // $conn->query($sql);
    echo '
    <script>
    alert("you will be notified shortly");
    window.location.href = "/account.php";
    </script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Booking Form
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
</head>

<body>
  <!--Nevbar-->

<div id="app">
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-dark" href="#">The RIVERWAYS RETREAT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#room">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#contactus">Contact Us</a>
          </li>
          <?php
          if (!$_SESSION["uid"]) {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
             </li>';
          } else {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="account.php">' . $_SESSION["uname"] . '</a>
            </li>';
          }
          ?>

        </ul>

      </div>
    </div>
  </nav>

  <!-- Form -->
  <div class="container">
    <div class="row">
      <div class="col m-5">
        <form method="POST" action="" id="bookingForm">
          <input type="hidden" name="aid" value="<?php echo $_SESSION["uid"] ?>">
          <input type="hidden" name="rid" v-model="fetchedRoomIds">
          <input type="hidden" name="defaultRoomTypeInNumber" value="<?php echo $roomTypeInNumber; ?>">
          <input type="hidden" name="rprice" v-model="fetchedRoomPrices">

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label  text-dark">Room No</label>
            <div class="col-sm-10">
              <input type="hidden" v-model="rno">
              <input type="text" class="form-control" readonly name="rno" v-model="fetchedRoomNos">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Room Type</label>
            <div class="col-sm-10">
              <input type="hidden" v-model="rtype">
              <input type="text" class="form-control" readonly name="rtype" v-model="fetchedRoomTypes">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Total Room Price(One Night)</label>
            <div class="col-sm-10">
              <input type="hidden" v-model="rprice">
              <input type="text" class="form-control" readonly name="totalPrice" v-model="fetchedRoomTotalPrice">
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Full Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Full Name" name="cname" v-model="cname" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" placeholder="Email Address" v-model="cmail" name="cmail">
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Phone No</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" pattern="[789][0-9]{9}" placeholder="e.g : 9876543210" name="cphn" v-model="cphn" required>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Address</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" style="text-transform: capitalize;" placeholder="Your Full Address" name="caddr" v-model="caddr" required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Identity(PAN)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control text-uppercase" style="text-transform:uppercase" maxlength="10" minlength="10" placeholder="PAN CARD Number" name="cidn" v-model="cidn" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">CheckIn</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="cindate" id="cindate" value="<?php echo date("Y-m-d"); ?>" v-model="cindate" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">CheckOUT</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="coutdate" id="coutdate" value="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>" v-model="coutdate" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Adults</label>
            <div class="col-sm-10">
              <select type="number" class="form-control" name="cadlts" required id="nog" v-model="cadlts" @change="changeNoOfAdults">
                <template v-for="num in 4">
                  <option>{{num}}</option>
                </template>
              </select>
            </div>
            <div class="col-sm-12">
              <input type="hidden" name="child" value="0">
              <span class="text-muted text-lowercase">* if any childrens are travelling with you and their age is above 8 years consider as an adult</span>
            </div>
          </div>

          <div class="form-group row">
            <!-- <label for="" class="col-sm-2 col-form-label text-dark">Children</label>
            <div class="col-sm-10">
              <select type="number" class="form-control" name="child" required>
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div> -->
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary p-3 mt-3 " name="adddroom">Confirm Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--footer-->

  <footer>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
            <h2>Find Us</h2>
            Jorhat<br>
            Assam<br>
            India 785001
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
            <h2>Contact Us</h2>
            <ul>
              <li><a href="#"></a>Email us at theriverways@gmail.com</li>
              <li><a href="#"></a>call us at 0373-2367549</li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
            <h2>Follow Us </h2>
            <p>Please follow us on our<br> social media profile</p>
            <a href="https://www.facebook.com/upasana.sarmah.92"><i class="fab fa-facebook" style="font-size: 150%;"></i></a>
            <a href="https://twitter.com/RKrishnatra"><i class="fab fa-twitter" style="font-size: 150%;"></i></a>
            <a href="https://www.instagram.com/rabinasharma_/"><i class="fab fa-instagram" style="font-size: 150%;"></i></a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-four">
            <div class="copyright-text">
              <p><br>Copyright &copy; 2021 <br>Hemanga Bora & Rabina Krishnatra
                <br><br>Login as Admin: <a href="/admin/">Login</a>
              </p>
            </div>
          </div>

        </div>

      </div>

    </div>
  </footer>
</div>
  

</body>
<script>
      var app = new Vue({
        el: '#app',
        data: {
          rid: <?php echo $roomid ?>,
          rno: <?php echo $roomno; ?>,
          rtype: '<?php echo $roomtype ?>',
          rTypeInNumber:<?php echo $roomTypeInNumber; ?>,
          rprice: <?php echo $roomprice ?>,
          cname: '<?php echo $_SESSION["uname"] ?>',
          cmail: '<?php echo $_SESSION["uemail"] ?>',
          cphn: null,
          caddr: null,
          cidn: null,
          cindate: '<?php echo date("Y-m-d"); ?>',
          coutdate: '<?php echo date("Y-m-d", strtotime('tomorrow')); ?>',
          cadlts: null,
          fetchedRoomIds: [],
          fetchedRoomNos: [],
          fetchedRoomTypes: [],
          fetchedRoomPrices: [],
          fetchedRoomTotalPrice: null,
        },
        created() {
          this.cadlts = this.rTypeInNumber;
          this.fetchedRoomIds.push(this.rid);
          this.fetchedRoomNos.push(this.rno);
          this.fetchedRoomTypes.push(this.rtype);
          this.fetchedRoomPrices.push(this.rprice);
          this.fetchedRoomTotalPrice = this.rprice;
        },
        methods: {
          reset() {
            Object.assign(this.$data, this.$options.data());
        },
          changeNoOfAdults () {
            if(this.cadlts <= this.rTypeInNumber) {
              this.fetchedRoomIds = this.rid;
              this.fetchedRoomNos = this.rno;
              this.fetchedRoomTypes = this.rtype;
              this.fetchedRoomPrices = this.rprice;
              this.fetchedRoomTotalPrice = this.rprice;
              return;
            }
            const formData = new FormData();
            formData.append('fetchroom', '');
            formData.append('noOfAdults', this.cadlts);
            formData.append('defaultRoomId', this.rid);
            formData.append('defaultRoomNumber', this.rno);
            formData.append('defaultRoomType', this.rtype);
            formData.append('defaultRoomTypeInNumber', <?php echo $roomTypeInNumber; ?>);
            
          fetch('/Booking.php', {
            method: 'POST',
            headers: {
              
            },
            body: formData
          }).then((res) => res.json())
          .then((response) => {
            if(response && response.length > 0) {
              const fetchedRoomDetails = response
              this.fetchedRoomIds = fetchedRoomDetails.map(room => room.Roomid)
              this.fetchedRoomNos = fetchedRoomDetails.map(room => room.RoomNo)
              this.fetchedRoomTypes = fetchedRoomDetails.map(room => room.RoomType)
              this.fetchedRoomPrices = fetchedRoomDetails.map(room => room.RoomPrice)
              this.fetchedRoomTotalPrice = fetchedRoomDetails.reduce((accumulator, room) => {return accumulator + parseFloat(room.RoomPrice)}, 0)
            }
          }).catch((err) => console.log(err))
          }
        }
      })
  </script>

</html>