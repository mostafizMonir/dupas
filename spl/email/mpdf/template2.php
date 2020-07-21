<!doctype html>
<html lang="en">
   <head>
   <title>Template2</title>

   
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
       
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href=  "t2.css">
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>

$(document).ready(function(){

  
  $("#btn3").click(function(){
    $("#test3").val("<?php
   
   function random()
   {
       return (rand(100000,999999));
     //  echo   (rand(100000,999999));
   }

   function check($a)
   {
       $conn=mysqli_connect("localhost","root","monmosndc","teacher");
       $sql="SELECT * FROM memo1 WHERE memo='" . $a . "'";
       $result=mysqli_query($conn,$sql);
         
       if ($result)
       {
          if (mysqli_num_rows($result) > 0)
              {
                  // echo 'found!<br>';
                   check(random());
              }

              else 
              {
                //  echo 'not found<br>';
                  $result1 = mysqli_query($conn,"SELECT * FROM memo1;");
                  $num_rows = mysqli_num_rows($result1)+1;
                  
                 // echo "$num_rows Rows\n";
                  echo "$a";
                  

                  $sql1 = "INSERT INTO  memo1 (sl,memo)
                  VALUES (' $num_rows', '$a')";
         
                  if(mysqli_query($conn,$sql1))
                  {
                   //  echo "New record created successfully<br>";
                  }
         
                 
           
              }
             }
          
        
       
       mysqli_close($conn);
   }

   check(random());

   ?>
");
  });
});



</script>
     </head>   

        
        <body>
        <form action="../mpdf/index2.php" method="post">
        
        <div class="w">
       
        <div class="row">
                    <div class="column address">

                        <strong>পরীক্ষা নিয়ন্ত্রকের অফিস</strong><br>
                        <strong>ঢাকা বিশ্ববিদ্যালয়</strong><br>
                        ঢাকা-১০০০,বাংলাদেশ।<br>
                        ফোনঃ(অফিস)৮৬১৩২৮০<br>
                        ৯৬৬১৯০০-৫৯/৪০৭৫<br>
                        (বাসা)৯৬৬৬১৩৫<br>
                        ফ্যাক্সঃ৮৮০-২-৯৬৬৭২২২<br>
                        <p>Email:-examcontroller@du.ac.bd</p>

                    </div>

                    <div class="column image">
                         <img src="../mpdf/DhakaUniversity.jpg" width="70" height="80">
                    </div>
                </div>

                
                
                <div class="row">
                        

                        <div class="column right">

                               
                        <p>মেমো নংঃ <input type="number" name="memo" id="test3" value="Mickey Mouse"></p>


                       <button id="btn3">Set memo no</button>
                                                

                        
                        </div>

                        <div class="column left">

                                    <label for="Date">তারিখঃ</label>
                                    <input type="date" id="birthday" name="birthday" style="width:200px; " required >
            
                        </div>
                </div>

                <div class="main1">

                <p>চেয়ারম্যান,</p><br>
                

                <?php
                            $conn=mysqli_connect("localhost","root","monmosndc","faculty");
                            if(mysqli_connect_errno())

                            {
                                echo "Connection Failed" .mysqli_connect_error();
                            }
                            
                            $sql="SELECT *  FROM teacher";
                            $result=mysqli_query($conn,$sql);

                            





                            echo"<select name='dept' id='opt1'>";
                            echo"<option> Select department name</option>";

                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option>$row[department]</option>";
                            }
                            echo "</select>";

                            mysqli_close($conn);

                            ?>


                বিভাগ,<br>
                ঢাকা বিশ্ববিদ্যালয়।<br>
                

                </div>
               
               <div class="main2">
                   <p> বিষয়ঃ- সমন্বিত  কোর্স  পদ্ধতিতে  সম্মান  পরীক্ষার  পরীক্ষকদের  প্যানেল  ও  পরীক্ষা  কমিটি  গঠন।<p><br>
                        জনাব,<br>
                </div>

                <div class="main3">
                <?php
                            $conn=mysqli_connect("localhost","root","monmosndc","course_db");
                            if(mysqli_connect_errno())

                            {
                                echo "Connection Failed" .mysqli_connect_error();
                            }
                            
                            $sql="SELECT *  FROM subject";
                            $result=mysqli_query($conn,$sql);

                            





                            echo"<select name='sub' id='opt1'>";
                            echo"<option> Select Subject name</option>";

                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option>$row[Subject_name]</option>";
                            }
                            echo "</select>";

                            mysqli_close($conn);

                            ?>           বিষয়ে   সমন্বিত    কোর্স    পদ্ধতির <select name="year" value="Year" id="ddlYears"></select>
      
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script type="text/javascript">
          $(function () {
              //Reference the DropDownList.
              var ddlYears = $("#ddlYears");
      
              //Determine the Current Year.
              var currentYear = (new Date()).getFullYear();
      
              //Loop and add the Year values to DropDownList.
              for (var i =currentYear ; i <=2100 ; i++) {
                  var option = $("<option />");
                  option.html(i);
                  option.val(i);
                  ddlYears.append(option);
              }
          });
      </script>   সনের <select name="yr">
  <option>১ম</option>
  <option>২য়</option>
  <option>৩য়</option>
  <option>৪র্থ</option>
</select> <br>  বর্ষ  সম্মান  ও  সহায়ক  পরীক্ষকদের  প্যানেল
                              বিভাগীয়    কমিটি    অব    কোর্সেস    এর    সুপারিশ    অনুযায়ী <br>   গঠন    করিয়া    একাডেমিক    কাউন্সিলের
                              অনুমোদনের    জন্য    সংশ্লিষ্ট    অনুষদের    মাধ্যমে    এবং    পরীক্ষা <br>   কমিটি    বিভাগীয়    একাডেমিক    কমিটির
                              সুপারিশ    অনুযায়ী    গঠন    করিয়া  <input type="date" id="birthday1" name="birthday1" required>     ইং<br>    তারিখের    মধ্যে    সরাসরি    অত্র     অফিসে
                              পাঠানোর    জন্য    আপনাকে    অনুরোধ  করিতেছি।<br>

               </div>      
               
               <div class="signature1">
                   
                   <p>আপনার বিশ্বস্ত</p>
                   <img id="myImage" src="Signature.jpg" style="width:100px">
                  </div>
   
                  <div class="signature2">
                           <p>পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
                           পরীক্ষা উপ-নিয়ন্ত্রক<br>
                           ঢাকা বিশ্ববিদ্যালয়।<br>
                           </p>
                  </div>
         </div>
         </div>

         <div class="submit">
        <input type="submit"  value="Preview" id="search">

        </div>
         </form>           
        </body>

        </html>