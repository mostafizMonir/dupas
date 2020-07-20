




 

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
      
      
                      $conn=mysqli_connect("localhost","root","monmosndc","faculty");
      
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
                             $x=$_POST["hj"];


                             $result = $_POST["subject"];
                             $result_explode = explode('|', $result);

                             $r1= $result_explode[1];
                             $r2=$_POST["course"];


                             $orgDate = $_POST["birthday1"];  
                             $newDate1 = date("d-m-Y", strtotime($orgDate));  
                             $y1= BanglaConverter::en2bn($newDate1);



                             $conn=mysqli_connect("localhost","root","monmosndc","course_db");
                            $result11 = $_POST["subject"];
                            $result_explode11 = explode('|', $result);
                            $query11="

                            SELECT chairman FROM subject
                            WHERE ID='$result_explode11[0]'


                            ";
                            $result111=mysqli_query($conn,$query11);
                            $row=mysqli_fetch_array($result111);


                            $c= $row[0];

                            mysqli_close($conn);


                            $conn=mysqli_connect("localhost","root","monmosndc","letter");
                            $sql="INSERT INTO letter_data(MemoNo,SendingDate,Recipient,Designation,
                            Department,Year,Subject,Course,ExamName,ResponseDate,Chairman,Type)
                             VALUES ('$memo','$new','$a','$d1','$d2','$y','$r1','$r2','$x','$y1','$c','A')";
                            $result=mysqli_query($conn,$sql);
                            mysqli_close($conn);
                          

?>

<?php
include("mpdf.php");
$mpdf=new mPDF('','A3',14,'nikosh'); 
ob_start();

echo "




 




 <html>
<head>
  
</head>

<body>

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

  <div class=\"column left\" >
  <style scoped>
 .column {
        
        float: left;

}

     .left{

width: 7%;

height: 30px; /* Should be removed. Only for demonstration */

}
 </style>

 <p>প্রাপকঃ</p>
  </div>
  <div class=\"column right\">

  <style scoped>
 .column {
        
        float: left;

        /* Should be removed. Only for demonstration */
}

     .right{

width: 25%;

height: 100px;
padding-top:20px;

}
 </style>

 $a,<br>
 $d1,<br>
 $d2 ।<br>
  </div>
  
</div>



<div class=\"intro\">
  <p>
  <br>
  জনাব,<br>
  আপনাকে জানাইতেছি যে, $y সনের.................... $x.....................    পরীক্ষার<br>
  ..........................................................



   $r1  ..........................................................বিষয়ে <br>কোর্স/পত্র নং ..... $r2....  <br>
  এর বাংলা ও ইংরেজি উভয় ভাষার প্রশ্নপত্র প্রণয়ন করার জন্য আপনাকে যুগ্ম প্রশ্নপত্র প্রণেতা ও পরীক্ষক নিয়োগ করা হইয়াছে।<br>
  </p>

</div>
<div class=\"start\">

<strong>বিশেষ নির্দেশনাবলীঃ</strong>

</div>


<div class=\"a\">
<style scoped>
     .a{ text-indent: 80px;
    }
 </style>

  <p> উল্লেখিত প্রশ্নপত্র প্রণয়ন প্রসঙ্গে আনুসাঙ্গিক তথ্যাবলী সম্বলিত নিম্নলিখিত কাগজপত্র এতদসঙ্গে গ্রথিত হইলঃ(১)প্রশ্নপত্র প্রণেতাদের <br>
  প্রতি নির্দেশনাবলী (২) নির্ধারিত পাঠ্যসূচী (৩) সংশ্লিষ্ট পত্রের পূর্ববর্তী  বৎসরের প্রশ্নপত্র (৪) প্রশ্নপত্র প্রণয়নের জন্য রেখাঙ্কিত কাগজ (৫) ঠিকানা<br>
  যুক্ত ছোট বড় প্রয়োজনীয় খাম।<br></p>

</div>


