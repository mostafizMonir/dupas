<!doctype html>
<html lang="en">
   <head>

   
    <!-- Required meta tags -->
    <title>template3</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href=  "t3.css">
        
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
        <form action="index3.php" method="post">

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
                         <img src="DhakaUniversity.jpg" width="70" height="90">
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

                <div class="teacher">


<p> <style>  
ul{  
background-color:#eee;  
cursor:pointer;  
}  
li{  
padding:16px;  
}  
</style>  


<div class="container">
select Teacher:
                        <?php
                        $conn=mysqli_connect("localhost","root","monmosndc","faculty");
                        if(mysqli_connect_errno())

                        {
                            echo "Connection Failed" .mysqli_connect_error();
                        }

                        $sql="SELECT teacher.t_name,department.name, teacher.id  FROM teacher join department on teacher.department_id = department.id";
                        $result=mysqli_query($conn,$sql);


                        echo"<select name='tea' id='opt1'>";
                        echo"<option> Select Teacher</option>";

                        while($row=mysqli_fetch_array($result))
                        {
                            echo "<option value=$row[id]>$row[t_name]($row[name])</option>";
                        }
                        echo "</select>";

                        mysqli_close($conn);

                        ?>

<input type="dropdown" name="teacher" id="teacher" class="form-control" placeholder="Enter teacher's Name" required >


<div id="teacherList"></div>  

</div>





<script>  
$(document).ready(function()
{  
$('#teacher').keyup(function(){  
var query = $(this).val();  
if(query != '')  
{  
$.ajax({  
    url:"search.php",  
    method:"POST",  
    data:{query:query},  
    success:function(data)  
    {  
         $('#teacherList').fadeIn();  
         $('#teacherList').html(data);  
    }  
});  
}  
});  
$(document).on('click', 'li', function()
{  
$('#teacher').val($(this).text());  

$('#teacherList').fadeOut();  





});  






});  

</script>  


        </p>
        
        </div>

       

                <div class="main1">

                        জনাব,
                </div>

                <div class="main2">
                   
                        আপনাকে জানাইতেছি যে,................................................  <?php
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

                            ?>................................................  <br>
                        বিষয়ে <select name="year" value="Year" id="ddlYears"></select>
      
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
      </script> সনের   <select name="yr">
  <option>১ম বর্ষ</option>
  <option>২য় বর্ষ</option>
  <option>৩য় বর্ষ</option>
  <option>৪র্থ বর্ষ</option>
  <option>এম.এস.</option>
</select> পরীক্ষার <select name="do">
   <option>প্রশ্নপত্র সমন্বয়ের জন্য</option>
   <option>ফলাফল চূড়ান্ত</option>
<select>
                        করার জন্য পরীক্ষা কমিটির এক সভা <br> <input type="date" id="birthday1" name="birthday1" required>তারিখ রোজ
                        <select name="day">
  <option>সকাল</option>
  <option>বেলা</option>
</select> 
<input type="time" id="t" name="t">টায় ঢাকা বিশ্ববিদ্যালয়ের ____________________<br>
                         বিষয়ে পরীক্ষা কমিটির  চেয়ারম্যান অধ্যাপক ডঃ জনাব ______________________________
                        এর অফিস কক্ষে (________)<br>অনুষ্ঠিত হইবে।উক্ত সভাইয় যথাসময় উপস্থিত হইয়া প্রশ্নপত্র
                        সমন্বয়ের জন্য//ফলাফল চূড়ান্তকরণে অংশ নেওয়ার<br> জন্য আপনাকে অনুরোধ করিতেছি।<br>

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


                  <div class="row">
                        

                        <div class="column right1">

                               
                        <p>মেমো নংঃ............................... </p>


                       
                                                

                        
                        </div>

                        <div class="column left1">

                                    <label for="Date">তারিখঃ.........................</label>
                                    
            
                        </div>
                </div>


                  <div class="main3">

                      অবগতি ও প্রয়োজনীয় ব্যবস্থা গ্রহণের জন্য অনুরোধসহ প্রতিলিপি প্রেরিত হইলঃ-<br>
                     ১।প্রফেসর/ড।/জনাব_______________________________________________________<br>

                     চেয়ারম্যান,<br>
                     _______________________________________________________________________বিষয়ে পরীক্ষা কমিটি,<br>
                     ঢাকা বিশ্ববিদ্যালয়।<br>


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
   <div class="submit">
              <input type="submit"  value="Done" id="search">
              </form>

</div>            
           </body>
   
           </html>