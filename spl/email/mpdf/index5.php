<?php 


class BanglaConverter {
    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    
    public static function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }
    
    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }
 }


                      $orgDate = $_POST["birthday"];  
                      $newDate = date("d-m-Y", strtotime($orgDate));  
                      $new= BanglaConverter::en2bn($newDate);


                      $memo= BanglaConverter::en2bn( $_POST["memo"]);

                      $a=$_POST["teacher"];
      
      
                      $conn=mysqli_connect("localhost","root","","faculty");
      
                              $sql="SELECT * FROM teacher WHERE t_name='" . $a . "'";
                              $result=mysqli_query($conn,$sql);
                          // $resultCheck=mysqli_num_rows($result);
      
                          // if($resultCheck>0)
                          // {
                              if (mysqli_num_rows($result) > 0)
                              {
                                  while($row = mysqli_fetch_assoc($result)) 
                                  {
                                  $d1= $row["designation"];
                                  $d2=$row["department"];
                                  }
      
                              }  
      
                              
                              mysqli_close($conn);


                              $y=BanglaConverter::en2bn($_POST["year"]);
                              $result = $_POST["subject"];
                              $result_explode = explode('|', $result);

                              $r1= $result_explode[1];
                              $r2=$_POST["course"];
                              $yr=$_POST["yr"];
                              $xm=$_POST["xm"];
                              $cr=$_POST["cr"];


                              $conn=mysqli_connect("localhost","root","","letter");
                              $sql="INSERT INTO letter_data(MemoNo,SendingDate,Recipient,Designation,
                              Department,Year,StudyYear,Subject,Course,ExamType,CourseType,Type)
                              VALUES ('$memo','$new','$a','$d1','$d2','$y','$yr','$r1','$r2','$xm','$cr','E')";
                              $result=mysqli_query($conn,$sql);
                              mysqli_close($conn);



                      

?>
<?php
include("mpdf.php");
$mpdf=new mPDF('','A3',14,'nikosh'); 
ob_start();

echo "

<html>
<div class=\"contain\">

<style scoped>
     .contain{ border-style: solid;
               padding-left:125px;
               padding-top:100px;
           
      }
 </style>
<div class=\"row\">
<style scoped>
    
  

 

/* Clear floats after the columns */
.row:after {
    content: \"\";
      display: table;
      clear: both;
}
      }
 </style>

  <div class=\"column address\" >
  <style scoped>
 .column {
        
        float: left;

        height: 200px; /* Should be removed. Only for demonstration */
}

     .address{

width: 35%;


}
 </style>

  <strong>পরীক্ষা নিয়ন্ত্রকের অফিস</strong><br>
        <strong>ঢাকা বিশ্ববিদ্যালয়</strong><br>
        ঢাকা-১০০০,বাংলাদেশ।<br>
        ফোনঃ(অফিস)৮৬১৩২৮০<br>
        ৯৬৬১৯০০-৫৯/৪০৭৫<br>
        (বাসা)৯৬৬৬১৩৫<br>
        ফ্যাক্সঃ৮৮০-২-৯৬৬৭২২২<br>
        Email:examcontroller@du.ac.bd
  </div>
  <div class=\"column image\">

  <style scoped>
 .column {
        
        float: left;

        height: 200px; /* Should be removed. Only for demonstration */
}

     .image{

width: 35%;
padding-left:50px;
}
 </style>

  <p> <img src=\"DhakaUniversity.jpg\" width=\"70\" height=\"90\"></p>
  </div>
  
</div>



<div class=\"row\">
<style scoped>
    
  

 

/* Clear floats after the columns */
.row:after {
    content: \"\";
      display: table;
      clear: both;
}
      }
 </style>

  <div class=\"column p1\" >
  <style scoped>
 .column {
        
        float: left;

       /* Should be removed. Only for demonstration */
}

     .p1{

width: 35%;

padding-top:-20px;
height:30px;
}
 </style>

 <p> <p>মেমো নংঃ $memo শা-৫/প</p></p>
  </div>

  <div class=\"column p2\">

<style scoped>
.column {
      
      float: left;

     /* Should be removed. Only for demonstration */
}

   .p2{

width: 30%;

padding-left:270px;
padding-top:20px;
height: 50px;
}
</style>

তারিখঃ  $new
</div>
</div>
<div class=\"top\">
<style scoped>
.top{ text-indent: 80px;
    width:30%;
    margin-left:300px;     

     }
 </style>


                       <strong> গোপনীয়</strong><br>
                        <strong>(শুধু উত্তরপত্র পরীক্ষকদের জন্য)</strong><br>