<div class=\"b\">

  <style scoped>
     .b{ text-indent: 80px;
      }
 </style>
      <p>
      প্রনীত প্রশ্নপত্র গ্রথিত খামে সিলমোহর পূর্বক  বীমাকৃত ডাকে অথবা ব্যক্তিগতভাবে  $y1 ইং তারিখের মদ্ধে ঢাকা বিশ্ববিদ্যালয়ের<br>
      সংশ্লিষ্ট বিষয়ের  পরীক্ষা কমিটির চেয়ারম্যান প্রফেসর/ড/জনাব........................... $c...................................
      <br>

      এর নিকট জমা দেয়ার জন্য আপনাকে সবিনয় অনুরোধ করিতেছি।সরবরাহকৃত ছোট খামের শূন্যস্থানগুলি যথাযথভাবে পূরন করা প্রয়োজনীয়।<br>
      </p>
</div>



<div class=\"c\">

<style scoped>
     .c{ text-indent: 80px;
      }
 </style>

<p>
আপনার প্রণীত  প্রশ্নপত্র নির্ধারিত তারিখের মধ্যে পাওয়া না গেলে বিশ্ববিদ্যালয় করতিপক্ষ বিকল্প ব্যবস্থা গ্রহণ করিতে বাধ্য হইবে।<br>
নিযুক্তিপত্র গ্রহণে অপারগ হইলে অবশ্যই ইহার কারণ জানাইয়া সঙ্গে এতদসংলগ্ন কাগজপত্রাদিও ফেরত পাঠানোর জন্য আপনাকে অনুরোধ <br>
করতেছি।<br>
</p>

</div>

<div class=\"d\">
<style scoped>
     .d{ text-indent: 80px;
      }
 </style>

<p> প্রণয়নকৃত প্রশ্নপত্রের পান্ডুলিপি পরিষ্কার পরিচ্ছন্ন ও সুস্পষ্ট  হওয়া  একান্ত বাঞ্ছনীয়। কোন ছক বা অন্য কোন তথ্যাদি প্রশ্নপত্রের সঙ্গে <br>
সরবরাহ করার প্রয়োজন হইলে তাহা পৃথকভাবে সংশ্লিষ্ট  চেয়ারম্যানকে সঠিক নির্দেশিকা প্রদান করিতে অনুরোধ করিতেছি।<br></p>

</div>

<div class=\"e\">
<style scoped>

.e{ text-indent: 80px;
     }
 </style>

<p> আপনার কোনো নিকট আত্মীয় যেমনঃ (১) ভাই  (২) বোন  (৩) স্ত্রী/স্বামীর  (ক) ভাই/বোন  (৪) ছেলে  (৫) মেয়ে  (৬) ভ্রাতৃবধূ  (৭) ভগ্নিপতি <br>
(৮) স্ত্রী (৯) স্বামী (১০) ভাই ও বোনের সন্তানের (১১) পুত্রবধূ  (১২) জামাতা  (১৩) আপন চাচা-চাচী  (১৪) আপন মামা-মামী  (১৫) আপন ফুফা-ফুফু<br>
এবং (১৬) আপন খালা-খালু এই পরীক্ষায় যদি পরীক্ষার্থীর/পরীক্ষার্থিনী থাকে ,তবে তাহা নিয়োগপত্র গ্রহণের পূর্বে  অত্র অফিসে জানানোর জন্য <br>
অনুরোধ করতেছি।<br>
</p>

</div>



<div class=\"f\">
<style scoped>
     .f{ text-indent: 80px;
     }
 </style>

<p>আপনি যদি শিক্ষা প্রতিষ্ঠান/বিভাগ ছাড়া অন্য কোন সরকারী দপ্তরের কর্মকর্তা হন,তবে আপনাকে এই কাজের পারিশ্রমিক গ্রহণের<br>
জন্য সরকারী অনুমোদন পত্র বিলের সহিত গ্রথিত করিয়া দিতে হইবে।সরকারী কর্মচারীদের নিযুক্ত
গ্রহণের পূর্বে  অবশ্যই কর্তৃপক্ষের অনুমতি<br>নিতে হইবে।</p>

</div >


<div class=\"g\">
<style scoped>
     .g{ text-indent: 80px;
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
padding-left:200px;
height: 200px; 
}
 </style>

 <img src=\"signature.jpg\" width=\"180\" height=\"50\">
     
<p style=\"margin-left:14%;\">পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
     পরীক্ষা উপ-নিয়ন্ত্রক<br>
     ঢাকা বিশ্ববিদ্যালয়।<br>
     </p>
  </div>
  
</div>
    
</div>
  

</body>
</html>












";



$html = ob_get_contents();
ob_end_clean(); 
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
?>





