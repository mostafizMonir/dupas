<form method="post">
    <input type="submit" name="test" id="test" value="RUN" /><br/>
</form>

<?php

function testfun()
{
    require_once '../../../spl/lib/vendor/autoload.php';


    $transport = (new Swift_SmtpTransport('smtp.gmail.com',587,'tls'))
        ->setUsername('monir.ndc.itdu@gmail.com')
        ->setPassword('monmosndc')
    ;


    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message())
        // Add subject
        ->setSubject('Here should be a subject')

        //Put the From address
        ->setFrom(['monir.ndc.itdu@gmail.com'])

        // Include several To addresses
        ->setTo(['bit0211@iit.du.ac.bd']);

  /*  if($mailer->send($message)){
        echo "mail send";
    }*/


}

if(array_key_exists('test',$_POST)){
    testfun();
}

?>

<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>


<iframe style="width: 1000px; height: 500px" src="../files/filename.pdf">
</iframe>
<form  method="post">
<div class="row">
    <button type="button" class="btn btn-primary" name="send" value="send">Send Mail</button>
    <input type="submit"  value="send" name="send" id="search">
    <button style="margin-left: 5px" class="btn btn-success" onclick="history.go(-1);">Back</button>
</div>
</form>
</body>
</html>

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

                      $dept=$_POST["dept"];

                      $sub=$_POST["sub"];

                      $y=BanglaConverter::en2bn($_POST["year"]);

                      $yr=$_POST["yr"];

                      $orgDate = $_POST["birthday1"];  
                      $newDate1 = date("d-m-Y", strtotime($orgDate));  
                      $y1= BanglaConverter::en2bn($newDate1);



                      $conn=mysqli_connect("localhost","root","monmosndc","letter");
                      $sql="INSERT INTO letter_data(MemoNo,SendingDate,
                            Department,Year,Subject,StudyYear,ResponseDate,Type)
                            VALUES ('$memo','$new','$dept','$y','$sub','$yr','$y1','B')";
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

  <p> <img src=\"../mpdf/DhakaUniversity.jpg\" width=\"70\" height=\"90\"></p>
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

<div class=\"main1\">

চেয়ারম্যান,<br>

 $dept <br>
ঢাকা বিশ্ববিদ্যালয়।<br>

</div>

<div class=\"main2\">
                   <p> বিষয়ঃ- সমন্বিত  কোর্স  পদ্ধতিতে  সম্মান  পরীক্ষার  পরীক্ষকদের  প্যানেল  ও  পরীক্ষা  কমিটি  গঠন।<p><br>
                        জনাব,<br>
                </div>

<div class=\"main3\">

<style scoped>
.main3
{
text-indent:60px;
word-spacing: 8px;

}

</style>

 $sub  বিষয়ে   সমন্বিত    কোর্স    পদ্ধতির   $y সনের  $yr<br>
বর্ষ  সম্মান  ও  সহায়ক  পরীক্ষকদের  প্যানেল
বিভাগীয়    কমিটি    অব    কোর্সেস    এর    সুপারিশ    অনুযায়ী <br>   গঠন    করিয়া    একাডেমিক    কাউন্সিলের
অনুমোদনের    জন্য    সংশ্লিষ্ট    অনুষদের    মাধ্যমে    এবং    পরীক্ষা <br>   কমিটি    বিভাগীয়    একাডেমিক    কমিটির
 সুপারিশ    অনুযায়ী    গঠন    করিয়া  $y1  ইং<br>   তারিখের    মধ্যে    সরাসরি    অত্র     অফিসে
 পাঠানোর    জন্য    আপনাকে    অনুরোধ  করিতেছি।<br>

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


<div class=\"g\">

<style scoped>
.g
{width: 25%;
padding-left:200px;
margin-left:300px;
text-indent:-4px;
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
  

</body>
</html>

";



$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML($html);

$mpdf->Output('../../email/files/filename.pdf','F');
exit;
?>
