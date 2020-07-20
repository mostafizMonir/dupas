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
                              $yr=$_POST["yr"];
                              $sub=$_POST["sub"];

                              $orgDate = $_POST["birthday1"];  
                              $newDate1 = date("d-m-Y", strtotime($orgDate));  
                              $y1= BanglaConverter::en2bn($newDate1);

                              $orgDate1 = $_POST["birthday2"];  
                              $newDate1 = date("d-m-Y", strtotime($orgDate1));  
                              $y11= BanglaConverter::en2bn($newDate1);

                              $time1= BanglaConverter::en2bn($_POST["t1"]);
                              $time2= BanglaConverter::en2bn($_POST["t2"]);
                              $time3= BanglaConverter::en2bn($_POST["t3"]);
                              $time4= BanglaConverter::en2bn($_POST["t4"]);
                              

                              $conn=mysqli_connect("localhost","root","","letter");
                              $sql="INSERT INTO letter_data(MemoNo,SendingDate,Recipient,Designation,
                              Department,Year,StudyYear,Subject,PracticalDate,VivaDate,Pstart,Pfinish,Vstart,Vfinish,Type)
                              VALUES ('$memo','$new','$a','$d1','$d2','$y','$yr','$sub','$y1','$y11','$time1',
                              '$time2','$time3','$time4','D')";
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

তারিখঃ   $new
</div>
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
                </div>

                <div class=\"b\">
                <style scoped>
                     .b{ text-indent: 60px;
                      }
                 </style>

                <p>আপনাকে জানাইতেছি যে,আপনি বার্ষিক কোর্স পদ্ধতিতে $y সনের $yr সম্মান  <br>
                পরীক্ষায় $sub বিষয়ের একজন অভ্যন্তরীণ/
                বহিরাগত ব্যবহারিক ও মৌখিক পরীক্ষক নিযুক্ত  হইয়াছেন।<br></p>
                </div>


                <div class=\"c\">

                <style scoped>
                     .c{ text-indent: 60px;
                      }
                 </style>

                               উক্ত  ব্যবহারিক ও মৌখিক পরীক্ষা ঢাকা বিশ্ববিদ্যালয়ের সংশ্লিষ্ট বিভাগ/কেন্দ্রে 
                               আগামী $y1 তারিখ<br> প্রতিদিন
                               সকাল $time1 টা হইতে বিকাল $time2 টা পর্যন্ত এবং  মৌখিক পরীক্ষা $y11 তারিখ<br>
                               সকাল $time3 টা হইতে বিকাল $time4 টা পর্যন্ত  অনুষ্ঠিত হইবে। যথাসময়ে উপস্থিত থাকিয়া উক্ত
                              ব্যবহারিক ও<br> মৌখিক পরীক্ষা পরিচালনায় অংশ গ্রহণের জন্য আপনাকে বিনীত অনুরোধ করিতেছি।<br>  

                                 

                        <div>


                <div class=\"d\">
                <style scoped>
                     .d{ text-indent: 60px;
                      }
                 </style>

                               
                 <p> আপনাকে উক্ত কার্য সম্পাদন উপলক্ষে কার্যক্ষেত্রে  গমনাগমন ও সেখানে থাকার জন্য ভ্রমণ ভাতা ও
                 দৈনিক ভাতা <br> বিশ্ববিদ্যালয় আইনানুযায়ী প্রদান করা হইবে।</p><br>

       <div>



<div class=\"e\">
<style scoped>
                     .e{ text-indent: 60px;
                      }
                 </style>

                 <p> আপনার কোনো নিকট আত্মীয় যেমনঃ (১) ভাই  (২) বোন  (৩) স্ত্রী/স্বামীর  (ক) ভাই/বোন  (৪) ছেলে  (৫) মেয়ে  (৬) ভ্রাতৃবধূ <br> (৭) ভগ্নিপতি 
                 (৮) স্ত্রী (৯) স্বামী (১০) ভাই ও বোনের সন্তানের (১১) পুত্রবধূ  (১২) জামাতা  (১৩) আপন চাচা-চাচী  (১৪) আপন মামা-মামী <br> (১৫) আপন ফুফা-ফুফু
                 এবং (১৬) আপন খালা-খালু এই পরীক্ষায় যদি পরীক্ষার্থীর/পরীক্ষার্থিনী থাকে ,তবে তাহা নিয়োগপত্র গ্রহণের<br> পূর্বে  অত্র অফিসে জানাইতে হবে।<br>
                 
                 </p>

</div>



<div class=\"f\">
<style scoped>
                     .f{ text-indent: 60px;
                      }
                 </style>

                 <p>আপনি যদি শিক্ষা প্রতিষ্ঠান/বিভাগ ছাড়া অন্য কোন সরকারী দপ্তরের কর্মকর্তা হন,তবে আপনাকে  নিযুক্তি
                 গ্রহণের পূর্বে<br>  অবশ্যই কর্তৃপক্ষের অনুমতি নিতে হইবে। এই কাজের পারিশ্রমিক গ্রহণের জন্য অনুমোদন
                 পত্র বিলের সহিত গ্রথিত করিয়া<br> দিতে হইবে।</p>

</div >


                <div class=\"g\">
                <style scoped>
                     .g{ text-indent: 60px;
                      }
                 </style>
                
                <p>উক্ত বিষয়ে আপনার সম্মতি যথাশীঘ্র জানাইবার জন্য অনুরোধ করিতেছি।<p>
                
                </div>  
                
                <div class=\"h\">
                
                <style scoped>
                .h
                {
                   margin-left:250px ;
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
                    padding-left:170px;
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
                      
               
             
             </body>


                <html>
";



$html = ob_get_contents();
ob_end_clean(); 
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
?>


