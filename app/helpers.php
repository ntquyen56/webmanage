<?php


function is_html($string)
{
  return preg_match("/<[^<]+>/",$string,$m) != 0;
}


function checkChecked($arr,$value,$count_hd,$kl = ""){
  
  $count = 0;
  if(empty($kl)){

    foreach($arr as $item){
      if($item == $value){
        $count++;
      }
      
    }
  }else{
    foreach($arr as $item){
      if($item == $value || (($value =='Đạt - Xuất bản - Không chỉnh sửa' || $value =='Đạt - Xuất bản - Có chỉnh sửa')&& ($item =='Đạt - Xuất bản - Không chỉnh sửa' || $item =='Đạt - Xuất bản - Có chỉnh sửa')) ){
        $count++;
      }
      
    }
  }
  if($count > ($count_hd * 0.5)){
    return true;
  }

  return false;
}