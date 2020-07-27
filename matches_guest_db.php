<?php

$conn = mysqli_connect("localhost","root","","sports");

extract($_POST);

//all matches
if(isset($_POST['showmatch']))
{
$data = '';
$date = date('Y/m/d');

$query = " SELECT * from matches WHERE date >= '$date' ORDER BY date,time";
$result = mysqli_query($conn,$query);

// if(mysqli_num_rows($result)==0){
//   $data.='<div class="row m-2 text-center" style=" color:black">
//           <h4> No New Match </h4>';
// }

if(mysqli_num_rows($result) > 0){

  while ($row = mysqli_fetch_array($result)) {

   $time = date('h:i A', strtotime($row['time']));
   $date=date("j M Y", strtotime($row['date']));
   $day=date("l", strtotime($row['date']));

   if(in_array($row['match_id'],$showmatch))
   {
   $data .= '<tr>
             <td class="font-weight-bold">'.$time.'</td>
             <td>'.$row['sport'].'</td>
             <td class="font-weight-bold">'.$row['team1'].'</td>
             <td>vs</td>
             <td class="font-weight-bold">'.$row['team2'].'</td>
             <td>'.$row['place'].'</td>
             <td>'.$date.',&nbsp '.$day.'</td>
             <td><i id="star" class="fas fa-star text-warning starred" onclick="starred('.$row['match_id'].',this,starry)"></i></td>
             </tr>';
    }
    else
    {
      $data .= '<tr>
                <td class="font-weight-bold">'.$time.'</td>
                <td>'.$row['sport'].'</td>
                <td class="font-weight-bold">'.$row['team1'].'</td>
                <td>vs</td>
                <td class="font-weight-bold">'.$row['team2'].'</td>
                <td>'.$row['place'].'</td>
                <td>'.$date.',&nbsp '.$day.'</td>
                <td><i id="star" class="far fa-star text-warning star" onclick="starred('.$row['match_id'].',this,starry)"></i></td>
                </tr>';
    }
           }
         }
    echo $data;
}
//starred matches
elseif(isset($_POST['starry']))
{
  // echo ($starry);
  $starry = join("','",$starry);
  $data='';
  // foreach ($starry as $value)
  
    $query = " SELECT * from matches WHERE match_id in ('$starry') ORDER BY date,time";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

      while ($row = mysqli_fetch_array($result)) {

       $time = date('h:i A', strtotime($row['time']));
       $date=date("j M Y", strtotime($row['date']));
       $day=date("l", strtotime($row['date']));
       $data .= '<tr>
                 <td class="font-weight-bold">'.$time.'</td>
                 <td>'.$row['sport'].'</td>
                 <td class="font-weight-bold">'.$row['team1'].'</td>
                 <td>vs</td>
                 <td class="font-weight-bold">'.$row['team2'].'</td>
                 <td>'.$row['place'].'</td>
                 <td>'.$date.',&nbsp '.$day.'</td>
                 <td><i id="star" class="fas fa-star text-warning starred" onclick="starred('.$row['match_id'].',this,starry)"></i></td>
                 </tr>';
               }
             }
    // }
      echo $data;
  }
?>
