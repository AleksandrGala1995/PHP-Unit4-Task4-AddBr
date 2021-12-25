<html>  
<head>  
    <title>Форма</title>  
    <meta charset="UTF-8">  
</head>  
<body>  
  
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">  
    Введіть текст (не можна вводити більше 40 символів підряд, без пробілу): <input type="text" name="text"><br>  
    <input type="submit">  
</form>  
<?php  
if (!empty($_POST['text'])) {   
    $text = $_POST['text'];   
  
    
    $wordArray = explode(" ", $text);
    foreach ($wordArray as $key => $value) {
        if (mb_strlen($wordArray[$key])>40) {
            echo "Помилка. Не можна вводити більше 40 символів підряд, без пробілу";
            exit;
        }
   
    }
    
    $strLength = 0;
    foreach ($wordArray as $key => $value) {
        
            $strLength=$strLength+mb_strlen($wordArray[$key]);
            
             if ($strLength<=39){
                 
                 echo $value;
                 echo " ";
                 $strLength = $strLength+1;
                 if ($strLength==40) {
                     $strLength = 0;
                     echo "<br>"; 
                     
                 }
                 
             } elseif ($strLength==40) {
                
                 echo $value;                
                 echo "<br>";                 
                 
                $strLength = 0;
             
             } else {
                 
                
                echo "<br>";
                echo $value;
                echo " ";
                
                $strLength=mb_strlen($wordArray[$key])+1;
                
             }
          
    }

   
}  
?>  
  
</body>  
</html>
