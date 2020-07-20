<!doctype html>
<html lang="en">
   <head>

    <title>Template4</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href=  "t4.css">
        
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

  <?php include "database.php"; ?>
        <script>
        function getState(val) {
            $.ajax({
            type: "POST",
            url: "ajax.php",
            data:'ID='+val,
            success: function(data){
                $("#state-list").html(data);
            }
            });
        }

        function showMsg()
        {

            $("#msgC").html($("#country-list option:selected").text());
            $("#msgS").html($("#state-list option:selected").text());
            return false;
        }
        </script>

        
        <body>
        <form action="index4.php" method="post">
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
              
               
                
               <input type="text" name="teacher" id="teacher" class="form-control" placeholder="Enter teacher's Name" required >  
               

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

                        <div class="a">
                                জনাব,
                        <div>

                        <div class="b">

                                <p> আপনাকে জানাইতেছি যে,আপনি বার্ষিক কোর্স পদ্ধতিতে <select name="year" value="Year" id="ddlYears"></select>
      
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
      </script>সনের    <select name="yr">
  <option>১ম বর্ষ</option>
  <option>২য় বর্ষ</option>
  <option>৩য় বর্ষ</option>
  <option>৪র্থ বর্ষ</option>
  
</select>সম্মান 
                                 পরীক্ষায়<br> <?php
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

                            ?> বিষয়ের একজন অভ্যন্তরীণ/
                                 বহিরাগত ব্যবহারিক ও মৌখিক পরীক্ষক নিযুক্ত  হইয়াছেন।<br></p>

                        <div>

                        <div class="c">

                               <p>উক্ত  ব্যবহারিক ও মৌখিক পরীক্ষা ঢাকা বিশ্ববিদ্যালয়ের সংশ্লিষ্ট বিভাগ/কেন্দ্রে 
                               আগামী<input type="date" id="birthday1" name="birthday1" required> তারিখ<br> প্রতিদিন
                               সকাল<input type="time" id="t1" name="t1">টা হইতে বিকাল <input type="time" id="t2" name="t2">টা পর্যন্ত এবং  মৌখিক পরীক্ষা<input type="date" id="birthday2" name="birthday2" required> তারিখ<br>
                               সকাল<input type="time" id="t3" name="t3">টা হইতে বিকাল <input type="time" id="t4" name="t4">টা পর্যন্ত  অনুষ্ঠিত হইবে। যথাসময়ে উপস্থিত থাকিয়া উক্ত
                              ব্যবহারিক ও<br> মৌখিক পরীক্ষা পরিচালনায় অংশ গ্রহণের জন্য আপনাকে বিনীত অনুরোধ করিতেছি।<br></p>  

                                 

                        <div>

                        <div class="d">

                               
                                <p> আপনাকে উক্ত কার্য সম্পাদন উপলক্ষে কার্যক্ষেত্রে  গমনাগমন ও সেখানে থাকার জন্য ভ্রমণ ভাতা ও
                                 দৈনিক ভাতা <br> বিশ্ববিদ্যালয় আইনানুযায়ী প্রদান করা হইবে।</p><br>

                        <div>



                <div class="e">

                <p> আপনার কোনো নিকট আত্মীয় যেমনঃ (১) ভাই  (২) বোন  (৩) স্ত্রী/স্বামীর  (ক) ভাই/বোন  (৪) ছেলে  (৫) মেয়ে  (৬) ভ্রাতৃবধূ <br> (৭) ভগ্নিপতি 
                (৮) স্ত্রী (৯) স্বামী (১০) ভাই ও বোনের সন্তানের (১১) পুত্রবধূ  (১২) জামাতা  (১৩) আপন চাচা-চাচী  (১৪) আপন মামা-মামী <br> (১৫) আপন ফুফা-ফুফু
                এবং (১৬) আপন খালা-খালু এই পরীক্ষায় যদি পরীক্ষার্থীর/পরীক্ষার্থিনী থাকে ,তবে তাহা নিয়োগপত্র গ্রহণের<br> পূর্বে  অত্র অফিসে জানাইতে হবে।<br>
                
                </p>

            </div>

            

            <div class="f">

                <p>আপনি যদি শিক্ষা প্রতিষ্ঠান/বিভাগ ছাড়া অন্য কোন সরকারী দপ্তরের কর্মকর্তা হন,তবে আপনাকে  নিযুক্তি
                গ্রহণের পূর্বে<br>  অবশ্যই কর্তৃপক্ষের অনুমতি নিতে হইবে। এই কাজের পারিশ্রমিক গ্রহণের জন্য অনুমোদন
                পত্র বিলের সহিত গ্রথিত করিয়া<br> দিতে হইবে।</p>
            
            </div >

                
            <div class="g">

                <p>উক্ত বিষয়ে আপনার সম্মতি যথাশীঘ্র জানাইবার জন্য অনুরোধ করিতেছি।</p>

            </div>    
            
            <div class="h">

                <p>আপনার বিশ্বস্ত</p>
                <img id="myImage" src="Signature.jpg" style="width:100px">
               

            </div>

             <div class="row">


                   <div class="column i">
                        <p>ঢবপ-৪৮১-০২-২০১৯-২০,০০০ কপি</p>
                    </div>    


                    <div class="column j">
                        
                        <p>পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
                        পরীক্ষা উপ-নিয়ন্ত্রক<br>
                        ঢাকা বিশ্ববিদ্যালয়।<br>
                        </p>

                    </div>
                    
                   
            </div>



                </div>
                <div class="submit">
              <input type="submit"  value="Done" id="search">

</div>   </form>
                </body>
                </html>