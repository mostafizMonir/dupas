<!doctype html>
<html lang="en">
   <head>

    <title>Template5</title>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href=  "t5.css">
        
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
        <form action="index5.php" method="post">
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

                <div class="top">
                       <strong> গোপনীয়</strong><br>
                        <strong>(শুধু উত্তরপত্র পরীক্ষকদের জন্য)</strong><br>

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
              
               
                
               <input type="text" name="teacher" id="teacher" class="form-control" placeholder="Enter tecaher's Name" required >  
               

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
                        <p>
                                            
                        আপনাকে জানাইতেছি যে, আপনি <select name="year" value="Year" id="ddlYears"></select>
      
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
      </script>  সনের   <select name="yr">
  <option>১ম</option>
  <option>২য়</option>
  <option>৩য়</option>
  <option>৪র্থ</option>
</select>  বর্ষ 
    <select name="xm">
  <option>বি.এস সম্মান</option>
  <option>এম.এ</option>
  <option>এম.এস.এস</option>
  <option>এম.এস</option>
</select>পরীক্ষার <br>........
                              
                                  
                            
                                <select name="subject" id="country-list" class="demoInputBox"  onChange="getState(this.value);">
                                <option value="">Select Subject</option>
                                <?php
                                $sql1="SELECT * FROM subject";
                                $results=$dbhandle->query($sql1); 
                                while($rs=$results->fetch_assoc()) { 
                                ?>
                                <option value="<?php echo $rs["ID"]."|".$rs["Subject_name"]; ?>"><?php echo $rs["Subject_name"]; ?></option>
                                <?php
                                }
                                ?>
                                </select>.........
বিষয়ের.......... <select id="state-list" name="course"  >
                                <option value="">Select Courses</option>
                                </select>.......... নং <select name="cr">
  <option>কোর্সের</option>
  <option>পত্রের</option>
  <option>থিসিসের </option>
  
</select><br>উত্তরপত্র পরীক্ষক নিযুক্ত হইয়াছেন।<br>
                        <p>

                        </div>


                        <div class="c">
                        <p>

                        বিধি অনুযায়ী অভ্যন্তরীণ  পরীক্ষক কোর্স ফাইনাল পরীক্ষার হলের প্রধান তত্ত্বাবধায়কের নিকট হইতে<br>
                        উত্তরপত্র ও সংশ্লিষ্ট কাগজপত্র গ্রহণ করিবেন। কোন কারণে পরীক্ষক পরীক্ষার হল হইতে উত্তরপত্র সংগ্রহ<br>
                        করিতে না পারিলে তিনি পরবর্তী তিন কর্মদিবসের মধ্যে পরীক্ষা নিয়ন্ত্রকের অফিস হইতে উহা সংগ্রহ<br>
                        করিবেন । মফঃস্বলস্থ পরীক্ষকগণের নিকট ডাকযোগে উত্তরপত্র প্রেরণ করা হইবে।<br>
                       <p>


                        <div>


                        <div class="d">
                        

<p> আপনার কোনো নিকট আত্মীয় যেমনঃ (১) ভাই  (২) বোন  (৩) স্ত্রী/স্বামীর  (ক) ভাই/বোন 
 (৪) ছেলে <br> (৫) মেয়ে  (৬) ভ্রাতৃবধূ  (৭) ভগ্নিপতি 
(৮) স্ত্রী (৯) স্বামী (১০) ভাই ও বোনের সন্তানের (১১) পুত্রবধূ <br>
 (১২) জামাতা  (১৩) আপন চাচা-চাচী  (১৪) আপন মামা-মামী  (১৫) আপন ফুফা-ফুফু
এবং (১৬) আপন<br> খালা-খালু এই পরীক্ষায় যদি পরীক্ষার্থীর/পরীক্ষার্থিনী থাকে ,তবে তাহা নিয়োগপত্র গ্রহণের পূর্বে  অত্র অফিসে <br>জানাইতে হইবে।
<br>
</p>

</div>



<div class="e">

<p>আপনি যদি শিক্ষা প্রতিষ্ঠান/বিভাগ ছাড়া অন্য কোন সরকারী দপ্তরের কর্মকর্তা হন,তবে আপনাকে  নিযুক্তি<br> গ্রহণের পূর্বে অবশ্যই কর্তৃপক্ষের অনুমতি নিতে হইবে এবং এই কাজের পারিশ্রমিক গ্রহণের
জন্য  অনুমোদন<br> পত্র বিলের সহিত গ্রথিত করিয়া দিতে হইবে। <br></p>

</div >


<div class="f">

<p>উক্ত বিষয়ে আপনার সম্মতি যথাশীঘ্র জানাইবার জন্য অনুরোধ করিতেছি।<p>

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
        
        পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
        পরীক্ষা উপ-নিয়ন্ত্রক<br>
        ঢাকা বিশ্ববিদ্যালয়।<br>
        

    </div>
    
   
</div>
</div>


<div class="submit">
        <input type="submit"  value="Done"  id="search">

    </div>


 </form>
 
</body>

</html>