</div>

                <div class=\"teacher\">
                <style scoped>
               .teacher{ width: 25%;

                    height: 100px;
                    padding-top:20px;       

                    }
                </style>

                         $a ,<br>
                         $d1,<br>
                         $d2 ।<br>
                 </div>

                 <div class=\"a\">
                                জনাব,
                        <div>

                        <div class=\"b\">
         
                        <style scoped>
                            .b{ text-indent: 30px;
                                word-spacing:8px;
                            }
                        </style>

                        <p>আপনাকে জানাইতেছি যে, আপনি  $y   সনের $yr  বর্ষ  $xm পরীক্ষার <br>
                         $r1 বিষয়ের    $r2 নং $cr<br> উত্তরপত্র পরীক্ষক নিযুক্ত হইয়াছেন।<br>

                        <div>

                        <div class=\"c\">

                        <style scoped>
                            .c{ text-indent: 30px;
                                word-spacing: 8px;
                            }
                        </style>
                        <p>

                        বিধি অনুযায়ী অভ্যন্তরীণ  পরীক্ষক কোর্স ফাইনাল পরীক্ষার হলের প্রধান তত্ত্বাবধায়কের নিকট হইতে<br>
                        উত্তরপত্র ও সংশ্লিষ্ট কাগজপত্র গ্রহণ করিবেন। কোন কারণে পরীক্ষক পরীক্ষার হল হইতে উত্তরপত্র সংগ্রহ<br>
                        করিতে না পারিলে তিনি পরবর্তী তিন কর্মদিবসের মধ্যে পরীক্ষা নিয়ন্ত্রকের অফিস হইতে উহা সংগ্রহ<br>
                        করিবেন । মফঃস্বলস্থ পরীক্ষকগণের নিকট ডাকযোগে উত্তরপত্র প্রেরণ করা হইবে।<br>
                       <p>


                        <div>


                        <div class=\"d\">
                        <style scoped>
                            .d{ text-indent: 30px;
                                word-spacing: 8px;
                            }
                        </style>
                        

                        <p> আপনার কোনো নিকট আত্মীয় যেমনঃ (১) ভাই  (২) বোন  (৩) স্ত্রী/স্বামীর  (ক) ভাই/বোন 
                        (৪) ছেলে<br>  (৫) মেয়ে  (৬) ভ্রাতৃবধূ  (৭) ভগ্নিপতি 
                       (৮) স্ত্রী (৯) স্বামী (১০) ভাই ও বোনের সন্তানের (১১) পুত্রবধূ <br>
                        (১২) জামাতা  (১৩) আপন চাচা-চাচী  (১৪) আপন মামা-মামী  (১৫) আপন ফুফা-ফুফু
                       এবং (১৬) আপন<br> খালা-খালু এই পরীক্ষায় যদি পরীক্ষার্থীর/পরীক্ষার্থিনী থাকে ,তবে তাহা নিয়োগপত্র গ্রহণের পূর্বে  অত্র অফিসে <br>জানাইতে হইবে।
                       <br>
                       </p>

</div>



<div class=\"e\">
<style scoped>
                            .e{ text-indent: 30px;
                                word-spacing: 8px;
                            }
                        </style>

                        <p>আপনি যদি শিক্ষা প্রতিষ্ঠান/বিভাগ ছাড়া অন্য কোন সরকারী দপ্তরের কর্মকর্তা হন,তবে আপনাকে  নিযুক্তি<br> গ্রহণের পূর্বে অবশ্যই কর্তৃপক্ষের অনুমতি নিতে হইবে এবং এই কাজের পারিশ্রমিক গ্রহণের
                        জন্য  অনুমোদন<br> পত্র বিলের সহিত গ্রথিত করিয়া দিতে হইবে। <br></p>

</div >


<div class=\"f\">
<style scoped>
                            .f{ text-indent: 30px;
                                word-spacing: 8px;
                            }
                        </style>

<p>উক্ত বিষয়ে আপনার সম্মতি যথাশীঘ্র জানাইবার জন্য অনুরোধ করিতেছি।<p>

</div>    
<div class=\"h\">

<style scoped>
.h
{
   margin-left:350px ;
   padding-top: 10px;
   padding-bottom:-20px;
   width: 30%;
   
   height:60px;
 
   padding-left: 300px;
}

       </style>

<p>আপনার বিশ্বস্ত</p>


</div>

 
<div class=\"row\">
<style scoped>
    
  

 

/* Clear floats after the columns */
.row:after {
    content: \"\";
      display: table;
      clear: both;
}
      }
 </style>

  <div class=\"column name\" >
  <style scoped>
 .column {
        
        float: left;

       /* Should be removed. Only for demonstration */
}

     .name{

width: 45%;
height: 150px; 
padding-top:110px;
}
 </style>

 <p>ঢবপ-৪৮১-০২-২০১৯-২০,০০০ কপি</p>
  </div>
  <div class=\"column namea\">

  <style scoped>
 .column {
        
        float: left;

        height: 200px; /* Should be removed. Only for demonstration */
}

     .namea{

width: 25%;
padding-left:230px;
height: 200px; 

text-indent:-4px;
}
 </style>

 <img src=\"signature.jpg\" width=\"180\" height=\"50\">
     
<p style=\"margin-left:10%;\">পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
     পরীক্ষা উপ-নিয়ন্ত্রক<br>
     ঢাকা বিশ্ববিদ্যালয়।<br>
     </p>
  </div>
  
</div>
    
</div>
  


</html>

";



$html = ob_get_contents();
ob_end_clean(); 
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
?>