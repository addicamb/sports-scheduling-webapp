<?php
include 'admin_header.php';
 ?>
 <!DOCTYPE html>
 <html>
 <body>

 Field1: <input type="text" id="field1" value="Hello World!"><br>
 Field2: <input type="text" id="field2"><br><br>

 <button onclick="myFunction()">Copy Text</button>

 <select class="form-control" onchange="myFunction(this.value)">
 			<option value="all" selected>All</option>
 			<option value="cricket">Cricket</option>
 			<option value="football">Football</option>
 			<option value="badminton">Badminton</option>
 			<option value="basketball">Basketball</option>
 			<option value="kho-Kho">Kho-Kho</option>
 		</select>

 <script>
 var all='all';
 $(document).ready(function(){
 		myFunction(all); });

 function myFunction(x) {
 var r = x;
   document.getElementById("field2").value = r;
 }
 </script>

 </body>
 </html>
